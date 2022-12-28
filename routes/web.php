<?php

use Illuminate\Support\Facades\Route;



Route::get('/{any?}', function () {
    return view('app');
})->name('basepath')->where('any', '.*');
