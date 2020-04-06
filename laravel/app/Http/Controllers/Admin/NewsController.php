<?php


namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\News;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function all() {
        $news = News::query()->paginate(10);
        return view('admin.allNews', ['news' => $news]);
    }

    public function add(Request $request, News $news) {
        if ($request->isMethod('post')) {
            //DB::table('news')->insert($request->except('_token'));

            $this->validate($request, News::rules(), [], News::attributeNames());

            $url = null;
            $news = new News();

            if($request->file('image')) {
                $path = $request->file('image')->store('public');
                $news->image = Storage::url($path);
            }

            $result = $news->fill($request->all())->save();
            if ($result) {
                return redirect()
                    ->route('admin.allNews')
                    ->with('success', 'Новость успешно создана!');
            } else {
                $request->flash();
                return redirect()
                    ->route('admin.addNews')
                    ->with('error', 'Ошибка создания новости');
            }
        }
        //dd(Category::all());
        return view('admin.addNews', ['categories' => Category::all(), 'news' => $news]);
    }

    public function update(Request $request, News $news) {
        return view('admin.addNews', ['news' => $news, 'categories' => Category::all()]);
    }

    public function save(Request $request, News $news) {
        if($request->isMethod('post')) {

            $this->validate($request, News::rules(), [], News::attributeNames());

            if($request->file('image')) {
                $path = Storage::putFile('public', $request->file('image'));
                $url = Storage::url($path);
                $news->image = $url;
            }
            $result = $news->fill($request->all())->save();
            if ($result) {
                return redirect()
                    ->route('admin.allNews')
                    ->with('success', 'Новость изменена!');
            } else {
                $request->flash();
                return redirect()
                    ->route('admin.addNews')
                    ->with('error', 'Ошибка изменения новости');
            }
        }
    }

    public function delete(News $news) {
        $result = $news->delete();
        if ($result) {
            return redirect()
                ->route('admin.allNews')
                ->with('success', 'Новость удалена');
        } else {
            return redirect()
                ->route('admin.allNews')
                ->with('error', 'Ошибка удаления новости');
        }
    }
}
