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
                <h1>Все пользователи</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Имя</th>
                            <th scope="col">Email</th>
                            <th scope="col">Админ</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <th scope="row">{{$user->id}}</th>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>@if ($user->is_admin) Админ @else - @endif</td>
                                <td>
                                    <a href="{{route('admin.changeAdmin', $user->id)}}">
                                        <button type="button" class="btn @if($user->is_admin) btn-danger @else btn-success @endif">
                                            @if($user->is_admin)Убрать из админов
                                            @else Сделать админом
                                            @endif
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
