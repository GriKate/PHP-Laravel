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
                <form method="post" action="@if(!$news->id) {{route('admin.addNews')}}
                                @else {{route('admin.saveNews', $news)}}
                                @endif" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="newsTitle">Заголовок новости</label>
                        @if ($errors->has('title'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                @foreach($errors->get('title') as $error)
                                    {{$error}}
                                @endforeach
                            </div>
                        @endif
                        <input name="title" value="{{old('title') ?? $news->title ?? ""}}" type="text" class="form-control" id="newsTitle">
                    </div>
                    <div class="form-group">
                        <label for="newsCategory">Категория новости</label>
                        @if ($errors->has('category_id'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                @foreach($errors->get('category_id') as $error)
                                    {{$error}}
                                @endforeach
                            </div>
                        @endif
                        <select name="category_id" class="form-control" id="newsCategory">
                            @forelse($categories as $category)
                            <option @if (old('category_id') == $category['id']) selected
                                    @elseif ($news->category_id == $category['id']) selected
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
                        @if ($errors->has('text'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                @foreach($errors->get('text') as $error)
                                    {{$error}}
                                @endforeach
                            </div>
                        @endif
                        <textarea name="text" class="form-control" id="newsText" rows="7">{{old('text') ?? $news->text ?? ""}}</textarea>
                    </div>
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="addFile">
                            <label class="custom-file-label" for="addFile">Добавить фото</label>
                            @if ($errors->has('image'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    @foreach($errors->get('image') as $error)
                                        {{$error}}
                                    @endforeach
                                </div>
                            @endif
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
                    <button type="submit" class="btn btn-primary mb-2">
                        @if($news->id) {{__('Изменить новость')}}
                        @else {{__('Добавить новость')}}
                        @endif
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
