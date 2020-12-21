<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonViHopTac extends Model
{
    use HasFactory;
    protected $table = "hoptac";

    public $timestamps = false;

    protected $fillable = [
        'Link',
        'TenDonVi',
        'idKhoa',
    ];

    public function khoa() {
        return $this->belongsTo('App\Models\Khoa', 'idKhoa', 'id');
    }
}
