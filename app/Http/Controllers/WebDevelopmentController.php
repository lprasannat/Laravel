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

class WebDevelopmentController extends Controller {

    use AuthorizesRequests,
        AuthorizesResources,
        DispatchesJobs,
        ValidatesRequests;

    public function contacts() {
        return view('ContactUs');
    }

    public function contact() {
        session()->regenerate();
        $data = Input::all();
        $rules = array(
            'subject' => 'required',
            'message' => 'required'
        );
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {

            return view('ContactUs', ['msg' => 'all fileds must be filled']);
        }
        $emailcontent = array(
            'subject' => $data['subject'],
            'emailmessage' => $data['message']
        );
        Mail::send('email/ContactEmail', array("name" => "lakshmi"), function($emailmessage) {
            $emailmessage->to('lprasanna537@gmail.com', 'lakshmi')->subject('testemail');
        });

        return 'Your message has been sent';
    }

}
