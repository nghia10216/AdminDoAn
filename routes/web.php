<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

use App\Http\Controllers\KhoaController;
use App\Http\Controllers\NganhController;
use App\Http\Controllers\HinhAnhNganhController;
use App\Http\Controllers\HinhAnhKhoaController;
use App\Http\Controllers\BoMonController;
use App\Http\Controllers\DonViHopTacController;
use App\Http\Controllers\ThongTinNganhController;
use App\Http\Controllers\DiemChuanController;
use App\Http\Controllers\KhungChuongTrinhDaoTaoController;
use App\Http\Controllers\HoiDapController;




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
    return view('welcome');
});

// Route::get('Thu', function(){
//     $theloai = TheLoai::find(1);
//     foreach($theloai->loaitin as $loaitin) {
//         echo $loaitin->Ten."<br>";
//     }
// });

// Route::get('Thu2', function(){
//     return view('admin.theloai.sua');
// });

Route::get('admin/dangnhap', [UserController::class, 'getDangnhapAdmin']);
Route::post('admin/dangnhap', [UserController::class, 'postDangnhapAdmin']);

Route::get('admin/logout', [UserController::class, 'getDangXuatAdmin']);

// Route::group(['prefix' => 'admin', 'middleware'=>'adminLogin'], function () {
Route::group(['prefix' => 'admin', 'middleware'=>'adminLogin'], function () {

    
    Route::group(['prefix' => 'user'], function () {

        Route::get('danhsach', [UserController::class, 'getDanhSach']);

        Route::get('sua/{id}', [UserController::class, 'getSua']);
        Route::post('sua/{id}', [UserController::class, 'postSua']);

        Route::get('them', [UserController::class, 'getThem']);
        Route::post('them', [UserController::class, 'postThem']);

        Route::get('xoa/{id}', [UserController::class, 'getXoa']);
    });

    Route::group(['prefix' => 'khoa'], function () {

        Route::get('danhsach', [KhoaController::class, 'getDanhSach']);

        Route::get('sua/{id}', [KhoaController::class, 'getSua']);
        Route::post('sua/{id}', [KhoaController::class, 'postSua']);

        Route::get('them', [KhoaController::class, 'getThem']);
        Route::post('them', [KhoaController::class, 'postThem']);

        Route::get('xoa/{id}', [KhoaController::class, 'getXoa']);
    });

    Route::group(['prefix' => 'nganh'], function () {

        Route::get('danhsach', [NganhController::class, 'getDanhSach']);

        Route::get('sua/{id}', [NganhController::class, 'getSua']);
        Route::post('sua/{id}', [NganhController::class, 'postSua']);

        Route::get('them', [NganhController::class, 'getThem']);
        Route::post('them', [NganhController::class, 'postThem']);

        Route::get('xoa/{id}', [NganhController::class, 'getXoa']);
    });

    Route::group(['prefix' => 'hinhanhnganh'], function () {

        Route::get('danhsach', [HinhAnhNganhController::class, 'getDanhSach']);

        Route::get('sua/{id}', [HinhAnhNganhController::class, 'getSua']);
        Route::post('sua/{id}', [HinhAnhNganhController::class, 'postSua']);

        Route::get('them', [HinhAnhNganhController::class, 'getThem']);
        Route::post('them', [HinhAnhNganhController::class, 'postThem']);

        Route::get('xoa/{id}', [HinhAnhNganhController::class, 'getXoa']);
    });

    Route::group(['prefix' => 'bomon'], function () {

        Route::get('danhsach', [BoMonController::class, 'getDanhSach']);

        Route::get('sua/{id}', [BoMonController::class, 'getSua']);
        Route::post('sua/{id}', [BoMonController::class, 'postSua']);

        Route::get('them', [BoMonController::class, 'getThem']);
        Route::post('them', [BoMonController::class, 'postThem']);

        Route::get('xoa/{id}', [BoMonController::class, 'getXoa']);
    });

    Route::group(['prefix' => 'donvihoptac'], function () {

        Route::get('danhsach', [DonViHopTacController::class, 'getDanhSach']);

        Route::get('sua/{id}', [DonViHopTacController::class, 'getSua']);
        Route::post('sua/{id}', [DonViHopTacController::class, 'postSua']);

        Route::get('them', [DonViHopTacController::class, 'getThem']);
        Route::post('them', [DonViHopTacController::class, 'postThem']);

        Route::get('xoa/{id}', [DonViHopTacController::class, 'getXoa']);
    });

    Route::group(['prefix' => 'thongtinnganh'], function () {

        Route::get('danhsach', [ThongTinNganhController::class, 'getDanhSach']);

        Route::get('sua/{id}', [ThongTinNganhController::class, 'getSua']);
        Route::post('sua/{id}', [ThongTinNganhController::class, 'postSua']);

        Route::get('them', [ThongTinNganhController::class, 'getThem']);
        Route::post('them', [ThongTinNganhController::class, 'postThem']);

        Route::get('xoa/{id}', [ThongTinNganhController::class, 'getXoa']);
    });

    Route::group(['prefix' => 'diemchuan'], function () {

        Route::get('danhsach', [DiemChuanController::class, 'getDanhSach']);

        Route::get('sua/{id}', [DiemChuanController::class, 'getSua']);
        Route::post('sua/{id}', [DiemChuanController::class, 'postSua']);

        Route::get('them', [DiemChuanController::class, 'getThem']);
        Route::post('them', [DiemChuanController::class, 'postThem']);

        Route::get('xoa/{id}', [DiemChuanController::class, 'getXoa']);
    });

    Route::group(['prefix' => 'khungchuongtrinhdaotao'], function () {

        Route::get('danhsach', [KhungChuongTrinhDaoTaoController::class, 'getDanhSach']);

        Route::get('sua/{id}', [KhungChuongTrinhDaoTaoController::class, 'getSua']);
        Route::post('sua/{id}', [KhungChuongTrinhDaoTaoController::class, 'postSua']);

        Route::get('them', [KhungChuongTrinhDaoTaoController::class, 'getThem']);
        Route::post('them', [KhungChuongTrinhDaoTaoController::class, 'postThem']);

        Route::get('xoa/{id}', [KhungChuongTrinhDaoTaoController::class, 'getXoa']);
    });

    Route::group(['prefix' => 'hinhanhkhoa'], function () {

        Route::get('danhsach', [HinhAnhKhoaController::class, 'getDanhSach']);

        Route::get('sua/{id}', [HinhAnhKhoaController::class, 'getSua']);
        Route::post('sua/{id}', [HinhAnhKhoaController::class, 'postSua']);

        Route::get('them', [HinhAnhKhoaController::class, 'getThem']);
        Route::post('them', [HinhAnhKhoaController::class, 'postThem']);

        Route::get('xoa/{id}', [HinhAnhKhoaController::class, 'getXoa']);
    });

    Route::group(['prefix' => 'hoidap'], function () {

        Route::get('danhsach', [HoiDapController::class, 'getDanhSach']);

        Route::get('sua/{id}', [HoiDapController::class, 'getSua']);
        Route::post('sua/{id}', [HoiDapController::class, 'postSua']);

        Route::get('them', [HoiDapController::class, 'getThem']);
        Route::post('them', [HoiDapController::class, 'postThem']);

        Route::get('xoa/{id}', [HoiDapController::class, 'getXoa']);
    });
});
