<?php

namespace App\Http\Controllers;

use App\Models\MenuCategory;
use Illuminate\Http\Request;

class MenuCategoryController extends Controller
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
        $menu_categories = MenuCategory::all();

        $menu_categories = MenuCategory::sortable()->latest('updated_at')->paginate(5);
        return view('admin.menu_category.index', compact('menu_categories'));
    }

       /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.menu_category.create');
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
            'name'        =>      'required|unique:menu_categories,name',
            'slug'        =>      'required|unique:menu_categories,slug|alpha_dash',
        ]);

        MenuCategory::create($request->all());

        return redirect()->route('menu_category.index')
            ->with('success', 'Category created successfully.');
    }

    public function edit(MenuCategory $menu_category)
    {
        return view('admin.menu_category.edit', compact('menu_category'));
    }

        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MenuCategory $menu_category)
    {
        $request->validate([
            'name'        =>      'required',
            'slug'        =>      'required|alpha_dash',
        ]);

        $menu_category->update($request->all());

        return redirect()->route('menu_category.index')
        ->with('success', $menu_category->name.' Updated successfully');
    }

    public function destroy(MenuCategory $menu_category)
    {
        $menu_category->delete();

        return redirect()->route('menu_category.index')
        ->with('success', $menu_category->name.' deleted successfully');
    }

    public function trashIndex()
    {
        session()->forget('search');
       $menu_categories = MenuCategory::onlyTrashed()->latest('updated_at')->paginate(5);
        return view('admin.menu_category.trash-view', compact('menu_categories'));
    }

    public function trashRestore($id)
    {
        $menu_category = MenuCategory::onlyTrashed()->where('id', $id);
        $menu_category->restore();

        return redirect()->route('menu_category.index')
            ->with('success', 'restored successfully');
    }

    public function trashDestroy($id)
    {
        $menu_category = MenuCategory::onlyTrashed()->where('id', $id);
        $menu_category->forceDelete();

        return redirect()->route('menu_category.index')
            ->with('success', 'File permanently deleted');
    }

}

