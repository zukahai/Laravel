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
                'title' => 'Yêu cầu làm nhân viên',
                'name' => 'request',
                'route' => 'admin.account.requestStaff',
            ],
        ],
    ],

    [
        'title' => 'Hạng game',
        'name' => 'rank',
        'route' => 'admin.rank.index',
        'children' => [
            [
                'title' => 'Danh sách hạng',
                'name' => 'index',
                'route' => 'admin.rank.index',
            ],
            [
                'title' => 'Danh sách chi tiết hạng',
                'name' => 'subrank',
                'route' => 'admin.subrank.index',
            ],
            [
                'title' => 'Thêm hạng',
                'name' => 'create',
                'route' => 'admin.rank.create',
            ],
            [
                'title' => 'Thêm chi tiết hạng',
                'name' => 'createsubrank',
                'route' => 'admin.subrank.create',
            ],
        ],
    ],
];
