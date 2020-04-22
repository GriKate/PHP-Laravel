<?php

namespace App;

use App\Rules\Jedi;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['title', 'text', 'isPrivate', 'image', 'category_id'];

    public static function rules() {
        $tableCategory = (new Category())->getTable();
        return [
            //'title' => ['required', 'min:5', 'max:30', new Jedi()],
            'title' => 'required|min:5|max:50',
            'text' => 'required|max:5000',
            'category_id' => "required|exists:{$tableCategory},id",
            'image' => 'mimes:jpeg,jpg,bmp,png|max:1000'
        ];
    }

    public static function attributeNames() {
        return [
            'title' => '"Заголовок новости"',
            'text' => '"Текст новости"',
            'image' => '"Фото новости"',
        ];
    }
}
