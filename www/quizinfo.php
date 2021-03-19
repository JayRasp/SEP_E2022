<!DOCTYPE html>
<html lang="en">
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

  <head>
    <!--<meta http-equiv="refresh" content="5;URL='/'">!-->
    <link rel="stylesheet" href="stylesheet.css">
  </head>

  <body>
    <?php include "./header.php" ?>
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

        if(!$error){
            $sql = "SELECT COUNT(*) FROM questions";
            $result = $conn->query($sql);
            console_log($result);
        }
    ?>
<div class="main">
  <h1>Quiz questions available: <?php echo $result->fetch_assoc()["COUNT(*)"]; ?></h1>
<?php
if(!$error){
    $sql = "SELECT question FROM questions";
    $result = $conn->query($sql);
  if ($result->num_rows > 0) {
  // output data of each row
  echo "<ol>";
  while($row = $result->fetch_assoc()) {
    echo "<li>" . $row["question"]. "</li>";
  }
  echo "</ol>";
} else {
  echo "0 results";
}}?>
</br>
</br>
  <form class="alignCenter" action="/testQuiz.php">
    <input class="button" type="submit" value="Test">
  </form>
</div>
        <footer>

        </footer>

  </body>
  <?php

$conn->close();
?>

</html>
