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
    
    <title>Room Détente - Services</title>

    <script src="js/modal.js" defer></script>

    <link rel="icon" href="assets/images/Logo_RoomDetente_Rond.png">
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>
    <!-- Header -->
    <?php require_once __DIR__."/header.php" ?>

    <main class="main-service">
        <section class="main__services_page">
            <h2 class="heading">Mes Services</h2>
            <div class="services__grid">

                <div class="services__grid__item">
                    <h4>Modelage du Visage</h4>

                    <button class="button-serv" type="button">
                        <img src="assets/images/massage/beautiful-young-woman-having-facial-massage-spa-salon-beauty-treatment-concept.jpg" alt="">
                        <div class="button-serv-text">
                            <h4>Pas Disponible</h4>
                        </div>
                    </button>
                    <p><strong>Temps : </strong>45min</p>
                    <p><strong>Prix : </strong>45€</p>
                </div>
                
                <div class="services__grid__item">
                    <h4>Ayurvédique</h4>

                    <button class="button-serv" type="button"  data-modal-target="#modal2">
                        <img src="assets/images/massage/beauty-spa (1).png" alt="">
                        <div class="button-serv-text">
                            <h4>Plus d'informations</h4>
                            <p>cliquez ici</p>
                        </div>
                    </button>
                    <p><strong>Temps : </strong>1h00</p>
                    <p><strong>Prix : </strong>75€</p>
                </div>
    
                <div class="services__grid__item">           
                    <h4>Californien</h4>

                    <button class="button-serv" type="button" data-modal-target="#modal3">
                        <img src="assets/images/massage/beauty-spa (2).png" alt="">
                        <div class="button-serv-text">
                            <h4>Plus d'informations</h4>
                            <p>cliquez ici</p>
                        </div>
                    </button>
                    <p><strong>Temps : </strong>1h00</p>
                    <p><strong>Prix : </strong>68€</p>
                </div>  
    
                <div class="services__grid__item">
                    <h4>Shirotchampi</h4>
                    
                    <button class="button-serv" type="button" data-modal-target="#modal4">
                        <img src="assets/images/massage/beauty-spa.png" alt="">
                        <div class="button-serv-text">
                            <h4>Plus d'informations</h4>
                            <p>cliquez ici</p>
                        </div>
                    </button>
                    <p><strong>Temps : </strong>55min</p>
                    <p><strong>Prix : </strong>55€</p>
                </div>
    
                <div class="services__grid__item">
                    <h4>Balinais</h4>

                    <button class="button-serv" type="button" data-modal-target="#modal5">
                        <img src="assets/images/massage/picture-beautiful-woman-massage-salon.png" alt="">
                        <div class="button-serv-text">
                            <h4>Plus d'informations</h4>
                            <p>cliquez ici</p>
                        </div>
                    </button>
                    <p><strong>Temps : </strong>1h00</p>
                    <p><strong>Prix : </strong>68€</p>
                </div>
    
                <div class="services__grid__item">
                    <h4>Thai à l'huile</h4>

                    <button class="button-serv" type="button" data-modal-target="#modal6">
                        <img src="assets/images/massage/honey-pouring-woman-s-naked-back-spa-salon.png" alt="">
                        <div class="button-serv-text">
                            <h4>Plus d'informations</h4>
                            <p>cliquez ici</p>
                        </div>
                    </button>
                    <p><strong>Temps : </strong>1h00</p>
                    <p><strong>Prix : </strong>68€</p>
                </div>
    
                <div class="services__grid__item">
                    <h4>Lomi Lomi</h4>
                    <button class="button-serv" type="button" data-modal-target="#modal7">
                        <img src="assets/images/massage/picture-beautiful-woman-massage-salon-male-hands-close-up.png" alt="">
                        <div class="button-serv-text">
                            <h4>Plus d'informations</h4>
                            <p>cliquez ici</p>
                        </div>
                    </button>
                    <p><strong>Temps : </strong>1h00</p>
                    <p><strong>Prix : </strong>68€</p>
                </div>
    
                <div class="services__grid__item">
                    <h4>Massage au choix</h4>
                    <button class="button-serv" type="button" data-modal-target="#modal8">
                        <img src="assets/images/massage/woman-spa-center.png" alt="">
                        <div class="button-serv-text">
                            <h4>Plus d'informations</h4>
                            <p>cliquez ici</p>
                        </div>
                    </button>
                    <p><strong>Temps : </strong>30min</p>
                    <p><strong>Prix : </strong>35€</p>
                </div>
            </div>
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
                    <button class="button" onclick="location.href='contact.php'" type="button">Je réserve</button>
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
                    <button class="button" onclick="location.href='contact.php'" type="button">Je réserve</button>
                </div>
            </div>
        </section>
        <section class="bonus">
            <div class="b__container">
                <h2 class="b__title title-shadow">Programme de Fidélité</h2>
                <div class="b__content">
                    <img src="assets/images/heart.png" alt="icon main donnant un coeur">
                    <p>
                        Cumulez des points lors de vos séances
                        <br> 1 points = 5 euros
                        <br>Une fois votre carte remplie, vous obtenez -30 %.
                        Valable 6 mois 
                    </p>
                    <a href="contact.php">
                        <button  class="button" type="button"> Je passe commande</button>
                    </a>
                </div>
            </div>
            <div class="b__container">
                <h2 class="b__title title-shadow">Carte Cadeau</h2>
                <div class="b__content">
                    <img src="assets/images/gift-box.png" alt="icon main donnant un coeur">
                    <p>
                        Massage du corps au choix
                        <br>Prenez du temps pour vous détendre et vous ressourcer est essentiel pour bien vivre. 
                        <br>Valable 1 ans
                    </p>
                    <a href="contact.php">
                        <button  class="button" type="button"> Je passe commande</button>
                    </a>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <?php require_once __DIR__."/footer.html" ?>
