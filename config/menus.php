<?php
return [
    [
        'title' => 'Tài khoản',
        'name' => 'account',
        'route' => 'admin.account.index',
        'children' => [
            [
                'title' => 'Danh sách',
                'name' => 'index',
                'route' => 'admin.account.index',
            ],
            [
                'title' => 'Thêm tài khoản',
                'name' => 'create',
                'route' => 'admin.account.add',
            ],
            [
                'title' => 'Sửa tài khoản',
                'name' => 'edit',
            ]
        ],
    ],

    [
        'title' => 'Phân quyền',
        'name' => 'role',
        'route' => 'admin.role.index',
        'children' => [
            [
                'title' => 'Danh sách quyền',
                'name' => 'index',
                'route' => 'admin.role.index',
            ],
            [
                'title' => 'Thêm quyền',
                'name' => 'create',
                'route' => 'admin.role.showcreate',
            ],
            [
                'title' => 'Sửa quyền',
                'name' => 'edit',
            ]
        ],
    ],

    [
        'title' => 'Nhân viên',
        'name' => 'staff',
        'route' => 'admin.role.index',
        'children' => [
            [
                'title' => 'Danh sách nhân viên',
                'name' => 'index',
                'route' => 'admin.role.index',
            ],
            [
                'title' => 'Thêm nhân viên',
                'name' => 'create',
                'route' => 'admin.role.showcreate',
            ],
            [
                'title' => 'Yêu cầu làm nhân viên',
                'name' => 'request',
                'route' => 'admin.account.requestStaff',
            ],
        ],
    ],
];
