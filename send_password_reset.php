<?php
$email = $_POST["email"];

$token = bin2hex(random_bytes(16));
$token_hash = hash("sha256", $token);
$expiry = date("Y-m-d H:i:s", time() + 60 * 30);

$mysqli = require __DIR__ ."/database.php";
$sql = "UPDATE users
        SET reset_token_hash = ?,
            reset_token_expires_at = ?
        WHERE email = ?";

$stmt = $mysqli -> prepare($sql);
$stmt->bind_param("sss", $token_hash, $expiry, $email);
$stmt->execute();

if($mysqli->affected_rows)
{
    $mail = require __DIR__ ."/mailer.php";

    $mail->setFrom("noreply@roomdetente.com", "Room Detente");
    $mail->addAddress($email);
    $mail->Subject = "Password Reset";
    $mail->Body = <<<END

    Click <a href="http://localhost/website_roomdetente/roomdetente/reset_password.php?token=$token">here</a>
    to reset your password.

    END;

    try 
    {
        $mail->send();
    } 
    catch(Exception $e) 
    {
        echo "Message could not be sent. Mailer error : {$mail->ErrorInfo}";
    }
}

echo " Un e-mail vient de vous être envoyé, verifié votre boite de reception";
