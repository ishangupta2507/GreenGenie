<?php
include('../includes/connect.php');
session_start();
if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
    $select_data = "select * from `user_orders` where order_id=$order_id";
    $result_data = mysqli_query($con, $select_data);
    $row_fetch = mysqli_fetch_assoc($result_data);
    $invoice_number = $row_fetch['invoice_number'];
    $amount_due = $row_fetch['amount_due'];
}

if (isset($_POST['confirm_payment'])) {
    $invoice_number = $_POST['invoice_number'];
    $amount = $_POST['amount'];
    $payment_mode = $_POST['payment_mode'];
    $insert_query = "insert into `user_payments` (order_id, invoice_number,amount, payment_mode) values ($order_id,$invoice_number,$amount,'$payment_mode')";
    $result_insert = mysqli_query($con, $insert_query);
    if ($result_insert) {
        echo "<script>alert('Payment Successful')</script>";
        echo "<script>window.open('profile.php?my_orders','_self')</script>";
    }
    $update_query = "update `user_orders` set order_status='Complete' where order_id=$order_id";
    $resul_orders = mysqli_query($con, $update_query);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* Form Elements */
        body {
            background-color: #FEFAE0;
            color: #283618;
        }

        /* Form Styles */
        form {
            background-color: #FEFAE0;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-label {
            color: #283618;
        }

        .form-control {
            border-color: #606C38;
        }

        .form-control:focus {
            border-color: #BC6C25;
            box-shadow: 0 0 5px rgba(188, 108, 37, 0.5);
        }

        .form-select {
            border-color: #606C38;
        }

        .form-select:focus {
            border-color: #BC6C25;
            box-shadow: 0 0 5px rgba(188, 108, 37, 0.5);
        }

        /* Button Styles */
        .btn {
            background-color: #606C38;
            color: #FFFFFF;
            border: none;
        }

        .btn:hover {
            background-color: #DDA15E;
            color: #FFFFFF;
        }

        form p {
            color: #606C38;
        }

        form a {
            color: #DDA15E;
        }

        /* Heading Style */
        h1.text-center {
            color: #606C38;
        }

        /* Image Input Style */
        input[type="file"] {
            border: none;
            padding: 10px 0;
        }

        input[type="file"]::-webkit-file-upload-button {
            background-color: #606C38;
            color: #FFFFFF;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }

        input[type="file"]::-webkit-file-upload-button:hover {
            background-color: #BC6C25;
        }
    </style>
</head>

<body>

    <div class="container my-5">
        <h1 class="text-center">Confirm Payment</h1>
        <form action="" method="post">
            <div class="form-outline text-center mb-4 m-auto w-50">
                <input type="text" name="invoice_number" class="form-control w-50 m-auto" value="<?php echo $invoice_number  ?>">
            </div>
            <div class="form-outline text-center mb-4 m-auto w-50">
                <label for="">Amount</label>
                <input type="text" name="amount" class="form-control w-50 m-auto" value="<?php echo $amount_due  ?>">
            </div>
            <div class="form-outline text-center mb-4 m-auto w-50">
                <select name="payment_mode" class="form-control w-50 m-auto">
                    <option>Select payment mode</option>
                    <option>UPI</option>
                    <option>Net banking</option>
                    <option>Paypal</option>
                    <option>Cash on Delivery</option>
                    <option>Pay offline</option>
                </select>
            </div>
            <div class="form-outline text-center mb-4 m-auto w-50">
                <input type="submit" name="confirm_payment" class="btn mb-3 px-3" value="Confirm">
            </div>
        </form>

    </div>

</body>

</html>