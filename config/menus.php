<?php
return [
    [
        'title' => 'Account',
        'name' => 'account',
        'route' => 'admin.account.index',
        'children' => [
            [
                'title' => 'List Account',
                'name' => 'index',
                'route' => 'admin.account.index',
            ],
            [
                'title' => 'Create Account',
                'name' => 'create',
                'route' => 'admin.account.add',
            ],
            [
                'title' => 'Edit User',
                'name' => 'edit',
            ]
        ],
    ],

    [
        'title' => 'Role',
        'name' => 'role',
        'route' => 'admin.role.index',
        'children' => [
            [
                'title' => 'List Role',
                'name' => 'index',
                'route' => 'admin.role.index',
            ],
            [
                'title' => 'Create Account',
                'name' => 'create',
                'route' => 'admin.account.add',
            ],
            [
                'title' => 'Edit User',
                'name' => 'edit',
            ]
        ],
    ],
];
