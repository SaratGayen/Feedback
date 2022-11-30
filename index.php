<?php
          session_start();
          include_once "php/connection.php";
          if(isset($_POST['submit'])){
          $username = mysqli_real_escape_string($con, $_POST['username']);
          $email = mysqli_real_escape_string($con, $_POST['email']);
          $code = mysqli_real_escape_string($con, $_POST['code']);
          $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
          
          // servercite empty validation
          if($username != "" && $email !="" && $code !="" && $mobile !=""){
          
            $c=password_hash($code,PASSWORD_BCRYPT);

        //   email chechking
          $emailquery = "select * from users where email='$email'";
          $query=mysqli_query($con,$emailquery);
          $emailcount = mysqli_num_rows($query);
          if($emailcount>0){
          echo "email already exist";
          } 
          else{
                              
        //   inserting records
          $insertquery = "insert into users (username,email,code,mobile,ctime) values ('$username','$email','$c','$mobile',now())";


        // connection alerts
          $iquery = mysqli_query($con,$insertquery);
          if($iquery){
            ?>
            <script>
              alert("Connection Successful");
            </script>
            <?php
          }else{
            ?>
            <script>
              alert("Connection not Succeful");
            </script>
            <?php
          }
       }
      }}
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
    <link rel="stylesheet" href="style/signup.css">        
    <title>Feedback</title>
</head>
<body>
    <div class="container">
        <div class="forms">
            <div class="form signup">
                <span class="title">Registration</span>
   
                <form action="#" method="POST" autocomplete="off" enctype="multipart/form-data">
               <div class="input-field">
                   <input type="text" placeholder="Type your full Name" name="username" required>
                   <i class="uil uil-user"></i>
               </div>
               <div class="input-field">
                   <input type="email" placeholder="Enter your email" name="email" required>
                   <i class="uil uil-envelope icon"></i>
               </div>
               <div class="input-field">
                   <input type="number" placeholder="Enter your student code" name="code" required>
                   <i class="uil uil-postcard"></i>
               </div>
               <div class="input-field">
                   <input type="tel" placeholder="Mobile number" name="mobile" required>
                   <i class="uil uil-mobile-android"></i>
               </div>
   
               <div class="checkbox-text">
                   <div class="checkbox-content">
                       <input type="checkbox" id="termCon" required>
                       <label for="termCon" class="text">I accepted all terms and conditions</label>
                   </div>
               </div>
   
               <div class="input-field button">
                   <input type="submit" name="submit" id="button" value="Signup">
               </div>
           </form>
   
           <div class="login-signup">
               <span class="text">Already have an account?
                   <a href="login.php" class="text login-link">Login Now</a>
               </span>
           </div>
         </div>
   </div>
   <script src="sh.js"></script>
</body>
</html>