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

    <title>Room Détente - Contact</title>

    <link rel="icon" href="assets/images/Logo_RoomDetente_Rond.png">
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>
    <!-- Header -->
    <?php require_once __DIR__."/header.php" ?>

    <main>
        <section class="contact">
            <h2 class="heading">Contactez Nous</h2>
            <div class="main-contact">
                <div class="contact-adress">
                    <div class="contact-text">
                        <h3>Adresse</h3>
                        <p>Avenue Edouard Herriot<br>
                            94260 Fresnes<br>
                            06 62 5451548
                        </p>
                    </div> 
                    <div class="contact-text">
                        Merci de me contacter pour plus<br>de renseignements
                    </div> 
                </div>
                <div>
                    <gmp-map class="googlemap" center="48.87435531616211,2.4813594818115234" zoom="14" map-id="DEMO_MAP_ID">
                        <gmp-advanced-marker position="48.87435531616211,2.4813594818115234" title="My location"></gmp-advanced-marker>
                    </gmp-map>
                    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCm17Yf7CedFPZcRbHZjifNmNcL5J_kYkE&callback=console.debug&libraries=maps,marker&v=beta"></script> 
                </div>
            </div>
        </section>
        <section class="form-global" id="message">
            <h2 class="title-shadow">Laissez-nous un message</h2>
            <div class="form-text">
                Vous souhaitez nous poser une question,<br>
                    nous faire un feedback, ou tout simplement nous contacter ?
            </div>
            <form class="form-contact" method="post" action="send-contact-form.php">
                <div class="form-nom">
                    <div class="form-c-item">
                        <label for="nom">Nom</label>
                        <input type="text" name="name" id="name" placeholder="Nom" required/>
                    </div>
                    <div class="form-c-item">
                        <label for="firstname">Prénom</label>
                        <input type="text" name="firstname" id="firstname" placeholder="Prénom" required/>
                    </div>
                </div>
                <div class="form-c-item">
                    <label for="email">E-mail</label>
                    <input type="e-mail" name="email" id="email" placeholder="E-mail" required/>
                </div>
                <div class="form-c-item">
                    <label for="message">Message</label>
                    <input type="text" name="subject" id="subject" placeholder="Subject">
                    <textarea name="message" id="message" placeholder="Votre commentaire" required></textarea>
                </div>

                <button type="submit" class="button">Envoyer</button>
            </form>
        </section>
    </main>
        
    <!-- Footer -->
    <?php require_once __DIR__."/footer.html" ?>
    
</body>
</html>