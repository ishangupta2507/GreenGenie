<?php
include('../includes/connect.php');
include('../function/common_functions.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment-Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .payment-option {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            transition: all 0.3s ease;
        }

        .payment-option:hover {
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .payment-option img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .payment-option h2 {
            margin: 0;
            color: #007bff;
        }

        .payment-option a {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <?php
    $user_ip = getIPAddress();
    $get_user = "select * from `user_table` where user_ip='$user_ip'";
    $result = mysqli_query($con, $get_user);
    $run_query = mysqli_fetch_array($result);
    $user_id = $run_query['user_id'];
    ?>
    <div class="container my-5">
        <h2 class="text-center mb-4">Payment Options</h2>
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-5 m-2">
                <a href="https://www.paypal.com" target="_blank">
                    <div class="payment-option">
                        <img src="../images/upi.jpg" alt="UPI Payment">
                    </div>
                </a>
            </div>
            <div class="col-md-5 m-2">
                <a href="order.php?user_id=<?php echo $user_id  ?>">
                    <div class="payment-option">
                        <h2 class="text-center">Pay Offline</h2>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
