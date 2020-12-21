<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HinhAnhKhoa extends Model
{
    use HasFactory;
    protected $table = "hinhanhkhoa";

    public $timestamps = false;

    protected $fillable = [
        'TenAnh',
        'Link',
        'idKhoa',
    ];

    public function khoa() {
        return $this->belongsTo('App\Models\Khoa', 'idKhoa', 'id');
    }
}
