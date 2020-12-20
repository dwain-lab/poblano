<?php

namespace App\Providers;

use App\Models\About;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Menu;
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

    }
}
