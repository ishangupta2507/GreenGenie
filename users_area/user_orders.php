<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My orders</title>
    <style>
        /* Add some styling to the table */
        .table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        .table th {
            background-color: #f4f4f4;
        }
    </style>
</head>

<body>
    <?php
    include('../includes/connect.php');
   

    if (!isset($_SESSION['username'])) {
        echo "<script>alert('Please log in first');</script>";
        echo "<script>window.open('login.php', '_self');</script>";
        exit();
    }

    $username = $_SESSION['username'];
    $get_user = "SELECT * FROM `user_table` WHERE username='$username'";
    $result_user = mysqli_query($con, $get_user);
    $row_fetch = mysqli_fetch_assoc($result_user);
    $user_id = $row_fetch['user_id'];
    ?>
    <h3 class="text-center">All my orders</h3>
    <table class="table table-bordered mt-5 text-center">
        <thead>
            <tr>
                <th>Sl no.</th>
                <th>Amount Due</th>
                <th>Total products</th>
                <th>Invoice Number</th>
                <th>Date</th>
                <th>Complete/Incomplete</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $get_user_details = "SELECT * FROM `user_orders` WHERE user_id=$user_id";
            $result_get_user = mysqli_query($con, $get_user_details);
            $serial_number = 1; // Initialize the serial number here
            while ($row_orders = mysqli_fetch_assoc($result_get_user)) {
                $order_id = $row_orders['order_id'];
                $amount_due = $row_orders['amount_due'];
                $total_products = $row_orders['total_products'];
                $invoice_number = $row_orders['invoice_number'];
                $date = $row_orders['order_date'];
                $order_status = $row_orders['order_status'];
                if ($order_status == 'pending') {
                    $order_status = 'Incomplete';
                } else {
                    $order_status = 'Complete';
                }
                echo "<tr>
                    <td>$serial_number</td>
                    <td>$amount_due</td>
                    <td>$total_products</td>
                    <td>$invoice_number</td>
                    <td>$date</td>
                    <td>$order_status</td>";
                if ($order_status == 'Complete') {
                    echo "<td>Paid</td>";
                } else {
                    echo "<td><a href='confirm_payment.php?order_id=$order_id'>Confirm</a></td></tr>";
                }

                $serial_number++;
            }
            ?>
        </tbody>
    </table>
</body>

</html>