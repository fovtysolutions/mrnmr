<?php
return [
    'id' => 'calendar',
    'folder' => 'core',
    'name' => 'Calendar',
    'desc' => 'Customize system interface',
    'icon' => 'calendar.svg',
    'color' => '#28abf5',
    'require' => true,
    'position' => 4000,
    'menu' => [
        'tab' => 1,
        'type' => 'top',
        'position' => 4000,
        'name' => 'Calendar',
        'permissions' => true,
        'sub_menu' => [
            [
                'id' => 'calendar',
                'name' => 'Calendar',
                'position' => 1000,
                'icon' => 'typcn typcn-shopping-cart',
                'color' => '#28abf5',
                'require' => true,
                'permissions' => true,
            ]
        ]
    ]
];