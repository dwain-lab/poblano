<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use function GuzzleHttp\Promise\all;

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'heading'        =>      ['required'],
            'cost'           =>      ['required','numeric'],
            'intro'          =>      ['required'],
            'point1'         =>      ['required'],
            'point2'         =>      ['required'],
            'point3'         =>      ['required'],
            'end'            =>      ['required'],
            'file'           =>      ['required','mimes:jpg','max:2048'],
        ]);

        $event = Event::create($request->all());

        if($event) {
            $event->addMedia($request->file('file'))
            ->toMediaCollection('event-collection');
        }
       return redirect()->route('event.index')
            ->with('success', 'Event post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('admin.event.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
            $request->validate([
                'heading'        =>      ['required'],
                'cost'           =>      ['required','numeric'],
                'intro'          =>      ['required'],
                'point1'         =>      ['required'],
                'point2'         =>      ['required'],
                'point3'         =>      ['nullable'],
                'end'            =>      ['required'],
                'file'           =>      ['mimes:jpg','max:2048', 'nullable'],
            ]);

        if(null == ($request->file)) {
            $event->update($request->all());
        }
        else
        {
            $event->clearMediaCollection('event-collection');
            $event->addMedia($request->file('file'))
                ->toMediaCollection('event-collection');
            $event->update($request->all());
            // $event->name = $request->name;
            $event->updated_at = now();
            $event->save();
        }

        return redirect()->route('event.index')
            ->with('success', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('event.index')
        ->with('success', $event->number.' deleted successfully');
    }

    public function trashIndex()
    {
        session()->forget('search');
       $events = Event::sortable()->onlyTrashed()->latest('updated_at')->paginate(5);
        return view('admin.event.trash-view', compact('events'));
    }

    public function trashRestore($id)
    {
        $event = Event::onlyTrashed()->where('id', $id);
        $event->restore();

        return redirect()->route('event.index')
            ->with('success', 'restored successfully');
    }

    public function trashDestroy($id)
    {
        $event = Event::onlyTrashed()
        ->where('id', $id);

        $event->restore();

        $event = Event::findOrFail($id);

        if($event)
        {
            $event->forceDelete();
            return redirect()->route('event.index')
            ->with('success', 'File permanently deleted');
        }

        return Redirect::back()->with('errors', 'Error something went wrong.  Please try again.');
    }
}
