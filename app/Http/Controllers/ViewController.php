<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\slider;
use App\Models\Kategori;
use App\Models\SubKategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ViewController extends Controller
{
    public function index(Request $request)
    {


        $kategori = Kategori::all();
        $produk = Produk::all();
        $image = slider::select('gambarSlide')->get();
        // return view('webview.index', compact('image', 'kategori', 'produk'));


        $kategoriId = $request->input('kategori_id');
        $subKategoriId = $request->input('subKategori_id');
        $search = $request->input('search');

        // Query produk berdasarkan input
        $produk = Produk::when($kategoriId, function ($query) use ($kategoriId) {
            return $query->where('kategori_id', $kategoriId);
        })
            ->when($subKategoriId, function ($query) use ($subKategoriId) {
                return $query->where('subkategori_id', $subKategoriId);
            })
            ->when($search, function ($query) use ($search) {
                return $query->where('namaproduk', 'like', "%{$search}%");
            })
            ->paginate(5);

            $kategori = kategori::all();

        return view('webview.index', compact('kategori', 'produk', 'image'));
    }


}
