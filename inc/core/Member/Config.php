<?php
return [
    'id' => 'member',
    'folder' => 'core',
    'name' => 'Member',
    'desc' => 'Customize system interface',
    'icon' => 'members.svg',
    'color' => '#28abf5',
    'require' => true,
    'position' => 2000,
    'menu' => [
        'tab' => 1,
        'type' => 'top',
        'position' => 2000,
        'name' => 'Member',
        'permissions' => true,
        'sub_menu' => [
            [
                'id' => 'member',
                'name' => 'Members',
                'position' => 1000,
                'icon' => 'typcn typcn-shopping-cart',
                'color' => '#28abf5',
                'require' => true,
                'permissions' => true,
            ]
        ]
    ]
];