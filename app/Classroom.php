<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $fillable = ['label'];

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
