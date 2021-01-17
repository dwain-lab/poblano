<?php

namespace App\Http\Controllers;

use App\Models\Why;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class WhyController extends Controller
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
        session()
            ->forget('search')
        ;

        $whys = Why::all();

        $whys = Why::sortable()
            ->latest('updated_at')
            ->paginate(5)
        ;

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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'content'           => ['required'],
            'heading'           => ['required'],
        ]);

        $why = Why::create($request->all());

        return redirect()
            ->route('why.index')
            ->with('success', $why->heading.' created successfully.')
       ;
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Why $why)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Why $why)
    {
        return view('admin.why.edit', compact('why'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Why $why)
    {
        $request->validate([
            'content'           => ['required'],
            'heading'           => ['required'],
        ]);

        if ($why->update($request->all()))
        {
            if ($why->wasChanged())
            {
                return redirect()->route('why.index')
                    ->with('success', $request->heading.' updated successfully')
                ;
            }

            return redirect()->route('why.index')
                ->with('warning', 'Nothing was updated!')
                ;
        }

        return back()->with('error', 'Unable to update. Please try again.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Why $why)
    {
        $why->delete();

        return redirect()
            ->route('why.index')
            ->with('success', $why->heading.' deleted successfully')
        ;
    }

    public function trashIndex()
    {
        session()->forget('search');

        $whys = Why::sortable()->onlyTrashed()
            ->latest('updated_at')
            ->paginate(5)
        ;

        return view('admin.why.trash-view', compact('whys'));
    }

    public function trashRestore($id)
    {
        $why = Why::onlyTrashed()->where('id', $id)
            ->firstOrFail()
        ;

        $why->restore();

        return redirect()->route('why.index')
            ->with('success', $why->heading.' restored successfully')
        ;
    }

    public function trashDestroy($id)
    {
        $why = Why::onlyTrashed()->where('id', $id)
            ->firstOrFail()
        ;

        $why->forceDelete();

        return redirect()->route('why.index')
            ->with('success', $why->heading.' permanently deleted')
        ;
    }
}
