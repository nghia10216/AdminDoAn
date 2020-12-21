<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoMon extends Model
{
    use HasFactory;
    protected $table = "bomon";
    
    public $timestamps = false;

    protected $fillable = [
        'TenBoMon',
        'GioiThieuBoMon',
        'idKhoa',
    ];

    public function khoa() {
        return $this->belongsTo('App\Models\Khoa', 'idKhoa', 'id');
    }
    
}
