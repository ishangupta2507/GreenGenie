<?php
include('../includes/connect.php');
if (isset($_POST['insert_brand'])) {
    $brand_title = $_POST['brand_title'];

    $select_query = "select * from `brands` where brand_title='$brand_title'";
    $result_select = mysqli_query($con, $select_query);
    $number = mysqli_num_rows($result_select);
    if ($number > 0) {
        echo "<script>alert('This brand is already present in the databse')</script>";
    } else {
        $insert_query = "insert into `brands`(brand_title) values('$brand_title')";
        $result = mysqli_query($con, $insert_query);
        if ($result) {
            echo "<script>alert('The brand has been successfully inserted')</script>";
        }
    }
}
?>
<h2 class="text-center">Insert Brands</h2>
<form action="" class="mb-2" method="post">
    <div class="input-group mb-2 w-90">
        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="brand_title" placeholder="Insert Brands" aria-label="Username" aria-describedby="basic-addon1">
    </div>
    <div class="input-group mb-2 w-10 m-auto">
       
    <input type="submit" name="insert_brand" value="Insert Brands" class="bg-info border-0 p-2 my-3">

    </div>
</form>