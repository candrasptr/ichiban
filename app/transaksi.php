<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    

    protected $table = 'tbl_transaksi';

    protected $primaryKey = 'id_transaksi';

    protected $fillable = [
        'order_detail_id','tanggal_transaksi','total_bayar','jumlah_pembayaran',
        ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'jumlah_pembayaran',    
    ];
}
