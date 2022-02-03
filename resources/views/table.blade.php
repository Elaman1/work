@extends('layouts.app')

@section('content')
    @if(!empty($data) && count($data))
        @foreach($data as $user)
            @include('shared.user', $user)
        @endforeach

    @else
        @include('shared.empty')
    @endif
@endsection