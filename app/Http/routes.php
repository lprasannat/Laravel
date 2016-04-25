
<?php

Route::get('/', array(
    'as' => 'home',
    'uses' => 'BController@home'
));
Route::get('/boot', array(
    'as' => 'boot',
    'uses' => 'hitcontroler@home'
));
Route::get('/multiple', array(
    'as' => 'multiple',
    'uses' => 'hitcontroler@multiplefile'
));

Route::get('/index', array(
    'as' => 'boot',
    'uses' => 'BController@exists'
));
Route::get('/secure', array(
    'as' => 'secure',
    'uses' => 'BController@secure'
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

