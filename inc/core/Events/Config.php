<?php
return [
    'id' => 'events',
    'folder' => 'core',
    'name' => 'Events',
    'desc' => 'Customize system interface',
    'icon' => 'event.svg',
    'color' => '#28abf5',
    'require' => true,
    'position' => 4000,
    'menu' => [
        'tab' => 1,
        'type' => 'top',
        'position' => 4000,
        'name' => 'Events',
        'permissions' => true,
        'sub_menu' => [
            [
                'id' => 'events',
                'name' => 'Events',
                'position' => 1000,
                'icon' => 'typcn typcn-shopping-cart',
                'color' => '#28abf5',
                'require' => true,
                'permissions' => true,
            ]
        ]
    ]
];