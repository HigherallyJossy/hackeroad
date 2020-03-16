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
    private $_name;
    private $_phone;
    private $_address;
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
            $feedback['amount'] = $request->get('total_price');
            $feedback['name'] = $request->get('user_name');
            $feedback['address'] = $request->get('address');
            $feedback['phone'] = $request->get('phonenumber');  
            $feedback['mail'] = $request->get('user_email');
            $feedback['type'] = "Stripe";
            $feedback['role'] = "user";
            $feedback['unit'] = "$";
            $toEmail = $request->get('user_email');
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
