<?php
    session_start();
    $mysqli = require __DIR__."/database.php";
    require __DIR__."/function.php";

if (isset($_POST['add-service']))
{
    $service_name=$_POST["service-name"];
    $service_time=$_POST["service-time"];
    $service_price = $_POST["service-price"];
    $service_image = $_FILES["service-image"]["name"];
    $service_image_temp_name = $_FILES["service-image"]["tmp_name"];
    $service_image_folder='assets/images/massage/'.$service_image;

    $sql = "INSERT INTO  massage (name,time,price,image)
            VALUES(?,?,?,?)";

    $stmt = $mysqli->stmt_init();
    if ( ! $stmt->prepare($sql)) {
        die("SQL error: " . $mysqli->error);
    }

    $stmt->bind_param("ssss",
                  $service_name,
                  $service_time,
                  $service_price,
                  $service_image);

    if ($stmt->execute())
    {
        move_uploaded_file($service_image_temp_name, $service_image_folder);
        header('location:dashboard_admin.php');
    }
    else
    {
        $displayMessage="There is some error inserting massage";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Détente - Administrateur</title>

    <link rel="icon" href="assets/images/Logo_RoomDetente_Rond.png">
    <link rel="stylesheet" href="styles/main.css">

    <script src="js/hide_section_admin.js" defer></script>

    <!-- Bootstrap -->
    <link rel="stylesheet" 
    href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>
    <!-- Header -->
    <header>
        <nav class="appBar-dashboard">
            <a href="index.php">
            <img class="appBar__icon" src="assets/images/Logo_RoomDetente_White_LR.png" alt="Logo Room Détente" >
            </a>
            <h2 class="appBar__nav text-white">Mon Espace Administrateur</h2>
            <a class="appBar-dashboard__login" href="logout.php">
                <img src="assets/images/login3.png" alt="Logo de Profil">
                Logout
            </a>
        </nav>
    </header>

    <main class="dashboard-page dash-admin-bg">
        <section class="dash-title">
            <h2 class="text-white">Bonjour Julie</h2>
        </section>
        <section class="dashboard-grid">
            <div class="admin-selection border-green border-outset">
                <h3 style="padding: 1rem; text-align: center">Dashboard</h3>
                <button class="dashboard-button" id="buttonInfo">Mes Infos</button>
                <button class="dashboard-button" id="buttonClients">Mes Clients</button>
                <button class="dashboard-button" id="buttonServices">Mes services</button>
                <button class="dashboard-button" id="buttonCompta">Ma comptabilité</button>
                <button class="dashboard-button" id="buttonMsg">Mes Messages</button>
                <button class="dashboard-button" id="buttonComs">Avis & Commentaire</button>
            </div>
            <div>
                <div class="dashboard-container" id="dInfo" style="display:none;">
                    <h3 class="text-center">Mes Infos</h3>
                </div>
                <div class="dashboard-container" id="dClients" style="display:none;">
                    <h3 class="text-center">Mes Clients</h3>
                    <?php 
                        echo build_UserList();
                    ?>
                </div>
                <div class="dashboard-container" id="dServices" style="display:block;">
                    <h3 class="text-center">Mes Services</h3>
                    <div>
                        <div>
                            <h4 class="text-center">Ajout de Services</h4>
                            <form action="" method="post" class="add-product"enctype="multipart/form-data">
                                <input type="text" name="service-name" placeholder="Nom du service" class="input-field" required>
                                <input type="text" name="service-time" placeholder="Temps du service" class="input-field" required>
                                <input type="number" name="service-price" placeholder="Prix du service" class="input-field" required>
                                <input type="file" name="service-image" class="input-field" accept="image/png, image/jpeg, image/jpg" required>
                                <input type="submit" class="editbutton" name="add-service" value="Ajout du service">
                            </form>
                        </div>
                        <div class="pd-2">
                            <div class="dashboard-container mgh-1 pdT-2">
                                <h4 class="">Liste des services</h4>
                                <?php
                                $mysqli = require __DIR__."/database.php";
                                $sql="SELECT * FROM massage";
                                $num = 1;
                                $result = $mysqli->query($sql);
                                if(mysqli_num_rows($result))
                                {?>
                                <table class="table table-hover">
                                    <thead>
                                        <th>Sl No</th>
                                        <th>Image</th>
                                        <th>Nom du Service</th>
                                        <th>Durée</th>
                                        <th>Prix </th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while($row = $result->fetch_assoc())
                                        {?>
                                        <tr>
                                            <td><?php echo $num?></td>
                                            <td><img src="assets/images/massage/<?php echo $row["image"]?>" alt=" <?php echo $row['name'] ?>"></td>
                                            <td><?php echo $row['name']?></td>
                                            <td><?php echo $row['time']?></td>
                                            <td><?php echo $row['price']?>€</td>
                                            <td>
                                                <a href="delete_service.php?delete=<?php echo $row['id']?>" class="deleteProduct_btn" onclick="return confirm('Are you sure you want to delete this massage');">
                                                    <span class="material-symbols-outlined">delete</span>
                                                </a>
                                                <a href="update_service.php?edit=<?php echo $row['id']?>" class="editProduct_btn">
                                                    <span class="material-symbols-outlined">edit_square</span>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php
                                        $num++;
                                        }
                                    }else{
                                        echo "<div class='empty-text mgv-2'>Aucun service de disponible</div>";
                                    }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dashboard-container" id="dCompta" style="display:none;">
                    <h3 class="text-center">Ma Comptabilité</h3>
                </div>
                <div class="dashboard-container" id="dMsg" style="display:none">
                    <h3 class="text-center">Mes Messages</h3>
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
                <div class="dashboard-container" id="dComs" style="display:none;">
                    <h3 class="text-center">Avis & Commentaires</h3>
                    <?php 
                    $sql = "SELECT * FROM comments";
                    echo build_CommentList();
                    ?>
                </div>
            </div>  
            <div class="dashboard-preference border-green border-outset">
                <div class="dashboard-pref-container">
                    <strong>Mes Meilleurs Clients</strong>
                </div>
            </div>
        </section>

    </main>

    <!-- Footer -->
    <footer class="footer-dashboard">
        <section class="copyright">      
                <p>© Room Détente 2025. Tous droits réservés</p>
        </section>
    </footer>
</body>
</html>