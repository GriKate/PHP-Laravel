<?php


namespace App\Http\Controllers;


class NewsController extends Controller
{
    private $news = [
        [
            'id' => 1,
            'category_id' => 1,
            'title' => 'Новость 1',
            'text' => 'Первая новость',
        ],
        [
            'id' => 2,
            'category_id' => 1,
            'title' => 'Новость 2',
            'text' => 'Вторая новость',
        ],
        [
            'id' => 3,
            'category_id' => 2,
            'title' => 'Новость 3',
            'text' => 'Третья новость',
        ],
        [
            'id' => 4,
            'category_id' => 2,
            'title' => 'Новость 4',
            'text' => 'Четвёртая новость',
        ],
        [
            'id' => 5,
            'category_id' => 3,
            'title' => 'Новость 5',
            'text' => 'Пятая новость',
        ],
        [
            'id' => 6,
            'category_id' => 3,
            'title' => 'Новость 6',
            'text' => 'Шестая новость',
        ],
    ];

    private $categories = [
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

    public function news() {
         $news = route('news.all');
         $categories = route('news.categories');
         $html = <<<php
        <a href="/" style="margin: 4px; text-decoration: none;">Главная</a>
        <a href="{$news}" style="margin: 4px; text-decoration: none;">Новости</a>
        <br><br>
        <h1><a href="{$news}" style="text-decoration: none;">Новости</a></h1>
        <a href="{$categories}" style="margin: 4px; text-decoration: none;">Категории новостей</a>
        <br><br>
php;
         $newsList = $this->getNewsList();
         $html .= $newsList;
         return $html;
    }

    public function newsOne($id) {
        $news = route('news.all');
        $categories = route('news.categories');
        $html = <<<php
        <a href="/" style="margin: 4px; text-decoration: none;">Главная</a>
        <a href="{$news}" style="margin: 4px; text-decoration: none;">Новости</a>
        <br><br>
        <h1><a href="{$news}" style="text-decoration: none;">Новости</a></h1>
        <a href="{$categories}" style="margin: 4px; text-decoration: none;">Категории новостей</a>
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
        $news = route('news.all');
        $categories = route('news.categories');
//        $categoryId = route('news.categoryId', ['id' => $news['id']]);
        return <<<php
        <a href="/" style="margin: 4px; text-decoration: none;">Главная</a>
        <a href="{$news}" style="margin: 4px; text-decoration: none;">Новости</a>
        <br><br>
        <h1>
            <a href="{$news}" style="text-decoration: none;">Новости</a> >
            <a href="{$categories}" style="text-decoration: none;">Категории новостей</a>
        </h1>
        <a href="/news/category/politics" style="margin: 4px; text-decoration: none;">Политика</a>
        <a href="/news/category/culture" style="margin: 4px; text-decoration: none;">Культура</a>
        <a href="/news/category/sport" style="margin: 4px; text-decoration: none;">Спорт</a>
php;
    }

    public function newsCategoryId($id) {
        $category = $this->getNewsCategory($id);
        $news = route('news.all');
        $categories = route('news.categories');
        $categoryId = route('news.categoryId', [$category['category']]);

        $html = <<<php
        <a href="/" style="margin: 4px; text-decoration: none;">Главная</a>
        <a href="{$news}" style="margin: 4px; text-decoration: none;">Новости</a>
        <br><br>
        <h1>
            <a href="{$news}" style="text-decoration: none;">Новости</a> >
            <a href="{$categoryId}" style="text-decoration: none;">{$category['name']}</a>
        </h1>
        <a href="{$categories}" style="margin: 4px; text-decoration: none;">Категории новостей</a>
        <br><br>
php;
        $html .= $this->getNewsCategoryList($category);
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
            $newsOne = route('news.one', ['id' => $news['id']]);
            $html .= <<<php
                <a href="{$newsOne}" style="margin: 4px; text-decoration: none;">{$news['title']}</a>
                <br>
php;
        }
        return $html;
    }

    private function getNewsCategory($id) {
        $category = '';
        foreach ($this->categories as $item) {
            if ($item['category'] == $id) {
                $category = $item;
                return $category;
            }
        }
    }

    private function getNewsCategoryList($category) {
        $html = '';
        $news = [];
        foreach ($this->news as $item) {
            if ($category['id'] == $item['category_id']) {
                $news[] = $item;
            }
        }
        foreach ($news as $item) {
            $newsOne = route('news.one', ['id' => $item['id']]);
            $html .= <<<php
                <a href="{$newsOne}" style="margin: 4px; text-decoration: none;">{$item['title']}</a>
                <br>
php;
        }
        return $html;
    }



}
