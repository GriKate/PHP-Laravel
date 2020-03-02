<?php


namespace App\Http\Controllers;


use App\News;

class NewsController extends Controller
{
    public function news() {
        return view('news.news', ['news' => News::$news]);
    }

    public function newsOne($id) {
        if (array_key_exists($id, News::$news))
            return view('news.one', ['news' => News::$news[$id]]);
        else
            return redirect(route('news.all'));
    }

    public function newsCategories() {
        return view('news.categories', ['categories' => News::$categories]);
    }

    public function newsCategoryId($id) {
        $news = [];
        foreach (News::$news as $item) {
            if ($id == $item['category_id']) {
                $news[] = $item;
            }
        }
        return view('news.oneCategory', ['category' => News::$categories[$id], 'news' => $news]);
    }

    public function addNews() {
        return view('news.add');
    }


}
