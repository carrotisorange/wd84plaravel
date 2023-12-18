<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

    protected $fillable = [
        'name',
        'age',
        'address'
    ];

    public function studentCourses(){
        return $this->hasMany(StudentCourse::class);
    }

    public function loans(){
        return $this->hasMany(Loan::class);
    }

    public function payments(){
        return $this->hasMany(Payment::class);
    }
}
