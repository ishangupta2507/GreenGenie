<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Account</title>
</head>

<body>
    <h3 class="mb-4">Are you sure you want to delete your account?</h3>
    <form action="" method="post" class="mt-4">
        <div class="form-outline mb-4">
            <input type="submit" name="delete" class="form-control w-50 m-auto" value="Delete account">
        </div>
        <div class="form-outline mb-4">
            <input type="submit" name="dont_delete" class="form-control w-50 m-auto" value="Don't Delete account">
        </div>
    </form>
</body>

</html>
<?php
$username_session = $_SESSION['username'];
if (isset($_POST['delete'])) {
    $delete_query = "delete from `user_table` where username='$username_session'";
    $result = mysqli_query($con, $delete_query);
    if ($result) {
        session_destroy();
        echo "<script>alert('Account deleted successfully')</script>";
        echo "<script>window.open('../index.php','_self')</script>";
    }
}
if (isset($_POST['dont_delete'])) {
    echo "<script>window.open('profile.php','_self')</script>";
}
?>