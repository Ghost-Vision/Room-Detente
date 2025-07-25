<?php
session_start();
$mysqli = require __DIR__ . "/database.php";
// update user
if (isset($_SESSION["user_id"]))
{
    $sql = "SELECT * FROM users
            WHERE id={$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
}

if(isset($_GET['remove']))
{
    $removeID=$_GET['remove'];
    echo $removeID;

    $removeProduct = "DELETE FROM cart
            WHERE id=?";
    $stmt= $mysqli->prepare($removeProduct);
    $stmt->bind_param("s",$removeID);
    $stmt->execute();
    header("location:cart.php");
}

if(isset($_GET["delete_all"]))
{
    $sql="DELETE FROM cart";
    $stmt=$mysqli->prepare($sql);
    $stmt->execute();
    header("location:cart.php");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart - Test Checkout</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="styles/main.css">
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
                    <a href="cart.php">
                        <img src="assets/images/shopping-bag.png" alt="icon panier"> 
                        <span class="badge badge-pill badge-info"><?php echo $row_count;?></span>
                    </a> 
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



    <main class="dash-client-bg flex-center">
        <div class="dashboard-grid">
            <section></section>
            <section class="shopping-cart">
                <h1 class="heading">Mon panier</h1>
                <div class="shopping-cart-block">
                    <table class="table table-hover">
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
                                            <span class='material-symbols-outlined'>delete</span>Remove
                                        </a>
                                    </td>
                                </tr>
                                <?php
                                $grandTotal=$grandTotal+$row['price'];
                                $num++;
                                }
                            }
                            else
                            {
                                echo "<div class='empty-text'>Votre panier est vide</div>";
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </section>
            <section>
                <!-- php code -->
                <!-- Bottom Area -->
                <?php if($grandTotal>0):?>
                <div class=block-bottom>
                    <div class='table-bottom'>
                        <a href='shop_products.php' class='bottom-btn'>Continue Shopping</a>
                        <h3 class='bottom-btn'>Prix Total: <span><?php echo $grandTotal ?></span>€</h3>
                        <a href='checkout.php' class='bottom-btn'>Propceed to checkout</a>
                    </div>
                    <a href='cart.php?delete_all' class='delete-all-btn'>
                        <span class='material-symbols-outlined'>delete</span>Delete All
                    </a>
                </div>
                <?php endif?>
            </section>
        </div>
    </main>

    <!-- Footer -->
    <?php require __DIR__."/footer.html"?>
</body>
</html>