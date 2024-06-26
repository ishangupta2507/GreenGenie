<?php
//including connect file
// include('./includes/connect.php');

//including products on first page
function getproducts()
{
    global $con;

    if (!isset($_GET['category'])) {
        if (!isset($_GET['brand'])) {
            $select_query = "select * from `products` order by rand() limit 0,3";
            $result_query = mysqli_query($con, $select_query);
            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_title = $row['product_title'];
                $product_id = $row['product_id'];
                $product_description = $row['product_description'];
                $product_image = $row['product_image'];
                $product_price = $row['product_price'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];
                echo "<div class='col-md-4'>
                        <div class='card fixed-size-card'>
                            <img src='./admin_area/product_images/$product_image' class='card-img-top' alt='Product 1'>
                            <div class='card-body text-center'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-description'> $product_description</p> 
                                <p class='card-price'> Rs $product_price/-</p>
                                <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
                                <a href='#' class='btn btn-primary'>View More</a>
                            </div>
                        </div>
                    </div> ";
            }
        }
    }
}
function get_all_products()
{
    global $con;

    if (!isset($_GET['category'])) {
        if (!isset($_GET['brand'])) {
            $select_query = "select * from `products` order by rand()";
            $result_query = mysqli_query($con, $select_query);
            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_title = $row['product_title'];
                $product_id = $row['product_id'];
                $product_description = $row['product_description'];
                $product_image = $row['product_image'];
                $product_price = $row['product_price'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];
                echo "<div class='col-md-4'>
                        <div class='card fixed-size-card'>
                            <img src='./admin_area/product_images/$product_image' class='card-img-top' alt='Product 1'>
                            <div class='card-body text-center'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-description'> $product_description</p> 
                                <p class='card-price'> Rs $product_price/-</p>
                                <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
                                <a href='#' class='btn btn-primary'>View More</a>
                            </div>
                        </div>
                    </div> ";
            }
        }
    }
}

function get_unique_categories()
{
    global $con;

    if (isset($_GET['category'])) {
        $category_id = $_GET['category'];
        $select_query = "select * from `products` where category_id=$category_id";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows == 0) {
            echo "<h2 class='text-center text-danger'>No stock available for this category</h2>";
        }
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_title = $row['product_title'];
            $product_id = $row['product_id'];
            $product_description = $row['product_description'];
            $product_image = $row['product_image'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];
            echo "<div class='col-md-4'>
                        <div class='card fixed-size-card'>
                            <img src='./admin_area/product_images/$product_image' class='card-img-top' alt='Product 1'>
                            <div class='card-body text-center'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-description'> $product_description</p> 
                                <p class='card-price'> Rs $product_price/-</p>
                                <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
                                <a href='#' class='btn btn-primary'>View More</a>
                            </div>
                        </div>
                    </div> ";
        }
    }
}

function get_unique_brands()
{
    global $con;

    if (isset($_GET['brand'])) {
        $brand_id = $_GET['brand'];
        $select_query = "select * from `products` where brand_id=$brand_id";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows == 0) {
            echo "<h2 class='text-center text-danger'>This brand is not available for the service</h2>";
        }
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_title = $row['product_title'];
            $product_id = $row['product_id'];
            $product_description = $row['product_description'];
            $product_image = $row['product_image'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];
            echo "<div class='col-md-4'>
                        <div class='card fixed-size-card'>
                            <img src='./admin_area/product_images/$product_image' class='card-img-top' alt='Product 1'>
                            <div class='card-body text-center'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-description'> $product_description</p> 
                                <p class='card-price'> Rs $product_price/-</p>
                                <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
                                <a href='#' class='btn btn-primary'>View More</a>
                            </div>
                        </div>
                    </div> ";
        }
    }
}



//displaying brands
function getBrands()
{
    global $con;
    $select_brands = "select * from `brands`";
    $result_brands = mysqli_query($con, $select_brands);
    while ($row_data = mysqli_fetch_assoc($result_brands)) {
        $brand_title = $row_data['brand_title'];
        $brand_id = $row_data['brand_id'];
        echo "<li><a class='dropdown-item' href='index.php?brand=$brand_id'>$brand_title</a><li>";
    }
}

