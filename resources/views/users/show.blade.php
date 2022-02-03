@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <label>Имя пользователя: {{ $user->name }}</label>
            <label>Email пользователя: {{ $user->email }}</label>
            <a href="{{ route('users_crud.edit', $user) }}">Изменить пользователя</a>

            <form action="{{ route('users_crud.destroy' , $user->id)}}" method="POST">
                {{ csrf_field() }}
                @method('DELETE')
                <input type="submit" class="btn btn-primary" value="Удалить пользователя">
            </form>
        </div>
    </div>
</div>
@endsection
