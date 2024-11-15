<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = [
        'namaproduk',
        'harga',
        'kategori_id',
        'SubKategori_id',
        'jumlahFoto',
        'tglUpdate',
        'status',
        'berat',
        'deskripsi'
    ];


    public function Kategori():BelongsTo
    {
        return $this->belongsTo(Kategori::class,'kategori_id');
    }

    public function SubKategori():BelongsTo
    {
        return $this->belongsTo(SubKategori::class,'SubKategori_id');
    }
}
