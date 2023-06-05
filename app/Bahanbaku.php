<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bahanbaku extends Model
{
    public $timestamps = false;
    protected $table = 'tbl_bahan_baku';
    protected $primaryKey = 'id_bahanbaku';
    protected $fillable = [
        'gambar','nama_bahanbaku','qty'
    ];
}
