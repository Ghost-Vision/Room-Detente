<?php

$token = $_GET["token"];
$token_hash = hash("sha256", $token);

$mysqli = require __DIR__ ."/database.php";
$sql = "SELECT * FROM users
        WHERE reset_token_hash = ?";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $token_hash);
$stmt->execute();

$result = $stmt->get_result(); 

$user = $result->fetch_assoc();

if($user === null)
{
    die("token not found.");
}

if(strtotime($user["reset_token_expires_at"]) <= time())
{
    die("token has expired");
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>

    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
    <script src="js/validation_reset.js" defer></script>
</head>
<body>
    <!-- Header -->
    <?php require_once __DIR__ . "/header.php"?>

    <main class="main-login">
        <div class="form-case">
            <h4>Réinitialisation de mot de passe</h4>
            <form class="form-login" action="process_reset_password.php" method="post" id="reset" novalidate>
                <input type="hidden" name="token" value="<?=htmlspecialchars($token)?>">
                <div class="form-item">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" id="password">
                </div>
                <div class="form-item">
                    <label for="confirm_password">Répété le mot de passe</label>
                    <input type="password" name="confirm_password" id="confirm_password">
                </div>
                <button class="button" type="submit">Confirmer</button>
            </form>
        </div>
    </main>

    <!-- Footer -->
    <?php require_once __DIR__ . "/footer.html"?>
</body>
</html>
