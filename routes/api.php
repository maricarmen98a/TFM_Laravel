<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasswordResetRequestController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\UnregUserController;
use App\Http\Controllers\ReservationController;

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::get('user-profile', 'AuthController@userProfile');
    Route::post('user-profile', 'AuthController@profileUpdate');
    Route::post('/reset-password-request', 'PasswordResetRequestController@sendPasswordResetEmail');
    Route::post('/change-password', 'ChangePasswordController@passwordResetProcess');
});

Route::get('flights', 'FlightController@getFlight');
Route::get('cities', 'FlightController@getCities');
Route::get('countries', 'FlightController@getCountries');
Route::get('reservations', 'FlightController@getReservation');
Route::post('reservations', 'ReservationController@store');
Route::put('reservations/{reservation}', 'ReservationController@update');
Route::get('unreguser', 'UnregUserController@show');
Route::post('unreguser', 'UnregUserController@store');

Route::post('send/email', 'HomeController@mail')->name('email');