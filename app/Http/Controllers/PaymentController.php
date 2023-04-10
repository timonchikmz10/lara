<?php

namespace App\Http\Controllers;

use App\Classes\LiqPay;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(){
        $test = new LiqPay(config('services.liqpay.public_key'), config('services.liqpay.private_key'));
    }
}
