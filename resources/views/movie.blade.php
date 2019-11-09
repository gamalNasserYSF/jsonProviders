@extends('layout')

@section('body')

    <div class="card">
        <img src="{{ $movie->img  }}" alt="John" style="margin: auto;text-align: center;width:50%">
        <h1> {{ $movie->name }}</h1>
        <p class="title"> {{ date('M d, Y', strtotime($movie->created_at)) }} </p>
        <p>{{ $movie->details }}</p>
    </div>

    {{--<h1>Movie Page</h1>--}}

    {{--<h2> {{ $movie->name }} </h2>--}}

@endsection