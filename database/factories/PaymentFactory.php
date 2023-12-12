<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use App\Models\Student;
use App\Models\Loan;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'student_id' => Student::all()->random()->id,
            'loan_id' => Loan::all()->random()->id,
            'amount' => rand(1000,100000),
            'mode' => Arr::random(['cash','bank','cheque', 'e-wallet', 'crypto']),
            'is_approved_flag' => rand(0,1),
            'proof_of_payment' => Arr::random(['proof_of_payments/deposit_slip.png','']),
        ];
    }
}
