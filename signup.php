<?php 
    require('empty.php');
    session_start();

    if(var_dump(empty($_SESSION)) === true)
    {
        print_r("Array {Pas d'utilisateur de session}");
    }
    else
    {
        print_r($_SESSION);
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Room Détente - Sign In</title>

    <link rel="icon" href="assets/images/Logo_RoomDetente_Rond.png">
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
    <script src="js/validation.js" defer></script>
</head>

<body>
    <!-- Header -->
    <?php require_once __DIR__."/header.php" ?>

    <main class="signup-main">
        <h2 class="signup-title">Creation de compte</h2>
        <form class="form-signup" method="post" action="process_signup.php" id="signup" novalidate>
            <div class="signup-column">
                <section>
                    <div class="form-item">
                        <label for="id">Nom :</label>
                        <input type="text" name="name" id="name">
                    </div>
                    <div class="form-item">
                        <label for="id">Prénom :</label>
                        <input type="text" name="firstname" id="firstname">
                    </div>  
                    <div class="form-item">
                        <label for="date">Date de naissance :</label>
                        <input type="date" name="date" id="date">
                        <p><small>Ex : 26/04/1987</small></p>
                    </div>
                    <div class="form-item">
                        <label for="id">Téléphone :</label>
                        <input type="text" name="phone" id="phone" pattern="[\d]{9}" maxlength="10">
                    </div>
                </section>
                <section>
                    <div class="form-item">
                        <label for="email">E-mail :</label>
                        <input type="email" name="email" id="email">
                    </div>
                    <div class="form-item">
                        <label for="password">Mot de Passe :</label>
                        <input type="password" name="password" id="password">
                    </div>
                    <div class="form-item">
                        <label for="password">Mot de Passe :</label>
                        <input type="password" name="confirm_password" id="confirm_password">
                    </div>
                </section>
            </div>
            
            <button type="submit" class="button">Se connecter</button>
        </form>
        <div class="connect-with">
            <p>Se connecter avec :</p>
            <div class="icon-connect">
                <a href="https://accounts.google.com/o/oauth2/v2/auth?
                    scope=email
                    access_type=online&
                    redirect_uri=<?php urlencode("http://localhost/roomdetente/dashboard.php")?>&
                    response_type=code&
                    client_id=<?= GOOGLE_ID?>">
                    <img src="assets/images/Google.png" alt="icone gmail">
                </a>
                
                <img src="assets/images/Hotmail.png" alt="icone Microsoft Hotmail">
                <img src="assets/images/Apple logo.png" alt="logo apple">
            </div>
        </div>
    </main>
    
    <!-- Footer -->
    <?php require_once __DIR__."/footer.html" ?>
</body>
</html>