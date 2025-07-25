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
                <a href="contact.php" class="button">Réserver</a>
                <a href="contact.php    " class="button">Offrir</a>
            </div> 
        </section>
    
        <section class="a-propos">
            <h2 class="title-shadow heading">A Propos</h2>
            <div class="a-propos-container">
                <div class="a-propos-text">
                    <p>
                        
                    </p>
                    <p>
                        Vous cherchez une masseuse à l’écoute, bienveillante et passionnée ? Prenez rendez-vous chez Room Détente ! Julie est quelqu’un de très sensible, douce et attentionnée, avec de la magie au bout des doigts. Bienveillante, elle vous accueille sans jugements. Vous pouvez consulter les avis pour vous en assurer.
                    </p>
                    <p>
                        Pour un massage réussi, fiez-vous à son écoute, aussi bien quand vous lui exprimez vos attentes que lorsque votre corps prend la parole (tensions, spasmes, frissons, larmes, ...). Julie vous écoute également à travers ses mains. Grâce à son savoir-faire et à sa grande sensibilité, profitez d'un moment de détente et de bien-être suspendu dans le temps, un véritable voyage qui saura perdurer au-delà de la séance. Un réel moment pour se reconnecter à soi.
                    </p>
                    <p>
                        Julie parle également l'anglais et l'espagnol ce qui permet aux clients étrangers de pouvoir échanger sans problème et de profiter au mieux de leur séance !
                    </p>
                        

                    
                </div>
                <div class="style-honeycomb">
                    <img src="assets/images/PhotoProfil_FP.png" alt="">
                    <img src="assets/images/Polygon_Photo2.png" alt="">
                    <img src="assets/images/Polygon_Photo3.png" alt="">
                </div>
            </div>
        </section>

        <section class="services">
            <h2 class="heading">Nos Services</h2>
            <div class="services__container">
                <div class="services__container_items">
                    <img src="assets/images/Rectangle_Cal.png" alt="">
                    <h3 class="services__container_text">Californien</h3>
                </div>
                <div class="services__container_items">
                    <img src="assets/images/Rectangle_MassageBalinais.png" alt="">
                    <h3 class="services__container_text">Balinais</h3>
                </div>
                <div class="services__container_items">
                    <img src="assets/images/Rectangle_Thai.png" alt="">
                    <h3 class="services__container_text">Thai à l'huile</h3>
                </div>
                <div class="services__container_items">
                    <img src="assets/images/Rectangle_LomiLomi.png" alt="">
                    <h3 class="services__container_text">Lomi Lomi</h3>
                </div>
            </div>
            
            <button class="button" onclick="location.href='services.php'" type="button">Je choisis</button>
        </section>

        <section id="formules" class="nos-formules">
            <h2 class="heading">Nos Formules</h2>
            <div class="nf__main">
                <div class="nf__main_item">
                    <div class="nf__cell">
                        <div class="nf__cell_shape">
                            <div class="nf__cell_content">
                                <p>5 séances</p>
                                <h3>375€</h3>
                                <p>Valable 3 mois</p>   
                            </div>
                            <p><strong><u>Ayurvédique</u></strong></p>
                        </div>
                    </div>
                    <button class="button" onclick="location.href=''" type="button">Je réserve</button>
                </div>
                <div class="nf__main_item">
                    <div class="nf__cell">
                        <div class="nf__cell_shape">
                            <div class="nf__cell_content">
                                <p>5 séances</p>
                                <h3>275€</h3>
                                <p>Valable 3 mois</p>
                            </div>
                            <p><strong><u>Shirotchampi</u></strong></p>
                        </div>
                    </div>
                    <button class="button" onclick="location.href=''" type="button">Je réserve</button>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <?php require_once __DIR__."/footer.html" ?>
</body>
</html>