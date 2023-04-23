<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand " href="/">
    <h1 class="logoName">Cinephiles</h1>
  </a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item ">
        <a class="nav-link ml-12 navlink" href="/">Home <span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link  navlink" href="movies">Movies</a>
      </li>
      <li class="nav-item">
        <a class="nav-link navlink" href="meme">Meme</a>
      </li>
      <li class="nav-item">
        <a class="nav-link navlink" href="#">About</a>
      </li>


    </ul>

    <form class="form-inline my-2 my-lg-0">


      <div class="input-group ">

        <!-- Add a name attribute to the input field -->
        <input id="searchbar" type="text" name="name" placeholder="Search">
        <button id="searchbtn" onclick="search()" type="submit">Search</button>



      </div>


      <div class="header_img mr-lg-2 mr-md-2 mr-sm-2"> <img src="https://osdeibi.dev/assets/img/faces/logoround.png" alt=""></div>


      <div class="dropdown">

        <a style="cursor: pointer; margin: 0%; padding: 0%;" class="dropbtn " onclick="toggleClock()">name</a>
        <i style="padding-left: 0%; " class="fas fa-caret-down"></i>
        <div class="dropdown-content bg-dark" id="dropdown" style="background-color:black">
          <a href="profile">Profile</a>
          <hr>
          <a href="friends">Friends</a>
          <hr>
          <a href="login">Logout</a>
        </div>
      </div>
    </form>



  </div>
  </div>
  </div>
</nav>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

<script>
  $.ajaxSetup({
    headers: {
      "X-CSRF-TOKEN": $('meta[name ="csrf-token"]').attr("content"),
    },
  });

  function search(searchContent) {

    var searchbar = document.getElementById("searchbar").value;

    $.ajax({

      type: "POST",

      dataType: "json",

      data: {
        searchbar: searchbar
      },

      url: "/searchbar",
      success: function(data) {
        console.log("ok");
      },
    });



  }
</script>