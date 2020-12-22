<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
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
        $abouts = About::all();

        $abouts = About::sortable()->latest('updated_at')->paginate(5);
        return view('admin.about.index', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.about.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'heading'        =>      ['required'],
            'intro'          =>      ['required',],
            'point1'         =>      ['required'],
            'point2'         =>      ['nullable'],
            'point3'         =>      ['nullable'],
            'end'            =>      ['required'],
        ]);

        About::create($request->all());

        return redirect()->route('about.index')
            ->with('success', 'About created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about)
    {
        return view('admin.about.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About $about)
    {
        $request->validate([
            'heading'        =>      ['required'],
            'intro'          =>      ['required',],
            'point1'         =>      ['required'],
            'point2'         =>      ['nullable'],
            'point3'         =>      ['nullable'],
            'end'            =>      ['required'],
        ]);

        $about->update($request->all());

        return redirect()->route('about.index')
        ->with('success', 'Values Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        $about->delete();

        return redirect()->route('about.index')
        ->with('success', $about->number.' deleted successfully');
    }

    public function trashIndex()
    {
        session()->forget('search');
       $abouts = About::onlyTrashed()->latest('updated_at')->paginate(5);
        return view('admin.about.trash-view', compact('abouts'));
    }

    public function trashRestore($id)
    {
        $about = About::onlyTrashed()->where('id', $id);
        $about->restore();

        return redirect()->route('about.index')
            ->with('success', 'restored successfully');
    }

    public function trashDestroy($id)
    {
        $about = About::onlyTrashed()->where('id', $id);
        $about->forceDelete();

        return redirect()->route('about.index')
            ->with('success', 'File permanently deleted');
    }
}
