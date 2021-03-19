<?php

function console_log($output, $with_script_tags = true) {
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) .
    ');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}

  $host = 'mysql';
  $user = 'quiz';
  $pass = 'SEP2022Quiz';
  $dbname = 'quiz';
  $error = false;
  $conn = @new mysqli($host, $user, $pass, $dbname);

  if ($conn->connect_error) {
    header("HTTP/1.0 404 Not Found");
    die();
  }

  $sql = "SELECT COUNT(*) FROM questions";
  $questionCount = $conn->query($sql)->fetch_assoc()["COUNT(*)"];
  console_log("questionCount: " . $questionCount);
  $questinId=rand(1,$questionCount);
  $sql = "SELECT * FROM questions WHERE id=$questinId";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $correctAnswer=$row["correctAnswer"];
  $correctAnswerHash=hash("sha256",$correctAnswer);
  console_log($correctAnswerHash);
  $answers = array($correctAnswer,$row["wrongAnswer1"],$row["wrongAnswer2"],$row["wrongAnswer3"]);
  $answersShuffled=array('','','','');
  for($i=0;$i<4;$i++){
    $randomIntex=rand(0,3);
    if($answersShuffled[$randomIntex] == ''){
      $answersShuffled[$randomIntex] = $answers[$i];
    }else{
      $i--;
    }
  }
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <!--<meta http-equiv="refresh" content="5;URL='/'">!-->
    <link rel="stylesheet" href="stylesheet.css">
    <script src="js/sha256.js">
        </script>

            <script>
    function checkAnswer(element, answer){
      var hashedAnswer = sha256(answer);
      //alert(hashedAnswer+"=?"+"<?php echo $correctAnswerHash?>");
      var result;
      var elements= document.getElementsByClassName("answer");
      //revert color change from previous answer
      if(hashedAnswer=="<?php echo $correctAnswerHash?>"){
        element.style.backgroundColor ="green";
        result = "Correct";
      }else{
        element.style.backgroundColor ="red";
        result= "Wrong";
      }
      document.getElementById("answerMessage").innerHTML= "<h2>"+result+"</h2>";
    }

    </script>
  </head>

  <body>
    <?php include "./header.php" ?>



      <div class="main">
        <h1><?php echo $row["question"]; ?></h1>
          <?php
if(!$error){
  if ($result->num_rows > 0) {
  // output data of each row
  echo "<form class='quizAnswers' id='quizForm'>";
  for($i=0;$i<4;$i++) {
    echo "<input class='answer" . ($i+1) . "' type='submit' onclick='checkAnswer(this,\"$answersShuffled[$i]\");' value='" . $answersShuffled[$i] . " '/>";
  }
  echo "</form>";
}}?>
<div id="answerMessage">
</div>

        </div>
      <footer>

      </footer>

  </body>
  <script>

  function eventFire(el, etype){
  if (el.fireEvent) {
    el.fireEvent('on' + etype);
  } else {
    var evObj = document.createEvent('Events');
    evObj.initEvent(etype, true, false);
    el.dispatchEvent(evObj);
  }
}


  function submitListener(event){
    event.preventDefault();
    eventFire(event.target, 'click');
    }
      const form = document.getElementById("quizForm");
      form.addEventListener('submit', submitListener);
  </script>

  </html>
