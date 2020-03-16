<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Event;
use PaytmWallet;
 
 
class EventController extends Controller
{
    private $_useremail;
    private $_amount;
 
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
      $this->_useremail = $request->get('user_email');
      $this->_amount = $request->get('total_price');
      
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
 
        if($transaction->isSuccessful()){        
            session()->flash('success', 'Your payment has been prosessed successfully!');
          return redirect(url('/'));
 
        }else if($transaction->isFailed()){
       
          session()->flash('error', 'Payment failed,try again later.');
        return Redirect::to('/');
        }
    }
}