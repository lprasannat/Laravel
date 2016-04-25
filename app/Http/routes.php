
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

