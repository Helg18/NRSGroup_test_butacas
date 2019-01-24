<?php

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::resource('users', 'UsersController');

Route::resource('reservations', 'ReservationsController');
