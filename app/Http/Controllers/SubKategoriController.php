<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\SubKategori;
use Illuminate\Http\Request;

class SubKategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subKategori = SubKategori::all();
        return view('produkmaster.subkategori.subKategori', compact('subKategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('produkmaster.subkategori.addSubKategori', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if (!$request->filled('deskripsi')) {
            $request->merge([
                'deskripsi' => '--',
            ]);
        }

        $request->validate([
            'kategori_id' => 'required|string',
            'SubKategori' => 'required|string',
            'deskripsi' => 'required|string',
            'status' => 'required|string'
        ]);



        try {
            $subKategori = new SubKategori();
            $subKategori->kategori_id = $request->kategori_id;
            $subKategori->SubKategori = $request->SubKategori;
            $subKategori->deskripsi = $request->deskripsi;
            $subKategori->status = $request->status;
            $subKategori->save();

            return redirect('subKategori')->with('success','Sukses Tambah Data');
        } catch (\Exception $e) {
            return redirect('subKategori')->with('fail',$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(SubKategori $subKategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kategori = Kategori::all();
        $subKategori = SubKategori::find($id);
        return view('produkmaster.subkategori.editSubKategori',compact('subKategori','kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubKategori $subKategori)
    {
        $request->validate([
            'kategori_id' => 'required|string',
            'SubKategori' => 'required|string',
            'deskripsi' => 'required|string',
            'status' => 'required|string'
        ]);

        try {
            SubKategori::where('id',$request->id_subkategori)->update([
                'kategori_id' => $request->kategori_id,
                'SubKategori' => $request->SubKategori,
                'deskripsi' => $request->deskripsi,
                'status' => $request->status,
            ]);

            return redirect('subKategori')->with('success', 'Sukses Edit Data');
        } catch (\Exception $e) {
            return redirect('subKategori')->with('fail', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            SubKategori::find($id)->delete();

            return redirect('subKategori')->with('success', 'Sukses Hapus Data');
        } catch (\Exception $e) {
            return redirect('subKategori')->with('fail', $e->getMessage());
        }
    }
}
