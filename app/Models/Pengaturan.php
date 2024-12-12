<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaturan extends Model
{
    use HasFactory;

    protected $fillable = [
        'kunci', 'nilai', 'deskripsi',
    ];

    protected $primaryKey = 'kunci';
    public $incrementing = false;
}
