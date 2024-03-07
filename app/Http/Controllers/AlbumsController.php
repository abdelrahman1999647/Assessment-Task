<?php

namespace App\Http\Controllers;

use App\Models\Albums;
use Illuminate\Http\Request;

class AlbumsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $albums = Albums::all();
        return view("albums.index",compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new Albums();
        $data->album_name = $request->get('album_name');
        if ($request->file('picture')) {
            $file = $request->file('picture');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('public/Image/albums'), $filename);
            $data['picture'] = $filename;
        }
        $data->save();
        session()->flash('Add', 'تم اضافة الالبوم بنجاح ');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Albums $albums,$id)
    {
        $album = Albums::findOrFail($id);
        return view("albums.profile", compact("album", ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Albums $albums)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Albums $albums,$id)
    {
        $album = Albums::find($id);
        if ($request->file('picture')) {
            $file = $request->file('picture');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('public/Image/albums'), $filename);
//            $album['picture'] = $filename;
        }
        $album->update([
            'picture' => $filename,
            'album_name' => $request->album_name,
        ]);
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,Albums $albums)
    {
        $albums = Albums::findOrFail($request->id);
        $albums->delete();
        session()->flash('delete', 'تم الحذف  بنجاح');
        return back();
    }
}
