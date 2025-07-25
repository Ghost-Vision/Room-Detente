<?php
$nom=$_POST["name"];
$prenom=$_POST["firstname"]; 
$email=$_POST["email"];
$message= $_POST["message"];
$date=$_POST["date"];

$date = date("Y-m-d H:i:s", time());

$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO comments (name, firstname, email, message, date)
        VALUES (?, ?, ?, ?, '$date')";
 

$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("ssss",
                $_POST["name"],
                $_POST["firstname"],
                $_POST["email"],
                $_POST["message"]);

if ($stmt->execute()) {

  $mail = require __DIR__ ."/mailer.php";

  $mail->setFrom("noreply@example.com");
  $mail->addAddress($_POST["email"],$nom);
  $mail->Subject = "Formulaire de Contact/Recommandation";
  $mail->Body = $message;

  try 
  {
    
    $mail->send();
  } 
  catch(Exception $e) 
  {
      echo "E-mail could not be sent. Mailer error : {$mail->ErrorInfo}";
      exit;
  }

  header("Location: message-sent.php");
  exit;

} else {
  
  if ($mysqli->errno === 1062) {
      die("Email already sent");
  } else {
      die($mysqli->error . " " . $mysqli->errno);
  }
}


