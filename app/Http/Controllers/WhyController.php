<?php

namespace App\Http\Controllers;

use App\Models\Why;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class WhyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session()->forget('search');

        $whys = Why::all();

        $whys = Why::sortable()->latest('updated_at')->paginate(5);
        return view('admin.why.index', compact('whys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.why.create');
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
            'content'           =>      ['required'],
            'heading'        =>      ['required'],
        ]);

        $why = Why::create($request->all());

       return redirect()->route('why.index')
            ->with('success', 'Why post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Why  $why
     * @return \Illuminate\Http\Response
     */
    public function show(Why $why)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Why  $why
     * @return \Illuminate\Http\Response
     */
    public function edit(Why $why)
    {
        return view('admin.why.edit', compact('why'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Why  $why
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Why $why)
    {
        $request->validate([
            'content'           =>      ['required'],
            'heading'        =>      ['required'],
        ]);

        $why->update($request->all());

        return redirect()->route('why.index')
            ->with('success', $why->heading.' Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Why  $why
     * @return \Illuminate\Http\Response
     */
    public function destroy(Why $why)
    {
        $why->delete();

        return redirect()->route('why.index')
            ->with('success', $why->heading.' deleted successfully');
    }

    public function trashIndex()
    {
        session()->forget('search');
       $whys = Why::sortable()->onlyTrashed()->latest('updated_at')->paginate(5);
        return view('admin.why.trash-view', compact('whys'));
    }

    public function trashRestore($id)
    {
        $why = Why::onlyTrashed()->where('id', $id);
        $why->restore();

        return redirect()->route('why.index')
            ->with('success', 'Restored successfully');
    }

    public function trashDestroy($id)
    {
        $why = Why::onlyTrashed()->where('id', $id);
        $why->forceDelete();

        return redirect()->route('why.index')
            ->with('success', 'Why post permanently deleted');
    }
}
