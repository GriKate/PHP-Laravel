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
            </div>
        </div>
    </div>
@endsection
