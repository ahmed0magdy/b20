<?php
// 2 level  
// $user = [
//     'id'=>1,
//     'name'=>'mohamed',
//     'activities'=>[
//         'gym','reading'
//     ],
//     'orders'=>['150','180',500]
// ];

// echo $user['orders'][1];

# 3 level
$users = [
    [
        'id' => 1,
        'name' => 'mohamed',
        'activities' => [
            'gym', 'reading'
        ],
        'orders' => ['150', '180']
    ],
    [
        'id' => 2,
        'name' => 'ahmed',
        'activities' => [
            'first'=>'gym'
        ],
        'orders' => ['100']
    ]
];

// echo "{$users[0]['name']}'s activities : {$users[0]['activities'][0]}, {$users[0]['activities'][1]} and
// his order prices : {$users[0]['orders'][0]},{$users[0]['orders'][1]}";

echo "{$users[1]['name']}'s activities: {$users[1]['activities']['first']} , and his order prices : 
{$users[1]['orders'][0]}";