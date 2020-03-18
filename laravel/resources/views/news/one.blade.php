@extends('layouts.main')

@section('title')
    @parent одной новости
@endsection

@section('menu')
    @include('menu.main')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1><a href="{{route('news.all')}}">Новости</a></h1>
                <h3><a href="{{route('news.categories')}}">Категории новостей</a></h3>
                @if (!$news->isPrivate)
                    <h2>{{$news->title}}</h2>
                    <p>{{$news->text}}</p>
                @else
                    <br>Нет прав!
                @endif
            </div>
        </div>
    </div>
@endsection
