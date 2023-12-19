<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function index(){

        //get the current user role
        $currentUserRole = auth()->user()->role->role;

        //check if the current user role is admin, if not, return restricted page.
        if($currentUserRole == 'admin'){
        $payments = Payment::paginate(10);
        // DB::table('students')->paginate(10);

        return view('payments.index',compact('payments'));
        }
        else{
        return 'Restricted page';
        }
    }
}
