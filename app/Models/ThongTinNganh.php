<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThongTinNganh extends Model
{
    use HasFactory;
    protected $table = "thongtinnganh";


    public $timestamps = false;

    protected $fillable = [
        'TrinhDoDaoTao',
        'HinhThucDaoTao',
        'ThoiGianDaoTao',
        'ThoiGianTuyenSinhNopHoSo',
        'ThoiGianXetTuyenVaNhapHoc',
        'HinhThucTuyenSinh',
        'ToHopMonXetTuyen',
        'DiemChuanCacNam',
        'ChiTieu',
        'HocPhi',
        'AnhGioiThieu',
        'idNganh',
    ];

    public function nganh() {
        return $this->belongsTo('App\Models\Nganh', 'idNganh', 'id');
    }
}
