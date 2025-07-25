<?php
/* session_start();

if (isset($_SESSION["user_id"]))
{
    $mysqli = require __DIR__ . "/database.php";
    $sql = "SELECT * FROM users
            WHERE id={$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
}*/
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Room Détente - A Propos</title>

    <link rel="icon" href="assets/images/Logo_RoomDetente_Rond.png">
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>
    <!-- Header -->
    <?php require_once __DIR__."/header.php" ?>
    
    <main>
        <section class="about-s1">
            <h2 class="heading title-shadow">A Propos</h2>
            <div class="a-propos_main background-light border">
                <div class="a-propos-text">
                    <h3>Qui suis-je ?</h3>
                    <p>
                        Je m'appelle Julie Mels,
                        <br>J'ai acquis mes compétences ainsi que ma certification à l'école Temana en tant que
                        <br>Practicienne Massage Bien-être.
                    </p>
                    <p>
                        Depuis le jour où j'ai su que j'adorais prendre soin des gens, leur procurer cette sensation de bien-être après un bon massage, me rendais également très heureuse. Et après plusieurs réflexions bien menées, j'ai fait le choix de m'écouter et de me lancer dans ce projet qui me tenait à cœur de créer mon propre salon de massage et de bien-être. C'est ainsi que je vous souhaite la bienvenue chez "Room détente".  
                    </p>
                </div>
                <p>
                    Vous cherchez une masseuse à l’écoute, bienveillante et passionnée ? Prenez rendez-vous chez Room Détente ! Julie est quelqu’un de très sensible, douce et attentionnée, avec de la magie au bout des doigts. Bienveillante, elle vous accueille sans jugements. Vous pouvez consulter les avis pour vous en assurer.
                </p>
                <p>
                    Pour un massage réussi, fiez-vous à son écoute, aussi bien quand vous lui exprimez vos attentes que lorsque votre corps prend la parole (tensions, spasmes, frissons, larmes, ...). Julie vous écoute également à travers ses mains. Grâce à son savoir-faire et à sa grande sensibilité, profitez d'un moment de détente et de bien-être suspendu dans le temps, un véritable voyage qui saura perdurer au-delà de la séance. Un réel moment pour se reconnecter à soi.
                </p>
            </div>
        </section>
        <section class="about-contact">
            <h2 class="heading">Laissez-nous un message</h2>
            <div class="about-contact-container">
                <div class="form-text">
                    Vous souhaitez nous poser une question,<br>
                    nous faire un feedback, ou tout simplement nous contacter ?
                </div>
                <button class="button button-center" type="button" onclick="location.href='contact.php#message'">Ecrire un message</button>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <?php require_once __DIR__."/footer.html" ?>
</body>
</html>