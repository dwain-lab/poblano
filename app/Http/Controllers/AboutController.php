<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use InvalidArgumentException;
use RuntimeException;
use Symfony\Component\Routing\Exception\RouteNotFoundException;

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
        session()
            ->forget('search')
        ;

        $abouts = About::sortable()
            ->latest('updated_at')
            ->paginate(5)
        ;

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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'heading'        => ['required'],
            'intro'          => ['required'],
            'point1'         => ['required'],
            'point2'         => ['nullable'],
            'point3'         => ['nullable'],
            'end'            => ['required'],
        ]);

        About::create($request->all());

        return redirect()->route('about.index')
            ->with('success', $request->heading.' created successfully.')
        ;
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about)
    {
        return view('admin.about.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About $about)
    {
        $request->validate([
            'heading'        => ['required'],
            'intro'          => ['required'],
            'point1'         => ['required'],
            'point2'         => ['nullable'],
            'point3'         => ['nullable'],
            'end'            => ['required'],
        ]);

        if ($about->update($request->all()))
        {
            if ($about->wasChanged())
            {
                return redirect()
                    ->route('about.index')
                    ->with('success', $request->heading.' updated successfully')
                ;
            }

            return redirect()->route('about.index')
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
    public function destroy(About $about)
    {
        $about->delete();

        return redirect()->route('about.index')
            ->with('success', $about->heading.' deleted successfully')
        ;
    }

    /**
     * @throws BindingResolutionException
     * @throws InvalidArgumentException
     * @throws RuntimeException
     *
     * @return Factory|View
     */
    public function trashIndex()
    {
        session()->forget('search');

        $abouts = About::onlyTrashed()->latest('updated_at')
            ->paginate(5)
        ;

        return view('admin.about.trash-view', compact('abouts'));
    }

    /**
     * @param mixed $id
     *
     * @throws InvalidArgumentException
     * @throws ModelNotFoundException
     * @throws BindingResolutionException
     * @throws RouteNotFoundException
     *
     * @return RedirectResponse
     */
    public function trashRestore($id)
    {
        $about = About::onlyTrashed()->where('id', $id)
            ->firstOrFail()
        ;

        $about->restore();

        return redirect()->route('about.index')
            ->with('success', $about->heading.' restored successfully')
        ;
    }

    /**
     * @param mixed $id
     *
     * @throws InvalidArgumentException
     * @throws ModelNotFoundException
     * @throws BindingResolutionException
     * @throws RouteNotFoundException
     *
     * @return RedirectResponse
     */
    public function trashDestroy($id)
    {
        $about = About::onlyTrashed()->where('id', $id)
            ->firstOrFail()
        ;

        $about->forceDelete();

        return redirect()->route('about.index')
            ->with('success', $about->heading.' permanently deleted')
        ;
    }
}
