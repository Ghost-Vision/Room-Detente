<?php
require __DIR__."/database.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Détente - Booking</title>

    <link rel="icon" href="assets/images/Logo_RoomDetente_Rond.png">
    <link rel="stylesheet" href="styles/main.css">

    <script src="js/hide_section_client.js" defer></script>

    <!-- Bootstrap -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script> -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>
    <!-- Header -->
    <header>
        <?php
            $selectProduct= "SELECT * FROM cart";
            $result = $mysqli->query($selectProduct);
            $row_count=mysqli_num_rows($result);
        ?>  
        <nav class="appBar-dashboard">
            <a href="index.php">
                <img class="appBar__icon" src="assets/images/Logo_RoomDetente_White_LR.png" alt="Logo Room Détente" >
            </a>
            <h2 class="appBar__nav text-white">Mon Espace Perso</h2>
            <div class="appBar-dashboard__login appBar__login">
                <button type="button" class="button btn-basket" data-toggle="modal" data-target="#Modal-Basket">
                    <img src="assets/images/shopping-bag.png" alt="icon panier"> 
                    <span class="badge badge-pill badge-info"><?php echo $row_count;?></span> 
                </button>
                
                <a href="logout.php" class="text-white">
                    <img src="assets/images/logout.png" alt="Logo de Profil">
                    Logout
                </a>
            </div>
        </nav>
    </header>

    <main class="dash-client-bg">
        <div >
            <div class="container-booking flex-center">
                <?php
                require __DIR__."/function.php";

                $dateComponent=getdate();
                if(isset($_GET["month"]) && isset($_GET["year"]))
                {
                    $month=$_GET["month"];
                    $year=$_GET["year"];
                }
                else
                {
                    $month= $dateComponent["mon"];
                    $year= $dateComponent["year"];
                }

                if(isset($_GET["rooms"]))
                {
                    $rooms=$_GET["rooms"];
                }
                else
                {
                    $rooms=0;   
                }

                echo build_calendar($month, $year, $rooms);
                ?>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer-dashboard">
        <section class="copyright">      
                <p>© Room Détente 2024. Tous droits réservés</p>
        </section>
    </footer>
</body>
</html>