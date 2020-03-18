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
            <div class="col-md-12">
                <h1>Страница Админа</h1>
                @forelse($news as $item)
                    <div class="card">
                        <h3><a href="{{route('news.one', ['news' => $item])}}">{{$item->title}}</a></h3>
                        <a href="{{route('admin.updateNews', $item)}}">
                            <button type="button" class="btn btn-success">Изменить</button>
                        </a>
                        <a href="{{route('admin.deleteNews', $item)}}">
                         <button type="button" class="btn btn-danger">Удалить</button>
                        </a>
                    </div>
                @empty
                    <p>Нет новостей</p>
                @endforelse
                {{$news->links()}}
            </div>
        </div>
    </div>
@endsection
