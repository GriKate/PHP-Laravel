@extends('layouts.main')

@section('title')
    @parent пользователя
@endsection

@section('menu')
    @include('menu.main')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>Изменить профиль</h1>
                <form method="post" action="{{route('profile.updateProfile', $user)}}">
                    @csrf

                    <div class="form-group">
                        <label for="name">Имя</label>
                        @if ($errors->has('name'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                @foreach($errors->get('name') as $error)
                                    {{$error}}
                                @endforeach
                            </div>
                        @endif
                        <input name="name" value="{{old('name') ?? $user->name}}" type="text" class="form-control" id="name">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        @if ($errors->has('email'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                @foreach($errors->get('email') as $error)
                                    {{$error}}
                                @endforeach
                            </div>
                        @endif
                        <input name="email" value="{{old('email') ?? $user->email}}" type="text" class="form-control" id="email">
                    </div>

                    <div class="form-group">
                        <label for="password">Текущий пароль</label>
                        @if ($errors->has('password'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                @foreach($errors->get('password') as $error)
                                    {{$error}}
                                @endforeach
                            </div>
                        @endif
                        <input name="password" placeholder="Текущий пароль" type="text" class="form-control" id="password">
                    </div>

                    <div class="form-group">
                        <label for="newPassword">Новый пароль</label>
                        @if ($errors->has('newPassword'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                @foreach($errors->get('newPassword') as $error)
                                    {{$error}}
                                @endforeach
                            </div>
                        @endif
                        <input name="newPassword" placeholder="Новый пароль" type="text" class="form-control" id="newPassword">
                    </div>

                    <?=Form::submit('Изменить', ['class' => 'btn btn-success']);?>
                </form>
            </div>
        </div>
    </div>
@endsection
