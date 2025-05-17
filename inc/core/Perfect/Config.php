<?php
return [
    'id' => 'perfect',
    'folder' => 'core',
    'name' => 'Perfect',
    'desc' => 'Customize system interface',
    'icon' => 'perfectmatch.svg',
    'color' => '#28abf5',
    'require' => true,
    'position' => 3000,
    'menu' => [
        'tab' => 1,
        'type' => 'top',
        'position' => 3000,
        'name' => 'Perfect',
        'permissions' => true,
        'sub_menu' => [
            [
                'id' => 'perfect',
                'name' => 'Perfects',
                'position' => 1000,
                'icon' => 'typcn typcn-shopping-cart',
                'color' => '#28abf5',
                'require' => true,
                'permissions' => true,
            ]
        ]
    ]
];