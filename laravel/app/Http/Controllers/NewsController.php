<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function news() {
        $news = DB::table('news')->get();
        return view('news.news', ['news' =>$news]);
    }

    public function newsOne($id) {
        $news = DB::table('news')->find($id);
        if (!empty($news)) {
            return view('news.one', ['news' => $news]);
        } else
            return redirect(route('news.all'));
    }

    public function newsCategories() {
        $categories = DB::table('categories')->get();
        return view('news.categories', ['categories' => $categories]);
    }

    public function newsCategoryId($id) {
        $category = DB::table('categories')->find($id);
        $allNews = DB::table('news')->get();
        $news = [];
        foreach ($allNews as $item) {
            if ($id == $item->category_id) {
                $news[] = $item;
            }
        }
        return view('news.oneCategory', ['category' => $category, 'news' => $news]);
    }

    public function newsGet() {
        $news = DB::table('news')->get();
        return view('news.download', ['news' => $news]);
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
