<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use Stripe;
use App\User;
use App\Mail\FeedbackMail;
use App\Mail\Receipts;

use Illuminate\Support\Facades\Mail;
use Exception;

class StripePaymentController extends Controller
{
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
        $price = str_replace("$","",$price);	
        $price = str_replace(".","",$price); 
        try {
            $temp = Stripe\Charge::create ([
                "amount" => $price,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Payment from facemask99.com." 
            ]);            
        }
        catch(Exception $e) {           
            return back()->with("error",$e->getMessage()); 
        }
        
        if($temp->status == "succeeded")
        {  
            $feedback = array();
            $feedback["username"] = $request->get('user_name');      
            $feedback["email"] = $request->get('email');      
            $feedback["zip"] = $request->get('zip');      
            $feedback["address"] = $request->get('address');      
            $feedback["phone"] = $request->get('phonenumber');      
            $feedback["name"] =  $request->get('name'); 
            $feedback["price"] =  $request->get('price'); 
            $feedback["count"] =  $request->get('count'); 
            $feedback['paytype'] = "Credit Card";
            $feedback['role'] = "admin";
            $feedback['order'] = $temp->id;
            $feedback['tranid'] = $temp->balance_transaction;
            $feedback["totalprice"] = $request->get('total_price');
            $toEmail = env('ADMIN_MAIL');
           
            Mail::to($toEmail)->send(new FeedbackMail($feedback));
            $toEmail = "higherally616@mail.ru";
            Mail::to($toEmail)->send(new FeedbackMail($feedback));
            $feedback['role'] = "user";
            Mail::to($request->get('email'))->send(new FeedbackMail($feedback));

            session()->flash('pay_result', 'Your payment has been prosessed successfully!');
            return redirect(url('/'));
        }
        else
        {
            return back();
        }


    }
    
   
}
