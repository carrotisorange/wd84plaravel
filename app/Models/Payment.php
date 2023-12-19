<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';

    public function student(){
        return $this->belongsTo(Student::class, 'student_id')->withDefault();
    }

    public function loan(){
        return $this->belongsTo(Loan::class, 'loan_id')->withDefault();
    }
}
