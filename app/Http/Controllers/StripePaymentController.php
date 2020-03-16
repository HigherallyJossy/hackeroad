<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe;
use Exception;
use Illuminate\Support\Facades\Mail;
use App\Mail\FeedbackMail;
class StripePaymentController extends Controller
{
    private $_useremail;
    private $_amount;
    private $_username;
    private $_userphone;
    private $_useraddress;
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe(Request $request)
    {
        $post_id = $request->get('post_id');
        $cur_poster = Poster::find($post_id);

        return view('stripe',compact('cur_poster'));
    }
  
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        $this->_useremail = $request->get('user_email');
        $this->_amount = $request->get('total_price');
        $this->_username = $request->get('user_name');
        $this->_useraddress = $request->get('address');
        $this->_userphone = $request->get('phonenumber');    

        $price = $request->total_price;
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET')); 
       
        try {
            $temp = Stripe\Charge::create ([
                "amount" => $price*100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Payment from HACKERODE." 
            ]);            
        }
        catch(Exception $e) {           
            return back()->with("error",$e->getMessage()); 
        }
        
        if($temp->status == "succeeded")
        {     
             
            $feedback = array();
            $feedback['amount'] = $this->_amount;
            $feedback['name'] = $this->_username;
            $feedback['address'] = $this->_useraddress;
            $feedback['phone'] = $this->_userphone;
            $feedback['role'] = "user";
            $toEmail = $this->_useremail;
            Mail::to($toEmail)->send(new FeedbackMail($feedback));
            
            $toEmail = env('ADMIN_MAIL');
            $feedback['role'] = "admin";
            Mail::to($toEmail)->send(new FeedbackMail($feedback));

            session()->flash('success', 'Your payment has been prosessed successfully!');
            return redirect(url('/'));
        }
        else
        {
            return back();
        }


    }
    
   
}
