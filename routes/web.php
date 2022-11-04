<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Mockery\Generator\CachingGenerator;

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

Route::post('/', function (Request $request) {
    Cache::forget('response');
    Cache::rememberForever('response', function () use ($request) {
        return $request->all();
    });
    
    if(strstr($request->operation_type,'*')){
        return response()->json(["slackUsername" => 'olayemi289', 'result' => $request->x * $request->y, 'operation_type' => '*'], 200);
    }
    if(strstr($request->operation_type,'+')){
        return response()->json(["slackUsername" => 'olayemi289', 'result' => $request->x + $request->y, 'operation_type' => '+'], 200);
    }

    if(strstr($request->operation_type,'-')){
        return response()->json(["slackUsername" => 'olayemi289', 'result' => $request->x - $request->y, 'operation_type' => '-'], 200);
    }
});

Route::get('/', function (Request $request) {
return    Cache::get('response');
});
