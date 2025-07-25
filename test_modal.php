<?php
session_start();

if (isset($_SESSION["user_id"]))
{
    $mysqli = require __DIR__ . "/database.php";
    $sql = "SELECT * FROM users
            WHERE id={$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Room Détente - Accueil</title>

    <link rel="icon" href="assets/images/Logo_RoomDetente_Rond.png">
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <script src="js/modal.js" defer></script>
</head>

<body>
    <!-- Header -->
    <?php require __DIR__."/header.php" ?>

    <main>
        <section class="hero">
            <div class="hero-text">
                <h1>Room Détente</h1>
                <h3>N’hésitez pas à prendre une pause,<br>
                Offrez vous ce tendre moment de plaisir.</h3>
            </div>
            <div class="hero-button">
                <a href="" class="button">Réserver</a>
                <a href="" class="button">Offrir</a>
            </div> 
        </section>

        <section>
            <!-- Bouton d’ouverture -->
            <button data-modal-target="#modal1" class="button">Ouvrir Modal 1</button>
            <button class="button" data-modal-target="#modal2">Ouvrir Modal 2</button>
            <button class="button" data-modal-target="#modal3">Ouvrir Modal 3</button>

            <!-- Overlay (facultatif) -->
            <div class="overlay" id="overlay"></div>

            <!-- Modal 01-->
            <div class="modal" id="modal1">
                <div class="modal-header">
                    <h2>Titre de la modal 1</h2>
                    <button data-close-button class="close-btn">×</button>
                </div>
                <div class="modal-body">
                    <h3 style="color: white;">Je suis bien dans la première modal</h5>
                </div>
            </div>

            <!-- Modal 02-->
            <div class="modal" id="modal2">
                <div class="modal-header">
                    <h2>Titre de la modal 1</h2>
                    <button data-close-button class="close-btn">×</button>
                </div>
                <div class="modal-body">
                    <h3 style="color: white;">Je suis bien dans la deuxième modal</h5>
                </div>
            </div>

            <!-- Modal 03-->
            <div class="modal" id="modal3">
                <div class="modal-header">
                    <h2>Titre de la modal 1</h2>
                    <button data-close-button class="close-btn">×</button>
                </div>
                <div class="modal-body">
                    <h3 style="color: white;">Je suis bien dans la troisième modal</h5>
                </div>
            </div>

        </section>
    
       
    </main>

    <!-- Footer -->
    <?php require_once __DIR__."/footer.html" ?>
</body>
</html>