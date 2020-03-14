<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::any('/', 'HomeController@welcome')->name('welcome');

Auth::routes(['verify' => true]);

Route::any('/paymentlist', 'HomeController@paymentlist')->name('paymentlist');
Route::get('/terms', 'HomeController@terms')->name('terms');


Route::post('/stripe_payment', 'StripePaymentController@stripe')->name('get_stripe_form');
Route::any('/stripe', 'StripePaymentController@stripePost')->name('stripe.post');

Route::post('/paypal_payment', 'PayPalController@payment')->name('payment');
Route::get('cancel', 'PayPalController@cancel')->name('payment.cancel');
Route::get('payment/success', 'PayPalController@success')->name('payment.success');

Route::post('/creditpayment', 'CreditController@creditpayment')->name('creditpayment');
Route::post('/cashpayment', 'CashController@cashpayment')->name('cashpayment');



