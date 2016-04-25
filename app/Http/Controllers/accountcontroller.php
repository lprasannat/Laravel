<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\accountusers;
use Hash;
use Mail;
use Illuminate\Support\Facades\URL;


class accountcontroller extends Controller {

    use AuthorizesRequests,
        AuthorizesResources,
        DispatchesJobs,
        ValidatesRequests;

    public function getCreate() {
        return view('accounts.create');
    }

    public function postCreate() {
        //print_r(Input::all());
        $validator = Validator::make(Input::all(), array(
                    'email' => 'required|max:255|email|unique:accountuser',
                    'username' => 'required|max:50|min:5|unique:accountuser',
                    'password' => 'required|min:6',
                    'password-again' => 'required|same:password'
                        )
        );
        if ($validator->fails()) {
            return Redirect::route('accounts-create')->withErrors($validator)
                            ->withInput();
        } else {
            $email = Input::get('email');
            $username = Input::get('username');
            $password = Input::get('password');
            $code = str_random(60);
            $createuser = accountusers::create(array(
                        'email' => $email,
                        'username' => $username,
                        'password' => Hash::make($password),
                        'code' => $code,
                        'active' => 0
            ));
            if ($createuser) {
                Mail::send('email.activate',array(
                    'link'=>URL::route('accounts-activate',$code),
                    'usename'=>$username,function($message) use ($createuser){
                    $messgae->to($createuser->email,$createuser->username)->subject('Activate ur account');
                    }                   
                ));
                return Redirect::route('home')
                        ->with('global','your account has been created!we have sent you an email to activate');
            }
        }
    }
    public function getActivate($code){
        
    }

}
