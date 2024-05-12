<?php
include '../../database/config.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    </link>
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <title>Document</title>
</head>

<body>

    <?php
    if (isset($_POST['click_view_details'])) {
        $item_name = $_POST['item_name'];

        $query = "SELECT * FROM warehouse WHERE item_name = '$item_name'";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            die('Error: ' . mysqli_error($conn));
        }
        if (mysqli_num_rows($result) > 0) {
            echo " <section class='intro'>
                        <div class='gradient-custom-2 h-100'>
                            <div class='mask d-flex align-items-center h-100'>
                                <div class='container'>
                                    <div class='row justify-content-center'>
                                        <div class='col-12'>
                                            <div class='table-responsive'>
                                                <table class='table table-dark table-bordered mb-0'>
                                                    <thead>
                                                        <tr>
                                                            <th scope ='col'>Warehouse code</th>
                                                            <th scope='col'>Item Name</th>
                                                            <th scope='col'>QTY</th>
                                                            <th scope='col'>Expiry Date</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                    ";
            while ($row = mysqli_fetch_assoc($result)) {
                $warehouse_code = $row['warehouse_code'];
                $item_name = $row['item_name'];
                $item_qty = $row['item_qty'];
                $expiry_date = $row['expiry_date'];

                echo "<tr>
                                                            <td scope='col' class ='id'> " . $warehouse_code . "</td>
                                                            <td scope='col' class='amount'> " . $item_name . "</td>
                                                            <td scope='col' class='date'> " . $item_qty . "</td>";
                date_default_timezone_set('Asia/Manila');
                $today = date("Y-m-d");
                $diff = strtotime($expiry_date) - strtotime($today);
                $diffInMonths = floor($diff / (30 * 24 * 60 * 60));
                if ($diffInMonths <= 3) {
                    echo "
                                                            <td scope='col' class='expiry_date' style='color:red;'> " . $expiry_date . "</td>
                                                        </tr>";
                } else {
                    echo "
                                                            <td scope='col' class='expiry_date'> " . $expiry_date . "</td>
                                                        </tr>";
                }
            }
            echo "
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>";
        }
    }



    ?>