</body>
</html>

<!-- The Modal -->
<!-- Modelage du Visage -->
<div class="modal modal_Info fade" id="modal0">
    <div class="modal-dialog modal-l">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Modelage du visage</h4>
                <button type="button" class="close-btn" data-close-button>&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                Les divers informations sur le Modelage du Visage
            </div>
        
            <!-- Modal footer -->
            <div class="modal-footer">
                
                <?php if(!isset($_SESSION["user_id"])) : ?>
                    <button type="button" class="button button-center" data-close-button onclick="location.href='contact.php'">Je reserve</button>
                <?php else:?>
                    <button type="button" class="button button-center" data-close-button onclick="location.href='shop_services.php'">Je reserve</button>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>
<!-- Ayurvedique -->
<div class="modal modal_Info fade" id="modal2">
    <div class="modal-dialog modal-l">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Massage Ayurvedique</h4>
                <button type="button" class="closeM-Service" data-close-button>&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <strong>Le massage Ayurvedique</strong>
                <br>Est un massage énergétique qui élimine les toxines du corps et renforce le système immunitaire.
                <div class="modal-body-details">
                    <p><strong>Temps : </strong>1h00</p>
                    <p><strong>Prix : </strong>75€</p>
                </div>
                <div class="modal-body-contact">
                    Pour toutes informations complémentaire relative à ce massage, je vous invite à me contacter.
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                
                <?php if(!isset($_SESSION["user_id"])) : ?>
                    <button type="button" class="button button-center" data-close-button onclick="location.href='contact.php'">Je reserve</button>
                <?php else:?>
                    <button type="button" class="button button-center" data-close-button onclick="location.href='shop_services.php'">Je reserve</button>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>
<!-- Massage Californien -->
<div class="modal modal_Info fade" id="modal3">
    <div class="modal-dialog modal-l">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Massage Californien</h4>
                <button type="button" class="closeM-Service" data-close-button>&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div>
                    <strong>Le Massage Californien</strong>
                    <br>Est un massage relaxant qui stimulent la circulation sanguine et lymphatique, favorisent l'oxygénation des tissus, détendent la musculature et soulagent les tensions en profondeur.
                </div>
                <div class="modal-body-details">
                    <p><strong>Temps : </strong>1h00</p>
                    <p><strong>Prix : </strong>68€</p>
                </div>
                <div class="modal-body-contact">
                    Pour toutes informations complémentaire relative à ce massage, je vous invite à me contacter.
                </div>
            </div>
        
            <!-- Modal footer -->
            <div class="modal-footer">
                <?php if(!isset($_SESSION["user_id"])) : ?>
                    <button type="button" class="button button-center" data-close-button onclick="location.href='contact.php'">Je reserve</button>
                <?php else:?>
                    <button type="button" class="button button-center" data-close-button onclick="location.href='shop_services.php'">Je reserve</button>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>
<!-- Massage Shirotchampi -->
<div class="modal modal_Info fade" id="modal4">
    <div class="modal-dialog modal-l">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Massage Shirotchampi</h4>
                <button type="button" class="closeM-Service" data-close-button>&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div>
                    <strong>Le massage Shirotchampi</strong>
                    <br>Renforce le cuir chevelu, augmente la concentration et la mémoire réduit les migraines.   
                </div>
                <div class="modal-body-details">
                    <p><strong>Temps : </strong>55min</p>
                    <p><strong>Prix : </strong>55€</p>
                </div>
                <div class="modal-body-contact">
                    Pour toutes informations complémentaire relative à ce massage, je vous invite à me contacter.
                </div>
            </div>
            
        
            <!-- Modal footer -->
            <div class="modal-footer">
                <?php if(!isset($_SESSION["user_id"])) : ?>
                    <button type="button" class="button button-center" data-close-button onclick="location.href='contact.php'">Je reserve</button>
                <?php else:?>
                    <button type="button" class="button button-center" data-close-button onclick="location.href='shop_services.php'">Je reserve</button>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>
