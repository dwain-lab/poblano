<?php

use Illuminate\Support\Facades\Route;
use App\Models\Gallery;
use Carbon\Carbon;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'App\Http\Controllers\HomeController@mainIndex')->name('home');


// Route::get('/admin/gallery', function () {
//     return view('admin.gallery.index');
// });

Route::get('/admin/gallery/trash-view', 'App\Http\Controllers\GalleryController@trashIndex')->name('gallery.trashIndex');

Route::post('/admin/gallery/trash-restore/{gallery}', 'App\Http\Controllers\GalleryController@trashRestore')->name('gallery.trashRestore');

Route::post('/admin/gallery/trash-destroy/{gallery}', 'App\Http\Controllers\GalleryController@trashDestroy')->name('gallery.trashDestroy');

Route::resource('/admin/gallery', 'App\Http\Controllers\GalleryController')->except('show');



































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



