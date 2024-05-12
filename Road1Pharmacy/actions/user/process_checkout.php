<?php
include '../../database/config.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
date_default_timezone_set('Asia/Manila');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   <!-- SweetAlert2 CSS -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10"></link>
<!-- Bootstrap Bundle JS (includes Popper.js) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <title>Checkouting</title>
</head>
<body>
    

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['items']) && isset($_POST['total'])) {
    if (isset($_POST['mode_of_payment']) && isset($_POST['tender_amount']) && isset($_POST['curr_user'])) {
        

        $mode_of_payment = $_POST['mode_of_payment'];
        $amount_tendered = $_POST['tender_amount'];
        $items = json_decode($_POST['items'], true);
        $total = $_POST['total'];
        $change = $amount_tendered - $total;
        $curr_user = $_POST['curr_user']; 
        $date_transact = date('Y-m-d');
        $time_transacted = date('H:i:s');

        $invalid_items = []; // Initialize an array to keep track of invalid items

foreach ($items as $item) {
    $qty = $item['quantity'];
    $item_name = $item['item_name'];

    $sum_qty = "SELECT sum(item_qty) as total_qty FROM warehouse WHERE item_name= '$item_name'";
    $q = mysqli_query($conn, $sum_qty);
    $row = mysqli_fetch_assoc($q);
    $total_qty = (int) $row['total_qty'];
    $requested_qty = $qty;
    $diff = $total_qty - $requested_qty;

    if ($total_qty < $requested_qty && $diff < 0) {
        // Add the invalid item to the array
        $invalid_items[] = ['item_name' => $item_name, 'total_qty' => $total_qty];
    }
}

if (!empty($invalid_items)) {
    // There are invalid items, so we'll display the error messages for all of them
    foreach ($invalid_items as $invalid_item) {
        echo "<script>
            Swal.fire({
                title: 'Error!',
                text: 'No more items with the name {$invalid_item['item_name']} found in the warehouse. Max Quantity is only {$invalid_item['total_qty']}',
                icon: 'error',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '../../pages/user/user_frontend.php';
                }
            });
        </script>";
    }
} else {
    // All items are valid, proceed with the rest of the code
    // ... [The rest of your code for handling the successful case]
                     $insert = "INSERT INTO transactions (amount, tender_amount, date_transacted, time_transacted, payment_mode, transact_by)
                   VALUES ('$total', '$amount_tendered', '$date_transact','$time_transacted', '$mode_of_payment', '$curr_user')";

     
        if ($conn->query($insert) === TRUE) {
    $last_id = $conn->insert_id;
    $all_items_inserted = true; // Flag to check if all items are inserted successfully

    foreach ($items as $item) {
        $item_name = $item['item_name'];
        $price = $item['price'];
        $qty = $item['quantity'];

        $insert2 = "INSERT INTO transactions_items(order_id, item_name, price, qty)
                    VALUES ('$last_id', '$item_name', '$price', '$qty')";
        if ($conn->query($insert2) !== TRUE) {
            $all_items_inserted = false;
            echo "Error: " . $insert2 . "<br>" . $conn->error;
            break; // Exit the loop if an error occurs
        }
    }

if ($all_items_inserted) {
    foreach ($items as $item) {
        $item_name = $item['item_name'];
        $qty_to_deduct = $item['quantity'];

        // Keep updating the warehouse inventory until the quantity to deduct is zero
        while ($qty_to_deduct > 0) {
            // Select the row with the earliest expiry date for the current item that has a quantity greater than zero
            $select = "SELECT warehouse_code, item_qty FROM warehouse WHERE item_name = '$item_name' AND item_qty > 0 ORDER BY expiry_date ASC LIMIT 1";
            $result = $conn->query($select);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $current_qty = $row['item_qty'];
                $warehouse_code = $row['warehouse_code'];

                if ($current_qty <= $qty_to_deduct) {
                    // If current stock is less than or equal to the quantity to deduct, delete the row
                    $delete = "DELETE FROM warehouse WHERE warehouse_code = '$warehouse_code'";
                    $qty_to_deduct -= $current_qty; // Deduct the current stock from the quantity to deduct

                    // Execute the delete query
                    if ($conn->query($delete) !== TRUE) {
                        echo "Error deleting record: " . $conn->error;
                        break; // Exit the loop if an error occurs
                    }
                } else {
                    // If current stock is more than the quantity to deduct, update the quantity
                    $update = "UPDATE warehouse SET item_qty = item_qty - $qty_to_deduct WHERE warehouse_code = '$warehouse_code'";
                    $qty_to_deduct = 0; // Set quantity to deduct to zero as we've deducted the required quantity
                    

                //     function createReceiptContent($last_id,$curr_user, $items, $total, $amount_tendered, $change, $mode_of_payment){
                //         $receipt_content = "".<center>"\n";
                //         $receipt_content .="<h1>Road 1 Pharmacy</h1>\n";
                //         $receipt_content.="<h3>Your One Stop Pharmacy</h3>\n";
                //         $receipt_content.="<h3>By:</h3>\n";
                //         $receipt_content.="<h4>Address</h4>\n";
                //         $receipt_content.="<h4>Sjdm Bulacan</h4>\n";
                //         $receipt_content .= "Order Summary\n";
                //         $receipt_content.= "</center>\n";

                //         $receipt_content .= "-----------------\n";
                //         $receipt_content .= "Trasction #: " .$last_id . "\n";
                //         $receipt_content.= "Sold by: " .$curr_user;
                //         $receipt_content .= "<table class='table mb-0'>\n";
                //         $receipt_content.= "<thead>\n";
                //         $receipt_content.= "<tr>\n";
                //         $receipt_content.= "<th scope='col'>Item Name</th>\n";
                //         $receipt_content.= "<th scope='col'>Price</th>\n";
                //         $receipt_content.= "<th scope='col'>Quantity</th>\n";
                //         $receipt_content.= "<th scope='col'>Subtotal</th>\n";
                //         $receipt_content .= "</tr>\n";
                //         $receipt_content.= "</thead>\n";
                //         $receipt_content.= "<tbody>\n";
                //         foreach($items as $item){
                //             $receipt_content.= "<tr>\n";
                //             $receipt_content.= "<td>".$item['item_name']."</td>\n";
                //             $receipt_content.= "<td>".$item['price']."</td>\n";
                //             $receipt_content.= "<td>".$item['quantity']."</td>\n";
                //             $receipt_content.= "<td>".$item['subtotal']."</td>\n";
                //             $receipt_content.= "</tr>\n";
                //         }
                //         $receipt_content.= "</tbody>\n";
                //         $receipt_content .= "</table>\n";
                //         $receipt_content.= "<h3>Total :" .$total."</h3>\n";
                //         $receipt_content.= "<h4>Mode of Payment". $mode_of_payment."</h4>&nbsp&nbsp";
                //         $receipt_content.= "<h4>Amount Tendered:" .$amount_tendered."</h4>\n";
                //         $receipt_content.= "<h3>Change:".$change."</h3>\n";
                //         $receipt_content .= "\n";
                //         $receipt_content .= "Thank You";
                //         return $receipt_content;
                //     }

                //     function saveReceiptToFile($last_id, $receipt_content) {
                //         $filename = "../transactions/" . $last_id ."_order_Summary". ".txt";
                //         $file = fopen($filename, "w") or die("unable to open File");

                //         fwrite($file, $receipt_content);
                        
                //         fclose($file);

                //         echo" Receipt created Sucessfully, saved in transaction as '. $last_id.'_order_Summary.txt" ;
                //     }
                //     $receipt_content = createReceiptContent($last_id, $curr_user, $items, $total, $amount_tendered, $change, $mode_of_payment);
                //     saveReceiptToFile($last_id, $receipt_content);
                //    if($receipt_content && saveReceiptToFile($last_id,$receipt_content)){
                     unset($_SESSION['items']);
                    echo "<script>
                            Swal.fire({
                                title: 'Success!',
                                text: 'Transaction completed successfully.',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = '../../pages/user/user_frontend.php';
                                }
                            });
                        </script>";
                //    }else{
                //     echo"Txt file not saved";
                //    }

                    // Execute the update query
                    if ($conn->query($update) !== TRUE) {
                        echo "Error updating record: " . $conn->error;
                        break; // Exit the loop if an error occurs
                    }
                }
            } else {
                unset($_SESSION['items']);
                    echo "<script>
                            Swal.fire({
                                title: 'Error!',
                                text: 'No more items with the name $item_name found in the warehouse.',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = '../../pages/user/user_frontend.php';
                                }
                            });
                        </script>";

                break; // Exit the loop if no more items are found
            }
            
        }
    }
}
} else {
    echo "Error: " . $insert . "<br>" . $conn->error;
}


    }
    } else {
        echo "Missing required fields.";
    }
}
?>

</body>
</html>


<!-- pang ending alert -->


