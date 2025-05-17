<?php
return [
    'id' => 'settings',
    'folder' => 'core',
    'name' => 'Settings',
    'desc' => 'Customize system interface',
    'icon' => 'settings.svg',
    'color' => '#28abf5',
    'require' => true,
    'position' => 9000,
    'menu' => [
        'tab' => 1,
        'type' => 'top',
        'position' => 9000,
        'name' => 'Settings',
        'permissions' => true,
        'sub_menu' => [
            [
                'id' => 'roleandpermission',
                'name' => 'Role and Permission',
                'position' => 1000,
                'icon' => 'typcn typcn-shopping-cart',
                'color' => '#28abf5',
                'require' => true,
                'permissions' => true,
            ]
        ]
    ]
];