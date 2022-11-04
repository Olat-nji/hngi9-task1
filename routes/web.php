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

Route::post('/task-2', function (Request $request) {
    Cache::forget('response');
    Cache::rememberForever('response', function () use ($request) {
        return $request->all();
    });
    if ($request->bonus) {
        if (strstr($request->operation_type, '*') || strstr($request->operation_type, 'product')) {
            return response()->json(["slackUsername" => 'olayemi289', 'result' => $request->x * $request->y, 'operation_type' => '*'], 200);
        }
        if (strstr($request->operation_type, '+') || strstr($request->operation_type, 'sum')) {
            return response()->json(["slackUsername" => 'olayemi289', 'result' => $request->x + $request->y, 'operation_type' => '+'], 200);
        }

        if (strstr($request->operation_type, '-') || strstr($request->operation_type, 'difference')) {
            return response()->json(["slackUsername" => 'olayemi289', 'result' => $request->x - $request->y, 'operation_type' => '-'], 200);
        }
    }
    switch ($request->operation_type) {
        case 'addition':
            return response()->json(["slackUsername" => 'olayemi289', 'result' => $request->x + $request->y, 'operation_type' => $request->operation_type], 200);
            break;
        case 'subtraction':
            return response()->json(["slackUsername" => 'olayemi289', 'result' => $request->x - $request->y, 'operation_type' => $request->operation_type], 200);
            break;
        case 'multiplication':
            return response()->json(["slackUsername" => 'olayemi289', 'result' => $request->x * $request->y, 'operation_type' => $request->operation_type], 200);
            break;
            
        default:
            return response()->json(["slackUsername" => 'olayemi289', 'result' => $request->x + $request->y, 'operation_type' => $request->operation_type], 200);
            break;
    }
});

Route::get('/', function (Request $request) {
    return    Cache::get('response');
});
