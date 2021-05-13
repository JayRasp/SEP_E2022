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
    $sql = "SELECT * FROM questions";
    $result = $conn->query($sql);
  if ($result->num_rows > 0) {
  // output data of each row
  echo "<table>";
  echo "<th>ID</th><th>Question</th><th>correctAnswer</th><th>wrongAnswer1</th><th>wrongAnswer2</th><th>wrongAnswer3</th><th>Category</th>";
  while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row["id"]. "</td>";
      echo "<td>" . utf8_encode($row["question"]). "</td>";
        echo "<td>" . utf8_encode($row["correctAnswer"]). "</td>";
          echo "<td>" . utf8_encode($row["wrongAnswer1"]). "</td>";
            echo "<td>" . utf8_encode($row["wrongAnswer2"]). "</td>";
              echo "<td>" . utf8_encode($row["wrongAnswer3"]). "</td>";
                echo "<td><a href='/quiz.php?category=".utf8_encode($row["category"])."'>" . utf8_encode($row["category"]). "</a></td>";
                  echo "</tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}}?>
</br>
</br>
<div class="alignCenter">
  <a class="button" href="quiz.php?category=all">Test</a>
</div>
</div>
        <footer>

        </footer>

  </body>
  <?php

$conn->close();
?>

</html>
