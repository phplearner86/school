<?php



Auth::routes();

Route::as('pages.')->group(function(){
    Route::get('/', 'PageController@index')->name('index');
    Route::get('/home', 'PageController@home')->name('home');
    Route::get('/dashboard', 'PageController@dashboard')->name('dashboard');
    Route::get('/settings/{user}', 'PageController@settings')->name('settings');
});

Route::resource('users', 'UserController', [
    'only' => ['create','store', 'destroy']
]);
Route::resource('students', 'StudentController', [
    'parameters' => ['students' => 'user']
    ]);
