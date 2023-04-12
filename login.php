<?php
         session_start();
          include_once "php/connection.php";
          if(isset($_POST['submit'])){
          $email=$_POST['email'];
          $password=$_POST['password'];

        // checking email
          $email_search= "select * from users where email='$email'";
          $query = mysqli_query($con,$email_search);
          $email_count =  mysqli_num_rows($query);

          if($email_count){
          $email_pass = mysqli_fetch_assoc($query);
        
        // checking password

         $db_pass = $email_pass['code'];

        //   name & code storing in seesion
          $_SESSION['username'] = $email_pass['username'];
          $_SESSION['code'] = $email_pass['code'];


        //  log in after matching password
        
        //checking admin or student
       if($db_pass==$password){
           if($email_pass["usertype"]=="student"){

                header('location:survey.php');
            }
            elseif($email_pass["usertype"]=="admin"){
                header('location:admin.php');
          }

        }
    
       else{
           echo "Password Incorrect";
          }

        } else{ 
          echo "Incorrect Email";
          }
        }
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <!-- ===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="style/login.css">        
    <title>Feedback</title>
</head>
<body>
    <div class="container">
        <div class="forms">
            <div class="form login">
                <span class="title">Login</span>

                <form action="#"  method="POST" autocomplete="off">
                    <div class="input-field">
                        <input type="email" placeholder="Enter your email" name="email" value= "" required >
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" placeholder="Enter your password" name="password" value= "" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>
                    
                    <div class="input-field button">
                    <input type="submit" name="submit" value="Login" id="button">
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text">Don't have an account? 
                        <a href="index.php" class="text signup-link">Signup Now</a>
                    </span>
                </div>
                    
            </div>
        </div>
    </div>



    <script src="js/sh.js"></script>
</body>
</html>