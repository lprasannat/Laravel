
<?php

Route::get('/', array(
    'as' => 'home',
    'uses' => 'BController@home'
));
Route::get('/boot', array(
    'as' => 'boot',
    'uses' => 'hitcontroler@home'
));
Route::get('/multiple', 'multiplecontroller@index');
Route::post('/multipleupload', array(
    'as' => 'multiple',
    'uses' => 'multiplecontroller@multipleFile'
));
Route::get('/currencyconverter', 'currencycontroller@index');
Route::post('/currency', array(
    'as' => 'currencyconverter',
    'uses' => 'currencycontroller@converter'
));
Route::get('/autosuggest', 'autosuggestcontroller@index');
Route::post('/autosuggest', array(
    'as' => 'autosuggest',
    'uses' => 'autosuggestcontroller@auto'
));
Route::get('/crosssite', 'crosssitecontroller@index');
Route::post('/crosssite', array(
    'as' => 'crosssite',
    'uses' => 'crosssitecontroller@cross'
));
Route::get('/index', array(
    'as' => 'boot',
    'uses' => 'BController@exists'
));

Route::get('/secure', 'BController@index');

Route::post('/secure',array(
    'as'=>'secure-post',
    'uses'=>'BController@uploadFiles'
));

Route::get('/adddecimal', array(
    'as' => 'adddecimalpoint',
    'uses' => 'adddecimalpointcontroller@index'
));
Route::get('/htmlentities', array(
    'as' => 'htmlentities',
    'uses' => 'htmlentities@index'
));
Route::get('/namelength', array(
    'as' => 'namelength',
    'uses' => 'namelengthcontroller@index'
));
Route::get('/maxlength', array(
    'as' => 'maxlength',
    'uses' => 'maxlength@index'
));
Route::get('/nltobr', 'nl2brcontroller@index');
Route::post('/nl2brfile', array(
    'as' => 'nl2br',
    'uses' => 'nl2brcontroller@nl2br'
));
Route::get('/string', array(
    'as' => 'strtolower',
    'uses' => 'strtolowercontroller@index'
));
Route::get('/findandreplace', 'finandreplacecontroller@home');
Route::post('/find', array(
    'as' => 'findandreplace',
    'uses' => 'finandreplacecontroller@index'
));
Route::get('/upordown', 'upordowncontroller@home');
Route::post('/up', array(
    'as' => 'upordown',
    'uses' => 'upordowncontroller@up'
));
Route::get('/template', 'templateenginecontroller@home');
Route::get('/guestbook', 'guestbookcontroller@home');
Route::post('/guestbooks', array(
    'as' => 'guestbook',
    'uses' => 'guestbookcontroller@guestbook'
));




Route::group(array('before' => 'guest'), function() {

    Route::group(array('before' => 'csrf'), function() {
        Route::post('/accounts/create', array(
            'as' => 'accounts-create-post',
            'uses' => 'accountcontroller@postCreate'
        ));
    });
    Route::get('/accounts/create', array(
        'as' => 'accounts-create',
        'uses' => 'accountcontroller@getCreate'
    ));
    Route::get('/accounts/activate/{code}', array(
        'as' => 'accounts-activate',
        'uses' => 'accountcontroller@getActivate'
    ));
});

/*use App\User;
Route::get('User',function(){ 
    
   $user=User::find(1);
   echo "<pre>";
   print_r($user);
   
});*/
/*Route::get('config/mail', function(){
    Mail::send('resources/views/test', array("name" => "lakshmi"), function($message) {
            $message->to('lprasanna537@gmail.com', 'lakshmi')->subject('testemail');
        });

});

