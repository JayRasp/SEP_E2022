<!DOCTYPE html>
<html lang="en">

<head>
  <!--<meta http-equiv="refresh" content="5;URL='/'">!-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">


  <link rel="stylesheet" href="combined.css">
  <link rel="stylesheet" href="w3.css">
  <style>
    .mySlides {
      display: none
    }

    .w3-left,
    .w3-right,
    .w3-badge {
      cursor: pointer
    }

    .w3-badge {
      height: 13px;
      width: 13px;
      padding: 0
    }
  </style>



</head>

<body>
  <?php include "./header.php" ?>
    <div class="main" id="main">
      <h1 class="pageTitle">Welcome to the website for the Belval Campus of the University of Luxembourg for ESCH2022</h1>
      <h2>Discover and explore the world of the Belval campus of the University of Luxembourg in
our website through photos, animations, quizzes and feedback from former students!
</h2>
      <h3>We offer the opportunity to play two different quizzes specially designed for people who are just looking to learn more about the university(FunQuiz) and one to learn more about Esch's culture.</h3>
      <div class="tiles">
      <div class="quizTile tile_hover_pointer" onclick="window.location='/quiz.php?category=uni'">
        <h1><span class="orange">U</span>ni<i class="far fa-question-circle orange"></i></h1>
      </div>
      <div class="quizTile tile_hover_pointer" onclick="window.location='/quiz.php?category=Science'">
        <h1><span class="orange">S</span>cience<i class="far fa-question-circle orange"></i></h1>
      </div>
        <div class="quizTile tile_hover_pointer" onclick="window.location='/quiz.php?category=culture'">
          <h1><span class="orange">C</span>ulture<i class="far fa-question-circle orange"></i></h1></a>
        </div>
        <div class="quizTile tile_hover_pointer" onclick="window.location='/quiz.php?category=education'">
          <h1><span class="orange">E</span>ducation<i class="far fa-question-circle orange"></i></h1>
        </div>
      </div>
      <h2>The Campus</h2>
      <div class="w3-content w3-display-container" style="max-width:800px">

        <img class="mySlides" src="/img/Slideshow/image1.jpg" style="width:100%">
        <img class="mySlides" src="/img/Slideshow/image2.jpg" style="width:100%">
        <img class="mySlides" src="/img/Slideshow/image3.jpg" style="width:100%">
        <img class="mySlides" src="/img/Slideshow/image4.jpg" style="width:100%">
        <img class="mySlides" src="/img/Slideshow/image5.jpg" style="width:100%">
        <img class="mySlides" src="/img/Slideshow/image6.jpg" style="width:100%">
        <img class="mySlides" src="/img/Slideshow/image7.jpg" style="width:100%">

        <div class="w3-center w3-container w3-section w3-large w3-text-white w3-display-bottommiddle" style="width:100%">
          <div class="w3-left w3-hover-text-khaki" onclick="plusDivs(-1)">&#10094;</div>
          <div class="w3-right w3-hover-text-khaki" onclick="plusDivs(1)">&#10095;</div>
          <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(1)"></span>
          <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(2)"></span>
          <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(3)"></span>
          <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(4)"></span>
          <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(5)"></span>
          <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(6)"></span>
          <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(7)"></span>
        </div>
      </div>

      <script>
        var slideIndex = 1;
        showDivs(slideIndex);

        function plusDivs(n) {
          showDivs(slideIndex += n);
        }

        function currentDiv(n) {
          showDivs(slideIndex = n);
        }

        function showDivs(n) {
          var i;
          var x = document.getElementsByClassName("mySlides");
          var dots = document.getElementsByClassName("demo");
          if (n > x.length) {
            slideIndex = 1
          }
          if (n < 1) {
            slideIndex = x.length
          }
          for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
          }
          for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" w3-white", "");
          }
          x[slideIndex - 1].style.display = "block";
          dots[slideIndex - 1].className += " w3-white";
        }
      </script>

      <h2>Nearby POI's</h2>
      <div class="tiles">
        <div class="tile tile_hover_pointer" onclick="window.location='https://llc.uni.lu/'">
          <img src="/img/LLC.png" alt="">
          <h3>Luxembourg Learning Center</h3>
        </div>
          <div class="tile tile_hover_pointer" onclick="window.location='https://belvalshopping.lu/'">
            <img src="/img/BelvalPlaza.png" alt="">
            <h3>Belval Plaza</h3>
          </div>
      </div>
      <div class="tiles">
        <div class="tile tile_hover_pointer" onclick="window.location='https://www.rockhal.lu/'">
          <img src="/img/Rockhal.png" alt="">
          <h3>Rockhal</h3>
        </div>
          <div class="tile tile_hover_pointer" onclick="window.location='https://industrie.lu/CNCI.html'">
            <img src="/img/CNCI.png" alt="">
            <h3>National Center for Industrial Culture</h3>
          </div>
      </div>

      <h2>History</h2>
      <div class="tiles">
        <div class="tile history_tile">
          <div class="blurred_background">
          <h1>2002</h1>
          <h3>The Fonds Belval is created to construct the "Cité des Sciences".</br>(600 million Euros to revitalise the Industrial area of 500 hectare)</h3>
        </div></div>
      </div>
      <div class="tiles">
        <div class="tile history_tile">
          <div class="blurred_background">
          <h1>2003</h1>
          <h3>The University of Luxembourg is founded - the University library consists of four different libraries on three campuses.</br>(Walferdange, Limpertsberg, Kirchberg)</h3>
        </div></div>
      </div>
      <div class="tiles">
        <div class="tile history_tile">
          <div class="blurred_background">
          <h1>2005</h1>
          <h3>Decision is made to make Belval the main University campus.</h3>
        </div></div>
      </div>
      <div class="tiles">
        <div class="tile history_tile">
          <div class="blurred_background">
          <h1>2015</h1>
          <h3>First academic year of the University of Luxembourg in Belval.</h3>
        </div></div>
      </div>


    </div>


    <footer>

    </footer>

</body>

</html>
