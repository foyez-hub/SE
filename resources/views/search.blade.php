@extends('frontend')


@section('search')



@foreach ($movies as $movie)

<div id="divContainer1" class="row row-cols-1 row-cols-md-5 g-4 mt-5 ml-5">

    <div class="mb-5">
        <div class="item">
            <img class="item-image" src="{{ asset('images/' . $movie->image) }}" />
            <span class="item-title">{{$movie->movie_name}}</span>
            <a href="{{ route('streaming', ['video' => $movie->movie_clip] ) }}">
                <span class="item-load-icon button opacity-none">
                    <i class="fa fa-play"></i>
                </span>
            </a>
            <div class="item-description opacity-none">{{$movie->synopsis}}</div>
        </div>
    </div>


</div>

@endforeach




@endsection