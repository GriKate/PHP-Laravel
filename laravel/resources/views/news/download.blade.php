@extends('layouts.main')

@section('title')
    @parent загрузки
@endsection

@section('menu')
    @include('menu.main')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>Скачать новости</h1>
                <div class="col-md-6">
                    <form method="post" action="{{route('news.download')}}">
                        @csrf
                        <h3>Выберите новость:</h3>
                        @forelse($news as $item)
                            <div class="form-group">
                                <div class="form-check">
                                    <input name="id" id="news{{$item->id}}" value="{{$item->id}}" class="form-check-input" type="radio">
                                    <label for="news{{$item->id}}" class="form-check-label">
                                        {{$item->title}}
                                    </label>
                                </div>
                            </div>
                        @empty
                            <p>Нет новостей</p>
                        @endforelse

                        <h3>Выберите формат:</h3>
                        <div class="form-group">
                            <div class="form-check">
                                <input name="newsFormat" id="newsText" value="text" class="form-check-input" type="radio" checked>
                                <label for="newsText" class="form-check-label">
                                    Текстовый файл
                                </label>
                            </div>
                            <div class="form-check">
                                <input name="newsFormat" id="newsJSON" value="json" class="form-check-input" type="radio">
                                <label for="newsJSON" class="form-check-label">
                                    Файл JSON
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">Загрузить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
