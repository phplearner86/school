<?php  

namespace App\Traits;

trait UserAccount
{
   public static function createAccount($data)
   {
        $user = new static;

        $user->setAccountDetails($user, $data);

        return $user;
    }

    protected function setAccountDetails($user, $data)
    {
        $user->username = username($data['first_name'], $data['last_name']);
        $user->password = bcrypt(password($data['first_name'], $data['last_name'], $data['dob']));
        $user->name = name($data['first_name'], $data['last_name']);

        $count = static::whereRaw("name REGEXP '^{$user->name}(-[0-9]*)?$'")->count();

        if ($count>0) 
        {
            $latestName = static::whereRaw("name REGEXP '^{$user->name}(-[0-9]*)?$'")
            ->latest('name', 'desc')
            ->pluck('name')
            ->first();

            $pieces = explode('-', $latestName);
            $number = intval(end($pieces));

            $user->name .= '-' .($number + 1);
            $user->email = email($data['first_name'], $data['last_name']) . ($number +1) . '@school.com';
        }
        else
        {
            $user->email = email($data['first_name'], $data['last_name']) . '@school.com';
        }

        $user->save();
    }
}