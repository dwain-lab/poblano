<?php

namespace App\Http\Controllers;

use App\Models\Special;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SpecialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session()->forget('search');

        $specials = Special::all();

        $specials = Special::sortable()->latest('updated_at')->paginate(5);
        return view('admin.special.index', compact('specials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.special.create');
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
            'link'           =>      ['required'],
            'heading'        =>      ['required'],
            'intro'          =>      ['required'],
            'end'            =>      ['required'],
            'file'           =>      ['required','mimes:jpg,png','max:1048'],
        ]);

        $special = Special::create($request->all());

        if($special) {
            $special->addMedia($request->file('file'))
            ->toMediaCollection('specials-collection');
        }
       return redirect()->route('special.index')
            ->with('success', 'Special post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Special  $special
     * @return \Illuminate\Http\Response
     */
    public function show(Special $special)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Special  $special
     * @return \Illuminate\Http\Response
     */
    public function edit(Special $special)
    {
        return view('admin.special.edit', compact('special'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Special  $special
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Special $special)
    {

        $request->validate([
            'link'           =>      ['required'],
            'heading'        =>      ['required'],
            'intro'          =>      ['required'],
            'end'            =>      ['required'],
            'file'           =>      ['mimes:jpg,png','max:1048'],
        ]);

        if(null == ($request->file)) {
            $special->update($request->all());
        }
        else
        {
            $special->clearMediaCollection('specials-collection');
            $special->addMedia($request->file('file'))
                ->toMediaCollection('specials-collection');
            $special->update($request->all());
            $special->updated_at = now();
            $special->save();
        }

        return redirect()->route('special.index')
            ->with('success', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Special  $special
     * @return \Illuminate\Http\Response
     */
    public function destroy(Special $special)
    {
        $special->delete();

        return redirect()->route('special.index')
        ->with('success', $special->link.' deleted successfully');
    }


    public function trashIndex()
    {
        session()->forget('search');
       $specials = Special::sortable()->onlyTrashed()->latest('updated_at')->paginate(5);
        return view('admin.special.trash-view', compact('specials'));
    }

    public function trashRestore($id)
    {
        $special = Special::onlyTrashed()->where('id', $id);
        $special->restore();

        return redirect()->route('special.index')
            ->with('success', 'Restored successfully');
    }

    public function trashDestroy($id)
    {
        $special = Special::onlyTrashed()
            ->where('id', $id);

        $special->restore();

        $special = Special::findOrFail($id);

        if($special)
        {
            $special->forceDelete();
            return redirect()->route('event.index')
                ->with('success', $special->link.' post permanently deleted');
        }

        return Redirect::back()->with('errors', 'Error something went wrong.  Please try again.');
    }
}
