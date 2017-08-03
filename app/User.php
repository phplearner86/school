<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Overrides default login using email
    public function username()
    {
        return 'username';
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public static function createAccount($data)
    {
        $user = new static;

        $user->username = username($data['first_name'], $data['last_name']);
        $user->password = bcrypt(password($data['first_name'], $data['last_name'], $data['dob']));
        $user->name = name($data['first_name'], $data['last_name']);

        $count = static::whereRaw("name REGEXP '^{$user->name}(-[0-9]*)?$'")->count();

        if ($count>0) 
        {
             $latestName = static::whereRaw("name REGEXP '^{$user->name}(-[0-9]*)?$'")
                ->latest('id')
                ->first()
                ->pluck('name');

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

        return $user;
    }
}
