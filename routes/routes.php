<?php
use Illuminate\Support\Facades\Route;

Route::get(config('swagger.prefix'), function () {
    return view(config('swagger.view'));
})->middleware('swagger-auth-basic');
