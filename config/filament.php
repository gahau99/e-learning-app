<?php

return [

    'default_path' => null,

    'dark_mode' => true,

    'colors' => [

        'primary' => [
            50 => '#eef2ff',
            100 => '#e0e7ff',
            200 => '#c7d2fe',
            300 => '#a5b4fc',
            400 => '#818cf8',
            500 => '#6366f1',
            600 => '#4f46e5',
            700 => '#4338ca',
            800 => '#3730a3',
            900 => '#312e81',
        ],

    ],

    'font' => 'Figtree',

    'favicon' => null,

    'auth' => [
        'guard' => null,
        'pages' => [
            'login' => \Filament\Http\Livewire\Auth\Login::class,
        ],
    ],

    'pages' => [
        'dashboard' => \App\Filament\Pages\Dashboard::class,
    ],

    'middleware' => [
        'auth' => [
            \Filament\Http\Middleware\Authenticate::class,
        ],
        'base' => [
            \Filament\Http\Middleware\DispatchServingFilamentEvent::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
            \Filament\Http\Middleware\EnableBladeIcons::class,
        ],
    ],

    'layout' => [
        'actions' => [
            'modal' => [
                'alignment' => 'center',
            ],
        ],
        'max_content_width' => null,
        'sidebar' => [
            'is_collapsible_on_desktop' => true,
        ],
    ],

];
