@extends('frontend')

@section('content')

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">

    <div class="carousel-item active loopVideo">
      <video class="embed-responsive embed-responsive-4by3 img-fluid" autoplay loop unmuted>
        <source src="https://mdbcdn.b-cdn.net/img/video/Tropical.mp4" type="video/mp4" />
      </video>
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>
          Nulla vitae elit libero, a pharetra augue mollis interdum.
        </p>
      </div>
    </div>





    <div class="carousel-item loopVideo">
      <video class=" embed-responsive embed-responsive-4by3 img-fluid " autoplay loop unmuted>
        <source src="https://mdbcdn.b-cdn.net/img/video/forest.mp4" type="video/mp4" />
      </video>
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit.
        </p>
      </div>
    </div>


    <div class="carousel-item loopVideo">
      <video class="embed-responsive embed-responsive-4by3 img-fluid" autoplay loop unmuted>
        <source src="https://mdbcdn.b-cdn.net/img/video/Agua-natural.mp4" type="video/mp4" />
      </video>
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>
          Praesent commodo cursus magna, vel scelerisque nisl consectetur.
        </p>
      </div>
    </div>

    <a class="carousel-control-prev " href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon carousleClass" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon carousleClass" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>


  </div>

</div>

<!-- movie slider start  -->
<h1 class="movieScroolHeader mt-2">New Releases</h1>
<div id="carousel" class="container">
  <div class="control-container">
    <div id="left-scroll-button" class="left-scroll button scroll">
      <i class="fa fa-chevron-left" aria-hidden="true"></i>
    </div>
    <div id="right-scroll-button" class="right-scroll button scroll">
      <i class="fa fa-chevron-right" aria-hidden="true"></i>
    </div>
  </div>

  <div class="items" id="carousel-items">



    <div class="item">
      <img class="item-image" src="https://occ-0-243-299.1.nflxso.net/dnm/api/v5/rendition/412e4119fb212e3ca9f1add558e2e7fed42f8fb4/AAAABQCoK53qihwVPLRxPEDX98nyYpGbxgi5cc0ZOM4iHQu7KQvtgNyaNM5PsgI0vy5g3rLPZdjGCFr1EggrCPXpL77p2H08jV0tNEmIfs_e8KUfvBJ6Ay5nM4UM1dl-58xA6t1swmautOM.webp" />
      <span class="item-title">Going In Style</span>
      <a href="streaming"><span class="item-load-icon button opacity-none"><i class="fa fa-play"></i></span></a>
      <div class="item-description opacity-none">Lorem ipsum dolor sit amet, lorem ipsum dolor sit amet.</div>
    </div>

    @foreach ($users as $user)


    <div class="item">
      <img class="item-image" src="{{ asset('images/' . $user->image) }}" alt="Photo" />

      <span class="item-title">{{ $user->movie_name }}</span>
      <a href="{{ route('streaming', ['video' => $user->movie_clip] ) }}">
        <span class="item-load-icon button opacity-none">
          <i class="fa fa-play"></i>
        </span>
      </a>
      <div class="item-description opacity-none">{{$user->synopsis }}</div>
    </div>

    @endforeach


  </div>
</div>




<!-- movie slider end  -->


@endsection