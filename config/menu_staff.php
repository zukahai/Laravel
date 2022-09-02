<?php
return [
    [
        'title' => 'Nhân viên',
        'name' => 'role',
        'route' => 'admin.role.index',
        'children' => [
            [
                'title' => 'Công việc',
                'name' => 'index',
                'route' => 'admin.role.index',
            ],
            [
                'title' => 'Lịch sử làm việc',
                'name' => 'create',
                'route' => 'admin.role.showcreate',
            ],
            [
                'title' => 'Tiền lương',
                'name' => 'create',
                'route' => 'admin.role.showcreate',
            ],
        ],
    ],
    [
        'title' => 'Công việc',
        'name' => 'task',
        'route' => 'admin.account.index',
        'children' => [
            [
                'title' => 'Việc đề xuất',
                'name' => 'index',
                'route' => 'admin.account.index',
            ],
            [
                'title' => 'Mức giá',
                'name' => 'create',
                'route' => 'admin.account.add',
            ],
        ],
    ],
];
