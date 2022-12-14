<?php
return [
    [
        'title' => 'Cày thuê',
        'name' => 'plow',
        'route' => 'admin.role.index',
        'children' => [
            [
                'title' => 'Tạo yêu cầu',
                'name' => 'create',
                'route' => 'user.plow.create',
            ],
            [
                'title' => 'Tiến trình của bạn',
                'name' => 'myOrder',
                'route' => 'user.plow.index',
            ],
            [
                'title' => 'Giá thành',
                'name' => 'price',
                'route' => 'user.plow.price',
            ]
        ],
    ],
    [
        'title' => 'Cộng tác',
        'name' => 'contact',
        'route' => 'admin.account.index',
        'children' => [
            [
                'title' => 'Nhân viên chuyên cần',
                'name' => 'index',
                'route' => 'admin.account.index',
            ],
            [
                'title' => 'Yêu cầu làm nhân viên',
                'name' => 'request',
                'route' => 'user.formRequestStaff',
            ],
        ],
    ],
    [
        'title' => 'Nạp tiền',
        'name' => 'payment',
        'route' => 'user.payment.create',
        'children' => [
            [
                'title' => 'Nạp tiền',
                'name' => 'create',
                'route' => 'user.payment.create',
            ]
        ],
    ],
    [
        'title' => 'Thông tin thêm',
        'name' => 'info',
        'route' => 'user.info.reset_rank',
        'children' => [
            [
                'title' => 'Bảng reset rank',
                'name' => 'reset',
                'route' => 'user.info.reset_rank',
            ]
        ],
    ],
];
