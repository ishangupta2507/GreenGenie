<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="../style.css">
    <style>
        .user-img {
            width: 100px;
            object-fit: contain;
        }

        .row-custom-background {
            background-color: #dda15e;
            padding: 1rem;
            
        }
        
    </style>

</head>

<body>
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <img src="../images/logobg.png" alt="" class="logo">
                <nav class="navbar expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="#" class="nav-link">Welcome Guest</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
        <div class="">
            <h3 class="text-center p-2">Manage Details</h3>
        </div>

        <div class="row row-custom-background">
            <div class="col-md-12 p-1 d-flex align-items-center">
                <div class="px-5 py-2">
                    <a href="" class="admin_img"><img src="../images/user.jpg" alt="" class="user-img"></a>
                    <p class="text-light text-center">Admin Name</p>
                </div>
                <div class="button text-center px-5">
                    <button class="btn custom-button mb-1"><a href="insert_products.php" class="nav-link text-light">Insert Products</a></button>
                    <button class="btn custom-button mb-1"><a href="" class="nav-link text-light">View Products</a></button>
                    <button class="btn custom-button mb-1"><a href="index.php?insert_category" class="nav-link text-light">Insert Categories</a></button>
                    <button class="btn custom-button mb-1"><a href="" class="nav-link text-light">View Categories</a></button>
                    <button class="btn custom-button mb-1"><a href="index.php?insert_brand" class="nav-link text-light">Insert Brands</a></button>
                    <button class="btn custom-button mb-1"><a href="" class="nav-link text-light">View Brands</a></button>
                    <button class="btn custom-button mb-1"><a href="" class="nav-link text-light">All orders</a></button>
                    <button class="btn custom-button mb-1"><a href="" class="nav-link text-light">All payments</a></button>
                    <button class="btn custom-button mb-1"><a href="" class="nav-link text-light">All Users</a></button>
                    <button class="btn custom-button mb-1"><a href="" class="nav-link text-light">Logout</a></button>
                </div>
            </div>
        </div>

        <div class="container my-3">
            <?php
            if(isset($_GET['insert_category']))
            {
                include('insert_categories.php');
            }
            if(isset($_GET['insert_brand']))
            {
                include('insert_brands.php');
            }
            ?>
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