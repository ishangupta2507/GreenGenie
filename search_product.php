<?php
include('includes/connect.php');
include('function/common_functions.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="style.css">
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
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false" href="#">Delivery Brands</a>
                            <ul class="dropdown-menu">
                                <?php
                                getbrands();
                                ?>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false" href="#">Categories</a>
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
                        <li class="nav-item">
                            <a class="nav-link" href="#">Total Price : <?php total_cart_price(); ?>/-</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search" action="" method="get">
                        <input class="form-control me-2" type="search" placeholder="Go Genie!" aria-label="Search" name="search_data">
                        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
                    </form>
                </div>
            </div>
        </nav>

        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">
                <?php
                if (!isset($_SESSION['username'])) {
                    echo " <li class='nav-item'>
                        <a class='nav-link' href='#'>Welcome Guest</a>
                    </li>";
                } else {
                    echo " <li class='nav-item'>
                        <a class='nav-link' href='#'>Welcom " . $_SESSION['username'] . "</a>
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


        <div class="container my-5">
            <h2 class="text-center mb-5" style="color: #283618;">Our Most Loved Products</h2>
            <div class="row d-flex justify-content-between">
                <?php

                search_products();
                get_unique_categories();
                get_unique_brands();
                ?>

            </div>
        </div>




        <div class="container-fluid how-it-works">
            <h2>How It Works</h2>
            <div class="row g-4">
                <div class="col-md-4 step">
                    <i class="fa-solid fa-seedling fa-3x"></i>
                    <h3>Nourish with Purpose</h3>
                    <p>Explore our selection of plant-based health foods, thoughtfully packaged in compostable materials for a conscious and delicious shopping experience</p>
                </div>
                <div class="col-md-4 step">
                    <i class="fa-solid fa-arrow-rotate-left fa-3x"></i>
                    <h3>Close the Loop</h3>
                    <p>After enjoying your products, take a sustainable step forward by composting the packaging yourself or conveniently sending them back to us so we can compost them for you.</p>
                </div>
                <div class="col-md-4 step">
                    <i class="fa-solid fa-champagne-glasses fa-3x"></i>
                    <h3>Cheers to Change</h3>
                    <p>Celebrate the positive impact of your choices as you join a community committed to a healthier planet, one compostable bag at a time.</p>
                </div>
            </div>
        </div>

        <div class="container testimonial-section">
            <h2>What Our Customers Are Saying</h2>
            <div class="row">
                <div class="col-md-4 testimonial">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <p>"These products have changed my life! I feel healthier and more energized every day."</p>
                    <h5>Jane Doe</h5>
                    <h6>Verified Customer</h6>
                </div>
                <div class="col-md-4 testimonial">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star-half"></i>
                    <p>"I love the sustainable packaging and the quality of the products. Highly recommend!"</p>
                    <h5>John Smith</h5>
                    <h6>Verified Customer</h6>
                </div>
                <div class="col-md-4 testimonial">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <p>"Excellent customer service and fast shipping. I'm a loyal customer now."</p>
                    <h5>Mary Johnson</h5>
                    <h6>Verified Customer</h6>
                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <h5>Company</h5>
                        <ul class="list-unstyled">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Careers</a></li>
                            <li><a href="#">Press</a></li>
                            <li><a href="#">Blog</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h5>Support</h5>
                        <ul class="list-unstyled">
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Shipping & Returns</a></li>
                            <li><a href="#">Terms of Service</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h5>Shop</h5>
                        <ul class="list-unstyled">
                            <li><a href="#">Shop All</a></li>
                            <li><a href="#">Best Sellers</a></li>
                            <li><a href="#">New Arrivals</a></li>
                            <li><a href="#">Gift Cards</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h5>Connect with Us</h5>
                        <div class="social-icons">
                            <a href="#"><i class="fab fa-facebook"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-pinterest"></i></a>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                        </div>
                        <h5 class="mt-4">Subscribe to Our Newsletter</h5>
                        <form>
                            <div class="input-group mb-3">
                                <input type="email" class="form-control" placeholder="Your email address" aria-label="Email">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">Subscribe</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

    </div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>