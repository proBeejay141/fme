<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    $news = \App\Neww::orderBy('created_at','desc')->take(3)->get();
    return view('index',compact('news'));
})->name('index');

Route::group(['prefix' => 'fmeo'], function () {
    Voyager::routes();
});

Route::group(['middleware'=>'admin.user'],function (){
        Route::get('/fmeo/show-user/{id}',['uses'=>'FmeoController@getShowUser','as'=>'admin.show-user']);
        Route::get('/fmeo/show-ph/{id}',['uses'=>'FmeoController@getPhOrder','as'=>'admin.show-ph']);
        Route::get('/fmeo/show-gh/{id}',['uses'=>'FmeoController@getGhOrder','as'=>'admin.show-gh']);
        Route::get('/fmeo/show-balance/{id}',['uses'=>'FmeoController@getBalance','as'=>'admin.show-balance']);
        Route::get('/fmeo/show-bonuses/{id}',['uses'=>'FmeoController@getBonus','as'=>'admin.show-bonus']);
        Route::get('/fmeo/show-refferal/{id}',['uses'=>'FmeoController@getRefferal','as'=>'admin.show-refferal']);
        Route::get('/fmeo/trashed-user',['uses'=>'FmeoController@getTrashed','as'=>'admin.show-trashed-user']);
        Route::get('/fmeo/support',['uses'=>'FmeoController@getSupport','as'=>'admin.show-support']);
        Route::get('/fmeo/stat',['uses'=>'FmeoController@getPhStat','as'=>'admin.show-phStat']);
        Route::get('/fmeo/ghstat',['uses'=>'FmeoController@getGhStat','as'=>'admin.show-ghStat']);
        Route::get('/fmeo/news',['uses'=>'FmeoController@getNews','as'=>'admin.get-news']);
        Route::get('/fmeo/delete-news/{id}',['uses'=>'FmeoController@deleteNews','as'=>'admin.delete-news']);




        Route::post('/fmeo/post-news',['uses'=>'FmeoController@postNews','as'=>'admin.post-news']);
        Route::get('/fmeo/get-ph-match/{id}',['uses'=>'FmeoController@getPhMatch','as'=>'admin.get-phMatch']);
        Route::get('/fmeo/get-gh-match/{id}',['uses'=>'FmeoController@getGhMatch','as'=>'admin.get-ghMatch']);
        Route::post('/fmeo/post-messages/',['uses'=>'FmeoController@PostMessage','as'=>'admin.post-messages']);
        Route::post('/fmeo/get-messages/{id}',['uses'=>'FmeoController@getMessage','as'=>'admin.get-message']);
        Route::post('/fmeo/post-gh',['uses'=>'FmeoController@postGhOpt','as'=>'admin.post-gh']);
        Route::post('/fmeo/post-ph',['uses'=>'FmeoController@postPhOpt','as'=>'admin.post-ph']);
        Route::post('/fmeo/post-trash',['uses'=>'FmeoController@postTrashOpt','as'=>'admin.post-trash']);
        Route::post('/fmeo/edit-balance',['uses'=>'FmeoController@postBalance','as'=>'admin.post-balance']);
        Route::post('/fmeo/edit-detail',['uses'=>'FmeoController@postEditDetail','as'=>'admin.post-detail']);
        Route::post('/fmeo/edit-bank',['uses'=>'FmeoController@postEditBank','as'=>'admin.post-bank']);
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {


    Route::get('/dashboard', ['uses'=>'DashboardController@index', 'as'=>'dash_index']);


    Route::get('/Bonuses', ['uses'=>'DashboardController@getBonus', 'as'=>'get_bonus']);
    Route::get('/Referrals', ['uses'=>'DashboardController@getReferral', 'as'=>'get_referral']);

    Route::post('/morepics',['uses'=>'DashboardController@getMatch','as'=>'get_match_detail']);

    Route::post('/create/ph',['uses'=>'OrderController@postPhOrder','as'=>'post_ph_order']);

    Route::post('/create/gh',['uses'=>'OrderController@postGhOrder','as'=>'post_gh_order']);

    Route::get('/matchname/{id}',['uses'=>'DashboardController@getMatchName','as'=>'match-name']);

    Route::get('/profile',['uses'=>'DashboardController@getUserProfile','as'=>'profile']);

    Route::get('/img/{filename}',['uses'=>'MatchController@getImage','as'=>'get.img']);

    Route::post('/confirmpic',['uses'=>'MatchController@postConfirmPhoto','as'=>'post.confirm']);

    Route::post('/confirmgh',['uses'=>'MatchController@postGhConfirm','as'=>'post.confirm-gh']);

    Route::post('/editprofile',['uses'=>'DashboardController@postProfileEdit','as'=>'post.edit-profile']);

    Route::get('/phhistory',['uses'=>'DashboardController@getPhHistory','as'=>'get.ph-history']);

    Route::get('/ghhistory',['uses'=>'DashboardController@getGhHistory','as'=>'get.gh-history']);

    Route::get('/tickets',['uses'=>'MessageController@getMessages','as'=>'get.messages']);

    Route::post('/postmessage',['uses'=>'MessageController@postMessage','as'=>'post.messages']);

});







Auth::routes();

Route::get('/home', 'HomeController@index');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
