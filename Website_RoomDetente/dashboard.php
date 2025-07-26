<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Détente - Dashboard</title>

    <link rel="icon" href="assets/images/Logo_RoomDetente_Rond.png">
    <link rel="stylesheet" href="styles/main.css">
</head>
<body>
    <!-- Header -->
    <header>    
        <nav class="appBar-dashboard">
            <img class="appBar__icon" src="assets/images/Logo_RoomDetente_White_LR.png" alt="Logo Room Détente" >
            <p class="appBar__nav">Mon Espace</p>
            <a class="appBar-dashboard__login" href="login.php">
                <img src="assets/images/login3.png" alt="Logo de Profil">
                Logout
            </a>
        </nav>
    </header>

    <main>
        <section class="dashboard-title">
            <h2>Bonjour user</h2>
        </section>

        <section class="dashboard-grid">
            <div class="dashboard-selection">
                <h2 style="padding: 1rem; text-align: center">Dashboard</h2>
                <button class="dashboard-button01">Mes Infos</button>
                <button class="dashboard-button02">Mes Commandes</button>
                <button class="dashboard-button02">Mes Messages</button>
            </div>
            <div></div>
            <div>
                <p><strong>Mes Points de Fidélité</strong></p>
                <h3>Points : 200</h3>
                <p><small>Gagné un massage gratuit à 1000 points</small></p>

                <p><strong>Mon Massage Préférer</strong></p>
                <p>Shirotchampi</p>
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