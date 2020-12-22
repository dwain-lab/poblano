<?php

use Illuminate\Support\Facades\Route;
use App\Models\Gallery;
use App\Models\Menu;
use App\Models\MenuCategory;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', 'App\Http\Controllers\HomeController@mainIndex')->name('home');


/*
|--------------------------------------------------------------------------
| Gallery Routes
|--------------------------------------------------------------------------
*/

Route::get('/admin/gallery/trash-view', 'App\Http\Controllers\GalleryController@trashIndex')->name('gallery.trashIndex');

Route::post('/admin/gallery/trash-restore/{gallery}', 'App\Http\Controllers\GalleryController@trashRestore')->name('gallery.trashRestore');

Route::post('/admin/gallery/trash-destroy/{gallery}', 'App\Http\Controllers\GalleryController@trashDestroy')->name('gallery.trashDestroy');

Route::resource('/admin/gallery', 'App\Http\Controllers\GalleryController')->except('show');


/*
|--------------------------------------------------------------------------
| About Routes
|--------------------------------------------------------------------------
*/

Route::resource('/admin/about', 'App\Http\Controllers\AboutController')->except('show');

Route::get('/admin/about/trash-view', 'App\Http\Controllers\AboutController@trashIndex')->name('about.trashIndex');

Route::post('/admin/about/trash-restore/{about}', 'App\Http\Controllers\AboutController@trashRestore')->name('about.trashRestore');

Route::post('/admin/about/trash-destroy/{about}', 'App\Http\Controllers\AboutController@trashDestroy')->name('about.trashDestroy');

/*
|--------------------------------------------------------------------------
| Event Routes
|--------------------------------------------------------------------------
*/

Route::resource('/admin/event', 'App\Http\Controllers\EventController')->except('show');

Route::get('/admin/event/trash-view', 'App\Http\Controllers\EventController@trashIndex')->name('event.trashIndex');

Route::post('/admin/event/trash-restore/{event}', 'App\Http\Controllers\EventController@trashRestore')->name('event.trashRestore');

Route::post('/admin/event/trash-destroy/{event}', 'App\Http\Controllers\EventController@trashDestroy')->name('event.trashDestroy');



/*
|--------------------------------------------------------------------------
| Contact Routes
|--------------------------------------------------------------------------
*/

// Route::get('/email', 'App\Http\Controllers\ContactController@mail');

Route::post('/contact-us', 'App\Http\Controllers\ContactController@contactUsStore')->name('contactUs.store');


/*
|--------------------------------------------------------------------------
| Booking Routes
|--------------------------------------------------------------------------
*/

Route::post('/booking', 'App\Http\Controllers\BookController@bookingStore')->name('booking.store');


/*
|--------------------------------------------------------------------------
| Menu Routes
|--------------------------------------------------------------------------
*/

Route::resource('/admin/menu', 'App\Http\Controllers\MenuController')->except('show');

Route::get('/admin/menu/trash-view', 'App\Http\Controllers\MenuController@trashIndex')->name('menu.trashIndex');

Route::post('/admin/menu/trash-restore/{menu}', 'App\Http\Controllers\MenuController@trashRestore')->name('menu.trashRestore');

Route::post('/admin/menu/trash-destroy/{menu}', 'App\Http\Controllers\MenuController@trashDestroy')->name('menu.trashDestroy');

/*
|--------------------------------------------------------------------------
| Special Routes
|--------------------------------------------------------------------------
*/

Route::resource('/admin/special', 'App\Http\Controllers\SpecialController')->except('show');

Route::get('/admin/special/trash-view', 'App\Http\Controllers\SpecialController@trashIndex')->name('special.trashIndex');

Route::post('/admin/special/trash-restore/{special}', 'App\Http\Controllers\SpecialController@trashRestore')->name('special.trashRestore');

Route::post('/admin/special/trash-destroy/{special}', 'App\Http\Controllers\SpecialController@trashDestroy')->name('special.trashDestroy');

/*
|--------------------------------------------------------------------------
| Why Us Routes
|--------------------------------------------------------------------------
*/

Route::resource('/admin/why', 'App\Http\Controllers\WhyController')->except('show');

Route::get('/admin/why/trash-view', 'App\Http\Controllers\WhyController@trashIndex')->name('why.trashIndex');

Route::post('/admin/why/trash-restore/{why}', 'App\Http\Controllers\WhyController@trashRestore')->name('why.trashRestore');

Route::post('/admin/why/trash-destroy/{why}', 'App\Http\Controllers\WhyController@trashDestroy')->name('why.trashDestroy');


/*
|--------------------------------------------------------------------------
| Menu Categories Us Routes
|--------------------------------------------------------------------------
*/

Route::resource('/admin/menu_category', 'App\Http\Controllers\MenuCategoryController')->except('show');

Route::get('/admin/menu_category/trash-view', 'App\Http\Controllers\MenuCategoryController@trashIndex')->name('menu_category.trashIndex');

Route::post('/admin/menu_category/trash-restore/{menu_category}', 'App\Http\Controllers\MenuCategoryController@trashRestore')->name('menu_category.trashRestore');

Route::post('/admin/menu_category/trash-destroy/{menu_category}', 'App\Http\Controllers\MenuCategoryController@trashDestroy')->name('menu_category.trashDestroy');



Auth::routes([

    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...

]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
















// Route::get('/media', function() {



//     // $file = public_path().'/img/gw2.jpg';
//     $file = public_path().'/img/guildwars2.jpg';
//     $gallery = Gallery::findOrFail(2);
//     $gallery->addMedia($file)
//     ->preservingOriginal()
//     ->toMediaCollection('gallery-collection');

// });

// Route::get('/get-media', function(){
//     $mediaItems = Gallery::findOrFail(1);
//     //dd($mediaItems);
//    ($mediaItems = $mediaItems->getMedia('gallery-collection'));
// //    dd($mediaItems);
// //    $count = count($mediaItems) -1 ;
// //    echo $count;
// //    foreach($mediaItems as $mediaItem => $value) {
// //        if($mediaItem == $count) {
// //            echo $mediaItems[$mediaItem]->getFullUrl(). "<br>";

// //        }
// //    }
//     // dd($mediaItems->getFirstMediaUrl('gallery-collection'));
//     return $publicUrl = $mediaItems[0]->getUrl();
//     // $publicFullUrl = $mediaItems[0]->getFullUrl();
//     // $fullPathOnDisk = $mediaItems[0]->getPath();
//     // echo "public Full URL: ".$publicFullUrl."<br>";
//     // echo "public URL: ".$publicUrl."<br>";
//     // echo "public full path on disk: ".$fullPathOnDisk."<br>";

//     //dd($mediaItems);


// });

// Route::get('/delete-media', function() {
//     $mediaItems = Gallery::findOrFail(8);
//     $mediaItems->clearMediaCollection('gallery-collection');
// });

// Route::get('/rela', function () {

//     // $menu = Menu::find(3);

//     // // dd($menu);

//     // return $menu->menu_category;

//     // dd($menu);

//     $categories = MenuCategory::find(2);

//      dd($categories->menus);


// });
