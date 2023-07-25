<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    public function homeroom()
    {
        return $this->hasOne(Teacher::class, 'id', 'homeroom_teacher');
    }
}
