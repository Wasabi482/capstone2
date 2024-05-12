
<?php
@include '../../database/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register Form</title>

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- SweetAlert2 CSS -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10"></link>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body>
<?php

if(isset($_POST['submit'])){
   $mypic = $_FILES['picture']['name'];
   $temp = $_FILES['picture']['tmp_name'];
   $type = $_FILES['picture']['type'];
   $size = $_FILES['picture']['size'];

   $username = mysqli_real_escape_string($conn, $_POST['username']);//"mysqli_real_escape_string() for anti-sql injection in strings"
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = hash('sha256', $_POST['password']);
   $cpass = hash('sha256', $_POST['cpassword']);
   $role_as = $_POST['role_as'];

   $select = "SELECT * FROM accounts WHERE username = '$username' AND email = '$email'";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){
      $error[] = 'User already exists!';
   }else{
      if($pass != $cpass){
         $error[] = 'Passwords do not match!';
      }else{
         if(($type == "image/jpeg" || $type == "image/jpg" || $type == "image/png") && ($size <= 2097152)){
            move_uploaded_file($temp, "../../img/$mypic");
            $insert = "INSERT INTO accounts(username, email, password, role_as, picture) VALUES('$username','$email','$pass','$role_as', '$mypic')";
            mysqli_query($conn, $insert);
            echo "<main role='main' class='col-md-9 ml-sm-auto col-lg-10 px-4 content-wrapper'>
           <div class='content'>
               <script>
               Swal.fire({
                   title: 'Success!',
                   text: 'Added New User',
                   icon: 'success',
                   confirmButtonText: 'Back To Users'
               }).then(() =>{window.location.href = 'admin_view_users.php';});
               </script>
           </div>
       </main>";
         } else {
            if($size > 2097152){
               $error[] = 'File size must be less than 2MB!';
            }else{
               $error[] = 'File must be jpg/jpeg/png!';
            }
         }
      }
   }
};
?>


<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-6">
         <div class="card mt-5">
            <div class="card-body">
                <h5 class="text-center">Your One Stop Pharmacy</h5>
                <form ENCTYPE="multipart/form-data" action="" method="post">
                    <h3 class="text-center">Register Now</h3>
                    <?php
                    if(isset($error)){
                        foreach($error as $error){
                            echo '<div class="alert alert-danger">'.$error.'</div>';
                        };
                    };
                    ?>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" required placeholder="Enter your username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" required placeholder="Enter your password">
                    </div>
                    <div class="form-group">
                        <label for="cpassword">Confirm Password</label>
                        <input type="password" class="form-control" name="cpassword" required placeholder="Confirm your password">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" required placeholder="Enter your email">
                    </div>
                    <div class="form-group">
                        <label for="picture">Profile Picture</label>
                        <input type="file" class="form-control-file" name="picture" required>
                    </div>
                    <div class="form-group">
                        <label for="role_as">Role</label>
                        <select class="form-control" name="role_as">
                            <option value="2">Frontend</option>
                            <option value="3">Rdu</option>
                        </select>
                    </div>
                    <input type="submit" name="submit" value="Register Now" class="btn btn-primary btn-block">
                    <p class="text-center">Already have an account? <a href="login_form.php">Login now</a></p>
                    <p class="text-center"><a href="admin_view_users.php" class="btn btn-danger">Cancel</a></p>
                </form>
            </div>
         </div>
      </div>
   </div>
</div>

</body>
</html>