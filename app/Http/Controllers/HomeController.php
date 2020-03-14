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

    public function index() 
    {       
        $this->alert();
        return view('welcome');
    }

    
   

    public function welcome(Request $request)
    {    
        $this->alert();
        return view('welcome');        
    }

    public function paymentlist(Request $request)
    {   
        $this->alert();
        $total_price = $request->get('total_price');
        if(empty($total_price))
        {
            return redirect('/');
        }
        $name = array();
        $price = array();
        $count = array();
        $name = $request->get('name');
        $price = $request->get('price');
        $count = $request->get('count');        
        
        return view('paymentlist',compact('total_price','name','price','count'));        
        
    }

    public function terms(Request $request)
    {
        return view('terms');
    }
}
