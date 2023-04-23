@extends('frontend')





@section('streamingPage')

<div class="video-container">
      <video class="video d-block" controls loop>
         <source src="videos/{{$video }}" type="video/mp4">
      </video>
</div>



@endsection