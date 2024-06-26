<?php
include('../includes/connect.php');
include('../function/common_functions.php');
@session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="style.css">
    <style>
        /* General Styles */
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

        /* Form Elements */
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
    <div class="container mt-3">
        <h1 class="text-center">User Login</h1>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline mb-4 m-auto w-50">
                <label for="user_username" class="form-label">Username</label>
                <input type="text" name="user_username" id="user_username" class="form-control" placeholder="Enter your username" autocomplete="off" required="required">
            </div>

            <div class="form-outline mb-4 m-auto w-50">
                <label for="user_password" class="form-label">Password</label>
                <input type="password" name="user_password" id="user_password" class="form-control" placeholder="Enter password" autocomplete="off" required="required">
            </div>

            <div class="form-outline mb-4 m-auto w-50">
                <input type="submit" name="user_login" class="btn mb-3 px-3" value="Login">
                <p class="small fw-bold">Don't have an account ? <a href="user_registration.php"> Register</a></p>
            </div>
        </form>
    </div>
</body>

</html>

<?php
if (isset($_POST['user_login'])) {
    $user_username = $_POST['user_username'];
    $user_password = $_POST['user_password'];
    $user_ip = getIPAddress();

    $select_query_cart = "select * from `cart_details` where ip_address='$user_ip'";
    $select_cart = mysqli_query($con, $select_query_cart);
    $count_cart = mysqli_num_rows($select_cart);


    $select_query = "select * from `user_table` where username='$user_username'";
    $result = mysqli_query($con, $select_query);
    $row_data = mysqli_fetch_assoc($result);
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        $_SESSION['username'] = $user_username;
        if (password_verify($user_password, $row_data['user_password'])) {
            if ($count == 1 and $count_cart == 0) {
                $_SESSION['username'] = $user_username;
                echo "<script>alert('You have logged in successfully')</script> ";
                echo "<script>window.open('profile.php','_self')</script> ";
            } else {
                $_SESSION['username'] = $user_username;
                echo "<script>alert('You have logged in successfully')</script> ";
                echo "<script>window.open('payment.php','_self')</script> ";
            }
        } else {
            echo "<script>alert('Invalid Credentials')</script> ";
        }
    } else {
        echo "<script>alert('Invalid Credentials')</script> ";
    }
}

?>