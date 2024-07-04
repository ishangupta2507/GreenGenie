<?php
include('./includes/connect.php');
include('function/common_functions.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Green Genie - Cart Details</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./style.css">

    <style>
        .welcome-logout {
            padding-left: 20px;
            background-color: #6b8e23; /* Olive green */
            color: #fff; /* White text color */
        }
        .table img {
            width: 70px;
            height: 70px;
            object-fit: cover;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }

        .cart-button {
            background-color: #bc6c25;
            /* Earth Brown */
            color: #fefae0;
            /* Light Beige */
            border: none;
        }

        .cart-button:hover {
            background-color: #606c38;
            /* Olive Green */
            color: #fefae0;
            /* Light Beige */
        }
    </style>
</head>

<body>
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <img src="./images/logobg.png" alt="" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="display_all.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./users_area/user_registration.php">Register</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Delivery Brands</a>
                            <ul class="dropdown-menu">
                                <?php
                                getbrands();
                                ?>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Categories</a>
                            <ul class="dropdown-menu">
                                <?php
                                getCategories();
                                ?>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"><sup><?php cart_item(); ?></sup></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <nav class="navbar navbar-expand-lg welcome-logout">
            <ul class="navbar-nav me-auto">
                <?php
                if (!isset($_SESSION['username'])) {
                    echo " <li class='nav-item'>
                        <a class='nav-link' href='#'>Welcome Guest</a>
                    </li>";
                } else {
                    echo " <li class='nav-item'>
                        <a class='nav-link' href='#'>Welcome " . $_SESSION['username'] . "</a>
                    </li>";
                }
                if (!isset($_SESSION['username'])) {
                    echo " <li class='nav-item'>
                    <a class='nav-link' href='./users_area/user_login.php'>Login</a>
                </li>";
                } else {
                    echo " <li class='nav-item'>
                    <a class='nav-link' href='./users_area/logout.php'>Logout</a>
                </li>";
                }
                ?>
            </ul>
        </nav>
        <?php
        cart();
        ?>

        <div class="container my-5">
            <h2 class="text-center mb-5" style="color: #283618;">Green Goodies Awaiting Checkout</h2>
        </div>

        <div class="container">
            <div class="row">
                <form action="" method="post">
                    <table class="table table-bordered text-center">
                        <?php
                        global $con;
                        $ip = getIPAddress();
                        $total_price = 0;
                        $cart_query = "SELECT * FROM `cart_details` WHERE ip_address='$ip'";
                        $result = mysqli_query($con, $cart_query);
                        if (mysqli_num_rows($result) > 0) {
                            echo "<thead>
                                    <tr>
                                        <th>Product Title</th>
                                        <th>Image</th>
                                        <th>Quantity</th>
                                        <th>Total Price</th>
                                        <th>Remove</th>
                                        <th colspan='2'>Operations</th>
                                    </tr>
                                </thead>
                                <tbody>";
                            while ($row = mysqli_fetch_array($result)) {
                                $product_id = $row['product_id'];
                                $select_products = "SELECT * FROM `products` WHERE product_id='$product_id'";
                                $result_product = mysqli_query($con, $select_products);
                                while ($row_product_price = mysqli_fetch_array($result_product)) {
                                    $product_price = $row_product_price['product_price'];
                                    $product_title = $row_product_price['product_title'];
                                    $product_image = $row_product_price['product_image'];
                                    $quantity = $row['quantity'];
                                    if ($quantity == 0) {
                                        $quantity = 1; // default to 1 if quantity is 0
                                    }
                                    $total_price += $product_price * $quantity;
                        ?>
                                    <tr>
                                        <td><?php echo $product_title ?></td>
                                        <td><img src="./admin_area/product_images/<?php echo $product_image ?>" alt=""></td>
                                        <td><input type="text" name="qty[<?php echo $product_id; ?>]" value="<?php echo $quantity; ?>" class="form-input w-50"></td>
                                        <td><?php echo $product_price * $quantity ?>/-</td>
                                        <td><input type="checkbox" name="removeitems[]" value="<?php echo $product_id; ?>"></td>
                                        <td>
                                            <input type="submit" class="btn btn-outline-light cart-button px-3 py-1 mx-3" name="update_cart" value="Update Cart">
                                            <input type="submit" class="btn btn-outline-light cart-button px-3 py-1 mx-3" name="remove_cart" value="Remove Cart">
                                        </td>
                                    </tr>
                        <?php
                                }
                            }
                        } else {
                            echo "<tr><td colspan='6'>Your cart is currently empty.</td></tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                    <div class="d-flex mb-3">
                        <?php
                        if (mysqli_num_rows($result) > 0) {
                            echo "<h4 class='px-3'>Subtotal : <strong>$total_price /-</strong></h4>
                            <input type='submit' class='btn btn-outline-light cart-button px-3 py-1 mx-3' name='continue_shopping' value='Continue Shopping'>
                            <button class='btn btn-outline-light cart-button px-3 py-1 mx-3'><a class='text-light text-decoration-none' href='./users_area/checkout.php'>Checkout</a></button>";
                        } else {
                            echo "<input type='submit' class='btn btn-outline-light cart-button px-3 py-1 mx-3' name='continue_shopping' value='Continue Shopping'>";
                        }
                        if (isset($_POST['continue_shopping'])) {
                            echo "<script>window.open('index.php','_self')</script>";
                        }
                        ?>
                    </div>
                </form>
            </div>
        </div>

        <!--function to update cart quantities-->
        <?php
        function update_cart_quantities()
        {
            global $con;
            if (isset($_POST['update_cart'])) {
                foreach ($_POST['qty'] as $product_id => $quantity) {
                    $product_id = (int)$product_id;
                    $quantity = (int)$quantity;
                    $update_query = "UPDATE `cart_details` SET quantity='$quantity' WHERE product_id=$product_id";
                    $run_update = mysqli_query($con, $update_query);
                }
                echo "<script>window.open('cart.php','_self')</script>";
            }
        }
        update_cart_quantities();
        ?>

        <!--function to remove item-->
        <?php
        function remove_cart_item()
        {
            global $con;
            if (isset($_POST['remove_cart'])) {
                foreach ($_POST['removeitems'] as $remove_id) {
                    $remove_id = (int)$remove_id;
                    $delete_query = "DELETE FROM `cart_details` WHERE product_id=$remove_id";
                    $run_delete = mysqli_query($con, $delete_query);
                    if ($run_delete) {
                        echo "<script>window.open('cart.php','_self')</script>";
                    }
                }
            }
        }
        remove_cart_item();
        ?>

        <?php
        include("./includes/footer.php");
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
