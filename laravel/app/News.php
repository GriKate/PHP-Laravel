<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public static $news = [
        '1' => [
            'id' => 1,
            'category_id' => 1,
            'title' => 'Новость 1',
            'text' => 'Первая новость',
            'isPrivate' => true,
        ],
        '2' => [
            'id' => 2,
            'category_id' => 1,
            'title' => 'Новость 2',
            'text' => 'Вторая новость',
            'isPrivate' => false,
        ],
        '3' => [
            'id' => 3,
            'category_id' => 2,
            'title' => 'Новость 3',
            'text' => 'Третья новость',
            'isPrivate' => false,
        ],
        '4' => [
            'id' => 4,
            'category_id' => 2,
            'title' => 'Новость 4',
            'text' => 'Четвертая новость',
            'isPrivate' => false,
        ],
        '5' => [
            'id' => 5,
            'category_id' => 3,
            'title' => 'Новость 5',
            'text' => 'Пятая новость',
            'isPrivate' => false,
        ],
        '6' => [
            'id' => 6,
            'category_id' => 3,
            'title' => 'Новость 6',
            'text' => 'Шестая новость',
            'isPrivate' => false,
        ],
    ];

    public static $categories = [
        '1' => ['id' => 1,
            'category' => 'politics',
            'name' => 'Политика',
        ],
        '2' => ['id' => 2,
            'category' => 'culture',
            'name' => 'Культура',
        ],
        '3' => ['id' => 3,
            'category' => 'sport',
            'name' => 'Спорт',
        ],
    ];


}
