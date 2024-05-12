<?php
include '../../database/config.php';
?>
<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if all fields are filled out
    if (!empty($_POST['item_name']) && !empty($_POST['reason']) && !empty($_POST['qty']) && ($_POST['reason'] !== 'Near_Expiration_Date' || !empty($_POST['expiry_date']))) {
        // Insert data into reports table
        $item_name = mysqli_real_escape_string($conn, $_POST['item_name']);
        $reason = mysqli_real_escape_string($conn, $_POST['reason']);
        $qty = mysqli_real_escape_string($conn, $_POST['qty']);
        $expiry_date = isset($_POST['expiry_date']) ? mysqli_real_escape_string($conn, $_POST['expiry_date']) : NULL;
        $sql = "INSERT INTO reports (item_name, reason, qty, expiry_date) VALUES ('$item_name', '$reason', '$qty', '$expiry_date')";
        // Execute SQL query and handle potential errors
        if ($conn->query($sql) === TRUE) {
           echo "<main role='main' class='col-md-9 ml-sm-auto col-lg-10 px-4 content-wrapper'>
           <div class='content'>
               <script>
               Swal.fire({
                   title: 'Success!',
                   text: 'Item reported',
                   icon: 'success',
                   confirmButtonText: 'Ok'
               }).then(() =>{window.location.href = 'user_rdu_send.php';});
               </script>
               <?php endif; ?>
           </div>
       </main>";
            exit();
        } else {
           echo "<script>Swal.fire('Please fill out all fields in the Report Item form.').then(() => { window.location.href='user_rdu_send.php'; });</script>";
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

<div class="form-wrapper">
            <form action="user_rdu_report.php" method="post" id="reportItemForm">
                <b>Report Item</b> <br>
                <label for="item_name">Item Name</label><br>
        <select name="item_name" id="">
            <?php

                $data= "SELECT * FROM items";
                $result = mysqli_query($conn, $data);
                if(mysqli_num_rows($result)> 0){
                    while($row=mysqli_fetch_assoc($result)){
                        $item_name=$row['item_name'];
                        $unit_type=$row['unit_type'];
                        $unit_qty= $row['unit_qty'];

                        $item_name_new = $item_name . $unit_qty . $unit_type;

                        echo"<option value='$item_name_new'>$item_name_new</option>";
                    }

                }else{
                    echo "<option value=''>No data found!</option>";
                }

            ?>
        </select><br>
        <label for="reason">Reason </label><br>
        <select name="reason" id="reason">
            <option value="Near_Expiration_Date">Near Expiration Date</option>
            <option value="Damaged">Damaged</option>
        </select><br>
        <label for="qty">Quantity</label><br>
        <input type="number" name="qty"><br>
                    <label for="expiry_date">Expiry Date (dd/mm/yyyy)</label><br>
                    <input type="date" name="expiry_date"><br>
                <button type="submit" class="btn btn-primary mt-2" >Submit</button>
            </form>
        </div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="user_ham.js"></script>








