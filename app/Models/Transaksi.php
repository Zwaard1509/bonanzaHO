<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable=['id', 'tanggal', 'total_harga', 'metode_pembayaran', 'keterangan'];

    protected $table = 'transaksis';
    // protected $guarded = ['created_at', 'updated_at'];

    public function DetailTransaksi()
    {
        return $this->hasMany(DetailTransaksi::class);
    }

    public function Menu()
    {
        return $this->belongsToMany(Menu::class);
    }
}
