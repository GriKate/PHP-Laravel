@extends('layouts.main')

@section('title')
    @parent админа
@endsection

@section('menu')
    @include('menu.admin')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Добавить новость</h1>
                <form method="post" action="{{route('admin.addNews')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="newsTitle">Заголовок новости</label>
                        <input name="title" value="{{old('title')}}" type="text" class="form-control" id="newsTitle">
                    </div>
                    <div class="form-group">
                        <label for="newsCategory">Категория новости</label>
                        <select name="category" class="form-control" id="newsCategory">
                            @forelse($categories as $category)
                            <option @if ($category['id'] == old('category')) selected
                                    @endif value="{{$category['id']}}">
                                {{$category['name']}}
                            </option>
                            @empty
                            <option>Нет категорий</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="newsText">Текст новости</label>
                        <textarea name="text" class="form-control" id="newsText" rows="7">{{old('text')}}</textarea>
                    </div>
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="addFile">
                            <label class="custom-file-label" for="addFile">Добавить фото</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input name="isPrivate" @if (old('isPrivate') == 1) checked @endif value="1" class="form-check-input" type="checkbox" id="isPrivate">
                            <label class="form-check-label" for="isPrivate">
                                Новость приватная?
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Отправить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
