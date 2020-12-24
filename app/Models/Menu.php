<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Menu extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, Sortable, InteractsWithMedia, Loggable;

        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'dish',
        'cost',
        'ingredients',
        'menu_category_id',
    ];

    public $sortable = [
        'dish',
        'cost',
        'updated_at',
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
            ->width(200)
            ->height(200);

        $this->addMediaConversion('gallery')
            ->width(400)
            ->height(400);
    }

    public function menu_category()
    {
        return $this->belongsTo('App\Models\MenuCategory');
    }

    public function setDishAttribute($value)
    {
        $this->attributes['dish'] = ucwords($value);
    }


}
