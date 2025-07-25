<?php
require __DIR__."/database.php";

if(isset($_POST['add-to-cart']))
{
    $serviceName=$_POST['product-name'];
    $servicePrice=$_POST['product-price'];
    $serviceTime=$_POST['product-time'];
    $serviceTimeSlot=$_POST['product-timeslot'];
    $serviceDate=$_POST['product-date'];

    //select cart data based on condition
    $selectCart = "SELECT * FROM cart 
                    WHERE name=?";
    $stmt = $mysqli->stmt_init();
    $stmt->prepare($selectCart);
    $stmt->bind_param("s",$productName);

    if ($stmt->execute())
    {
        $result=$stmt->get_result();
        if($result->num_rows>0)
        {
            $displayMessage[] = 'product already added to cart';
        }
        else
        {
            // insert cart data in cart table
            $insertProducts = "INSERT into cart (name,price,image,quantity)
                            VALUES ('$productName','$productPrice','$productImage',$productQuantity)";
            $stmt = $mysqli->stmt_init();
            $stmt -> prepare($insertProducts);
            $stmt -> execute();
            $displayMessage[]= 'product added to cart';
        }   
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Détente - Dashboard</title>

    <link rel="icon" href="assets/images/Logo_RoomDetente_Rond.png">
    <link rel="stylesheet" href="styles/main.css">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="js/hide_section_client.js" defer></script>

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
        <div class="appBar-dashboard">
            <a href="index.php">
                <img class="appBar__icon" src="assets/images/Logo_RoomDetente_White_LR.png" alt="Logo Room Détente" >
            </a>
            <h2 class="appBar__nav text-white">Mon Espace Perso</h2>
            <nav class="appBar-dashboard__login appBar__login">
                <button type="button" class="btn-basket" data-toggle="modal" data-target="#Modal-Basket">
                    <img src="assets/images/shopping-bag.png" alt="icon panier"> 
                    <span class="badge badge-pill badge-info"><?php echo $row_count;?></span>
                </button>
                <a href="dashboard_client.php">
                    <span class="material-symbols-outlined" style="font-size: 4rem; color:whitesmoke; font-variation-settings:'wght' 150;">account_circle</span>
                </a>
                <a href="logout.php" class="text-white">
                    <img src="assets/images/logout.png" alt="Logo de Profil">
                    Logout
                </a>
            </nav>
        </div>
    </header>
    <?php
    if(isset($displayMessage))
    {
        foreach($displayMessage as $displayMessage)
        {
            echo "<div class='display-message'>
                    <span>$displayMessage</span>
                    <span class='material-symbols-outlined' onclick='this.parentElement.style.display=`none`'>close</span>
                </div>";
        }
    }
    ?>
    <main class="dash-client-bg">
        <nav class="blackBanner">
            <p class="blackBanner__title no-margin">Aller au panier</p>
            <a class="button" href="cart.php">Panier</a>
        </nav>
        <h3 class="heading">Massages & services</h3>
        <div class="products-container pdB-4">
            <?php
            $sql = "SELECT * FROM massage";
            $selectProducts=mysqli_query($mysqli,$sql);

            if(mysqli_num_rows($selectProducts)>0)
            {
                while($fetchProduct = mysqli_fetch_assoc($selectProducts))
                {?>
                <form action="booking.php?massage='<?php echo $fetchProduct['name']?>'" method="post">
                    <div class="edit-form">
                        <img src="assets/images/massage/<?php echo $fetchProduct['image']?>" alt="">
                        <h4><?php echo $fetchProduct['name']?></h3>
                        <div class="price">
                            <span>Prix : <?php echo $fetchProduct['price'] . '.00€'?></span>
                            <span>Temps : <?php echo $fetchProduct['time']?></span>
                        </div>
                        <input type="hidden" name="product-name" value="<?php echo $fetchProduct['name']?>">
                        <input type="hidden" name="product-time" value="<?php echo $fetchProduct['time']?>">
                        <input type="hidden" name="product-price" value="<?php echo $fetchProduct['price']?>">
                        <input type="hidden" name="product-image" value="<?php echo $fetchProduct['image']?>">
                        <input type="submit" value="Add to Cart" name="" class="submit-btn cart-btn">
                    </div>
                </form>
                <?php
                }
            }
            else{
                echo "<div class='empty-text'>Aucun service de disponible</div>";
            }?>
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