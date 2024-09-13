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

Route::get('/certificates', [OurSolutionApiController::class,'index']);
Route::get('/aboutUs', [AboutUsApiController::class,'index']);
Route::get('/artical', [ArticalApiController::class,'index']);
Route::get('/cards', [CardsApiController::class,'index']);
Route::get('/contactUs', [ContactUsApiController::class,'index']);
Route::get('/homePage', [SliderApiController::class,'index']);
Route::get('/sendMessage', [CommunicateApiController::class,'sendMessage']);



Route::get('/headercode/index', [App\Http\Controllers\Api\HeadercodeController::class, 'index'])->name('headercode.index.api');
Route::post('/messages/store', [App\Http\Controllers\Api\MessagesController::class, 'store'])->name('messages.store.api');


Route::get('/service/index', [App\Http\Controllers\Api\ServiceController::class, 'index'])->name('service.index.api');
Route::get('/rating/index', [App\Http\Controllers\Api\RatingController::class, 'index'])->name('rating.index.api');
Route::get('/partner/index', [App\Http\Controllers\Api\PartnerController::class, 'index'])->name('partner.index.api');

Route::get('/mainpage/index', [App\Http\Controllers\Api\MainpageController::class, 'index'])->name('mainpage.index.api');