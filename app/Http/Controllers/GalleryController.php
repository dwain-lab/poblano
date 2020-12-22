<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {
       $this->middleware('auth');
    }

    public function index()
    {
        session()->forget('search');
        $galleries = Gallery::all();

        $galleries = Gallery::sortable()->latest('updated_at')->paginate(5);
        return view('admin.gallery.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gallery.create');
    }

    // public function show()
    // {
    //     return 1;
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name'         =>      ['required','unique:galleries,name'],
            'file'         =>      ['required','mimes:jpg','max:2048'],
        ]);

        $gallery = Gallery::create($request->all());

        if($gallery) {
            $gallery->addMedia($request->file('file'))
            ->usingName($request->name)
            ->usingFileName($request->name.".jpg")
            ->toMediaCollection('gallery-collection');
        }
       return redirect()->route('gallery.index')
            ->with('success', 'Gallery created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        return view('admin.gallery.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'name'         =>      ['required'],
            'file'         =>      ['mimes:jpg', 'max:2048', 'nullable'],
        ]);

        if(null == ($request->file)) {
            $gallery->name = $request->name;
            $gallery->save();
        }
        else
        {
            $gallery->clearMediaCollection('gallery-collection');
            $gallery->addMedia($request->file('file'))
                ->usingName($request->name)
                ->usingFileName($request->name.".jpg")
                ->toMediaCollection('gallery-collection');
            $gallery->name = $request->name;
            $gallery->updated_at = now();
            $gallery->save();
        }

        return redirect()->route('gallery.index')
            ->with('success', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        $gallery->delete();

        return redirect()->route('gallery.index')
        ->with('success', $gallery->number.' deleted successfully');
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashIndex()
    {
        session()->forget('search');
       $galleries = Gallery::onlyTrashed()->latest('updated_at')->paginate(5);
        return view('admin.gallery.trash-view', compact('galleries'));
    }

    public function trashRestore($id)
    {
        $gallery = Gallery::onlyTrashed()->where('id', $id);
        $gallery->restore();

        return redirect()->route('gallery.index')
            ->with('success', 'restored successfully');
    }

    public function trashDestroy($id)
    {
        $gallery = Gallery::onlyTrashed()->where('id', $id);
        $gallery->forceDelete();

        return redirect()->route('gallery.index')
            ->with('success', 'File permanently deleted');
    }
}
