<?php
error_reporting(0);

$error = false;
$firstname=$_GET['firstname'];
$lastname=$_GET['lastname'];
$email=$_GET['email'];
$type=$_GET['type'];
$subject=$_GET['subject'];
if($type=="" || $subject==""){
  $error=true;
}

  $host = 'mysql';
    $user = 'feedback';
    $pass = 'feedbackPassSEP2022';
    $dbname = 'quiz';
    $conn = new mysqli($host, $user, $pass, $dbname);

    if ($conn->connect_error) {
        $error=true;
    }

    if(!$error){
        $sql = "INSERT INTO `feedback` (`id`, `firstname`, `lastname`, `e-mail`, `type`, `comment`) VALUES (NULL,'" . $firstname . "', '" . $lastname . "', '" . $email . "', '" . $type . "', '" . $subject . "');";
        $result = $conn->query($sql);
    }
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}


.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  display: grid;
}
h1{
  margin: auto;
  text-align: center;
}
img{
    height: 20vh;
    margin: auto;
    margin-top: 5vh;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  width: 25vw;
  margin: auto;
  margin-top: 10vh;
}

input[type=submit]:hover {
  background-color: #45a049;
}
</style>
</head>
<body>

<h3>Feedback</h3>

<div class="container">
<h1><?php
if($error){
  if($type=="" || $subject==""){
  echo "No type or subject entered.";
} else{
  echo "Could not connect to the database.";
  }
} else{
  echo "Feedback successfully sent<br/>Thank you!";
}
?></h1>
<img src=<?php
if($error){
  if($type=="" || $subject==""){
  echo '"img/exclamationmark.png"</img>  <input type="submit" onclick="window.history.back();" value="Back">';
} else{
  echo '"img/cross.png"</img>  <input type="submit" onclick="window.location.reload();" value="Retry">';
  }
} else{
  echo '"img/checkmark.png"</img> <input type="submit" onclick="window.close();" value="Close">';
}
?>


</div>

</body>
</html>
