<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubKategori extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategori_id',
        'SubKategori',
        'deskripsi',
        'status'
    ];

    public function Kategori(): BelongsTo{
        return $this->belongsTo(Kategori::class,'kategori_id');
    }

}
