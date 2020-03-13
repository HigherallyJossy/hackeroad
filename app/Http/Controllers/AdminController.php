<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Intervention\Image\ImageManagerStatic as Image;
use Auth;


use Illuminate\Support\Facades\Mail;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');       
    }       
    
}
