@extends('layouts.main')

@section('menu')
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <a class="navbar-brand" href="{{route('index')}}">Laravel</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link {{request()->routeIs('admin.index')? 'active' : ''}}" href="{{route('admin.index')}}">Главная <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{request()->routeIs('admin.add')? 'active' : ''}}" href="{{route('admin.addNews')}}">Добавить новость</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{request()->routeIs('admin.index')? 'active' : ''}}" href="{{route('admin.index')}}">admin-2</a>
                </li>
            </ul>
        </div>
    </nav>
@endsection
