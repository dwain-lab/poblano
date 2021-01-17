<?php

namespace App\Http\Controllers;

use App\Models\Special;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class SpecialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'link'           => ['required'],
            'heading'        => ['required'],
            'intro'          => ['required'],
            'end'            => ['required'],
            'file'           => ['required', 'mimes:jpg,png', 'max:1048'],
        ]);

        $special = Special::create($request->all());

        if ($special)
        {
            $special->addMedia($request->file('file'))
                ->toMediaCollection('specials-collection')
            ;

            return redirect()->route('special.index')
                ->with('success', $request->link.' created successfully.')
            ;
        }

        return back()->with('error', 'Unable to create entry. Please try again.');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Special $special)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Special $special)
    {
        return view('admin.special.edit', compact('special'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Special $special)
    {
        $request->validate([
            'link'           => ['required'],
            'heading'        => ['required'],
            'intro'          => ['required'],
            'end'            => ['required'],
            'file'           => ['mimes:jpg,png', 'max:1048'],
        ]);

        if (null == ($request->file))
        {
            if ($special->update($request->all()))
            {
                if ($special->wasChanged())
                {
                    return redirect()->route('special.index')
                        ->with('success', $request->link.' updated successfully')
                    ;
                }

                return redirect()->route('special.index')
                    ->with('warning', 'Nothing was updated!')
                ;
            }
        }
        else
        {
            if ($this->checkFiles($request, ['jpg', 'png'], Str::lower($special->getFirstMedia('specials-collection')->name)))
            {
                return Redirect::back()->with('error', 'Error updating.  File already exist. Please fix file and upload.');
            }

            $special->clearMediaCollection('specials-collection');
            $special->addMedia($request->file('file'))
                ->toMediaCollection('specials-collection')
            ;
            $special->update($request->all());
            $special->updated_at = now();
            $special->save();

            return redirect()->route('special.index')
                ->with('success', $request->link.' updated successfully')
            ;
        }

        return back()->with('error', 'Unable to update. Please try again.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Special $special)
    {
        $special->delete();

        return redirect()->route('special.index')
            ->with('success', $special->link.' deleted successfully')
        ;
    }

    public function trashIndex()
    {
        session()->forget('search');
        $specials = Special::sortable()->onlyTrashed()->latest('updated_at')->paginate(5);

        return view('admin.special.trash-view', compact('specials'));
    }

    public function trashRestore($id)
    {
        $special = Special::onlyTrashed()->where('id', $id)
            ->firstOrFail()
        ;

        $special->restore();

        return redirect()->route('special.index')
            ->with('success', $special->link.' restored successfully')
        ;
    }

    public function trashDestroy($id)
    {
        $special = Special::onlyTrashed()->where('id', $id);

        $special->restore();

        $special = Special::findOrFail($id);

        if ($special)
        {
            $special->forceDelete();

            return redirect()->route('special.index')
                ->with('success', $special->link.' permanently deleted')
            ;
        }

        return Redirect::back()->with('error', 'Error deleting.  Please try again.');
    }

    private function checkFiles(Request $request, array $fileExt, string $fileName)
    {
        foreach ($fileExt as $ext)
        {
            if ($request->file->getClientOriginalExtension() == $ext)
            {
                if (Str::lower(basename($request->file->getClientOriginalName(), '.'.$ext)) == $fileName)
                {
                    return 1;
                }

                return 0;
            }
        }

        return 0;
    }
}
