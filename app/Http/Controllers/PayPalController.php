<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;

use Auth;
use Session;
use Stripe;
use App\User;
use App\Mail\FeedbackMail;
use App\Mail\Receipts;

use Illuminate\Support\Facades\Mail;
use Exception;
class PayPalController extends Controller
{
    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function payment(Request $request)
    {   
        
        $total_price = $request->get('total_price');
        $total_price = str_replace("$","",$total_price);  
        $total_price = (float)$total_price;     
        
        $data = [];
        $data['items'] = [
            [
                'name' => 'facemask99.com',
                'price' => $total_price,
                'desc'  => 'Description for facemask99.com',
                'qty' => 1
            ]
        ];
  
        $data['invoice_id'] = 1;
        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
        $data['return_url'] = route('payment.success');
        $data['cancel_url'] = route('payment.cancel');
        $data['total'] = $total_price;
  
        $provider = new ExpressCheckout;
  
        $response = $provider->setExpressCheckout($data);
  
        $response = $provider->setExpressCheckout($data, true);
        
        $feedback = array();
        $feedback["username"] = $request->get('user_name');      
        $feedback["email"] = $request->get('email');      
        $feedback["zip"] = $request->get('zip');      
        $feedback["address"] = $request->get('address');      
        $feedback["phone"] = $request->get('phonenumber');      
        $feedback["name"] =  $request->get('name'); 
        $feedback["price"] =  $request->get('price'); 
        $feedback["count"] =  $request->get('count'); 
        $feedback["totalprice"] = $request->total_price;
        $feedback['paytype'] = "Paypal";
        $toEmail = env('ADMIN_MAIL');
        
        // Mail::to($toEmail)->send(new FeedbackMail($feedback));
        // Mail::to($request->get('email'))->send(new FeedbackMail($feedback));
        

        return redirect($response['paypal_link']);
    }
   
    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function cancel()
    {        
        session()->flash('pay_result', 'Your payment is canceled. Please try again.');        
        return redirect(url('/'));
    }
  
    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function success(Request $request)
    {       
        //$response = $provider->getExpressCheckoutDetails($request->token);
        //dd($response);
        if (!empty($request->PayerID)) {            
            session()->flash('pay_result', 'Your payment has been prosessed successfully!');        
            return redirect(url('/'));
        }
        session()->flash('pay_result', 'Something is wrong.');        
        return redirect(url('/'));        
    }
}