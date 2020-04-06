<?php


namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\News;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class NewsController
{
    public function all() {
        $news = News::query()->paginate(10);
        return view('admin.allNews', ['news' => $news]);
    }

    public function add(Request $request, News $news) {
        if ($request->isMethod('post')) {
            //DB::table('news')->insert($request->except('_token'));
            //$request->flash();
            $url = null;
            if($request->file('image')) {
                $path = $request->file('image')->store('public');
                $news->image = Storage::url($path);
            }
            $news = new News();
            $news->fill($request->all());
            $news->save();

            return redirect()->route('admin.allNews')->with('success', 'Новость успешно создана!');
        }
        //dd(Category::all());
        return view('admin.addNews', ['categories' => Category::all(), 'news' => $news]);
    }

    public function update(Request $request, News $news) {
        return view('admin.addNews', ['news' => $news, 'categories' => Category::all()]);
    }

    public function save(Request $request, News $news) {
        if($request->isMethod('post')) {
            if($request->file('image')) {
                $path = Storage::putFile('public', $request->file('image'));
                $url = Storage::url($path);
                $news->image = $url;
            }
            $news->fill($request->all());
            $news->save();
            return redirect()->route('admin.allNews')->with('success', 'Новость изменена!');
        }
    }

    public function delete(News $news) {
        $news->delete();
        return redirect()->route('admin.allNews')->with('success', 'Новость удалена');
    }
}
