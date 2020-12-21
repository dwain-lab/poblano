<?php

namespace App\Providers;

use App\Models\About;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Menu;
use App\Models\MenuCategory;
use App\Models\Special;
use App\Models\Why;
use Illuminate\Support\ServiceProvider;
use Tabuna\Breadcrumbs\Breadcrumbs;
use Tabuna\Breadcrumbs\Trail;


class BreadcrumbsProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Breadcrumbs::for('event.index', fn (Trail $trail) =>
             $trail->push('Event', route('event.index'))
        );

        Breadcrumbs::for('event.create', fn (Trail $trail) =>
        $trail
            ->parent('event.index', route('event.index'))
            ->push('Add Event', route('event.create'))
        );

        Breadcrumbs::for('event.trashIndex', fn (Trail $trail) =>
        $trail
        ->parent('event.index', route('event.index'))
        ->push('Trash', route('event.trashIndex'))
        );

        Breadcrumbs::for('event.edit', fn (Trail $trail, Event $event) =>
        $trail
            ->parent('event.index', route('event.index'))
            ->push('Edit Event', route('event.edit',$event->id))
        );



        Breadcrumbs::for('gallery.index', fn (Trail $trail) =>
        $trail->push('Gallery', route('gallery.index'))
        );

        Breadcrumbs::for('gallery.create', fn (Trail $trail) =>
        $trail
            ->parent('gallery.index', route('gallery.index'))
            ->push('Add Gallery', route('gallery.create'))
        );

        Breadcrumbs::for('gallery.trashIndex', fn (Trail $trail) =>
        $trail
        ->parent('gallery.index', route('gallery.index'))
        ->push('Trash', route('gallery.trashIndex'))
        );

        Breadcrumbs::for('gallery.edit', fn (Trail $trail, Gallery $gallery) =>
        $trail
            ->parent('gallery.index', route('gallery.index'))
            ->push('Edit Gallery', route('gallery.edit',$gallery->id))
        );





        Breadcrumbs::for('about.index', fn (Trail $trail) =>
        $trail->push('About', route('about.index'))
        );

        Breadcrumbs::for('about.create', fn (Trail $trail) =>
        $trail
            ->parent('about.index', route('about.index'))
            ->push('Add About', route('about.create'))
        );

        Breadcrumbs::for('about.trashIndex', fn (Trail $trail) =>
        $trail
        ->parent('about.index', route('about.index'))
        ->push('Trash', route('about.trashIndex'))
        );

        Breadcrumbs::for('about.edit', fn (Trail $trail, About $about) =>
        $trail
            ->parent('about.index', route('about.index'))
            ->push('Edit About', route('about.edit',$about->id))
        );



        Breadcrumbs::for('menu.index', fn (Trail $trail) =>
        $trail->push('Menu', route('menu.index'))
        );

        Breadcrumbs::for('menu.create', fn (Trail $trail) =>
        $trail
            ->parent('menu.index', route('menu.index'))
            ->push('Add Menu', route('menu.create'))
        );

        Breadcrumbs::for('menu.trashIndex', fn (Trail $trail) =>
        $trail
        ->parent('menu.index', route('menu.index'))
        ->push('Trash', route('menu.trashIndex'))
        );

        Breadcrumbs::for('menu.edit', fn (Trail $trail, Menu $menu) =>
        $trail
            ->parent('menu.index', route('menu.index'))
            ->push('Edit Menu', route('menu.edit',$menu->id))
        );


        Breadcrumbs::for('special.index', fn (Trail $trail) =>
        $trail->push('Special', route('special.index'))
        );

        Breadcrumbs::for('special.create', fn (Trail $trail) =>
        $trail
            ->parent('special.index', route('special.index'))
            ->push('Add Special', route('special.create'))
        );

        Breadcrumbs::for('special.trashIndex', fn (Trail $trail) =>
        $trail
        ->parent('special.index', route('special.index'))
        ->push('Trash', route('special.trashIndex'))
        );

        Breadcrumbs::for('special.edit', fn (Trail $trail, Special $special) =>
        $trail
            ->parent('special.index', route('special.index'))
            ->push('Edit Special', route('special.edit',$special->id))
        );


        Breadcrumbs::for('why.index', fn (Trail $trail) =>
        $trail->push('Why', route('why.index'))
        );

        Breadcrumbs::for('why.create', fn (Trail $trail) =>
        $trail
            ->parent('why.index', route('why.index'))
            ->push('Add Why', route('why.create'))
        );

        Breadcrumbs::for('why.trashIndex', fn (Trail $trail) =>
        $trail
        ->parent('why.index', route('why.index'))
        ->push('Trash', route('why.trashIndex'))
        );

        Breadcrumbs::for('why.edit', fn (Trail $trail, Why $why) =>
        $trail
            ->parent('why.index', route('why.index'))
            ->push('Edit Why', route('why.edit',$why->id))
        );




        Breadcrumbs::for('menu_category.index', fn (Trail $trail) =>
        $trail->push('Menu_Category', route('menu_category.index'))
        );

        Breadcrumbs::for('menu_category.create', fn (Trail $trail) =>
        $trail
            ->parent('menu_category.index', route('menu_category.index'))
            ->push('Add Menu_Category', route('menu_category.create'))
        );

        Breadcrumbs::for('menu_category.trashIndex', fn (Trail $trail) =>
        $trail
        ->parent('menu_category.index', route('menu_category.index'))
        ->push('Trash', route('menu_category.trashIndex'))
        );

        Breadcrumbs::for('menu_category.edit', fn (Trail $trail, MenuCategory $menu_category) =>
        $trail
            ->parent('menu_category.index', route('menu_category.index'))
            ->push('Edit Menu_Category', route('menu_category.edit',$menu_category->id))
        );

    }
}
