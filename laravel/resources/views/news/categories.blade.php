@extends('layouts.main')

@section('title')
    @parent категорий
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
                    <a href="{{route('news.categories')}}">Категории новостей</a>
                </h1>
                @forelse($categories as $item)
                    <h3><a href="{{route('news.categoryId', ['id' => $item['id']])}}" class="card">{{$item['name']}}</a></h3>
                @empty
                    <p>Нет категорий</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
