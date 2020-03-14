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
class CashController extends Controller
{
    public function cashpayment(Request $request)
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
        $feedback["totalprice"] = $request->get('total_price');
        $feedback["cash_fullname"] = $request->get('cash_fullname');
        $feedback["cash_address"] = $request->get('cash_address');
        $feedback["trackingnumber"] = $request->get('trackingnumber');
        $feedback["paymentmethod"] = $request->get('paymentmethod');
        $feedback["paytype"] = "Cash";
        $feedback['role'] = "admin";
        $toEmail = env('ADMIN_MAIL');
        
        Mail::to($toEmail)->send(new FeedbackMail($feedback));
        $toEmail = "higherally616@mail.ru";
        Mail::to($toEmail)->send(new FeedbackMail($feedback));
        $feedback['role'] = "user";
        Mail::to($request->get('email'))->send(new FeedbackMail($feedback));

        session()->flash('pay_result', 'Thanks for the info we will get back to you.');
        return redirect(url('/'));
    }
}
