@extends('layout')


@section('body')

    <input type="hidden" id="url" value="{{ url('/') }}">

    <!-- movies section -->
    <section class="movies-section">
        <div class="container">
            <div class="row justify-content-center">

                @foreach($movies as $movie)
                    <!-- movie -->
                    <div class="col-11 col-md-6 col-xl-4">
                        <div class="movie">
                            <div class="d-flex flex-wrap">
                                <div id="{{ $movie->id }}" onclick="getMovieInfo(this.id)"  class="movie-image col-sm-5 p-0"
                                    style="background-image: url('{{ $movie->img }}')">
                                    <a href="#"></a>
                                </div>
                                <div class="content col-sm-7">
                                    <h2 class="movie-name" id="{{ $movie->id }}" onclick="getMovieInfo(this.id)" >{{ $movie->name }}</h2>
                                    <span class="date" id="{{ $movie->id }}" onclick="getMovieInfo(this.id)" > {{ date('M d, Y', strtotime($movie->created_at)) }}</span>
                                    <p class="text" id="{{ $movie->id }}" onclick="getMovieInfo(this.id)" >{{ $movie->details }}</p>
                                    <div class="more-info">
                                        <a href="{{ url('/movie/'.$movie->id) }}">More Info</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end movie -->
                @endforeach

            </div>
        </div>

        @include('movie-info')

    </section>
    <!-- end movies section -->

@endsection