
<?php

Route::get('/', array(
    'as' => 'home',
    'uses' => 'BController@home'
));
Route::get('/boot', array(
    'as' => 'boot',
    'uses' => 'hitcontroler@home'
));
//multiplefile upload------------------------------------------
Route::get('/multiple', 'multiplecontroller@index');
Route::post('/multipleupload', array(
    'as' => 'multiple',
    'uses' => 'multiplecontroller@multipleFile'
));
//currencyconversion--------------------------------------------
Route::get('/currencyconverter', 'currencycontroller@index');
Route::post('/currency', array(
    'as' => 'currencyconverter',
    'uses' => 'currencycontroller@converter'
));
//autosuggest---------------------------------------------------
Route::get('/autosuggest', 'autosuggestcontroller@index');
Route::post('/autosuggest', array(
    'as' => 'autosuggest',
    'uses' => 'autosuggestcontroller@auto'
));
//crosssite-----------------------------------------------------
Route::get('/crosssite', 'crosssitecontroller@index');
Route::post('/cross', array(
    'as' => 'crosssite',
    'uses' => 'crosssitecontroller@cross'
));
Route::get('/index', array(
    'as' => 'boot',
    'uses' => 'BController@exists'
));
//secure fileupload--------------------------------------
Route::get('/secure', 'SecureController@index');

Route::post('/secure', array(
    'as' => 'Secure',
    'uses' => 'SecureController@uploadFiles'
));
//string functions-------------------------------------
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
//find and replace-------------------------------------------------
Route::get('/findandreplace', 'finandreplacecontroller@home');
Route::post('/find', array(
    'as' => 'findandreplace',
    'uses' => 'finandreplacecontroller@index'
));
//up or down-------------------------------------------------------
Route::get('/upordown', 'upordowncontroller@home');
Route::post('/up', array(
    'as' => 'upordown',
    'uses' => 'upordowncontroller@up'
));
//template engine--------------------------------------------------
Route::get('/template', 'templateenginecontroller@home');
//guestbook--------------------------------------------------------
Route::get('/guestbook', 'guestbookcontroller@index');
Route::post('/guestbooks', array(
    'as' => 'guestbook',
    'uses' => 'guestbookcontroller@guest'
));
//transulate page lang------------------------------------------
Route::get('/translate', 'TransulateController@index');
Route::get('/translate', array(
    'as' => 'Transulate',
    'uses' => 'TransulateController@english'));
Route::get('/translates/deustch', 'TransulateController@deutsch');


//xmlfeed-----------------------------------------------------
Route::get('/xmlfeed', 'XmlfeedController@index');
//photoalbum--------------------------------------------------
Route::get('/photoalbum', array(
    'as' => 'index',
    'uses' => 'PhotoalbumController@index'));
Route::get('/photoalbum/{folder}', array(
    'as' => 'folder',
    'uses' => 'PhotoalbumController@folder'));

//spellcheck--------------------------------------------------
Route::get('/spellcheck', 'SpellcheckerController@index');
Route::post('/spellcheck', array(
    'as' => 'Spellchecker',
    'uses' => 'SpellcheckerController@check'));
//search engine-----------------------------------------------
Route::get('/search', 'SearchengineController@index');
Route::post('/searches', array(
    'as' => 'Searchengine',
    'uses' => 'SearchengineController@search'));
//website rating-----------------------------------------------
Route::get('/WebsiteRating', array(
    'as' => 'websiteindex',
    'uses' => 'WebsiteRateController@index'
));
Route::get('/WebsiteRating/{item}/{rating}/{limit}', array(
    'as' => 'rating',
    'uses' => 'WebsiteRateController@rating'
));
//upload images----------------
//Route::get('/register', 'UploadController@register');
Route::get('/register', array(
    'as' => 'register',
    'uses' => 'UploadController@login'
));
Route::post('/submit', array(
    'as' => 'submit',
    'uses' => 'UploadController@submit'
));

Route::get('/registers', array(
    'as' => 'Login',
    'uses' => 'UploadController@login'
));
//shout box----------------------
Route::get('shoutbox', array(
    'as' => 'shoutbox',
    'uses' => 'ShoutController@shout'));
Route::post('/ShoutBox-Upload', array(
    'as' => 'shoutboxsubmit',
    'uses' => 'ShoutController@shoutboxsubmit'
));

//chatApplication---------------------------------------
Route::get('chatbox/{name}', array(
    'as' => 'chatbox',
    'uses' => 'ChatWindowController@chat'));
Route::post('chatsubmit/', array(
    'as' => '/chatsubmit',
    'uses' => 'ChatWindowController@chatsubmit'
));
Route::post('getchat', array(
    'as' => '/getchat',
    'uses' => 'ChatWindowController@getchat'
));

//watermark------------------------------------------------
Route::get('/watermark', 'WatermarkController@index');
Route::post('watermarks/upload', array(
    'as' => 'water',
    'uses' => 'WatermarkController@home'));
//Route::post('watermarks/upload', array(
//    'as' => 'water',
//    'uses' => 'WatermarkController@watermark_image'));
//Mailing list
Route::get('mailinglist', array(
    'as' => 'mailinglist',
    'uses' => 'localController@mailinglist'
));
Route::post('mailinglist/maillistsubmit', array(
    'as' => 'mailinglist/maillistsubmit',
    'uses' => 'localController@maillistsubmit'));

//php expert string functions--------------------------------
Route::get('/stringfunctions', 'PhpExpertStringController@index');
Route::get('/stringfunctions12', 'PhpExpertStringController@NameLength');
Route::get('/explode', 'PhpExpertStringController@explode');
Route::get('/implode', 'PhpExpertStringController@implode');
Route::get('/join', 'PhpExpertStringController@join');
Route::get('/substrcount', 'PhpExpertStringController@substr_count');
Route::get('/substrreplace', 'PhpExpertStringController@substr_replace');
Route::get('/datetotime', 'PhpExpertStringController@datetotime');
Route::get('/crawl', 'PhpExpertStringController@crawled');

//bbcode---------------------------------------------------------
Route::get('/bbcode', 'BbController@index');
//oops routes----------------------------------------------------
Route::get('/classfile', 'classfilecontroller@index');
Route::get('/encapsulation', 'encapsulationcontroller@index');
Route::get('/calci', 'calculatorcontroller@index');
Route::get('/constructor', 'constructorcontroller@index');
Route::get('/method', 'methodcontroller@index');
Route::get('/inherit', 'inheritancecontroller@index');
Route::get('/scope', 'scopecontroller@index');
Route::get('/constant', 'constantcontroller@index');
Route::get('/static', 'staticcontroller@index');
Route::get('/database', 'databasecontroller@index');
Route::get('/dynamic', 'dynamiccontroller@home');



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

