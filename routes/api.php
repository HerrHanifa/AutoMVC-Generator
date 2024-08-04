<?php

use App\Http\Controllers\Api\AboutUsApiController;
use App\Http\Controllers\Api\CardsApiController;
use App\Http\Controllers\Api\ClientsApiController;
use App\Http\Controllers\Api\CommunicateApiController;
use App\Http\Controllers\Api\ContactUsApiController;
use App\Http\Controllers\Api\OurSolutionApiController;
use App\Http\Controllers\Api\ServicesApiController;
use App\Http\Controllers\Api\SliderApiController;
use App\Http\Controllers\Api\ArticalApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/services', [ServicesApiController::class,'index']);
Route::get('/certificates', [OurSolutionApiController::class,'index']);
Route::get('/agents', [ClientsApiController::class,'index']);
Route::get('/aboutUs', [AboutUsApiController::class,'index']);
Route::get('/artical', [ArticalApiController::class,'index']);
Route::get('/cards', [CardsApiController::class,'index']);
Route::get('/contactUs', [ContactUsApiController::class,'index']);
Route::get('/homePage', [SliderApiController::class,'index']);
Route::get('/sendMessage', [CommunicateApiController::class,'sendMessage']);


Route::post('/Gsddsgdfgs/create', [App\Http\Controllers\GsddsgdfgsController::class, 'create']);
Route::get('/Gsddsgdfgs/index', [App\Http\Controllers\GsddsgdfgsController::class, 'index']);