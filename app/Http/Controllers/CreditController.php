<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Session;
use App\User;
use App\Mail\FeedbackMail;
use App\Mail\Receipts;

use Illuminate\Support\Facades\Mail;
use Exception;

class CreditController extends Controller
{
    public function creditpayment(Request $request)
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
        $feedback["totalprice"] = $request->total_price;
        $toEmail = env('ADMIN_MAIL');
        
        // Mail::to($toEmail)->send(new FeedbackMail($feedback));
        // Mail::to($request->get('email'))->send(new FeedbackMail($feedback));

        return redirect('https://pay.tranzila.com/daniel1982');
    }
}
