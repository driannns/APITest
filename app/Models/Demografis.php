<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Demografis extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'nama',
        'tanggal_lahir',
        'jenis_kelamin',
        'kota',
        'agama',
        'pekerjaan',
        'pendapatan'
    ];

    // protected function kota(): Attribute
    // {

    // }
}
