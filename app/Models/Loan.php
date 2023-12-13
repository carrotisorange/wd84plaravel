<?php

namespace App\Models;

use COM;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $table = 'loans';

    public function student(){
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function course(){
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function payments(){
        return $this->hasMany(Payment::class);
    }
}
