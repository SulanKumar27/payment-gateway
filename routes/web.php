<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\RazorpayPaymentController;
use App\Http\Controllers\ChatbotController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('paypal', [PayPalController::class, 'index'])->name('paypal');
    Route::get('paypal/payment', [PayPalController::class, 'payment'])->name('paypal.payment');
    Route::get('paypal/payment/success', [PayPalController::class, 'paymentSuccess'])->name('paypal.payment.success');
    Route::get('paypal/payment/cancel', [PayPalController::class, 'paymentCancel'])->name('paypal.payment/cancel');

    Route::get('stripe', [StripePaymentController::class, 'stripe'])->name('stripe');
    Route::post('stripe', [StripePaymentController::class, 'stripePost'])->name('stripe.post');

    Route::get('razorpay-payment', [RazorpayPaymentController::class, 'index']);
    Route::post('razorpay-payment', [RazorpayPaymentController::class, 'store'])->name('razorpay.payment.store');

    Route::get('ai-chatbot', [ChatbotController::class, 'index']);
    Route::post('ai-chatbot', [ChatbotController::class, 'store'])->name('store.chatbot');
});
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth'])->group(function () {
  
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
});
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth'])->group(function () {
  
    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
});
