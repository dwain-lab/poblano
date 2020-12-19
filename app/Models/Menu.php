<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Menu extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, Sortable, InteractsWithMedia;

    /**
 * The attributes that are mass assignable.
 *
 * @var array
 */
protected $fillable = [
    'dish',
    'cost',
    'ingredients',
    'category',
];

public $sortable = [
    'dish',
    'cost',
];

/**
 * The attributes that should be hidden for arrays.
 *
 * @var array
 */
protected $hidden = [
    //
];

/**
 * The attributes that should be cast to native types.
 *
 * @var array
 */
protected $casts = [
    //
];

public function registerMediaCollections(): void
{
    $this->addMediaCollection('menus-collection');
}

public function registerMediaConversions(Media $media = null): void
{
    $this->addMediaConversion('thumb')
        ->width(300)
        ->height(180);

    $this->addMediaConversion('gallery')
        ->width(800)
        ->height(822);

}
}
