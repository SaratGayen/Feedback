<?php
session_start();
//for log out
if(!isset($_SESSION['username'])){ 
  echo "you are logged out";
  header('location:login.php'); 
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> </title>
    <link rel="stylesheet" href="style/admin.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <span class="dashboard">Admin Page</span>
      </div>
      <form action="" method="post">
      <div class="search-box">
        <input type="search" placeholder="Type Name/Student code" name="search">
        <div class="sr">
        <button name="submit" value="Search" class="submit"><i class='bx bx-search'></i></button>  
        </div>
      </div>
      </form>

      <div class="profile-details">
        <img src="img/user.png" alt="">
        <span class="admin_name"><?php echo $_SESSION['username'];?></span>
        <a href="logout.php" class="logout">Logout</a>
      </div>
    </nav>
    <div class="home-content">
      <div class="student-boxes">
          <table>
            <tr>
              <th>#ID</th>
              <th>NAME</th>
              <th>CODE</th>
              <th>DATE</th>
              <th>VIEW</th>
            </tr>
<?php

include_once "php/connection.php";

if(isset($_POST['submit'])) {
  $query = $_POST['search'];
  $q = "SELECT * FROM sfd WHERE name LIKE '%$query%' OR code LIKE '%$query%'";
} else {
  $q = "SELECT * FROM sfd";
}

$query = mysqli_query($con,$q);

if(mysqli_num_rows($query) > 0)
{
  foreach($query as $res)
  {
    //echo
    ?>
        <tr>  
                <td> 
                     <?php echo $res['user_id'];  ?>  
               </td>
                <td>
                    <?php echo $res['name'];  ?>  
                </td>
                 <td> 
                     <?php echo $res['code'];  ?>  
                 </td>

                 <td>
                      <?php echo $res['sdate'];  ?> 
                 </td>
                 <td>
    <a href="view.php?user_id=<?php echo $res['user_id']; ?>" class="view">View</a>
      </td> 
       </tr>
    <?php
  }
} 
else{
  echo "<tr><td colspan='5'><h5>No record found</h5></td></tr>";
}

?>         
          </table>
          
        </div>
     </div>
    
   
  </section>
</body>
</html>
