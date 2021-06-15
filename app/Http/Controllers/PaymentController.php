<?php
namespace App\Http\Controllers;

class PaymentController extends Controller{
    public function paymentCart() {
        return view('payment.payment_cart');
    }

    public function purchaseInfo() {
        return view('payment.purchase_info');
    }
}
