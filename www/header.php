
<link rel="stylesheet" href="stylesheet.css">
<script type="text/javascript" src="Javascript.js"></script>
<script>
window.onload= function (){
  var menu = document.getElementById("menu");
  menu.style.top=getHeightByTagName("header")+"px";
  var wrapper = document.getElementsByClassName("wrapper")[0];
  wrapper.style.top = getHeightByTagName("header")+getHeightById("menu")+"px";
};
window.onresize = function(){dispatchEvent(new Event("load"))};
</script>
<div class="header">
  <div class="inner_vertical_align_middle">
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
  </div>
  <div class="inner_vertical_align_middle">
    <h1 class="white big" id="headerTitle">SoftwareEngineeringProject</h1>
  </div>
</div>
  <div class="menu" id="menu">
    <a href="/" onclick="alert('MenuItem1')" class="menuItem"> MenuItem1</a>
      <a href="/" onclick="alert('MenuItem2')" class="menuItem"> MenuItem2</a>
        <a href="/" onclick="alert('MenuItem3')" class="menuItem"> MenuItem3</a>
          <a href="/" onclick="alert('MenuItem4')" class="menuItem"> MenuItem4</a>
            <a href="testQuiz.php" class="menuItem"> testQuiz</a>
    <!--Menu content-->
  </div>
