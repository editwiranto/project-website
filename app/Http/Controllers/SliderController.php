<?php

namespace App\Http\Controllers;

use App\Models\slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $slider = slider::all();
        return view('promosi.slider', compact('slider'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('promosi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judulSlide' => 'required|string',
            'captionSlide' => 'required|string',
            'gambarSlide' => 'required|image|mimes:jpg,png,jpeg,gif,webp|max:2048'
        ]);


        try {
            if ($request->file('gambarSlide')) {
                $path = $request->file('gambarSlide')->store('images', 'public');
            }

            $slide = new slider();
            $slide->gambarSlide = $path;
            $slide->judulSlide = $request->judulSlide;
            $slide->captionSlide = $request->captionSlide;
            $slide->save();

            return redirect('/promosi/banner-slider')->with('success', 'Berhasil Tambah Data');
        } catch (\Exception $e) {
            return redirect('/promosi/banner-slider')->with('fail', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $slider = slider::find($id);
        return view('promosi.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, slider $slider, $id)
    {
        $slider = Slider::findOrFail($id);
        $request->validate([
            'judulSlide' => 'required|string',
            'captionSlide' => 'required|string',
            'gambarSlide' => 'nullable|image|mimes:jpg,png,jpeg,gif,webp|max:2048'
        ]);

        try {
            $path = null;
            if ($request->file('gambarSlide')) {
                if ($slider->gambarSlide) {
                    Storage::disk('public')->delete($slider->gambarSlide);
                }

                $path = $request->file('gambarSlide')->store('images', 'public');
            }


            $updateData = slider::where('id', $request->id)->update([
                'judulSlide' => $request->judulSlide,
                'captionSlide' => $request->captionSlide,
                'gambarSlide' => $path
            ]);

            return redirect('/promosi/banner-slider')->with('success', 'Berhasil Tambah Data');
        } catch (\Exception $e) {
            return redirect('/promosi/banner-slider')->with('fail', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            slider::find($id)->delete();

            return redirect('/promosi/banner-slider')->with('success', 'Berhasil Hapus Data');
        } catch (\Exception $e) {
            return redirect('/promosi/banner-slider')->with('fail', $e->getMessage());
        }
    }
}
