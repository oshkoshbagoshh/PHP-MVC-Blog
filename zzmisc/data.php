<?php
/*
 * @Author: AJ Javadi 
 * @Email: amirjavadi25@gmail.com
 * @Date: 2025-07-30 01:30:54 
 * @Last Modified by: Someone
 * @Last Modified time: 2025-07-30 01:54:43
 * @Description: file:///Users/aj/Herd/php-intermediate-blog/zzmisc/data.php
 */


$data = [
    'posts' => [
        [
            'id' => 1,
            'title' => 'First Post',
            'content' => 'This is the content of the first post.',
            'author' => 'Author One',
            'created_at' => '2025-07-30 01:00:00'
        ],
        [
            'id' => 2,
            'title' => 'Second Post',
            'content' => 'This is the content of the second post.',
            'author' => 'Author Two',
            'created_at' => '2025-07-30 02:00:00'
        ]
    ],
    'users' => [
        [
            'id' => 1,
            'username' => 'user_one',
            'email' => 'fake_email@fake.com',
            'created_at' => '2025-07-30 01:00:00'
        ],
    ],
    'comments' => [
        [
            'id' => 1,
            'post_id' => 1,
            'user_id' => 1,
            'content' => 'This is a comment on the first post.',
            'created_at' => '2025-07-30 01:05:00'
        ],
        [
            'id' => 2,
            'post_id' => 2,
            'user_id' => 1,
            'content' => 'This is a comment on the second post.',
            'created_at' => '2025-07-30 02:10:00'
        ]
    ],
    'categories' => [
        [
            'id' => 1,
            'name' => 'Category One',
            'description' => 'This is the first category.',
            'created_at' => '2025-07-30 01:00:00'
        ],
        [
            'id' => 2,
            'name' => 'Category Two',
            'description' => 'This is the second category.',
            'created_at' => '2025-07-30 02:00:00'
        ],
    ],
    'tags' => [
        [
            'id' => 1,
            'name' => 'Tag One',
            'created_at' => '2025-07-30 01:00:00'
        ],
        [
            'id' => 2,
            'name' => 'Tag Two',
            'created_at' => '2025-07-30 02:00:00'
        ],
    ],
    'settings' => [
        'site_name' => 'My Blog',
        'site_description' => 'A simple blog application.',
        'admin_email' => 'admin@example.com',
        'created_at' => '2025-07-30 01:00:00'
    ]
];

var_dump($data); // For debugging purposes, you can remove this line later.
$json_data = json_encode($data, JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
file_put_contents(__DIR__ . '/data.json', $json_data);

// Output the JSON data
header('Content-Type: application/json');
echo $json_data;
// End of data.php




