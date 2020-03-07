<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    public function newsGet() {
        return view('news.download', ['categories' => News::$categories, 'news' => News::$news]);
    }

    public function newsDownload(Request $request) {
        if ($request->isMethod('post')) {
            $pageId = $request->id;

            if ($request->newsFormat == "text") {
                $content = view('news.one', ['id' => $pageId, 'news' => News::$news[$pageId]])->render();
                return response($content)
                    ->header('Content-type', 'application/txt')
                    ->header('Content-length', mb_strlen($content))
                    ->header('Content-Disposition', 'attachment; filename="page.txt"');
            } elseif ($request->newsFormat == "json") {
                return response()->json(News::$news[$pageId])
                    ->header('Content-Disposition', 'attachment; filename="json.txt"')
                    ->setEncodingOptions(JSON_UNESCAPED_UNICODE);
            }
        }
        return view('news.download', ['categories' => News::$categories, 'news' => News::$news]);
    }



}
