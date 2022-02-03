@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if (isset($users))
                @foreach($users as $user)
                    <label>Имя: </label>
                    <a href="{{ route('users_crud.show', $user) }}">
                        {{ $user->name }}
                    </a>
                    <label>Email: </label>
                    <p> {{ $user->email }}</p>
                @endforeach
            @endif
        </div>
    </div>
</div>
@endsection
