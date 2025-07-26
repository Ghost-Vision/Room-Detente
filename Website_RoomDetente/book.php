<?php
session_start();

$mysqli = require __DIR__."/database.php";
require __DIR__ . "/function.php";

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
    <title>Room Détente - Booking</title>

    <link rel="icon" href="assets/images/Logo_RoomDetente_Rond.png">

    <link rel="stylesheet" href="styles/main.css">
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="js/book.js" defer></script>
    <script src="js/modal.js" defer></script>

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
        <div class="container-booking">
            <h4 class="text-center">Date de rendez-vous : <?php echo date("d/m/Y",strtotime($date));?></h4>
            <hr>
            <div class="row">
                <!-- <div class="col-md-12">
                    <?php
                    echo (isset($msg))?$msg:"";
                    ?>
                </div> -->

                <?php 
                $timeslot = timeslot($duration, $cleanup, $start,$end);
                $numButton = 1;
                foreach($timeslot as $ts){
                ?>

                <div class="col-md-2">
                    <div class="form-group">
                        <?php if(in_array($ts, $bookings)){
                            ?>
                            <button class="button btn-danger"><?php echo $ts;?></button>
                        <?php }else{?>
                            <button class="button button-book btn-success book" id="button_TS_<?php echo $numButton?>" data-timeslot="<?php echo $ts;?>">
                                <?php echo $ts;?>
                            </button>
                        <?php }?>
                    </div>
                </div>
                <?php
                $numButton++;
                }?>
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

<!-- Modal -->
<div id="modal_TS" class="modal fade" role="dialog" style="display: none;">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="color: black;">
                <button type="button" class="close no-margin flex-center" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Rendez-vous du : <span><?php echo date("d/m/Y",strtotime($date));?></span> à <span id="slot"></span></h4>
            </div>
            <div class="modal-body">
                <div class="row-bookform">
                    <form action="" method="post">
                        <div class="form-item">
                            <label for="massage">Massage</label>
                            <input type="text" name="massage" id="massage" value="<?php echo 'Massage choisi'?>" readonly>
                        </div>
                        <div class="form-item">
                            <label for="date">Date</label>
                            <input type="text" name="date" value="<?php echo date("d/m/Y",strtotime($date));?>" readonly>
                        </div>
                        <div class="form-item">
                            <label for="time">Horaire</label>
                            <input type="text" name="timeslot" id="timeslot" class="form-control" readonly>
                        </div>
                        <div class="form-item">
                            <label for="name">Nom</label>
                            <input type="text" name="name" class="form-control" value="">
                        </div>
                        <div class="form-item">
                            <label for="lastname">Prénom</label>
                            <input type="text" name="lastname" class="form-control" value="">
                        </div>
                        <div class="form-item">
                            <label for="phone">Téléphone</label>
                            <input type="text" name="phone" class="form-control"  maxlength="10" required>
                        </div>
                        <div class="form-item">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" class=     "form-control" value="">
                        </div>
                        <div class="form-group pull-right">
                            <button class="submit-btn submit_TS" type="submit" name="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>