<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

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
        session()
            ->forget('search')
        ;

        $galleries = Gallery::all();

        $galleries = Gallery::sortable()
            ->latest('updated_at')
            ->paginate(5)
        ;

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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge([
            'name' => Str::lower($request->file('file')->getClientOriginalName()),
        ]);

        // dd($request->all());

        $request->validate([
            'name'         => ['unique:galleries,name'],
            'file'         => ['required', 'mimes:jpg', 'max:2048'],
        ]);

        $file  = Str::lower($request->file('file')->getClientOriginalName());
        $ext   = Str::lower($request->file('file')->getClientOriginalExtension());

        $gallery = Gallery::create(
            ['name' => $file],
        );

        if ($gallery)
        {
            $gallery->addMedia($request->file('file'))
                ->toMediaCollection('gallery-collection')
            ;

            return redirect()->route('gallery.index')
                ->with('success', $file.' created successfully.')
            ;
        }

        return back()->with('error', 'Unable to create entry. Please try again.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        return view('admin.gallery.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            // 'name'         => ['unique:galleries,name'],
            'file'         => ['mimes:jpg', 'max:2048', 'required'],
        ]);

        // if (null == ($request->file))
        // {
        //     if ($gallery->update($request->all()))
        //     {
        //         if ($gallery->wasChanged())
        //         {
        //             return redirect()->route('gallery.index')
        //                 ->with('success', $request->name.' Updated successfully')
        //             ;
        //         }

        //         return redirect()->route('gallery.index')
        //             ->with('warning', 'Nothing was updated!')
        //         ;
        //     }
        // }
        // else
        // {
        $fileName = Str::lower($gallery->getFirstMedia('gallery-collection')->name);
        // $file     = Str::lower($request->file('file')->getClientOriginalName());

        if ($this->checkFiles($request, ['jpg', 'jpeg'], $fileName))
        {
            return Redirect::back()->with('error', 'Error updating.  File already exist. Please fix file and upload.');
        }

        $gallery->clearMediaCollection('gallery-collection');
        $gallery->addMedia($request
            ->file('file'))
            ->toMediaCollection('gallery-collection')
            ;
        $gallery->updated_at = now();
        $gallery->save();

        return redirect()->route('gallery.index')
            ->with('success', $request->name.' Updated successfully')
            ;
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        $gallery->delete();

        return redirect()
            ->route('gallery.index')
            ->with('success', $gallery->name.' deleted successfully')
        ;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashIndex()
    {
        session()
            ->forget('search')
        ;

        $galleries = Gallery::onlyTrashed()->latest('updated_at')
            ->paginate(5)
        ;

        return view('admin.gallery.trash-view', compact('galleries'));
    }

    public function trashRestore($id)
    {
        $gallery = Gallery::onlyTrashed()->where('id', $id)
            ->firstOrFail()
        ;

        $gallery->restore();

        return redirect()->route('gallery.index')
            ->with('success', $gallery->name.' restored successfully')
        ;
    }

    public function trashDestroy($id)
    {
        $gallery = Gallery::onlyTrashed()->where('id', $id);

        $gallery->restore();

        $gallery = Gallery::findOrFail($id);

        if ($gallery)
        {
            $gallery->forceDelete();

            return redirect()->route('gallery.index')
                ->with('success', $gallery->name.' permanently deleted')
            ;
        }

        return Redirect::back()->with('error', 'Error deleting.  Please try again.');
    }

    private function checkFiles(Request $request, array $fileExt, string $fileName)
    {
        $fileNameExt = Str::lower($request->file->getClientOriginalName());

        foreach ($fileExt as $ext)
        {
            if (Str::lower($request->file->getClientOriginalExtension()) == $ext)
            {
                if (basename($fileNameExt, '.'.$ext) == $fileName)
                {
                    return 1;
                }

                return 0;
            }
        }

        return 0;
    }
}
