<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class EventController extends Controller
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
        $events = Event::all();

        $events = Event::sortable()->latest('updated_at')->paginate(5);

        return view('admin.event.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.event.create');
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
            'cost'           => ['required', 'numeric'],
            'intro'          => ['required'],
            'point1'         => ['required'],
            'point2'         => ['required'],
            'point3'         => ['required'],
            'end'            => ['required'],
            'file'           => ['required', 'mimes:jpg', 'max:2048'],
        ]);

        $event = Event::create($request->all());

        if ($event)
        {
            $event->addMedia($request->file('file'))
                ->toMediaCollection('event-collection')
            ;

            return redirect()->route('event.index')
                ->with('success', $request->heading.' created successfully.')
            ;
        }

        return back()->with('error', 'Unable to create entry. Please try again.');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('admin.event.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'heading'        => ['required'],
            'cost'           => ['required', 'numeric'],
            'intro'          => ['required'],
            'point1'         => ['required'],
            'point2'         => ['required'],
            'point3'         => ['required'],
            'end'            => ['required'],
            'file'           => ['mimes:jpg', 'max:2048', 'nullable'],
        ]);

        if (null == ($request->file))
        {
            if ($event->update($request->all()))
            {
                if ($event->wasChanged())
                {
                    return redirect()->route('event.index')
                        ->with('success', $request->heading.' Updated successfully')
                    ;
                }

                return redirect()->route('event.index')
                    ->with('warning', 'Nothing was updated!')
                ;
            }
        }
        else
        {
            if ($this->checkFiles($request, ['jpg', 'jpeg'], Str::lower($event->getFirstMedia('event-collection')->name)))
            {
                return Redirect::back()->with('error', 'Error updating.  File already exist. Please fix file and upload.');
            }
            $event->clearMediaCollection('event-collection');
            $event->addMedia($request->file('file'))
                ->toMediaCollection('event-collection')
            ;

            $event->updated_at = now();
            $event->save();

            return redirect()->route('event.index')
                ->with('success', $request->heading.' updated successfully')
            ;
        }

        return back()->with('error', 'Unable to update. Please try again.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('event.index')
            ->with('success', $event->heading.' deleted successfully')
        ;
    }

    public function trashIndex()
    {
        session()->forget('search');
        $events = Event::sortable()->onlyTrashed()->latest('updated_at')->paginate(5);

        return view('admin.event.trash-view', compact('events'));
    }

    public function trashRestore($id)
    {
        $event = Event::onlyTrashed()->where('id', $id)
            ->firstOrFail()
        ;

        $event->restore();

        return redirect()->route('event.index')
            ->with('success', $event->heading.' restored successfully')
        ;
    }

    public function trashDestroy($id)
    {
        $event = Event::onlyTrashed()->where('id', $id);

        $event->restore();

        $event = Event::findOrFail($id);

        if ($event)
        {
            $event->forceDelete();

            return redirect()->route('event.index')
                ->with('success', $event->heading.' permanently deleted')
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
