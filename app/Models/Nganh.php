<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nganh extends Model
{
    use HasFactory;
    protected $table = "nganh";

    public $timestamps = false;

    protected $fillable = [
        'MaNganh',
        'TenNganh',
        'BangTotNghiep',
        'CongViecVaNoiLamViec',
        'GioiThieuNganh',
        'KhungChuongTrinhDaoTao',
        'idKhoa',
    ];

    public function khoa() {
        return $this->belongsTo('App\Models\Khoa', 'idKhoa', 'id');
    }

    public function bomon() {
        return $this->hasMany('App\Models\BoMon', 'idNganh', 'id');
    }

    public function hinhanhnganh() {
        return $this->hasMany('App\Models\HinhAnhNganh', 'idNganh', 'id');
    }

    public function thongtinnganh() {
        return $this->hasOne('App\Models\ThongTinNganh', 'idNganh', 'id');
    }

    public function diemchuan() {
        return $this->hasOne('App\Models\DiemChuan', 'idNganh', 'id');
    }
    public function khungchuongtrinhdaotao() {
        return $this->hasOne('App\Models\KhungChuongTrinhDaoTao', 'idNganh', 'id');
    }

}
