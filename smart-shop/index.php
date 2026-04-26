<?php
require "db.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

if(!isset($_SESSION['user']))
    {
    header("Location: login.php");
    exit();
    }
if(isset($_GET['category'])) {
    setcookie("category", $_GET['category'], time()+15, "/");
    header("Location: index.php");
    exit();
}
// do sessions persist data even after complete browser close or just maintain across tabs

// if(!isset($_SESSION['cart'])){
//     $_SESSION['cart'] = [];
// }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Smart Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-5">

    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-sm">
                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="mb-0">🛒 Smart Shop</h4>

                            <div>
                                <small class="text-muted me-2">
                                    <?= $_SESSION['user'] ?>
                                </small>
                                <a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
                            </div>
                    </div>

                    <div class="mb-3">
                        <h6 class="text-muted">Select Category</h6>

                        <div class="d-flex flex-wrap gap-2">
                            <a href="?category=Cloths" class="btn btn-dark btn-sm">Cloths</a>
                            <a href="?category=Electronics" class="btn btn-dark btn-sm">Electronics</a>
                            <a href="?category=Home" class="btn btn-dark btn-sm">Home</a>
                            <a href="?category=Beauty" class="btn btn-dark btn-sm">Beauty</a>
                        </div>
                    </div>

                    <div class="alert alert-secondary py-2">
                        <?php
                        // var_dump($_SESSION);
                        if(isset($_COOKIE['category'])) {
                            echo "Selected: <b>".$_COOKIE['category']."</b>";
                        } else {
                            echo "No category selected";
                        }
                        ?>
                    </div>

                    <div class="mb-3">
                        <h6 class="text-muted">Cart</h6>

                        <?php
                            $user_id = $_SESSION['user_id']; 

                            $sql = "SELECT item_name FROM cart WHERE user_id = $user_id";
                            $result = $conn->query($sql);

                            if(!$result){
                                echo "<p class='text-danger small'>Error fetching cart</p>";
                            } 
                            elseif($result->num_rows == 0) { ?>
                                <p class="text-muted small">Cart is empty</p>
                            <?php } else { ?>
                                <ul class="list-group list-group-sm">
                                    <?php while($row = $result->fetch_assoc()){ ?>
                                        <li class="list-group-item py-1">
                                            <?= $row['item_name'] ?>
                                        </li>
                                    <?php } ?>
                                </ul>
                            <?php } ?>
                    </div>


                    <div class="mb-3">
                        <h6 class="text-muted">Add Items</h6>

                        <div class="d-flex flex-wrap gap-2">
                            <a href="add_to_cart.php?item=Shirt"  class="btn btn-dark btn-sm">Shirt</a>
                            <a href="add_to_cart.php?item=Pressurecooker" class="btn btn-dark btn-sm">Pressure Cooker</a>
                            <a href="add_to_cart.php?item=Mobile" class="btn btn-dark btn-sm">Mobile</a>
                            <a href="add_to_cart.php?item=Sunscreen" class="btn btn-dark btn-sm">Sunscreen</a>
                        </div>
                    </div>

                    <div class="text-end">
                        <a href="clear_cart.php" class="btn btn-danger btn-sm">Clear Cart</a>
                    </div>

                </div>
            </div>

        </div>
    </div>

</div>
</body>
</html>