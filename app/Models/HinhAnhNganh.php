<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HinhAnhNganh extends Model
{
    use HasFactory;
    protected $table = "hinhanhnganh";

    public $timestamps = false;

    protected $fillable = [
        'TenAnh',
        'Link',
        'idNganh',
    ];

    public function nganh() {
        return $this->belongsTo('App\Models\Nganh', 'idNganh', 'id');
    }
}
