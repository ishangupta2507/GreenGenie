<?php
include('../includes/connect.php');
include('../function/common_functions.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User - registration</title>
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
        <h1 class="text-center">New User Registration</h1>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline mb-4 m-auto w-50">
                <label for="user_username" class="form-label">Username</label>
                <input type="text" name="user_username" id="user_username" class="form-control" placeholder="Enter your username" autocomplete="off" required="required">
            </div>

            <div class="form-outline mb-4 m-auto w-50">
                <label for="user_email" class="form-label">Email</label>
                <input type="text" name="user_email" id="user_email" class="form-control" placeholder="Enter your email" autocomplete="off" required="required">
            </div>

            <div class="form-outline mb-4 m-auto w-50">
                <label for="user_password" class="form-label">Password</label>
                <input type="password" name="user_password" id="user_password" class="form-control" placeholder="Enter password" autocomplete="off" required="required">
            </div>

            <div class="form-outline mb-4 m-auto w-50">
                <label for="conf_user_password" class="form-label">Confirm Password</label>
                <input type="password" name="conf_user_password" id="conf_user_password" class="form-control" placeholder="Confirm password" autocomplete="off" required="required">
            </div>

            <div class="form-outline mb-4 m-auto w-50">
                <label for="user_address" class="form-label">Address</label>
                <input type="text" name="user_address" id="user_address" class="form-control" placeholder="Enter your address" autocomplete="off" required="required">
            </div>

            <div class="form-outline mb-4 m-auto w-50">
                <label for="user_contact" class="form-label">Contact</label>
                <input type="text" name="user_contact" id="user_contact" class="form-control" placeholder="Enter your mobile number" autocomplete="off" required="required">
            </div>

            <div class="form-outline mb-4 m-auto w-50">
                <input type="submit" name="user_register" class="btn mb-3 px-3" value="Register">
                <p class="small fw-bold">Already have an account ? <a href="user_login.php"> Login</a></p>
            </div>
        </form>
    </div>
</body>

</html>

<?php
if (isset($_POST['user_register'])) {
    $user_username = $_POST['user_username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $hash_password = password_hash($user_password, PASSWORD_DEFAULT);
    $conf_user_password = $_POST['conf_user_password'];
    $user_address = $_POST['user_address'];
    $user_contact = $_POST['user_contact'];
    $user_ip = getIPAddress();

    $select_query = "select * from `user_table` where user_email='$user_email'";
    $result_query = mysqli_query($con, $select_query);
    $count = mysqli_num_rows($result_query);
    if ($count > 0) {
        echo "<script>alert('User with this email already exixts in database')</script> ";
    } elseif ($user_password != $conf_user_password) {
        echo "<script>alert('Password and confirm password do not match')</script> ";
    } else {
        $insert_query = "insert into `user_table`(username,user_email,user_ip,user_password,user_address,user_mobile) values ('$user_username','$user_email','$user_ip','$hash_password','$user_address','$user_contact')";
        $sql_execute = mysqli_query($con, $insert_query);
        if ($sql_execute) {
            echo "<script>alert('User registered successfully')</script> ";
        } else {
            die(mysqli_error($con));
        }
    }

    $select_cart_item = "select * from `user_table` where user_ip='$user_ip'";
    $result_cart = mysqli_query($con, $select_cart_item);
    $count_cart = mysqli_num_rows($result_cart);
    if ($count_cart > 0) {
        $_SESSION['username'] = $user_username;
        echo "<script>alert('You have items added in your cart')</script> ";
        echo "<script>window.open('checkout.php','_self')</script> ";
    } else {
        echo "<script>window.open('../index.php','_self')</script> ";
    }
}

?>