<?php
include '../../database/config.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- SweetAlert2 CSS -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10"></link>
   <!-- SweetAlert2 JS -->
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <title>Document</title>
</head>
<body>
    

<?php
if (isset($_POST['save_changes'])) {
    // Retrieve and sanitize form data
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $new_status = mysqli_real_escape_string($conn, $_POST['new_status']);
    
    $update_query = "UPDATE push_orders  SET status = '$new_status'WHERE id = '$id'";
    $update_result = mysqli_query($conn, $update_query);

    if ($update_result) {
        echo "<main role='main' class='col-md-9 ml-sm-auto col-lg-10 px-4 content-wrapper'>
           <div class='content'>
               <script>
               Swal.fire({
                   title: 'Success!',
                   text: 'Push Order Status updated successfully!',
                   icon: 'success',
                   confirmButtonText: 'Back To Messages'
               }).then(() =>{window.location.href = '../../pages/admin/admin_view_messages.php';});
               </script>
           </div>
       </main>";
    } else {
        die('Error: ' . mysqli_error($conn));
    }
}


if(isset($_POST['click_mark_as_read'])){
    $id = $_POST['id'];
    
    
    $data = "SELECT * FROM push_orders  WHERE id = '$id'";
    $result = mysqli_query($conn, $data);

    if(!$result){
        die('Error: '.mysqli_error($conn));
    }
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $id = $row['id'];
             
            echo"<form method='post' action='../../actions/admin/admin_push_mark_as_read.php'>";

            echo"<h5>"."Username: ".$row['item_name']."</h5>";
            echo"<h6>"."<b>Reason </b>".$row['reason']."</h6><br>";
            echo"<h6>"."<b>QTY </b>".$row['qty']."</h6><br>";
            echo"<h6>"."<b>Current Status: </b>".$row['status']."</h6>";
            echo"<label for='new_status'>New Status: </label><br/>
            <select name='new_status' id='new_status'>
                <option value='read'>Read</option>
                <option value='unread'>Unread</option>
            </select>";
            echo"<input type='hidden' name='id' value='$id'><br/>";
            echo"<input type='submit' name='save_changes' class='btn btn-primary' value='Save Changes'><br/>
            <a href='../../pages/admin/admin_view_profile.php' class='btn btn-danger mt-2'>Cancel</a>";
           
            echo"</form";
        }
    }else{
        echo "No data found!";
    }
}
?>

