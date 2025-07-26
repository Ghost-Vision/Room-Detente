<?php
    session_start();

    $mysqli = require __DIR__ ."/database.php";

    $sql = "INSERT INTO comments (name, lastname, email, message)
        VALUES (?, ?, ?, ?)";
    
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Détente - Administrateur</title>

    <link rel="icon" href="assets/images/Logo_RoomDetente_Rond.png">
    <link rel="stylesheet" href="styles/main.css">

    <script src="js/hide_section.js" defer></script>
</head>

<body class="dashboard-page">
    <!-- Header -->
    <header>
        <nav class="appBar-dashboard">
            <a href="index.php">
            <img class="appBar__icon" src="assets/images/Logo_RoomDetente_White_LR.png" alt="Logo Room Détente" >
            </a>
            <h2 class="appBar__nav">Mon Espace administrateur</h2>
            <a class="appBar-dashboard__login" href="login.php">
                <img src="assets/images/login3.png" alt="Logo de Profil">
                Logout
            </a>
        </nav>
    </header>

    <main>
        <section class="dashboard-title">
            <h2>Bonjour Julie</h2>
        </section>
        <section class="dashboard-grid">
            <div class="dashboard-selection">
                <h3 style="padding: 1rem; text-align: center">Dashboard</h3>
                <button class="dashboard-button" id="buttonInfo">Mes Infos</button>
                <button class="dashboard-button" id="buttonClients">Mes Clients</button>
                <button class="dashboard-button" id="buttonCompta">Ma comptabilité</button>
                <button class="dashboard-button" id="buttonMsg">Mes Messages</button>
                <button class="dashboard-button" id="buttonComs">Avis & Commentaire</button>
            </div>
            <div>
                <div class="dashboard-info" id="dInfo" style="display:none;">
                    <h3>Mes Infos</h3>
                </div>
                <div class="dashboard-clients" id="dClients" style="display:none;">
                    <h3>Mes Clients</h3>
                </div>
                <div class="dashboard-compta" id="dCompta" style="display:none;">
                    <h3>Ma comptabilité</h3>
                </div>
                <div class="dashboard-message" id="dMsg">
                    <h3>Mes Messages</h3>
                    <div style="display:flex; align-items: center; justify-content:center;">
                        <form action="send-sms.php" method="post" class="form-message">
                            <div class="form-c-item">
                                <label for="numero">Numéro</label>
                                <input type="text" name="numero" id="numero">
                            </div>
                            <div class="form-message-item" style="padding:2rem 0;">
                                <label for="message">Messages</label>
                                <textarea type="text" name="message" id="message"></textarea>
                            </div>
                            <fieldset>
                                <legend>Provider</legend>
                                <label>
                                    <input type="radio" name="provider" value="infobip" checked> Infobip 
                                </label>
                                <label>
                                    <input type="radio" name="provider" value="twilio"> Twilio 
                                </label>
                            </fieldset>
                        </form>
                    </div>
                </div>
                <div class="dashboard-avis-com" id="dComs" style="display:none;">
                    <h3>Avis & Commentaires</h3>
                    <div class="dashboard-avis-com-content">
                        <p class="dashboard-avis-com-id"><em>Nom</em> - </p>
                        <p class="dashboard-avis-com-id"><em>Prenom</em> - </p>
                        <p class="dashboard-avis-com-id"><em>test@exemple.com    </em></>
                        <p style="padding:.5rem 0;">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Harum tenetur, quod inventore, 
                            labore perferendis neque minus provident mollitia, nulla deserunt ipsum aliquid. 
                        </p>
                        <p class="dashboard-avis-com-id"><small><em>Date</em></small></p>
                    </div>
                    <div class="dashboard-avis-com-content">
                        <p class="dashboard-avis-com-id"><em>Nom</em> - </p>
                        <p class="dashboard-avis-com-id"><em>Prenom</em> - </p>
                        <p class="dashboard-avis-com-id"><em>test@exemple.com    </em></>
                        <p style="padding:.5rem 0;">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Harum tenetur, quod inventore, 
                            labore perferendis neque minus provident mollitia, nulla deserunt ipsum aliquid. 
                        </p>
                        <p class="dashboard-avis-com-id"><small><em>Date</em></small></p>
                    </div>
                </div>
                
            </div>
            <div class="dashboard-preference">
                <strong style="padding:2rem 1rem 0 1rem;"> Mes Meilleurs Clients</strong>
            </div>
        </section>

    </main>

    <!-- Footer -->
    <footer class="footer-dashboard">
        <section class="copyright">      
                <p>© Room Détente 2024. Tous droits réservés</p>
        </section>
    </footer>
</body>
</html>