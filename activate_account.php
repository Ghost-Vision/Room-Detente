<?php 

$token = $_GET["token"];
$token_hash = hash("sha256", $token);

$mysqli = require __DIR__ ."/database.php";
$sql = "SELECT * FROM users
        WHERE account_activation_hash = ?";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $token_hash);
$stmt->execute();

$result = $stmt->get_result(); 

$user = $result->fetch_assoc();

if($user === null)
{
    die("token not found.");
}

$sql = "UPDATE users
        SET account_activation_hash = NULL
        WHERE id = ?";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $user["id"]);
$stmt->execute();


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Détente - Compte activé</title>

    <link rel="icon" href="assets/images/Logo_RoomDetente_Rond.png">
    <link rel="stylesheet" href="styles/main.css">
    
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
    <script src="js/validation_reset.js" defer></script>
</head>
<body>
    <!--Header-->
    <?php require_once __DIR__ . "/header.php"?>

    <main class="signup_s-main">
        <section class="background-light border">
        <h2 class="signup-title">Félication</h2>
        <div>
            <img class="signup-s-img" src="assets/images/checked_line.png" alt="">
        </div>
        <div>
            <p>Votre compte à bien été activé.</p>
            <p>
                Vous pouvez maintenant vous
                <a href="login.php">connecter</a>.
            </p>
            
        </div>
        </section>
    </main>

    <!--Footer-->
    <?php require_once __DIR__ . "/footer.html"?>
</body>
</html>
