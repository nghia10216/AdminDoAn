<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiemChuan extends Model
{
    use HasFactory;
    protected $table = "diemchuan";

    public $timestamps = false;

    protected $fillable = [
        'ToHop',
        'DiemTrungTuyen',
        'DieuKienPhu',
        'idNganh'
    ];

    public function nganh() {
        return $this->belongsTo('App\Models\Nganh', 'idNganh', 'id');
    }
}
