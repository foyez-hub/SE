<!DOCTYPE html>
<html>

<head>
  <meta name="csrf-token" content="{{csrf_token()}}">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="{{asset('frontend/js/meme.js') }}"></script>
  <link rel="stylesheet" href="{{ asset('frontend/css/meme.css') }}">

  <title>Meme Voting</title>


</head>

<body>

  <h2>Current Time</h2>
  <div class="Timer"  id="current-time"></div>

  <h2>Countdown Timer</h2>
  <div class="countdown" id="timer"></div>

  <h1 id="top">Meme Voting</h1>





  <!-- Form to upload a new meme -->
  <div class="memebox">

    <label for="meme">Choose a meme to upload:</label>
    <input type="file" id="memeimg" name="image">
    <br>
    <label for="title">Meme title:</label>
    <input type="text" id="memetitle" name="title">
    <br>

    <button id="subbtn" onclick="addData()" type="submit">Upload Meme</button>
  </div>

  <hr>


  <h2 id="ti">Recent Memes</h2>

  <ul id="meme-list">

    <!-- <li>
      <img src="images/12.jpg" alt="Meme Title">
      <h3>Meme Title</h3>

      <button class="memebutton" id="myButton">Upvote</button>
        <button class="modelbtn" ">Open Modal</button>

      <span>0 votes</span>
    </li> -->

  </ul>


  
</body>

</html>