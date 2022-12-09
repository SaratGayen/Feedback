<?php
session_start();
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
      <div class="search-box">
        <input type="text" placeholder="Search...">
        <div class="sr"><i class='bx bx-search'></i><button>Search</button></div>
      </div>
      <div class="profile-details">
        <img src="img/user.png" alt="">
        <span class="admin_name">Admin</span>
        <a href="logout.php" class="logout">Logout</a>
      </div>
    </nav>

    
    <div class="home-content">
      <div class="student-boxes">
          <table>
            <tr>
              <th>#ID</th>
                
              <th> NAME</th>
               
        
              <th>CODE</th>
               
              
              <th>VIEW</th>
                
          
            </tr>
<?php

include_once "php/connection.php"; 
 $q = "select * from sfd ";

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
                      <a href="#" class="view">View</a>
                 </td> 
       </tr>
    <?php
  }
} 
  else{
    echo"<h5>No record found</h5>";
   }
 
 
 ?> 
 <br>
            
          </table>
          
        </div>
     </div>
  </section>
</body>
</html>