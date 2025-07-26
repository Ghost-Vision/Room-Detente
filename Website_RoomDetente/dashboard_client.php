<?php
session_start();

$mysqli = require __DIR__ ."/database.php";
require __DIR__."/function.php";

$sql=   "SELECT * FROM users
        WHERE id = {$_SESSION["user_id"]}";

$result = $mysqli->query($sql);
$user = $result->fetch_assoc();

// ------------------------------------------------

/*$sql = "SELECT * FROM user_utilities";
$result = $mysqli->query($sql);
$num = $result->fetch_assoc();*/

//--------------------------------------------------

$sql = "SELECT * FROM comments";
$result = $mysqli->query($sql);
$com = $result->fetch_assoc();

//--------------------------------------------------
$updateAvatar = "";
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Détente - Dashboard</title>

    <link rel="icon" href="assets/images/Logo_RoomDetente_Rond.png">
    <link rel="stylesheet" href="styles/main.css">

    <script src="js/hide_section_client.js" defer></script>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

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
        <nav class="blackBanner">
            <p class="blackBanner__title no-margin">Réservez dès maintenant</p>
            <a class="button" href="shop_services.php">Je reserve mon massage</a>
        </nav>
        <section class="dash-title">
            <?php if (isset($user)):?>
            <h2>Bonjour <?= htmlspecialchars($user["firstname"])?></h2>
            <?php endif;?>
        </section>

        <section class="dashboard-grid">
            <div class="dashboard-selection border-green border-outset">
                <h3 style="padding: 1rem; text-align: center">Dashboard</h3>
                <button class="dashboard-button" id="buttonInfos">Mes Infos</button>
                <button class="dashboard-button" id="buttonOrder">Mes Commandes</button>
                <button class="dashboard-button" id="buttonNews">Mes Messages</button>
            </div>
            <div>
                <div class="dashboard-container" id="dInfo">
                    <h3 style="padding:0 0 2rem; text-align:center;">Mes Informations</h3>
                    <div class="dash-global-info">
                        <div class="dash-client-items background-light border-green" style="display:block">
                            <h4 class="text-center">Mes infos personnelles</h4>
                            <div style="display:flex; justify-content:space-between">
                                <div>
                                    <button class="button" style="margin-left:0;">Changer d'avatar</button>
                                    <ul>
                                        <li>Nom d'utilisateur : </li>
                                        <li>Nom : <?= htmlspecialchars($user["name"])?></li>
                                        <li>Prénom : <?= htmlspecialchars($user["firstname"])?></li>
                                        <li>Date de Naissance : 
                                            <?php 
                                            $sql_birthdate = $user["date_of_birth"];
                                            $birthdate = date('d-m-Y', strtotime($sql_birthdate));
                                            echo $birthdate;
                                            ?>
                                        </li>
                                        <li>Email : <?= htmlspecialchars($user["email"])?></li>
                                        <li>Téléphone : 0<?= htmlspecialchars($user["phone"])?></li>
                                        <li>Mot de Passe : </li><button class="button" onclick="location.href='forgot_password.php'" style="margin-left:0;">Changer de Mot de Passe</button>
                                    </ul>
                                </div>
                                <div class="flex-center">
                                    
                                        <h4>Avatar</h4>
                                        <img src="assets/images/utilisateur.png" alt="Image  de Profil">
                                    
                                </div>
                            </div>
                        </div>
                        <!-- <div id="seance-empty" class="dash-client-items background-light text-center border-green" >
                            <h4 class="">Mes Séances</h4>

                            <strong>Mes massages à venir</strong>
                            <p>Vous n'avez aucun massage à venir</p>
                        </div> -->
                        <div id="seance-full" class="dash-client-items background-light text-center border-green" >
                            <h4 class="">Mes Séances</h4>

                            <strong>Mes massages à venir</strong>
                            <div class="border-green" style="border-radius:2rem; margin-top:2rem;">
                                <div class="dash-seance-full-c-grid">
                                    <div class="flex-center">
                                        <strong>Massage</strong>
                                        Ayurvédique
                                    </div>
                                    <div class="flex-center">
                                        <strong>Durée</strong>
                                        1h00
                                    </div>
                                    <div class="flex-center">
                                        <strong>Date</strong>
                                        19/05/2024
                                    </div>
                                    <div class="flex-center">
                                        <strong>Heure</strong>
                                        11h00
                                    </div>
                                </div>
                                <div class="dash-seance-full-c">
                                    <p style="margin: 1rem 0;">Un imprévu ?</p>
                                    <button class="button" type="button">Modifer</button>
                                    <button class="button" type="button">Annuler</button>
                                </div>
                                <p>Cette heure vous est exclusivement réservée. Si vous êtes dans l'incapacité de vous rendre au rendez-vous, veuillez nous prévenir dans les 24 heures. Nous avons hâte de vous rencontrer !</p>
                            </div>
                        </div>
                        <div class="dash-client-items background-light border-green">
                            <h4 class="text-center">Ma carte de fidélité</h4>
                            <div class="progress" style="height:2rem">
                                <div class="progress-bar" style="width:70%">70%</div>
                            </div>
                            <h2 class="text-center">7 pts</h2>
                            
                            <strong class="text-center">Euros cumuler !</strong>
                            <h4 class="text-center">35€</h4>
                            
                            <small class="text-center">Cumulez des points lors de vos séances.
                            <br>1 point = 5 euros
                            <br>Une fois votre carte remplie, vous obtenez -30% de remise, sur le massage de votre choix.
                            <br>Valable 6 mois.</small>
                        </div>
                        <div class="dash-client-items background-light flex-center border-green">
                            <h4 class="text-center">Carte Cadeau</h4>
                            <p class="text-center">Prenez soin de vos proches, et offrez leur une réduction de 30% lors de leur 1er massage.
                            </p>
                            <div class="text-center">
                                <strong style="line-height:2px;">Mon numéro de parrainage</strong>
                                <p>0396061234567890 </p>
                            </div>
                            
                            <form class="form-message-item" style="display: block;" action="" method="post">
                                <label class="text-black text-center" style="margin: 0;" for="email">E-mail de la personne concerné</label>
                                <input style="margin: .5rem;" type="email" name="email" id="email" required>

                                <button class="button" style="margin: auto;" type="submit">Envoyé</button>
                            </form>
                        </div>
                        <div class="dash-client-items background-light border-green" style="padding: 2rem;">
                            <h4 class="text-center">Mes formules en cours</h4>
                            <p class="text-center">Vous n'avez aucune formule en cours pour le moment.</p>
                        </div>
                    </div>
                </div>

                <!-- Section Commande Vide -->
                <!--<div class="dashboard-container" id="dOrder" style="display:none;">
                    <h3 style="padding:0 0 2rem; text-align:center;">Mes Commandes</h3>
                    <div class="flex-center text-center">
                        <strong>Mon historique</strong>
                        <p>Vous n'avez effectué aucun massage.
                        <br>Commander dès mainenant votre premier massage !
                        </p>
                        <button class="button">Commander</button>
                    </div>
                </div>-->

                <!-- Section Commande Full -->
                <div class="dashboard-container" id="dOrder" style="display:none;">
                    <h3 style="padding:0 0 2rem; text-align:center;">Mes Commandes</h3>
                    <div class="flex-center text-center">
                        <strong style="padding-bottom:2rem">Mon historique de commande</strong>
                        <?php echo build_OrderList()?>
                    </div>
                </div>
                <div class="dashboard-container" id="dNews" style="display:none;">
                    <div>
                        <h3 class="text-center">Mes Messages</h3>

                        <h4 class="text-center" style="padding:2rem 0;">Mes Commentaires envoyés</h4>
                        <?php
                        $email = htmlspecialchars($user["email"]);
                        $sql = 'SELECT * FROM comments
                                WHERE email = "'.$email.'"';
                        $commentList="";
                    
                        if($result = $mysqli->query($sql))
                        {
                            while($row = $result->fetch_assoc())
                            {
                                $fieldName = $row["name"];
                                $fieldFirstName = $row["firstname"];
                                $fieldEmail = $row["email"];
                                $fieldMessage = $row["message"];

                                $sql_fieldDate = $row["date"];
                                $fieldDate = date('d-m-Y  à  h\\h\\ i', strtotime($sql_fieldDate));


                                $fieldSubject = $row["subject"];
                    
                                $commentList.=' <div class="dashboard-avis-com-content background-light">';
                                $commentList.=' <p class="dashboard-avis-com-id"><em>'.$fieldName.'</em> - </p>';
                                $commentList.=' <p class="dashboard-avis-com-id"><em>'.$fieldFirstName.'</em> - </p>';
                                $commentList.=' <p class="dashboard-avis-com-id"><em>'.$fieldEmail.'</em></>';
                                if($fieldSubject =="")
                                {
                                    $commentList.= '<p class="no-margin">NULL</p>';
                                }
                                else
                                {
                                    $commentList.=' <p class="no-margin">'.$fieldSubject.'</p>';
                                }

                                $commentList.= '<p class="no-margin" style="padding:.5rem 0;">'.$fieldMessage.'</p>';
                                $commentList.=' <p class="dashboard-avis-com-id"><em>'.$fieldDate.'</em></p>';
                                $commentList.=' </div>';
                            }
                            $result->free();
                            if($commentList == "")
                            {
                                $commentList.="<p class='text-center'>Vous n'avez ecrit aucun commentaire.</p>";
                            }
                        }
                    
                        echo $commentList;
                        ?>
                    </div>
                    <div style="padding:2rem 0; margin:1rem 0; border-top: 2px solid var(--green-cal-poly)">
                        <h4 class="text-center">Envoyez un Messages</h4>
                        <div class="form-text">
                            Vous souhaitez nous poser une question,<br>
                                nous faire un feedback, ou tout simplement nous contacter ?
                        </div>
                        <form class="form-contact background-light" method="post" action="send-contact-form.php">
                            <div class="form-nom">
                                <div class="form-c-item">
                                    <label for="nom">Nom</label>
                                    <input type="text" name="name" id="name" placeholder="Nom" value="<?= htmlspecialchars($user["name"])?>"/>
                                </div>
                                <div class="form-c-item">
                                    <label for="firstname">Prénom</label>
                                    <input type="text" name="firstname" id="firstname" placeholder="Prénom" value="<?= htmlspecialchars($user["firstname"])?>"/>
                                </div>
                            </div>
                            <div class="form-c-item">
                                <label for="email">E-mail</label>
                                <input type="e-mail" name="email" id="email" placeholder="E-mail" value=<?= htmlspecialchars($user["email"])?>>
                            </div>
                            <div class="form-c-item">
                                <label for="message">Message</label>
                                <input type="text" name="subject" id="subject" placeholder="Sujet :">
                                <textarea name="message" id="message" placeholder="Votre commentaire" required></textarea>
                            </div>

                            <button type="submit" class="button">Envoyer</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="dashboard-preference border-green border-outset">
                <div class="dashboard-pref-container">
                    <p><strong>Mon Numéro de Parrainage</strong></p>
                    <p><small>
                        <?php


                        if(isset($num))
                        {
                            echo htmlspecialchars($num["num_adhesion"]);
                        }
                        ?>
                    </small></p>

                    <p><strong>Mes Points de Fidélité</strong></p>
                    <h3>Points : 
                        <?php
                        if(isset($num))
                        {
                            echo htmlspecialchars($num["fidelity_points"]);
                        }
                        ?>
                    </h3>
                    <p><small>Gagné un massage gratuit à 1000 points</small></p>

                    <p><strong>Mon Massage Préférer</strong></p>
                    <p>Shirotchampi</p>
                </div>
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


