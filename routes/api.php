<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\KhoaApiController;
use App\Http\Controllers\api\BoMonApiController;
use App\Http\Controllers\api\DiemChuanApiController;
use App\Http\Controllers\api\DonViHopTacApiController;
use App\Http\Controllers\api\HinhAnhNganhApiController;
use App\Http\Controllers\api\HinhAnhKhoaController;
use App\Http\Controllers\api\ThongTinNganhApiController;
use App\Http\Controllers\api\NganhApiController;
use App\Http\Controllers\api\HoiDapApiController;
use App\Http\Controllers\api\UserApiController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResources([
    'khoa' => KhoaApiController::class,
    'bomon' => BoMonApiController::class,
    'diemchuan' => DiemChuanApiController::class,
    'donvihoptac' => DonViHopTacApiController::class,
    'hinhanhnganh' => HinhAnhNganhApiController::class,
    'hinhanhkhoa' => HinhAnhKhoaController::class,
    'thongtinnganh' => ThongTinNganhApiController::class,
    'nganh' => NganhApiController::class,
    'user' => UserApiController::class,
    'hoidap' => HoiDapApiController::class,

]);

 Route::post('login', [UserApiController::class, 'login']);
 Route::post('register', [UserApiController::class, 'register']);

 Route::get('test', [UserApiController::class, 'test']);