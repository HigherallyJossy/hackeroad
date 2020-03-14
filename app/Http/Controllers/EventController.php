<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Event;
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
        return view('book_event');
    }
 
 
    /**
     * Redirect the user to the Payment Gateway.
     *
     * @return Response
     */
    public function eventOrderGen(Request $request)
    {        
        // $this->validate($request, [
        //   'name' => 'required',
        //   'mobile_number' =>'required|numeric|digits:10|unique:events,mobile_number',
        // ]);
        

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
          'callback_url' => url('/paytm_payment/status')
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
        dump($response);
        if($transaction->isSuccessful())
        {
        //   Event::where('order_id',$response['ORDERID'])->update(['status'=>'success', 'payment_id'=>$response['TXNID']]); 
            session()->flash('success', 'Your payment has been prosessed successfully!');
            return redirect(url('/'));
        }else if($transaction->isFailed()){
        //   Event::where('order_id',$order_id)->update(['status'=>'failed', 'payment_id'=>$response['TXNID']]);
            session()->flash('error', 'Payment Failed. Try again lator');
            return redirect(url('/'));
        }
    }
}
