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

Route::post('/paymentlist', 'HomeController@paymentlist')->name('paymentlist');
Route::post('/test', 'HomeController@test')->name('test');
Route::post('/login', 'HomeController@login')->name('user.login');
Route::get('/membership', 'HomeController@membership')->name('membership');


Route::post('/stripe_payment', 'StripePaymentController@stripe')->name('get_stripe_form');
Route::any('/stripe', 'StripePaymentController@stripePost')->name('stripe.post');


Route::post('/paypal', 'PaypalController@payWithpaypal');
Route::get('/status', 'PaypalController@getPaymentStatus');


Route::post('/creditpayment', 'CreditController@creditpayment')->name('creditpayment');
Route::post('/cashpayment', 'CashController@cashpayment')->name('cashpayment');



