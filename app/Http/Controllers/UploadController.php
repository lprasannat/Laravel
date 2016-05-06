<?php

namespace App\Http\Controllers;
//namespace App\Http\Controllers\Redirect;
use File;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Validator;
class uploadController extends Controller {
    use AuthorizesRequests,
        AuthorizesResources,
        DispatchesJobs,
        ValidatesRequests;
    public function home() {
        return view('UserRegister');
    }
//    public function register() {
//        return view('UserRegister');
//    }
    public function submit() {
        $FirstName = Input::get('firstname');
        $LastName = Input::get('lastname');
        $EmailAddress = Input::get('email');
        $Password = Input::get('password');
        $validateError = null;
        $validate = null;
        $Insert = DB::table('ImageUsers')->insert(
                ['Email' => $EmailAddress,
                    'Password' => $Password]);
        if ($Insert == 1) {
            $validate = "Registration Complete successfully Please ";
        } else {
            $validateError = "Could not register try again later";
        }
        return view('Rigistersubmit', array(
            'message' => $validate,
            'error' => $validateError
        ));
    }
    public function Login() {
        $LoginEmailAddress = Input::get('login_email');
        $LoginPassword = Input::get('login_password');
        $validateError = null;
        $validate = null;
        session()->regenerate();
        $users = DB::table('ImageUsers')->select('User_id')->where('Email', $LoginEmailAddress)->where('Password', $LoginPassword)->get();
        foreach ($users as $values) {
            foreach ($values as $value => $key) {
                $UserId = $key;
            }
        }
        if ($users) {
            session(['id' => $UserId]);
            return view("users/LoginSubmit", array(
                // "Details"=>$users
                'message' => 'Successfully Login'
            ));
        } else {
            return view('uploadimage', array(
                'error' => 'EmailAddress or Password Incorrect'
            ));
        }
    }
//    public function createalbum() {
//        return view('users/createalbum');
//    }
//    public function createsuccess() {
//        $UserName = Input::get('name');
//        $Description = Input::get('message');
//        $validateError = null;
//        $validate = null;
//        $Insert = DB::table('users')->insert(
//                ['username' => $UserName,
//                    'Message' => $Description]);
//        if ($Insert == 1) {
//            $validate = " Create Album successfully";
//        } else {
//            $validateError = "Could not register try again later";
//        }
//
//        return view('users/createalbum', array(
//            'message' => $validate,
//            'error' => $validateError
//        ));
//    }
//    public function image() {
//        return view('users/upload');
//    }
//    public function imagesuccess() {
//        $select = Input::get('select');
//        $validateError = null;
//        $validate = null;
//        $Insert = DB::table('users')->insert(
//                ['select' => $select]);
////        if ($Insert == 1) {
////            $validate = " Create Album successfully";
////        } else {
////            $validateError = "Could not register try again later";
////        }
////
////        return view('users/createalbum', array(
////            'message' => $validate,
////            'error' => $validateError
////        ));
//        session()->regenerate();
//        $UserId = session('id');
//        $image = Input::file('upload');
//
//        $path = 'directory/' . $UserId . "/" . $select . "/";
//        $fileName = Input::file('upload')->getClientOriginalName();
//
//        if (Input::file('upload')->move($path, $fileName)) {
//            return view('users/upload', array(
//                'message' => 'Image uploaded Successfully'
//            ));
//        } else {
//            return view('users/upload', array(
//                'error' => 'Image could not be uploaded'
//            ));
//        }
//    }
//
//    public function search123() {
////$Search=Input::get('search_term');
//        session()->regenerate();
//        $UserId = session('id');
//        //$result='';
//        $users = DB::table('users')->select('username')->orderBy('username', 'desc')->get();
//        foreach ($users as $users1) {
//            foreach ($users1 as $x => $users2) {
//                echo '<option>' . $users2 . '</option>';
//            }
//        }
//        // echo $result;
//        //return View('search',['users1' => $users]);
//    }
//
//    public function myalbum() {
//
//        session()->regenerate();
//        $UserId = session('id');
//        //$result='';
//        $users = DB::table('users')->select('select')->get();
//        foreach ($users as $users1) {
//            foreach ($users1 as $x => $users2) {
//                $result[] = $users2;
//            }
//        }
//        return View('users/myalbum', ['users2' => $result]);
//    }
//
//    public function about() {
//        return view('users/about');
//    }

}

?>