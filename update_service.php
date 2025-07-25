<?php 
require __DIR__."/database.php";

// Update Logic
if(isset($_POST['update-service']))
{
    $updateServiceID = $_POST['update-service-id'];
    $updateServiceName = $_POST['update-service-name'];
    $updateServiceName = $_POST['update-service-time'];
    $updateServicePrice = $_POST['update-service-price'];
    $updateServiceImage = $_FILES['update-service-image']['name'];
    $updateServiceImageTmpName = $_FILES['update-service-image']['tmp_name'];
    $updateServiceImageFolder = 'assets/images/'.$updateserviceImage;


    //Update Query
    $updateServices = "UPDATE `services` SET 
            name =?,time =?,price=?,image=? WHERE id=?";
    $stmt = $mysqli->prepare($updateServices);
    $stmt ->bind_param("issds",
                        $updateServiceID,
                        $updateServiceName,
                        $updateServiceTime,
                        $updateServicePrice,
                        $updateServiceImage);
    $stmt->execute();

    if($updateServices)
    {
        move_uploaded_file($updateserviceImageTmpName, $updateserviceImageFolder);
    }
    else
    {
        $displayMessage = "There is some error in updating the service";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrateur - Update Service</title>

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
        <!-- message display -->
        <?php
            if(isset($displayMessage))
            {
                echo "<div class='display-message'>
                    <span>$displayMessage</span>
                    <i class='' onclick='this.parentElement.style.display=`none`';></i>
                    </div>";
            }
        ?>
        <section class="dash-title">
            <h2 class="text-white">Bonjour Julie</h2>
        </section>
        <section class="dashboard-grid">
            <div class="admin-selection border-green">
                <h3 style="padding: 1rem; text-align: center">Dashboard</h3>
                <button class="dashboard-button" id="buttonInfo" onclick="location.href='dashboard_admin.php'">Retour Dashboard</button>
            </div>
            <div  class="dashboard-container">
                <div>
                    <h3 class="text-center">Mise a jour - Services</h3>
                </div>
                <div>
                <?php
                if(isset($_GET['edit']))
                {
                    $edit_id=$_GET['edit'];
                    $sql = mysqli_query($mysqli,"SELECT * FROM massages
                            WHERE id=$edit_id");
                    
                    if(mysqli_num_rows($sql)>0){
                    {
                        $fetch_data=mysqli_fetch_assoc($sql);
                        // $row=$fetch_data['price'];
                        // echo $row,".00€";  
                    }?>
                <form action="" method="post" class="update-product product-containerBox no-border" enctype="multipart/form-data">
                    <img src="assets/images/massage/<?php echo $fetch_data['image']?>" alt="">
                    <input type="hidden" value="<?php echo $fetch_data['id']?>" name="update-product-id">
                    <input type="text" class="input-field field" required value="<?php echo $fetch_data['name']?>" name="update-product-name">
                    <input type="number" class="input-field field" required value="<?php echo $fetch_data['price']?>" name="update-product-price">
                    <input type="file" class="input-field field" required accept="image/jpeg, image/jpg, image/png" name="update-product-image">
                    <div style="display: inline-flex;">
                        <input type="submit" value="Modifer" class="editbutton" name="update-product">
                        <input type="reset" value="Reset" class="editbutton" id="cancel-edit">
                    </div>
                </form>
                <?php
                    }
                }?>
                </div>
            </div>  
            <div class="border-green dashboard-preference ">
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