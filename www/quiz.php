<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>Quiz 1</title>

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link href="./combined.css" rel="stylesheet">
  </head>

  <body>
  <?php include "./header.php" ?>
<div class="content">
  <div class="container">
    <div id="quiz">
      <h1><span>Q</span>uiz <i class="far fa-question-circle"></i></h1>

      <h2 id="question" class="question"></h2>

      <h3 id="score"></h3>

      <div class="choices">
        <button id="guess0" class="btn answer1Div">
          <p id="choice0"></p>
        </button>

        <button id="guess1" class="btn answer2Div">
          <p id="choice1"></p>
        </button>
      </br>
        <button id="guess2" class="btn answer3Div">
          <p id="choice2"></p>
        </button>

        <button id="guess3" class="btn answer4Div">
          <p id="choice3"></p>
        </button>
      </div>

      <p id="progress"></p>

    </div>
  </div>
</div>


  <?php
  function console_log($output, $with_script_tags = true) {
      $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) .
  ');';
      if ($with_script_tags) {
          $js_code = '<script>' . $js_code . '</script>';
      }
      echo $js_code;
  }
  ?>
  <?php
    $host = 'mysql';
      $user = 'quiz';
      $pass = 'SEP2022Quiz';
      $dbname = 'quiz';
      $error = false;
      $conn = new mysqli($host, $user, $pass, $dbname);

      if ($conn->connect_error) {
          console_log("Connection failed: " . $conn->connect_error);
          $error=true;
      }else{
          console_log("Connected to MySQL successfully!");
      }
      $category = ucfirst(htmlspecialchars($_GET['category']));
      console_log("Category=" . $category);

      $questions= array();
      if(!$error){
          $sql = ('SELECT * FROM questions WHERE category="' . $category . '"');
          $result = $conn->query($sql);
        if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
          //console_log($row);
          $questionArray = array(utf8_encode($row['question']),utf8_encode($row['correctAnswer']),utf8_encode($row['wrongAnswer1']),utf8_encode($row['wrongAnswer2']),utf8_encode($row['wrongAnswer3']));
          array_push($questions,$questionArray);
        }
        //console_log($questions);
      }
      }
  ?>

  <script type="text/javascript">
    var questions = <?php echo json_encode($questions)?>;
  </script>
</body>



<?php

$conn->close();
?>

  <script src="./js/script.js" type="text/javascript" ></script>
</html>
