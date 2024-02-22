<?php

namespace App\Providers;

use SleepingOwl\Admin\Providers\AdminSectionsServiceProvider as ServiceProvider;

class AdminSectionsServiceProvider extends ServiceProvider
{

    /**
     * @var array
     */
    protected $sections = [
        //\App\User::class => 'App\Http\Sections\Users',
        \App\Models\rodzajeMa::class => '\App\Admin\Sections\RodzajeMa',
        \App\Models\rodzajeSp::class => '\App\Admin\Sections\RodzajeSp',
        \App\Models\sale::class => '\App\Admin\Sections\Sale',
        \App\Models\sprzet::class => '\App\Admin\Sections\Sprzet'
    ];

    /**
     * Register sections.
     *
     * @param \SleepingOwl\Admin\Admin $admin
     * @return void
     */
    public function boot(\SleepingOwl\Admin\Admin $admin)
    {
    	//

        parent::boot($admin);
    }
}