<!-- The Modal - Panier -->
<div class="modal" id="Modal-Basket">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Mon Panier</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
            <section class="shopping-cart">
                <table>
                    <?php
                    $sql = "SELECT * FROM cart";
                    $stmt = $mysqli->prepare($sql);
                    $num=1;
                    $grandTotal=0;
                    if($stmt -> execute())
                    {
                        $result=$stmt->get_result();
                        if($result->num_rows>0)
                        {?>
                        <thead>
                            <th>Sl No</th>
                            <th>Massage</th>
                            <th>Durée</th>
                            <th>Horaire</th>
                            <th>Date</th>
                            <th>Prix</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = $result->fetch_assoc())
                            {?> 
                            <tr>
                                <td><?php echo $num?></td>
                                <td><?php echo $row['name']?></td>
                                <td><?php echo $row['time']?></td>
                                <td><?php echo $row['timeslot']?></td>
                                <td><?php echo $row['date']?></td>
                                <td><?php echo $row['price']?>€</td>
                                <td>
                                    <a href="cart.php?remove=<?php echo $row['id']?>" onclick="return confirm('Are you sure you want to delete this item')">
                                        <span class='material-symbols-outlined'>delete</span>Supprimer
                                    </a>
                                </td>
                            </tr>
                            <?php
                            $grandTotal=$grandTotal+($row['price']);
                            $num++;
                            }
                        }
                        else
                        {
                            echo "<div class='empty-text'>no products</div>";
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer button-center">
                    <button type="button" class="button" data-dismiss="modal" onclick="location.href='cart.php'">Je passe commande</button>
            </div>
        </div>
    </div>
</div>