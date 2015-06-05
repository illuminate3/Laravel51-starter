<?php
# Pages
get('/', 'PagesController@home');

# Registration
get('register', 'RegistrationController@register');
post('register', 'RegistrationController@postRegister');
get('register/confirm/{token}', 'RegistrationController@confirmEmail');

# Login/Logout
get('login', 'SessionsController@login');
post('login', 'SessionsController@postLogin');
get('logout', 'SessionsController@logout');

# Dashboard
get('/@{username}', 'DashController@show');
get('/@{username}/edit', 'DashController@edit');
post('/@{username}', 'DashController@update');
get('/@{username}/editpassword', 'DashController@editpass');
post('/@{username}/editpassword', 'DashController@updatepass');


Route::group(['middleware' => ['admin']], function()
{
    Route::get('/admin', function()
    {
        Return('HELLO ADMIN');
    });
});

# Password reset link request routes...
Route::get('password/email', 'PasswordController@getEmail');
Route::post('password/email', 'PasswordController@postEmail');

# Password reset routes...
Route::get('password/reset/{token}', 'PasswordController@getReset');
Route::post('password/reset', 'PasswordController@postReset');