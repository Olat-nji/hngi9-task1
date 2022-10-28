<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return response()->json(["slackUsername"=> 'Olatunji_', "backend"=> true, "age"=> 22, "bio"=> 'I’m a software engineer who loves building scalable, well-engineered products that can handle both the test of time and technological advancements.' ],200);
});
