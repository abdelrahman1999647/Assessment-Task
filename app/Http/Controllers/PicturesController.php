<?php

namespace App\Http\Controllers;

use App\Models\Pictures;
use Illuminate\Http\Request;

class PicturesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new Pictures();
        $data->album_id = $request->album_id;
        $data->picture_name = $request->get('picture_name');
        if ($request->file('picture')) {
            $file = $request->file('picture');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('public/Image/pictures'), $filename);
            $data['picture'] = $filename;
        }
        $data->save();
        session()->flash('Add', 'تم اضافة الصورة بنجاح');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Pictures $pictures)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pictures $pictures)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pictures $pictures)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pictures $pictures)
    {
        //
    }
}
