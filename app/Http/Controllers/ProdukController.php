<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use App\Models\SubKategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = Kategori::all();
        $subKategori = SubKategori::all();
        $produk = Produk::all();
        return view('produkmaster.produk.produk', compact('produk', 'kategori', 'subKategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::all();
        $subKategori = SubKategori::all();
        $produk = count(Produk::all());
        $produk1 = Produk::all();
        return view('produkmaster.produk.addProduk', compact('kategori', 'subKategori','produk1'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->file('jumlahFoto.0')->getClientOriginalExtension(),$request->file('jumlahFoto.0')->getMimeType());

            $request->validate([
                'kategori_id' => 'required|string',
                'subKategori_id' => 'required|string',
                'harga' => 'required|string',
                'namaProduk' => 'required|string',
                'berat' => 'required|string',
                'deskripsi' => 'required|string',
                'jumlahFoto' => 'required|array',
                'jumlahFoto.*' => 'image|mimes:jpg,png,jpeg,gif,webp|max:5000',
                'status' => 'required|string'
            ]);


        // } catch (\Illuminate\Validation\ValidationException $e) {
        //     dd($e->errors());
        // }

        //Nama folder tempat menyimpan gambar
        $folderPath = public_path('images');

        // Membuat folder jika belum ada
        if (!File::exists($folderPath)) {
            File::makeDirectory($folderPath, 0755, true); // 0755 adalah permission
        }

        $gambar = [];
        if ($files = $request->file('jumlahFoto')) {
            foreach ($files as $file) {
                $originalName = $file->getClientOriginalName();
                //menyimpan file dan menyimpan path ke dalam array
                $gambar[] = $file->storeAs('images', $originalName, 'public');
            }
        }

        try {
            $produk = new Produk();
            $produk->kategori_id = $request->kategori_id;
            $produk->subKategori_id = $request->subKategori_id;
            $produk->harga = $request->harga;
            $produk->namaproduk = $request->namaProduk;
            $produk->berat = $request->berat;
            $produk->deskripsi = $request->deskripsi;
            $produk->jumlahFoto = implode('|', $gambar);
            $produk->status = $request->status;
            $produk->save();

            return redirect('/produk')->with('success', 'Data Berhasil Di Upload');
        } catch (\Exception $e) {
            return redirect('/produk')->with('fail', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kategori = Kategori::all();
        $subKategori = SubKategori::all();
        $editProduk = Produk::find($id);
        return view('produkmaster.produk.editProduk', compact('editProduk', 'kategori', 'subKategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $produk)
    {
        // Cek isi request
        $request->validate([
            'kategori_id' => 'required|string',
            'subKategori_id' => 'required|string',
            'harga' => 'required|string',
            'namaProduk' => 'required|string',
            'berat' => 'required|string',
            'deskripsi' => 'required|string',
            'jumlahFoto' => 'nullable|array',
            'jumlahFoto.*' => 'image|mimes:jpg,png,gif,jpeg|max:2048',
            'status' => 'required|string'
        ]);

        try {
            Produk::where('id', $request->produk_id)->update([
                'kategori_id' => $request->kategori_id,
                'subKategori_id' => $request->subKategori_id,
                'harga' => $request->harga,
                'namaproduk' => $request->namaProduk,
                'berat' => $request->berat,
                'deskripsi' => $request->deskripsi,
                'status' => $request->status,
            ]);


            if ($files = $request->file('jumlahFoto')) {
                $gambar = [];

                //hapus gambar lama jika ada
                if ($produk->jumlahFoto) {
                    $oldImages = explode('|', $produk->jumlahFoto);
                    foreach ($oldImages as $oldImage) {
                        Storage::disk('public')->delete($oldImage);
                    }
                }


                foreach ($files as $file) {
                    $originalName = $file->getClientOriginalName();
                    //simpan gambar baru
                    $gambar[] = $file->storeAs('images', $originalName, 'public');
                }
                $produk->jumlahFoto = implode('|', $gambar);
            }
            dd($produk);
            $produk->save();



            return redirect('/produk')->with('success', 'Data Berhasil Di Update');
        } catch (\Exception $e) {
            return redirect('/produk')->with('fail', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            Produk::find($id)->delete();
            return redirect('/produk')->with('success', 'Data Berhasil Di Hapus');
        } catch (\Exception $e) {
            return redirect('/produk')->with('fail', $e->getMessage());
        }
    }

    public function getSubkategori($kategoriId)
    {
        $subkategori = Subkategori::where('kategori_id', $kategoriId)->get();
        return response()->json($subkategori);
    }
}
