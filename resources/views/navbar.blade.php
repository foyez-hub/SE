<style>
  .suggestion-dropdown {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    z-index: 1;
    background-color: #f1f1f1;
    width: 100%;
    list-style: none;
    padding: 0;
    margin: 0;
  }

  .suggestion-dropdown li {
    padding: 8px 12px;
    cursor: pointer;
  }

  .suggestion-dropdown li:hover {
    background-color: #ddd;
  }

  .frontText {
    color: #4dbf00;
    font-size: 16px;
    font-weight: bold;
    font-family: Arial, sans-serif;
    text-align: center;
    text-transform: uppercase;
    letter-spacing: 2px;
    line-height: 1.5;

  }
</style>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand " href="index">
    <h1 class="logoName">Cinephiles</h1>
  </a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item ">
        <a class="nav-link ml-12 navlink" href="index">Home <span class="sr-only"></span></a>
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

    <!-- <form class="form-inline my-2 my-lg-0"> -->
    <div class="form-inline my-2 my-lg-0">


      <div class="input-group ">

        <input id="searchbar" type="text" name="name" placeholder="Search">
        <button id="searchbtn" onclick="search()" type="submit">Search</button>
        <div id="search-results"></div>

      </div>


      <div class="header_img mr-lg-2 mr-md-2 mr-sm-2"> <img src="https://osdeibi.dev/assets/img/faces/logoround.png" alt=""></div>


      <div class="dropdown">

        <a id="showname" style="cursor: pointer; margin: 0%; padding: 0%;" class="dropbtn " onclick="toggleClock()">name</a>
        <i style="padding-left: 0%; " class="fas fa-caret-down"></i>
        <div class="dropdown-content bg-dark" id="dropdown" style="background-color:black">

          <a href="profile">Profile</a>
          <hr>
          <a href="friends">Friends</a>
          <hr>
          <a href="/">Logout</a>

        </div>
      </div>
    </div>
    <!-- </form> -->



  </div>
  </div>
  </div>
</nav>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  $.ajaxSetup({
    headers: {
      "X-CSRF-TOKEN": $('meta[name ="csrf-token"]').attr("content"),
    },
  });

  function search(searchContent) {

    var searchbar = document.getElementById("searchbar").value;

    $.ajax({

      type: "GET",
      datatype: "json",
      url: "/searchbar" + searchbar,
      success: function(data) {

        window.location.href = "{{'/searchres'}}";

      },
    });



  }

  function nameShow() {

    $.ajax({

      type: "GET",
      datatype: "json",
      url: "/nameShow",
      success: function(data) {
        console.log(data);
        var v=document.getElementById("showname");
        v.innerHTML=data;


        // window.location.href = "{{'/searchres'}}";

      },
    });

  }
  nameShow();


</script>



<!-- realtime search call -->
<!-- <script>
  $(function() {
    var searchInput = $('#searchbar');
    var searchResults = $('#search-results');
    searchInput.on('input', function() {
      var query = searchInput.val();
      if (query.length >= 3) {
        $.ajax({

          type: "GET",
          datatype: "json",
          url: "/searchRealtime" + query,
          success: function(data) {
            console.log(data);
            searchResults.html(data);

          },
        });




      } else {


        searchResults.empty();
      }
    });
  });
</script> -->