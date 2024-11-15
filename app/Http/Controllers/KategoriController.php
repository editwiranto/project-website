<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = Kategori::all();
        return view('produkmaster.kategori.kategori',compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produkmaster.kategori.addKategori');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'namaKategori' => 'required|string',
            'deskripsi' => 'required|string',
            'status' => 'required|string'
        ]);

        try {
            $kategori = new Kategori();
            $kategori->kategori = $request->namaKategori;
            $kategori->deskripsi = $request->deskripsi;
            $kategori->status = $request->status;
            $kategori->save();

            return redirect('/kategori')->with('success','Data Berhasil Ditambahkan');

        } catch (\Exception $e) {
            return redirect('/kategori')->with('fail', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kategori = Kategori::find($id);
        return view('produkmaster.kategori.editKategori', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'namaKategori' => 'required|string',
            'deskripsi' => 'required|string',
            'status' => 'required|string'
        ]);

        try {
            Kategori::where('id',$request->id_kategori)->update([
                'kategori' => $request->namaKategori,
                'deskripsi' => $request->deskripsi,
                'status' => $request->status
            ]);
            return redirect('/kategori')->with('success', 'Data Berhasil Diupdate');
        } catch (\Exception $e) {
            return redirect('/kategori')->with('fail', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            Kategori::where('id',$id)->delete();

            return redirect('/kategori')->with('success', 'Data Berhasil Dihapus');
        } catch (\Exception $e) {
            return redirect('/kategori')->with('fail', $e->getMessage());
        }
    }
}
