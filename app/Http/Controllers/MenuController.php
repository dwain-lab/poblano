<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\MenuCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

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
        // $menus = Menu::all();

        $menus = Menu::sortable()->has('menu_category')->latest('updated_at')->paginate(5);

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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'dish'                => ['required'],
            'cost'                => ['required', 'numeric'],
            'ingredients'         => ['required'],
            'menu_category_id'    => ['required'],
            'file'                => ['required', 'mimes:jpg', 'max:1024'],
        ];

        $customMessages = [
            'dish.required'                      => 'Dish name required',
            'cost.required'                      => 'Price required',
            'cost.numeric'                       => 'Price must be a number',
            'ingredients.required'               => 'Ingredients required',
            'menu_category_id.required'          => 'Category required',
            'file.required'                      => 'File required',
            'file.mimes'                         => 'File must be a file of type: jpg',
            'file.max'                           => 'File must be smaller than 1MB',
        ];

        $this->validate($request, $rules, $customMessages);

        // dd($request->menu_category_id);

        $menu = Menu::create($request->all());

        if ($menu)
        {
            $menu->addMedia($request->file('file'))
                ->toMediaCollection('menus-collection')
            ;
        }

        return redirect()->route('menu.index')
            ->with('success', 'Menu post created successfully.')
        ;
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $rules = [
            'dish'                => ['required'],
            'cost'                => ['required', 'numeric'],
            'ingredients'         => ['required'],
            'menu_category_id'    => ['required'],
            'file'                => ['mimes:jpg', 'max:1024'],
        ];

        $customMessages = [
            'dish.required'                      => 'Dish name required',
            'cost.required'                      => 'Price required',
            'cost.numeric'                       => 'Price must be a number',
            'ingredients.required'               => 'Ingredients required',
            'menu_category_id.required'          => 'Category required',
            'file.mimes'                         => 'File must be a file of type: jpg',
            'file.max'                           => 'File must be smaller than 1MB',
        ];

        $this->validate($request, $rules, $customMessages);

        if (null == ($request->file))
        {
            if ($menu->update($request->all()))
            {
                if ($menu->wasChanged())
                {
                    return redirect()->route('menu.index')
                        ->with('success', $request->dish.' updated successfully')
                    ;
                }

                return redirect()->route('menu.index')
                    ->with('warning', 'Nothing was updated!')
                ;
            }
        }
        else
        {
            if ($this->checkFiles($request, ['jpg', 'jpeg'], Str::lower($menu->getFirstMedia('menus-collection')->name)))
            {
                return Redirect::back()->with('error', 'Error updating.  File already exist. Please fix file and upload.');
            }
            $menu->clearMediaCollection('menus-collection');
            $menu->addMedia($request->file('file'))
                ->toMediaCollection('menus-collection')
            ;
            $menu->update($request->all());
            $menu->updated_at = now();
            $menu->save();
        }

        return redirect()->route('menu.index')
            ->with('success', 'Updated successfully')
        ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();

        return redirect()->route('menu.index')
            ->with('success', $menu->dish.' deleted successfully')
        ;
    }

    public function trashIndex()
    {
        session()->forget('search');
        $menus = Menu::sortable()->onlyTrashed()->latest('updated_at')->paginate(5);

        return view('admin.menu.trash-view', compact('menus'));
    }

    public function trashRestore($id)
    {
        $menu = Menu::onlyTrashed()->where('id', $id)
            ->firstOrFail()
        ;
        $menu->restore();

        return redirect()->route('menu.index')
            ->with('success', $menu->dish.' restored successfully')
        ;
    }

    public function trashDestroy($id)
    {
        $menu = Menu::onlyTrashed()->where('id', $id);

        $menu->restore();

        $menu = Menu::findOrFail($id);

        if ($menu)
        {
            $menu->forceDelete();

            return redirect()->route('menu.index')
                ->with('success', $menu->heading.' permanently deleted')
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
