<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\MenuCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class MenuController extends Controller
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
        $menus = Menu::all();

        $menus = Menu::sortable()->latest('updated_at')->paginate(5);
        return view('admin.menu.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = MenuCategory::all()->sortBy('name', SORT_NATURAL | SORT_FLAG_CASE)->pluck('name', 'id');

        return view('admin.menu.create', compact('categories'));
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
            'dish'        =>      ['required'],
            'cost'        =>      ['required','numeric'],
            'ingredients' =>      ['required'],
            'menu_category_id'    =>      ['required'],
            'file'        =>      ['required','mimes:jpg','max:1024'],
        ]);

        // dd($request->menu_category_id);

        $menu = Menu::create($request->all());


        if($menu) {
            $menu->addMedia($request->file('file'))
            ->toMediaCollection('menus-collection');
        }
       return redirect()->route('menu.index')
            ->with('success', 'Menu post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        $categories = MenuCategory::all()->sortBy('name', SORT_NATURAL | SORT_FLAG_CASE)->pluck('name', 'id');

        return view('admin.menu.edit', compact('menu', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'dish'        =>      ['required'],
            'cost'        =>      ['required','numeric'],
            'ingredients' =>      ['required'],
            'menu_category_id'    =>      ['required'],
            'file'        =>      ['mimes:jpg','max:1024'],
        ]);

    if(null == ($request->file)) {
        $menu->update($request->all());
    }
    else
    {
        $menu->clearMediaCollection('menus-collection');
        $menu->addMedia($request->file('file'))
            ->toMediaCollection('menus-collection');
        $menu->update($request->all());
        $menu->updated_at = now();
        $menu->save();
    }

    return redirect()->route('menu.index')
        ->with('success', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();

        return redirect()->route('menu.index')
        ->with('success', $menu->number.' deleted successfully');
    }

    public function trashIndex()
    {
        session()->forget('search');
       $menus = Menu::sortable()->onlyTrashed()->latest('updated_at')->paginate(5);
        return view('admin.menu.trash-view', compact('menus'));
    }

    public function trashRestore($id)
    {
        $menu = Menu::onlyTrashed()->where('id', $id);
        $menu->restore();

        return redirect()->route('menu.index')
            ->with('success', 'restored successfully');
    }

    public function trashDestroy($id)
    {
        $menu = Menu::onlyTrashed()
        ->where('id', $id);

        $menu->restore();

        $menu = Menu::findOrFail($id);

        if($menu)
        {
            $menu->forceDelete();
            return redirect()->route('menu.index')
            ->with('success', 'File permanently deleted');
        }

        return Redirect::back()->with('errors', 'Error something went wrong.  Please try again.');
    }
}
