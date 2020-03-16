<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\FeedbackMail;
use Illuminate\Http\Request;

use App\Event;
use PaytmWallet;
 
 
class EventController extends Controller
{
    private $_useremail;
    private $_paytmemail;
    private $_amount;
    private $_name;
    private $_phone;
    private $_address;

 
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
      $this->_useremail = $request->get('user_email');
      $this->_paytmemail = $request->get('email');
      $this->_amount = $request->get('total_price');
      $this->_name = $request->get('user_name');
      $this->_address = $request->get('address');
      $this->_phone = $request->get('phonenumber');
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
          $feedback['amount'] = $this->_amount;
          $feedback['name'] = $this->_name;
          $feedback['address'] = $this->_address;
          $feedback['phone'] = $this->_phone;
          $feedback['mail'] = $this->_useremail;
          $feedback['type'] = "Paytm";
          $feedback['role'] = "user";
          $feedback['unit'] = "₹";
          $toEmail = $this->_useremail;
          if($this->_useremail == "")
          {
            $toEmail = $this->_paytmemail;
          }
          Mail::to($toEmail)->send(new FeedbackMail($feedback));
          
          $toEmail = env('ADMIN_MAIL');
          $feedback['role'] = "admin";
          Mail::to($toEmail)->send(new FeedbackMail($feedback));

          session()->flash('success', 'Your payment has been prosessed successfully!');
          return redirect(url('/'));
 
        }else if($transaction->isFailed()){
       
          session()->flash('error', 'Payment failed,try again later.');
          return redirect(url('/'));
        }
    }
}