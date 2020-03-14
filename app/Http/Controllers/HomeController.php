<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Auth;
use Hash;
use App\User;
use DB;
use App\Mail\FeedbackMail;

use App;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {        
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function alert()
    {   
        $fp = fopen('upload/log.txt','a');
        fwrite($fp,$_SERVER['REMOTE_ADDR']. ":");
        fwrite($fp,date("Y/m/d h:i:sa"));
        fwrite($fp,"\n");
        fclose($fp);
        return true;
                
    }

    public function getlocation()
    {
        $user_ip = $_SERVER['REMOTE_ADDR'];
        if($user_ip != "::1" && $user_ip != "127.0.0.1")
        {
            $details = json_decode(file_get_contents("http://ipinfo.io/{$user_ip}")); 
            session(['state' => $details->region]); 
            session(['city' => $details->city]);                
            session(['country' => $details->country]);
            session(['zipcode' => $details->postal]);
        }
    }

    public function index() 
    {       
        $this->alert();
        $this->getlocation();
        
        return view('welcome');
    }
    
    public function welcome(Request $request)
    {    
        $this->alert();
        $this->getlocation();
        return view('welcome');        
    }

    public function login(Request $request)
    {
        return redirect(route("membership"));
    }

    public function membership(Request $request)
    {
        return view('membership');
    }

    

    public function paymentlist(Request $request)
    {           
        $this->alert();
        $total_price = $request->get('price');       
        if(empty($total_price))
        {
            return redirect('/');
        }
       
        return view('paymentlist',compact('total_price'));    
        
    }
   
}
