<?php
return [
    [
        'title' => 'Cày thuê',
        'name' => 'role',
        'route' => 'admin.role.index',
        'children' => [
            [
                'title' => 'Tạo yêu cầu',
                'name' => 'index',
                'route' => 'admin.role.index',
            ],
            [
                'title' => 'Tiê trình của bạn',
                'name' => 'index',
                'route' => 'admin.role.index',
            ],
            [
                'title' => 'Giá thành',
                'name' => 'create',
                'route' => 'admin.role.showcreate',
            ]
        ],
    ],
    [
        'title' => 'Cộng tác',
        'name' => 'task',
        'route' => 'admin.account.index',
        'children' => [
            [
                'title' => 'Bảng xếp hạnh nhân viên',
                'name' => 'index',
                'route' => 'admin.account.index',
            ],
            [
                'title' => 'Yêu cầu làm nha viên',
                'name' => 'create',
                'route' => 'admin.account.add',
            ],
        ],
    ],
];
