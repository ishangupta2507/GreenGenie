<?php
include('../includes/connect.php');
if (isset($_POST['insert_product'])) {
    $product_title = $_POST['product_title'];
    $description = $_POST['description'];
    $product_keywords = $_POST['product_keywords'];
    $product_price = $_POST['product_price'];
    $product_category = $_POST['product_category'];
    $product_brand = $_POST['product_brand'];
    $product_image_name = $_FILES['product_image']['name'];
    $product_status = 'true';
    $temp_image = $_FILES['product_image']['tmp_name'];


    if ($product_title == "" or $description == "" or $product_keywords == "" or $product_price == "" or $product_category == "" or $product_brand == "" or $product_image_name == "") {
        echo "<script>alert('Please fill all the fields')</script>";
        exit();
    } else {
        move_uploaded_file($temp_image, "./product_images/$product_image_name");

        $insert_products = "insert into `products`(product_title,product_description,category_id,brand_id,product_keywords,product_image,product_price,date,status) values ('$product_title','$description','$product_category','$product_brand','$product_keywords','$product_image_name','$product_price',NOW(),'$product_status')";
        $result_query = mysqli_query($con, $insert_products);
        if ($result_query) {
            echo "<script>alert('Successfully inserted the products')</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products - Admin Darshboard</title>
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
        <h1 class="text-center">Insert Products</h1>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline mb-4 m-auto w-50">
                <label for="product_title" class="form-label">Product Title</label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter product title" autocomplete="off" required="required">
            </div>

            <div class="form-outline mb-4 m-auto w-50">
                <label for="description" class="form-label">Product Description</label>
                <input type="text" name="description" id="description" class="form-control" placeholder="Enter product description" autocomplete="off" required="required">
            </div>

            <div class="form-outline mb-4 m-auto w-50">
                <label for="product_keywords" class="form-label">Product Keywords</label>
                <input type="text" name="product_keywords" id="product_keywords" class="form-control" placeholder="Enter product keywords" autocomplete="off" required="required">
            </div>

            <div class="form-outline mb-4 m-auto w-50">
                <select name="product_category" class="form-select">
                    <option value="">Select a Category</option>
                    <?php
                    $select_query = "select * from `categories`";
                    $result_query = mysqli_query($con, $select_query);
                    while ($row = mysqli_fetch_assoc($result_query)) {
                        $category_title = $row['category_title'];
                        $category_id = $row['category_id'];
                        echo "<option value='$category_id'>$category_title</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-outline mb-4 m-auto w-50">
                <select name="product_brand" class="form-select">
                    <option value="">Select a Brand</option>
                    <?php
                    $select_query = "select * from `brands`";
                    $result_query = mysqli_query($con, $select_query);
                    while ($row = mysqli_fetch_assoc($result_query)) {
                        $brand_title = $row['brand_title'];
                        $brand_id = $row['brand_id'];
                        echo "<option value='$brand_id'>$brand_title</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-outline mb-4 m-auto w-50">
                <label for="product_image" class="form-label">Product Image</label>
                <input type="file" name="product_image" id="product_image" class="form-control" required="required">
            </div>

            <div class="form-outline mb-4 m-auto w-50">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter product's price" autocomplete="off" required="required">
            </div>

            <div class="form-outline mb-4 m-auto w-50">
                <input type="submit" name="insert_product" class="btn mb-3 px-3" value="Insert Product">
            </div>
        </form>
    </div>
</body>

</html>