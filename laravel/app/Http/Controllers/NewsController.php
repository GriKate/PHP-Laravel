<?php


namespace App\Http\Controllers;


class NewsController extends Controller
{
    private $news = [
        [
            'id' => 1,
            'category' => 'politics',
            'title' => 'Новость 1',
            'text' => 'Первая новость',
        ],
        [
            'id' => 2,
            'category' => 'politics',
            'title' => 'Новость 2',
            'text' => 'Вторая новость',
        ],
        [
            'id' => 3,
            'category' => 'culture',
            'title' => 'Новость 3',
            'text' => 'Третья новость',
        ],
        [
            'id' => 4,
            'category' => 'culture',
            'title' => 'Новость 4',
            'text' => 'Четвёртая новость',
        ],
        [
            'id' => 5,
            'category' => 'sport',
            'title' => 'Новость 5',
            'text' => 'Пятая новость',
        ],
        [
            'id' => 6,
            'category' => 'sport',
            'title' => 'Новость 6',
            'text' => 'Шестая новость',
        ],
    ];

    private $categories = [
        'politics' => 'Политика',
        'culture' => 'Культура',
        'sport' => 'Спорт'
    ];

    public function news() {
         $html = <<<php
        <a href="/" style="margin: 4px; text-decoration: none;">Главная</a>
        <a href="/news/" style="margin: 4px; text-decoration: none;">Новости</a>
        <br><br>
        <h1><a href="/news/" style="text-decoration: none;">Новости</a></h1>
        <a href="/news/category/" style="margin: 4px; text-decoration: none;">Категории новостей</a>
        <br><br>
php;
         $newsList = $this->getNewsList();
         $html .= $newsList;
         return $html;
    }

    public function newsOne($id) {
        $html = <<<php
        <a href="/" style="margin: 4px; text-decoration: none;">Главная</a>
        <a href="/news/" style="margin: 4px; text-decoration: none;">Новости</a>
        <br><br>
        <h1><a href="/news/" style="text-decoration: none;">Новости</a></h1>
        <a href="/news/category/" style="margin: 4px; text-decoration: none;">Категории новостей</a>
        <br><br>
php;
        $news = $this->getNewsId($id);
        if (!empty($news)) {
            $html .= <<<php
                <h2>{$news['title']}</h2>
                <p>{$news['text']}</p>
php;
            return $html;
        }
        return redirect(route('news'));
    }

    public function newsCategory() {
        return <<<php
        <a href="/" style="margin: 4px; text-decoration: none;">Главная</a>
        <a href="/news/" style="margin: 4px; text-decoration: none;">Новости</a>
        <br><br>
        <h1><a href="/news/" style="text-decoration: none;">Новости</a> > <a href="/news/category/" style="text-decoration: none;">Категории новостей</a></h1>
        <a href="/news/category/politics" style="margin: 4px; text-decoration: none;">Политика</a>
        <a href="/news/category/culture" style="margin: 4px; text-decoration: none;">Культура</a>
        <a href="/news/category/sport" style="margin: 4px; text-decoration: none;">Спорт</a>
php;
    }

    public function newsCategoryId($id) {
        $category = $this->categories[$id];
        $html = <<<php
        <a href="/" style="margin: 4px; text-decoration: none;">Главная</a>
        <a href="/news/" style="margin: 4px; text-decoration: none;">Новости</a>
        <br><br>
        <h1><a href="/news/" style="text-decoration: none;">Новости</a> > <a href="/news/category/politics" style="text-decoration: none;">{$category}</a></h1>
        <a href="/news/category/" style="margin: 4px; text-decoration: none;">Категории новостей</a>
        <br><br>
php;
        $html .= $this->getNewsCategoryList($id);
        return $html;
    }


    private function getNewsId($id) {
        foreach ($this->news as $news) {
            if (array_search($id, $news)) {
                return $news;
            }
        }
    }

    private function getNewsList() {
        $html = '';
        foreach ($this->news as $news) {
            $html .= <<<php
                <a href="/news/{$news['id']}" style="margin: 4px; text-decoration: none;">{$news['title']}</a>
                <br>
php;
        }
        return $html;
    }

    private function getNewsCategoryList($category) {
        $html = '';
        $news = [];
        foreach ($this->news as $item) {
            if (array_search($category, $item)) {
                $news[] = $item;
            }
        }
        foreach ($news as $item) {
            $html .= <<<php
                <a href="/news/{$item['id']}" style="margin: 4px; text-decoration: none;">{$item['title']}</a>
                <br>
php;
        }
        return $html;
    }



}
