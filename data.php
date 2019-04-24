<?php
// ставки пользователей, которыми надо заполнить таблицу
$bets = [
    ['name' => 'Иван', 'price' => 11500, 'ts' => strtotime('-' . rand(1, 50) .' minute')],
    ['name' => 'Константин', 'price' => 11000, 'ts' => strtotime('-' . rand(1, 18) .' hour')],
    ['name' => 'Евгений', 'price' => 10500, 'ts' => strtotime('-' . rand(25, 50) .' hour')],
    ['name' => 'Семён', 'price' => 10000, 'ts' => strtotime('last week')]
];

$is_auth = (bool) rand(0, 1);

$user_name = 'Константин';
$user_avatar = 'img/user.jpg';

$now_date = strtotime('now');
$midnight_date = strtotime('midnight');

$lot_time_remaining = gmdate("H:i:s", $midnight_date - $now_date);

$categories = ["Доски и лыжи","Крепления","Ботинки","Одежда","Инструменты","Разное"];

$announcements = [
    0 => [
        'title' => '2014 Rossignol District Snowboard',
        'category' => 'Доски и лыжи',
        'price' => '10999',
        'url' => 'img/lot-1.jpg'
    ],
    1 => [
        'title' => 'DC Ply Mens 2016/2017 Snowboard',
        'category' => 'Доски и лыжи',
        'price' => '159999',
        'url' => 'img/lot-2.jpg'
    ],
    2 => [
        'title' => 'Крепления Union Contact Pro 2015 года размер L/XL',
        'category' => 'Крепления',
        'price' => '8000',
        'url' => 'img/lot-3.jpg'
    ],
    3 => [
        'title' => 'Ботинки для сноуборда DC Mutiny Charocal',
        'category' => 'Ботинки',
        'price' => '10999',
        'url' => 'img/lot-4.jpg'
    ],
    4 => [
        'title' => 'Куртка для сноуборда DC Mutiny Charocal',
        'category' => 'Одежда',
        'price' => '7500',
        'url' => 'img/lot-5.jpg'
    ],
    5 => [
        'title' => 'Маска Oakley Canopy',
        'category' => 'Разное',
        'price' => '5400',
        'url' => 'img/lot-6.jpg'
    ]
];
