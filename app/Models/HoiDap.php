<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoiDap extends Model
{
    use HasFactory;

    protected $table = "hoidap";

    protected $fillable = [
        'CauHoi',
        'CauTraLoi',
        'idUser',
    ];

    public function user() {
        return $this->belongsTo('App\Models\User', 'idUser', 'id');
    }
}
