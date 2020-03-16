<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\FeedbackMail;
use Illuminate\Http\Request;

use App\Event;
use PaytmWallet;
 
 
class EventController extends Controller
{
     
    /**
     * Redirect the user to the Payment Gateway.
     *
     * @return Response
     */
    public function bookEvent()
    {
        return view('event');
    }
 
 
    /**
     * Redirect the user to the Payment Gateway.
     *
     * @return Response
     */
    public function eventOrderGen(Request $request)
    {
      session(['email' => $request->get('user_email')]);
      session(['amount' => $request->get('total_price')]);
      session(['name' => $request->get('user_name')]);
      session(['address' => $request->get('address')]);
      session(['phone' => $request->get('phonenumber')]);

      $input = $request->all();
      $input['order_id'] = rand(1111,9999);
      $input['amount'] = $request->get('total_price');
      // Event::insert($input);

      $payment = PaytmWallet::with('receive');
      $payment->prepare([
        'order' => $input['order_id'],
        'user' => 'user id',
        'mobile_number' => $request->mobile_number,
        'email' => $request->email,
        'amount' => $input['amount'],
        'callback_url' => url('payment/status')
      ]);
            
      return $payment->receive();
    }
 
    /**
     * Obtain the payment information.
     *
     * @return Object
     */
    public function paymentCallback()
    {
        $transaction = PaytmWallet::with('receive');
 
        $response = $transaction->response();
        
        if($transaction->isSuccessful())
        { 
          $feedback = array();
          $feedback['amount'] = session('amount');
          $feedback['name'] = session('name');
          $feedback['address'] = session('address');
          $feedback['phone'] = session('phone');
          $feedback['mail'] = session('email');
          $feedback['type'] = "Paytm";
          $feedback['role'] = "user";
          $feedback['unit'] = "₹";
          $toEmail = session('email');
         
          Mail::to($toEmail)->send(new FeedbackMail($feedback));
          
          $toEmail = env('ADMIN_MAIL');
          $feedback['role'] = "admin";
          Mail::to($toEmail)->send(new FeedbackMail($feedback));

          session()->flash('success', 'Your payment has been prosessed successfully!');

          session(['email' => ""]);
          session(['amount' => ""]);
          session(['name' => ""]);
          session(['address' => ""]);
          session(['phone' => ""]);
          return redirect(url('/'));
 
        }else if($transaction->isFailed()){
       
          session()->flash('error', 'Payment failed,try again later.');

          session(['email' => ""]);
          session(['amount' => ""]);
          session(['name' => ""]);
          session(['address' => ""]);
          session(['phone' => ""]);
          return redirect(url('/'));
        }
    }
}