<?php  

namespace App\Traits;

trait UserRoles
{
    public function hasRole($role)
    {
        if (is_string($role)) 
        {
            return $this->roles->contains('name', $role);
        }

        return (bool) $role->intersect($this->roles)->count();
    }

    public function isStudent()
    {
        return $this->hasRole('student');
    }

    public function isTeacher()
    {
        return $this->hasRole('teacher');
    }

    public function isAdmin()
    {
        return $this->hasRole('admin');
    }

    public function isSuperAdmin()
    {
        return $this->hasRole('superadmin');
    }

    public function assignRole($role)
    {
       $this->roles()->attach($role);
    }
}