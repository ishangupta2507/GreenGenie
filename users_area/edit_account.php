<?php


if (isset($_GET['edit_account'])) {
    $user_session_name = $_SESSION['username'];
    $select_query = "SELECT * FROM `user_table` WHERE username='$user_session_name'";
    $result_query = mysqli_query($con, $select_query);
    $row_fetch = mysqli_fetch_assoc($result_query);
    $user_id = $row_fetch['user_id'];
    $user_email = $row_fetch['user_email'];
    $user_address = $row_fetch['user_address'];
    $user_mobile = $row_fetch['user_mobile'];

    if (isset($_POST['user_update'])) {
        $update_id = $user_id;
        $username = $_POST['user_username'];
        $user_email = $_POST['user_email'];
        $user_address = $_POST['user_address'];
        $user_mobile = $_POST['user_mobile'];

        // Update query inside the correct block
        $update_data = "UPDATE `user_table` SET username='$username', user_email='$user_email', user_address='$user_address', user_mobile='$user_mobile' WHERE user_id=$update_id";
        $result_query_update = mysqli_query($con, $update_data);
        if ($result_query_update) {
            echo "<script>alert('Data Updated Successfully')</script>";
            echo "<script>window.open('logout.php','_self')</script>";
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
    <style>
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
    <h2 class="text-center mb-5">Edit Account</h2>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-4 m-auto w-50">

            <input type="text" name="user_username" id="user_username" class="form-control" placeholder="username" autocomplete="off" required="required">
        </div>

        <div class="form-outline mb-4 m-auto w-50">

            <input type="email" name="user_email" class="form-control" placeholder="email" autocomplete="off" required="required">
        </div>

        <div class="form-outline mb-4 m-auto w-50">

            <input type="text" name="user_address" class="form-control" placeholder="Address" autocomplete="off" required="required">
        </div>

        <div class="form-outline mb-4 m-auto w-50">

            <input type="text" name="user_mobile" class="form-control" placeholder="Contact number" autocomplete="off" required="required">
        </div>

        <div class="form-outline mb-4 m-auto w-50">
            <input type="submit" name="user_update" class="btn mb-3 px-3" value="Update">

        </div>

    </form>
</body>

</html>