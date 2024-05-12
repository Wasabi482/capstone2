<?php
include '../../database/config.php';
?>
<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if all fields are filled out
    if (!empty($_POST['item_name']) && !empty($_POST['reason']) && !empty($_POST['qty'])) {
        // Prepare an insert statement
        $sql = "INSERT INTO push_orders (item_name, reason, qty) VALUES (?, ?, ?)";
        
        if ($stmt = $conn->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ssi", $item_name, $reason, $qty);

            // Set parameters and execute
            $item_name = $_POST['item_name'];
            $reason = $_POST['reason'];
            $qty = $_POST['qty'];

            if ($stmt->execute()) {
                // Use JavaScript for redirection after the alert
                echo "<main role='main' class='col-md-9 ml-sm-auto col-lg-10 px-4 content-wrapper'>
           <div class='content'>
               <script>
               Swal.fire({
                   title: 'Success!',
                   text: 'Order Pushed to Admin',
                   icon: 'success',
                   confirmButtonText: 'Ok'
               }).then(() =>{window.location.href = 'user_rdu_send.php';});
               </script>
               <?php endif; ?>
           </div>
       </main>";
                exit();
            } else {
                echo "<script>alert('Error: " . $stmt->error . "');</script>";
            }
            
            // Close statement
            $stmt->close();
        } else {
            echo "<script>alert('Error: " . $conn->error . "');</script>";
        }
    } else {
        // Send error message
        echo "<main role='main' class='col-md-9 ml-sm-auto col-lg-10 px-4 content-wrapper'>
           <div class='content'>
               <script>
               Swal.fire({
                   title: 'Insufficient Datas!',
                   text: 'Please fill all necessary infos',
                   icon: 'warning',
                   confirmButtonText: 'Ok'
               }).then(() =>{window.location.href = 'user_rdu_send.php';});
               </script>
               <?php endif; ?>
           </div>
       </main>";
    }
}
?>

<!-- The HTML form should be outside of the PHP block to ensure it's displayed -->
<div class="form-wrapper">
    <form action="user_rdu_push.php" method="post"> <!-- Make sure this action points to the correct PHP file -->
        <b>Push Order</b> <br>
        <label for="item_name">Item Name</label><br>
        <select name="item_name" id="item_name">
            <!-- PHP code to populate the item_name options -->
            <?php
            $data = "SELECT * FROM items";
            $result = mysqli_query($conn, $data);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $item_name = $row['item_name'];
                    $unit_type = $row['unit_type'];
                    $unit_qty = $row['unit_qty'];

                    $item_name_new = $item_name . " " . $unit_qty . " " . $unit_type;

                    echo "<option value='$item_name_new'>$item_name_new</option>";
                }
            } else {
                echo "<option value=''>No data found!</option>";
            }
            ?>
        </select><br>
        <label for="reason">Reason</label><br>
        <select name="reason" id="reason">
            <option value="Low_on_Stock">Low on Stock</option>
            <option value="customer_request">Customer Request</option>
        </select><br>
        <label for="qty">Quantity</label><br>
        <input type="number" name="qty" id="qty"><br>
        <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
</div>

