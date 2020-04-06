@extends('layouts.main')

@section('title')
    @parent одной категории
@endsection

@section('menu')
    @include('menu.main')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>
                    <a href="{{route('news.all')}}">Новости</a> >
                    <a href="{{route('news.categoryId', ['id' => $category->id])}}">{{$category->name}}</a>
                </h1>
                <h3><a href="{{route('news.categories')}}">Категории новостей</a></h3>
                <br><br>

                @forelse($news as $item)
                    <h3><a href="{{route('news.one', ['id' => $item->id])}}" class="card">{{$item->title}}</a></h3>
                @empty
                    <p>Нет новостей</p>
                @endforelse
                {{$news->links()}}
            </div>
        </div>
    </div>
@endsection