<!-- Massage Balinais -->
<div class="modal modal_Info fade" id="modal5">
    <div class="modal-dialog modal-l">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Massage Balinais</h4>
                <button type="button" class="closeM-Service" data-close-button>&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div>
                    <strong>Le massage balinais</strong> 
                    <br>La stimulation de la circulation sanguine et lymphatique : en travaillant sur les zones de tension, le massage favorise une meilleure circulation, contribuant ainsi à l'élimination des toxines et à la revitalisation des tissus avec des percussions.
                </div>
                <div class="modal-body-details">
                    <p><strong>Temps : </strong>1h00</p>
                    <p><strong>Prix : </strong>68€</p>
                </div>
                <div class="modal-body-contact">
                    Pour toutes informations complémentaire relative à ce massage, je vous invite à me contacter.
                </div>
            </div>
        
            <!-- Modal footer -->
            <div class="modal-footer">
                <?php if(!isset($_SESSION["user_id"])) : ?>
                    <button type="button" class="button button-center" data-close-button onclick="location.href='contact.php'">Je reserve</button>
                <?php else:?>
                    <button type="button" class="button button-center" data-close-button onclick="location.href='shop_services.php'">Je reserve</button>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>
<!-- Massage Thai -->
<div class="modal modal_Info fade" id="modal6">
    <div class="modal-dialog modal-l">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Massage Thai à l'huile</h4>
                <button type="button" class="closeM-Service" data-close-button>&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div>
                    <strong>Le massage Thaï à l'huile</strong>
                    <br>Des mouvements fluides pour décontracter les muscles de tout le corps pour une récupération optimale    et une profonde session de relaxation.
                </div>
                <div class="modal-body-details">
                    <p><strong>Temps : </strong>1h00</p>
                    <p><strong>Prix : </strong>68€</p>
                </div>
                <div class="modal-body-contact">
                    Pour toutes informations complémentaire relative à ce massage, je vous invite à me contacter.
                </div>
            </div>
        
            <!-- Modal footer -->
            <div class="modal-footer">
                <?php if(!isset($_SESSION["user_id"])) : ?>
                    <button type="button" class="button button-center" data-close-button onclick="location.href='contact.php'">Je reserve</button>
                <?php else:?>
                    <button type="button" class="button button-center" data-close-button onclick="location.href='shop_services.php'">Je reserve</button>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>
<!-- Massage Lomi Lomi -->
<div class="modal modal_Info fade" id="modal7">
    <div class="modal-dialog modal-l">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Massage Lomi Lomi</h4>
                <button type="button" class="closeM-Service" data-close-button>&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div>
                    <strong>Le massage Lomi Lomi </strong>
                    <br>Se pratique avec les mains et les avant-bras réduit le stresse et favorise la relaxation et la détente.
                </div>
                <div class="modal-body-details">
                    <p><strong>Temps : </strong>1h00</p>
                    <p><strong>Prix : </strong>68€</p>
                </div>
                <div class="modal-body-contact">
                    Pour toutes informations complémentaire relative à ce massage, je vous invite à me contacter.
                </div>
            </div>
        
            <!-- Modal footer -->
            <div class="modal-footer">
                <?php if(!isset($_SESSION["user_id"])) : ?>
                    <button type="button" class="button button-center" data-close-button onclick="location.href='contact.php'">Je reserve</button>
                <?php else:?>
                    <button type="button" class="button button-center" data-close-button onclick="location.href='shop_services.php'">Je reserve</button>
                <?php endif;?>            </div>
        </div>
    </div>
</div>
<!-- Massage au choix -->
<div class="modal modal_Info fade" id="modal8">
    <div class="modal-dialog modal-l">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Massage aux choix</h4>
                <button type="button" class="closeM-Service" data-close-button>&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div>
                    <strong>Le Massage aux choix</strong>
                    <br>Le choix est trop dure ?
                    <br>Ne vous inquietez pas, je vous accompagne afin de vous faire decouvrir le massage qui vous conviendra.
                </div>²
                <div class="modal-body-details">
                    <p><strong>Temps : </strong>1h00</p>
                    <p><strong>Prix : </strong>68€</p>
                </div>
                <div class="modal-body-contact">
                    Pour toutes informations complémentaire relative à ce massage, je vous invite à me contacter.
                </div>
            </div>
        
            <!-- Modal footer -->
            <div class="modal-footer">
                <?php if(!isset($_SESSION["user_id"])) : ?>
                    <button type="button" class="button button-center" data-close-button onclick="location.href='contact.php'">Je reserve</button>
                <?php else:?>
                    <button type="button" class="button button-center" data-close-button onclick="location.href='shop_services.php'">Je reserve</button>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>
