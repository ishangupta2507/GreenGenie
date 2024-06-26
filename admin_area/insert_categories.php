<?php
include('../includes/connect.php');
if (isset($_POST['insert_cat'])) {
    $category_title = $_POST['cat_title'];

    $select_query = "select * from `categories` where category_title='$category_title'";
    $result_select = mysqli_query($con, $select_query);
    $number = mysqli_num_rows($result_select);
    if ($number > 0) {
        echo "<script>alert('This category is already present in the databse')</script>";
    } else {
        $insert_query = "insert into `categories`(category_title) values('$category_title')";
        $result = mysqli_query($con, $insert_query);
        if ($result) {
            echo "<script>alert('catergory has been successfully inserted')</script>";
        }
    }
}
?>
<h2 class="text-center">Insert Categories</h2>
<form action="" class="mb-2" method="post">
    <div class="input-group mb-2 w-90">
        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="cat_title" placeholder="Insert Categories" aria-label="Username" aria-describedby="basic-addon1">
    </div>
    <div class="input-group mb-2 w-10 m-auto">

        <input type="submit" name="insert_cat" value="Insert Categories" class="bg-info border-0 p-2 my-3">

    </div>
</form>