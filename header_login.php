<header>
    <nav class="appBar">
        <img class="appBar__icon" src="assets/images/Logo_RoomDetente_LR.png" alt="Logo Room Détente" >
        <div class="appBar__nav">
            <a class="appBar__navItem" href="index.php">Accueil</a>
            <a class="appBar__navItem" href="a-propos.php">A propos</a>
            <a class="appBar__navItem" href="services.php">Services</a>
            <a class="appBar__navItem" href="services.php#formules">Nos Formules</a>
            <a class="appBar__navItem" href="contact.php">Contacts</a>
        </div>

        <!-- Si l'utilisateur est identifié on change l'icone de login -->
        <?php if(isset($_SESSION["user_id"]) && $_SESSION["user_id"]!=2305 && $_SESSION["user_id"]!=0) : ?>
            <div class="appBar__login" >
                <?php
                $selectProduct=mysqli_query($mysqli,"SELECT * FROM cart") or die('query failed');
                $row_count=mysqli_num_rows($selectProduct);
                ?>
                <a href="cart.php" class="cart" style="padding-right: 1rem;">
                    <img src="assets/images/shopping-bag.png" alt="icon panier">    
                    <span><sup><?php echo $row_count;?></sup></span>
                </a>
                <a class="text_black" href="dashboard_client.php">
                    <img src="assets/images/login3.png" alt="Logo de Profil">
                    <?= htmlspecialchars($user["firstname"])?>
                </a>
            </div>
        <?php elseif(isset($_SESSION["user_id"]) && $_SESSION["user_id"]=2305) : ?>
            <div class="appBar__login">
                <a class="text_black" href="dashboard_admin.php">
                    <img src="assets/images/login3.png" alt="Logo de Profil">
                    <?= htmlspecialchars("Admin")?>
                </a>
            </div>
        <?php else:?>
            <div class="appBar__login">
                <a href="login.php">
                    <img src="assets/images/login3.png" alt="Logo de Profil">
                    <p>Login</p>
                </a>
            </div>
        <?php endif;?>
    </nav>

    <nav class="blackBanner">
        <p class="blackBanner__title">Réservez dès maintenant</p>

        <!-- Si l'utilisateur est identifié on change la direction d'envoie -->
        <?php if(isset($_SESSION["user_id"]) && $_SESSION["user_id"]!=2305 && $_SESSION["user_id"]!=0) : ?>
            <a class="button" href="dashboard_client.php">Réservez</a>
        <?php elseif(isset($_SESSION["user_id"]) && $_SESSION["user_id"]=2305) :?>
            <a class="button" href="dashboard_admin.php">Réservez</a>
        <?php else:?>
            <a class="button" href="contact.php">Réservez</a>
        <?php endif;?>
    </nav>
</header>


