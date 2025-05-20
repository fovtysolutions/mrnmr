<?php
return [
    'id' => 'matched',
    'folder' => 'core',
    'name' => 'Matched',
    'desc' => 'Customize system interface',
    'icon' => 'matchedp.svg',
    'color' => '#28abf5',
    'require' => true,
    'position' => 4000,
    'menu' => [
        'tab' => 1,
        'type' => 'top',
        'position' => 4000,
        'name' => 'Matched',
        'permissions' => true,
        'sub_menu' => [
            [
                'id' => 'matched',
                'name' => 'Matched',
                'position' => 1000,
                'icon' => 'typcn typcn-shopping-cart',
                'color' => '#28abf5',
                'require' => true,
                'permissions' => true,
            ]
        ]
    ]
];