<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Détente - Forgot Password</title>

    <link rel="icon" href="assets/images/Logo_RoomDetente_Rond.png">
    <link rel="stylesheet" href="styles/main.css">
</head>
<body>

    <!-- Header -->
    <?php require_once __DIR__ . "/header.php"?>

    <main class="main-login">

        <form class="form-case" action="send_password_reset.php " method="post" class="form-login">
            <h4>Réinitialisation de Mot de passe</h4>
            <div class="form-item">
                <label for="email">E-mail :</label>
                <input type="email" name="email" id="email" 
                    value="<?= htmlspecialchars($_POST["email"] ?? " ")?>">
            </div>
            <button class="button">Envoyer</button>
        </form>
    </main>

    <!-- Footer -->
    <?php require_once __DIR__ . "/footer.html"?>
</body>
</html>