<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Khoa extends Model
{
    use HasFactory;
    protected $table = "khoa";
    public $timestamps = false;

    protected $fillable = [
        'TenKhoa',
        'LogoKhoa',
        'SDT',
        'Email',
        'GioiThieuKhoa',
    ];
    public function nganh() {
        return $this->hasMany('App\Models\Nganh', 'idKhoa', 'id');
    }

    public function hinhanhkhoa() {
        return $this->hasMany('App\Models\HinhAnhKhoa', 'idKhoa', 'id');
    }
    public function bomon() {
        return $this->hasMany('App\Models\BoMon', 'idKhoa', 'id');
    }

    public function donvihoptac() {
        return $this->hasMany('App\Models\DonViHopTac', 'idKhoa', 'id');
    }
    public function hinhanhnganh() {
        return $this->hasManyThrough('App\Models\HinhAnhNganh', 'App\Models\Nganh', 'idKhoa', 'idNganh', 'id');
    }
}
