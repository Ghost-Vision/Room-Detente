<?php
session_start();

// if(var_dump(empty($_SESSION)) === true)
// {
//     print_r("Array {Pas d'utilisateur de session}");
// }
// else
// {
//     print_r($_SESSION);
// }

$isInvalid = false;
if ($_SERVER['REQUEST_METHOD'] === "POST") 
{
    $mysqli = require __DIR__."/database.php";

    $sql = sprintf("SELECT * FROM users
                    WHERE email = '%s'",
                    $mysqli->real_escape_string($_POST["email"]));

    $result = $mysqli->query($sql);


    $users = $result->fetch_assoc();
    $admin = "admin@roomdetente.com";

    
    if($_POST["email"] === $admin)
    {
        if(password_verify($_POST["password"], $users["password_hash"]))
        {
            session_start();
            session_regenerate_id();
            $_SESSION["user_id"] = $users["id"];
            header("Location: dashboard_admin.php");
            exit;
        }   
    }
    else if ($users)
    {
        if(password_verify($_POST["password"], $users["password_hash"]))
        {
            session_start();
            session_regenerate_id();
            $_SESSION["user_id"] = $users["id"];
            header("Location: dashboard_client.php");
            exit;
        }
    }
    else if($user)
    {
        if($_POST["password"] == "")
        {
            {
                session_start();
                session_regenerate_id();
                $_SESSION["user_id"] = $users["id"];
                header("Location: dashboard_client.php");
                exit;
            }
        }
    }

    $isInvalid = true;
}

require("empty.php");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Détente - Login</title>

    <link rel="icon" href="assets/images/Logo_RoomDetente_Rond.png">
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>
    <!-- Header -->
    <?php require_once __DIR__ . "/header.php"?>

    <main class="main-login">
        <h2 class="login-title">Se connecter</h2>
        <img src="assets/images/AccountProfil.png" alt="Photo de profil de l'utilisateur">

        <?php if ($isInvalid): ?>
            <em>Identifiant non valide</em>
        <?php endif; ?>

        <form method="post" class="form-login">
            <div class="form-item">
                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" 
                    value="<?= htmlspecialchars($_POST["email"] ?? " ")?>">
            </div>
            <div class="form-item">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password">
            </div>
            <button class="button">Se connecter</button>
        </form>

        <!-- <div class="no-compte">
            <a href="forgot_password.php">Mot de passe oublié ?</a>
            <p>
                Pas encore de compte ?
                <a href="signup.php">S'inscrire</a>
                . 
            
        </div> -->

        <!-- <div class="connect-with">
            <p>Se connecter avec :</p>
            <div class="icon-connect">
                <a href="https://accounts.google.com/o/oauth2/v2/auth?scope=email&access_type=online&redirect_uri=<?= urlencode("http://localhost/roomdetente/dashboard.php") ?>&response_type=code&client_id=<?= GOOGLE_ID?>">
                    <img src="assets/images/Google.png" alt="icone Google pour connexion">
                </a>
                <a href="">
                    <img src="assets/images/Hotmail.png" alt="logo Facebook pour connexion">
                </a>
                <a href="">
                    <img src="assets/images/Apple logo.png" alt="logo Apple pour connexion">
                </a>
                
            </div>
        </div> -->
    </main>

    <!-- Footer -->
    <?php require_once __DIR__."/footer.html" ?>

</body>
</html>