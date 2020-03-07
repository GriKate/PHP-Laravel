<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class AdminController extends Controller
{
    public function index() {
        return view('admin.index');
    }

    public function addNews(Request $request) {
        if ($request->isMethod('post')) {
            //dd($request->image);
            //$request->flash();
            return redirect()->route('admin.addNews');
        }
        //dump($request->isPrivate);
        return view('admin.addNews', ['categories' => News::$categories]);
    }
}
