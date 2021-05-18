
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(function(){
        // Check the initial Postion of the Sticky Header
        var stickyHeaderTop=$('.menu').offset().top;;
        $(window).on("load",function(){
          $(".menuspace").css('height',$(".menu").height());
        });
        $(window).resize(function(){
          stickyHeaderTop = $('.menu').offset().top;
          $(".menuspace").css({"height":$(".menu").height()});
        });

        $(window).scroll(function(){
              if( $(window).scrollTop() > stickyHeaderTop ) {
                      $('.menu').css({position: 'fixed', top: '0px'});
                      $('.menuspace').css('display', 'block');
              } else {
                      $('.menu').css({position: 'static', top: '0px'});
                      $('.menuspace').css('display', 'none');
              }
        });
  });
</script>
<div class="header">
    <div class="inner_vertical_align_middle">
      <a href="http://esch2022.lu"><img class="header-logo_e22" src="../img/E22.svg"></img>
      </a>
    </div>
    <div class="inner_vertical_align_middle">
      <img class="header-logo_x" src="../img/X.svg"></img>
    </div>
    <div class="inner_vertical_align_middle">
      <a href="http://wwwen.uni.lu/"><img class="header-logo_unilu" src="../img/uni_logo_transparent_notext_white.svg"></img>
      </a>
    </div>
  <div class="inner_vertical_align_middle">
    <!---<h1 class="white" id="headerTitle">Software Engineering Project</h1>-->
  </div>
</div>
  <div class="menu" id="menu">
    <a href="/" class="menuItem"> Home</a>
    <a href="/quiz.php?category=basic" class="menuItem"><span class="orange">U</span>ni</a>
    <a href="/quiz.php?category=science" class="menuItem"><span class="orange">S</span>cience</a>
    <a href="/quiz.php?category=culture" class="menuItem"><span class="orange">C</span>ulture</a>
    <a href="/quiz.php?category=education" class="menuItem"><span class="orange">E</span>ducation</a>
            <a href="quizinfo.php" class="menuItem"> Quiz Info</a>
  </div>
  <div class="menuspace"></div>
