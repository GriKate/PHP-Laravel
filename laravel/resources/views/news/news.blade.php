@extends('layouts.main')

@section('title')
    @parent новостей
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
                @forelse($news as $item)
                    <div class="card">
                        <h3>{{$item->title}}</h3>
                        @if ($item->image)
                            <div class="news-image" style="background: url({{$item->image}}) center center no-repeat;"></div>
                        @else
                            <div class="news-image" style="background: url({{asset('mountains.jpg')}}) center center no-repeat;"></div>
                        @endif
                        @if (!$item->isPrivate)
                            <h4><a href="{{route('news.one', ['id' => $item->id])}}">Подробнее</a></h4>
                        @endif
                    </div>
                @empty
                    <p>Нет новостей</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
