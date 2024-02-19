<?php

use SleepingOwl\Admin\Navigation\Page;

// Default check access logic
// AdminNavigation::setAccessLogic(function(Page $page) {
// 	   return auth()->user()->isSuperAdmin();
// });
//
// AdminNavigation::addPage(\App\User::class)->setTitle('test')->setPages(function(Page $page) {
// 	  $page
//		  ->addPage()
//	  	  ->setTitle('Dashboard')
//		  ->setUrl(route('admin.dashboard'))
//		  ->setPriority(100);
//
//	  $page->addPage(\App\User::class);
// });
//
// // or
//
// AdminSection::addMenuPage(\App\User::class)

return [
    [
        'title' => 'Dashboard',
        'icon'  => 'fas fa-tachometer-alt',
        'priority' => 1,
        'url'   => route('admin.dashboard'),
    ],

    [
        'title' => 'Information',
        'priority' => 2,
        'icon'  => 'fas fa-info-circle',
        'url'   => route('admin.information'),
    ],
    (new Page(\App\Models\rodzajeMa::class))
               ->setPriority(100)
               ->setIcon('fas fa-cogs')
               ->setTitle("Rodzaje Materiałów")
               //->setUrl('users')
            //    ->setAccessLogic(function (Page $page) {
            //        return auth()->user()->isSuperAdmin();
            //    })
               ,
    (new Page(\App\Models\rodzajeSp::class))
               ->setPriority(100)
               ->setIcon('fas fa-sitemap')
               ->setTitle("Rodzaje Sprzętu")
               //->setUrl('users')
            //    ->setAccessLogic(function (Page $page) {
            //        return auth()->user()->isSuperAdmin();
            //    })
               ,


    // Examples
    // [
    //    'title' => 'Content',
    //    'pages' => [
    //
    //        \App\User::class,
    //
    //        // or
    //
    //        (new Page(\App\User::class))
    //            ->setPriority(100)
    //            ->setIcon('fas fa-users')
    //            ->setUrl('users')
    //            ->setAccessLogic(function (Page $page) {
    //                return auth()->user()->isSuperAdmin();
    //            }),
    //
    //        // or
    //
    //        new Page([
    //            'title'    => 'News',
    //            'priority' => 200,
    //            'model'    => \App\News::class
    //        ]),
    //
    //        // or
    //        (new Page(/* ... */))->setPages(function (Page $page) {
    //            $page->addPage([
    //                'title'    => 'Blog',
    //                'priority' => 100,
    //                'model'    => \App\Blog::class
	//		      ));
    //
	//		      $page->addPage(\App\Blog::class);
    //	      }),
    //
    //        // or
    //
    //        [
    //            'title'       => 'News',
    //            'priority'    => 300,
    //            'accessLogic' => function ($page) {
    //                return $page->isActive();
    //		      },
    //            'pages'       => [
    //
    //                // ...
    //
    //            ]
    //        ]
    //    ]
    // ]
];
