<?php
include('../includes/connect.php');
include('../function/common_functions.php');

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
} else {
    // Handle the case where user_id is not set
    echo "User ID is not set.";
    exit();
}

$user_ip = getIPAddress();
$total = 0;
$cart_price_query = "select * from `cart_details` where ip_address='$user_ip'";
$result_cart = mysqli_query($con, $cart_price_query);
$invoice_number = mt_rand();
$status = 'pending';
$count_rows = mysqli_num_rows($result_cart);

while ($row_price = mysqli_fetch_array($result_cart)) {
    $product_id = $row_price['product_id'];
    $select_products = "select * from `products` where product_id=$product_id";
    $run_query = mysqli_query($con, $select_products);
    while ($row_product_price = mysqli_fetch_array($run_query)) {
        $product_price = array($row_product_price['product_price']);
        $product_values = array_sum($product_price);
        $total += $product_values;
    }
}

$get_cart = "select * from `cart_details` where ip_address='$user_ip'";
$run_cart = mysqli_query($con, $get_cart);
$get_item_quantity = mysqli_fetch_array($run_cart);
$quantity = $get_item_quantity['quantity'];

if ($quantity == 0) {
    $quantity = 1;
    $subtotal = $total;
} else {
    $quantity = $quantity;
    $subtotal = $total * $quantity;
}

// Prepare the SQL query with proper handling of string and integer variables
$insert_orders = "insert into `user_orders` (user_id, amount_due, invoice_number, total_products, order_date, order_status) values ($user_id, $subtotal, $invoice_number, $count_rows, NOW(), '$status')";

$result_query = mysqli_query($con, $insert_orders);

if ($result_query) {
    echo "<script>alert('Orders submitted successfully')</script>";
    echo "<script>window.open('profile.php','_self')</script>";
} else {
    echo "Error: " . mysqli_error($con);
}

$insert_pending_orders = "insert into `orders_pending` (user_id, invoice_number, product_id,quantity, order_status) values ($user_id, $invoice_number, $product_id, $quantity, '$status')";
$result_pending_orders = mysqli_query($con, $insert_pending_orders);

$empty_cart = "delete from `cart_details` where ip_address='$user_ip'";
$result_empty_cart = mysqli_query($con, $empty_cart);
