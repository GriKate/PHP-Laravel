<?php


namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\News;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function news() {
        //$news = DB::table('news')->get();
        //$news = News::all();
        $news = News::query()
            ->where('isPrivate', false)
            ->paginate(10);
        return view('news.all', ['news' =>$news]);
    }

    public function newsOne(News $news) {
        //$news = DB::table('news')->find($id);
        //$news = News::find($id);
        if (!empty($news)) {
            return view('news.one', ['news' => $news]);
        } else
            return redirect(route('news.all'));
    }

    public function newsCategories() {
        //$categories = DB::table('categories')->get();
        $categories = Category::all();
        return view('news.categories', ['categories' => $categories]);
    }

    public function newsCategoryId($id) {
        //$category = DB::table('categories')->find($id);
        $cat = Category::query()
            ->where('id', $id)
            ->get();
        //$news = News::query()->where('category_id', $cat[0]->id)->paginate(5);
        $news = Category::query()
            ->find($cat[0]->id)
            ->news()
            ->paginate(5);

        return view('news.oneCategory', ['category' => $cat[0], 'news' => $news]);
    }

    public function newsGet() {
        //$news = DB::table('news')->get();
        $news = News::all();
        return view('news.download', ['news' => $news]);
    }

    public function newsDownload(Request $request) {
        if ($request->isMethod('post')) {
            $pageId = $request->id;

            if ($request->newsFormat == "text") {
                $content = view('news.one', ['id' => $pageId, 'news' => News::query()->find($pageId)])->render();
                return response($content)
                    ->header('Content-type', 'application/txt')
                    ->header('Content-length', mb_strlen($content))
                    ->header('Content-Disposition', 'attachment; filename="page.txt"');
            } elseif ($request->newsFormat == "json") {
                return response()->json(News::query()->find($pageId))
                    ->header('Content-Disposition', 'attachment; filename="json.txt"')
                    ->setEncodingOptions(JSON_UNESCAPED_UNICODE);
            }
        }
        return view('news.download', ['categories' => News::$categories, 'news' => News::$news]);
    }



}
