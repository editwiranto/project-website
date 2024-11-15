<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kategori extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategori',
        'deskripsi',
        'status'
    ];


    public function Produk():HasMany
    {
        return $this->hasMany(Produk::class);
    }

    public function SubKategori():HasMany
    {
        return $this->hasMany(Produk::class);
    }
}
