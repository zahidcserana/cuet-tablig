<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('home');
});*/

//Auth::routes();

// Authentication Routes...
$this->get('/', 'HomeController@index')->name('home')->middleware(['UserAuth']);
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
$this->post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
$this->post('password/reset', 'Auth\ResetPasswordController@reset');

// Admin user
Route::get('/all_user', 'UsersController@AllUser')->name('all_user')->middleware(['UserAuth']);
Route::get('/users', 'UsersController@users')->name('users')->middleware(['UserAuth']);
Route::get('/user_add', 'UsersController@userForm')->name('user_add')->middleware(['Admin']);
Route::post('/user_register', 'UsersController@UserRegister')->name('user_register')->middleware(['UserAuth']);
Route::get('/user_view/{id}', 'UsersController@View')->name('user_view')->middleware(['UserAuth']);
Route::post('/user_edit', 'UsersController@Edit')->name('user_edit')->middleware(['UserAuth']);
// Profile
Route::post('/accademic', 'UsersController@Accademic')->name('accademic')->middleware(['UserAuth']);
Route::post('/mehenot', 'UsersController@Mehenot')->name('mehenot')->middleware(['UserAuth']);
Route::post('/profession', 'UsersController@Profession')->name('profession')->middleware(['UserAuth']);
Route::get('/profile', 'UsersController@Profile')->name('profile')->middleware(['UserAuth'])->middleware(['UserAuth']);
Route::post('/user_image', 'UsersController@UserImage')->name('user_image')->middleware(['UserAuth']);

// Notice
Route::get('/notice_add', 'NoticesController@form')->name('notice_add')->middleware(['Admin']);
Route::post('/notice_add', 'NoticesController@add')->name('notice_add')->middleware(['Admin']);
Route::get('/notices', 'NoticesController@index')->name('notices')->middleware(['Admin']);
Route::get('/notice/{id}', 'NoticesController@notice')->name('notice')->middleware(['Admin']);
Route::post('/notice/{id}', 'NoticesController@update')->name('notice')->middleware(['Admin']);

// Message
Route::get('/message_add', 'MessagesController@form')->name('message_add')->middleware(['UserAuth']);
Route::post('/message_add', 'MessagesController@add')->name('message_add')->middleware(['UserAuth']);
Route::get('/messages', 'MessagesController@messages')->name('messages')->middleware(['UserAuth']);
Route::get('/user_message', 'MessagesController@index')->name('user_message')->middleware(['UserAuth']);
Route::get('/message/{id}', 'MessagesController@message')->name('message')->middleware(['UserAuth']);
Route::post('/message/{id}', 'MessagesController@update')->name('message')->middleware(['UserAuth']);

Route::get('/home', 'HomeController@index')->name('home')->middleware(['UserAuth']);
Route::get('/welcome', 'HomeController@welcome')->name('welcome');
Route::get('/activation/{email}/{code}', 'HomeController@activation')->name('activation');
Route::get('/downloadPDF','UsersController@downloadPDF')->middleware(['UserAuth']);

//Facebook login
Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');


