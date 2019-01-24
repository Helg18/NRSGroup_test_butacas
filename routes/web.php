<?php

Route::get('/', function () {
    return view('home');
})->name('home');


Route::resource('users', 'UsersController');

Route::resource('reservations', 'ReservationsController');