//displaying categories
function getCategories()
{
    global $con;
    $select_categories = "select * from `categories`";
    $result_categories = mysqli_query($con, $select_categories);
    while ($row_data = mysqli_fetch_assoc($result_categories)) {
        $category_title = $row_data['category_title'];
        $category_id = $row_data['category_id'];
        echo "<li><a class='dropdown-item' href='index.php?category=$category_id'>$category_title</a><li>";
    }
}

//getting ip address
function getIPAddress()
{
    //whether ip is from the share internet  
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    //whether ip is from the remote address  
    else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}


function search_products()
{
    global $con;

    if (isset($_GET['search_data_product'])) {
        $search_data_value = $_GET['search_data'];
        $search_query = "select * from `products` where product_keywords like'%$search_data_value%'";
        $result_query = mysqli_query($con, $search_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows == 0) {
            echo "<h2 class='text-center text-danger'>Sorry, No such product found</h2>";
        }
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_title = $row['product_title'];
            $product_id = $row['product_id'];
            $product_description = $row['product_description'];
            $product_image = $row['product_image'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];
            echo "<div class='col-md-4'>
                        <div class='card fixed-size-card'>
                            <img src='./admin_area/product_images/$product_image' class='card-img-top' alt='Product 1'>
                            <div class='card-body text-center'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-description'> $product_description</p> 
                                <p class='card-price'> Rs $product_price/-</p>
                                <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
                                <a href='#' class='btn btn-primary'>View More</a>
                            </div>
                        </div>
                    </div> ";
        }
    }
}
function cart()
{
    if (isset($_GET['add_to_cart'])) {
        global $con;
        $ip = getIPAddress();
        $get_product_id = $_GET['add_to_cart'];
        $select_query = "Select * from `cart_details` where ip_address='$ip' and product_id=$get_product_id";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows > 0) {
            echo "<script>alert('This item is already added to cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        } else {
            $insert_query = "insert into `cart_details` (product_id,ip_address,quantity) values($get_product_id,'$ip',0)";
            $result_query = mysqli_query($con, $insert_query);
            echo "<script>alert('Item is added to the cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
}


function cart_item()
{

    if (isset($_GET['add_to_cart'])) {
        global $con;
        $ip = getIPAddress();
        $select_query = "Select * from `cart_details` where ip_address='$ip'";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
    } else {
        global $con;
        $ip = getIPAddress();
        $select_query = "Select * from `cart_details` where ip_address='$ip'";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
    }
    echo $num_of_rows;
}

function total_cart_price()
{
    global $con;
    $ip = getIPAddress();
    $total_price = 0;
    $cart_query = "select * from `cart_details` where ip_address='$ip'";
    $result = mysqli_query($con, $cart_query);
    while ($row = mysqli_fetch_array($result)) {
        $product_id = $row['product_id'];
        $select_products = "select * from `products` where product_id='$product_id'";
        $result_product = mysqli_query($con, $select_products);
        while ($row_product_price = mysqli_fetch_array($result_product)) {
            $product_price = array($row_product_price['product_price']);
            $product_values = array_sum($product_price);
            $total_price += $product_values;
        }
    }
    echo $total_price;
}

function get_user_order_details()
{
    global $con;
    $username = $_SESSION['username'];
    $get_details = "select * from `user_table` where username='$username'";
    $result_query = mysqli_query($con, $get_details);
    while ($row_query = mysqli_fetch_array($result_query)) {
        $user_id = $row_query['user_id'];
        if (!isset($_GET['edit_account'])) {
            if (!isset($_GET['my_orders'])) {
                if (!isset($_GET['delete_account'])) {
                    $get_orders = "select * from `user_orders` where user_id=$user_id and order_status='pending' ";
                    $result_get_orders = mysqli_query($con, $get_orders);
                    $get_orders_count = mysqli_num_rows($result_get_orders);
                    if ($get_orders_count > 0) {
                        echo "<h2 class = 'text-center mt-5 mb-3'>You have <span>$get_orders_count</span> pending orders</h2>
                         <p class = 'text-center'><a href='profile.php?my_orders'>Order Details</a></p>";
                    } else {
                        echo "<h2 class = 'text-center mt-5 mb-3'> You have no pending orders</h2> 
                        <p class = 'text-center'><a href='../index.php'>Explore Products</a></p>";
                    }
                }
            }
        }
    }
}
