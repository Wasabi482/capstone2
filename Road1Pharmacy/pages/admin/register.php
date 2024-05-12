<?php
@include '../../database/config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register Form</title>
   <link rel="stylesheet" href="../../css/main.css">
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
   <!-- SweetAlert2 CSS -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
   </link>
   <!-- SweetAlert2 JS -->
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <!-- Optional Bootstrap JS -->
   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body class="bg-dark background">

   <?php

   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\Exception;

   require 'phpmailer/src/Exception.php';
   require 'phpmailer/src/PHPMailer.php';
   require 'phpmailer/src/SMTP.php';

   if (isset($_POST['submit'])) {
      $mypic = $_FILES['picture']['name'];
      $temp = $_FILES['picture']['tmp_name'];
      $type = $_FILES['picture']['type'];
      $size = $_FILES['picture']['size'];

      $username = mysqli_real_escape_string($conn, $_POST['username']); //"mysqli_real_escape_string() for anti-sql injection in strings"
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $pass = hash('sha256', $_POST['password']);
      $cpass = hash('sha256', $_POST['cpassword']);
      $role_as = $_POST['role_as'];

      $select = "SELECT * FROM accounts WHERE username = '$username' AND email = '$email'";

      $result = mysqli_query($conn, $select);

      if (mysqli_num_rows($result) > 0) {
         $error[] = 'User already exists!';
      } else {
         if ($pass != $cpass) {
            $error[] = 'Passwords do not match!';
         } else {
            if (($type == "image/jpeg" || $type == "image/jpg" || $type == "image/png") && ($size <= 2097152)) {
               move_uploaded_file($temp, "../../img/$mypic");
               $insert = "INSERT INTO accounts(username, email, password, role_as, picture) VALUES('$username','$email','$pass','$role_as', '$mypic')";
               mysqli_query($conn, $insert);
               $mail = new PHPMailer(true);

               $mail->isSMTP();
               $mail->Host = 'smtp.gmail.com';
               $mail->SMTPAuth = true;
               $mail->Username = 'road1pharmacy@gmail.com';
               $mail->Password = 'zaetfsdqvnefbvqj';
               $mail->SMTPSecure = 'ssl';
               $mail->Port = 465;

               $mail->setFrom('road1pharmacy@gmail.com', 'Road 1 Pharmacy');
               $mail->addAddress($email);
               $mail->isHTML(true);
               $mail->Subject = 'Welcome to Road 1 Pharmacy';
               $mail->Body = 'Welcome to Road 1 Pharmacy! <br> Your account has been created. <br> You can now login to your account.';
               $mail->send();

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
               if ($size > 2097152) {
                  $error[] = 'File size must be less than 2MB!';
               } else {
                  $error[] = 'File must be jpg/jpeg/png!';
               }
            }
         }
      }
   };
   ?>
   <div class="section ">
      <div class="container ">
         <div class="image">
            <a href="admin_view_users.php" class="return"><img width="50" height="50" src="https://img.icons8.com/ios/50/FFFFFF/circled-left--v1.png" alt="circled-left--v1" /></a>
            <div class="logo">
               <img class="logo-image" src="../../img/IMG_5789__1_-removebg-preview.png" alt="logo">
               <h1>Road 1 Pharmacy</h1>
            </div>
            <p>Your One Stop Healthcare Pharmacy</p>
         </div>
         <div class="form-section bg-dark">
            <form ENCTYPE="multipart/form-data" action="" method="post">
               <?php
               if (isset($error) && !empty($error)) {
                  echo '<div class="alert alert-danger">';
                  foreach ($error as $message) {
                     echo "<p>$message</p>";
                  }
                  echo '</div>';
               }
               ?>
               <div class="input-form">
                  <input type="text" class="input bg-dark" name="username" required placeholder="Username">
                  <label class="hidden-label" for="username">Username</label>
               </div>
               <div class="input-form">
                  <input type="password" class="input bg-dark" name="password" required placeholder="Password">
                  <label class="hidden-label" for="password">Password</label>
               </div>
               <div class="input-form">
                  <input type="password" class="input bg-dark" name="cpassword" required placeholder="Confirm Password">
                  <label class="hidden-label" for="cpassword">Confirm Password</label>
               </div>
               <div class="input-form">
                  <input type="email" class="input bg-dark" name="email" required placeholder="Enter your email">
                  <label class="hidden-label" for="email">Email</label>
               </div>
               <div class="input-form">
                  <input type="file" id="myFile" name="picture" required>
                  <label class="picture" for="picture">Profile Picture</label>
               </div>
               <div class="input-form">

                  <select name="role_as" id="role_as" class="input bg-dark">
                     <option value="2">Frontend</option>
                     <option value="3">RDU</option>
                  </select>
                  <label for="role_as">Role</label>
               </div>
               <input type="submit" name="submit" value="Register Now" class="btn btn-primary btn-block">
            </form>
            <div class="other-sign-in">
               <!--<p>Fast sign up with your favorite social profile</p>
               <div class="icons">
                  <a href="https://www.google.com"><i class="bi bi-google h2" style="color: orangered;"></i></a>
                  <a href="https://www.facebook.com"><i class="bi bi-facebook h2" style="color: blue;"></i></a>
                  <a href="https://www.twitter.com"><i class="bi bi-twitter h2" style="color: skyblue;"></i></a>
               </div>-->
            </div>
            </form>
         </div>
      </div>
   </div>
</body>

</html>