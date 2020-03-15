<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe;
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
            session()->flash('success', 'Your payment has been prosessed successfully!');
            return redirect(url('/'));
        }
        else
        {
            return back();
        }


    }
    
   
}
