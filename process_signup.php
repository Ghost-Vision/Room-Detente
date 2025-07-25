<?php

if (empty($_POST["name"])) {
    die("Name is required");
}
if (empty($_POST["firstname"]))
{
    die("Last Name is required");
}

if ( ! preg_match("/[0-9]/i", $_POST["phone"])) {
    die("Number Phone must contain only number");
}

if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required");
}

if (strlen($_POST["password"]) < 8) {
    die("Password must be at least 8 characters");
}

if ( ! preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
}

if ( ! preg_match("/[A-Z]/i", $_POST["password"])) {
    die("Password must contain at least one majuscule");
}

if ( ! preg_match("/[0-9]/i", $_POST["password"])) {
    die("Password must contain at least one number");
}

if ($_POST["password"] !== $_POST["confirm_password"]) {
    die("Passwords must match");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
$activation_token = bin2hex(random_bytes(16));
$activation_token_hash = hash("sha256", $activation_token);

$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO users (name, firstname, date_of_birth, phone, email, account_activation_hash, password_hash)
        VALUES (?, ?, ?, ?, ?, ?, ?)";
        
$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("sssssss",
                  $_POST["name"],
                  $_POST["firstname"],
                  $_POST["date-of-birth"],
                  $_POST["phone"],
                  $_POST["email"],
                  $activation_token_hash,       
                  $password_hash);
                  
if ($stmt->execute()) {

    $mail = require __DIR__ ."/mailer.php";

    $mail->setFrom("noreply@example.com");
    $mail->addAddress($_POST["email"]);
    $mail->Subject = "Account Activation";
    $mail->Body = <<<END

    Click <a href="http://localhost/roomdetente/activate_account.php?token=$activation_token">here</a>
    to activate your account.

    END;

    try 
    {
        $mail->send();
    } 
    catch(Exception $e) 
    {
        echo "Message could not be sent. Mailer error : {$mail->ErrorInfo}";
        exit;
    }

    header("Location: signup_success.php");
    exit;

} else {
    
    if ($mysqli->errno === 1062) {
        die("Email already taken");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}