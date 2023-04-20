<?php
session_start();
include_once "php/connection.php";

//for log out
if(!isset($_SESSION['username'])){ 
    echo "you are logged out";
    header('location:login.php'); 
}

?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/view.css">
    <title>Feedback Details</title>
</head>
<body>
  <?php
  $id = $_GET['user_id'];

  // Fetch php code from database based on id
  $sql = "SELECT * FROM `sfd` WHERE user_id=$id";
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_assoc($result);
 // print_r($row);
  
  //all questions variable pass

  $name=$row['name'];
  $code=$row['code'];
  $sdate=$row['sdate'];
  $comment=$row['comment'];
  $a1=$row['q1'];
  $a2=$row['q2'];
  $a3=$row['q3'];
  $a4=$row['q4'];
  $a5=$row['q5'];
  $a6=$row['q6'];
  $a7=$row['q7'];
  $a8=$row['q8'];
  $a9=$row['q9'];
  $a10=$row['q10'];
  $a11=$row['q11'];
  $a12=$row['q12'];
  $a13=$row['q13'];
  $a14=$row['q14'];
  $a15=$row['q15'];
  $a16=$row['q16'];
  $a17=$row['q17'];
  $a18=$row['q18'];
  $a19=$row['q19'];
  ?>

    <section>
      <div class="student">
        <span>Name:&nbsp;<?php echo $name;?></span>
        <span>Student Code:&nbsp;<?php echo $code;?></span>
        <span>Submission date:&nbsp;<?php echo $sdate;?></span>
        <button onclick="history.go(-1);"><img src="img/back.png" height="20px" width="20px"></button>
      </div>
        <div class="container">
        <div class="tbl-header">
          <table cellpadding="0" cellspacing="0" border="0">
            <thead>
              <tr>
                <th>Question</th>
                <th>Answer</th>
              </tr>
            </thead>
          </table>
        </div>
        <div class="tbl-content">
          <table cellpadding="0" cellspacing="0" border="0">
            <tbody>
                <tr>
                <td>Did your class ever cancel due to absence of faculty?</td>
                <td><?php echo $a1;?></td>
                </tr>
                <tr>
                <td>Where you issued course for the modules being taught.</td>
                <td><?php echo $a2;?></td>
                </tr>
                <tr>
                <td>Where you issued course for the modules being taught.</td>
                <td><?php echo $a3;?></td>
                </tr>
                <tr>
                <td>Are the modules taken as per time table?</td>
                <td><?php echo $a4;?></td>
                </tr>
                <tr>
                <td>Does faculty teacch concepts and clear doubts to yopur satifaction ?</td>
                <td><?php echo $a5;?></td>
                </tr>
                <tr>
                <td>Does the theory classes conduct by using ohp or terminal ?</td>
                <td><?php echo $a6;?></td>
                </tr>
                <tr>
                <td>your understanding for the topic covred.</td>
                <td><?php echo $a7;?></td>
                </tr>
                <tr>
                <td>is techinical assistance always available in the class?</td>
                <td><?php echo $a8;?></td>
                </tr>
                <tr>
                <td>are you assisted for the lab excrises given in the courseware?</td>
                <td><?php echo $a9;?></td>
                </tr>
                <tr>
                <td>ware you able to work out lab exercises with faculty's help in the lab ?</td>
                <td><?php echo $a10;?></td>
                </tr>
                <tr>
                <td>do you always get a machine to work during the regular lab hours ?</td>
                <td><?php echo $a11;?></td>
                </tr>
                <tr>
                <td>have you encountred a problem with respect to the software in the lab ?</td>
                <td><?php echo $a12;?></td>
                </tr>
                <tr>
                <td>Have you encountred a problem with respect to the machine in the lab ?</td>
                <td><?php echo $a13;?></td>
                </tr>
                <tr>
                <td>Does machine problems get sorted with in a stipulated time ?</td>
                <td><?php echo $a14;?></td>
                </tr>
                <tr>
                <td>Are the assignments and examnations conducted as per the schedule?</td>
                <td><?php echo $a15;?></td>
                </tr>
                <tr>
                <td>Are you evalueted after each module (test/assignments/quizs)?</td>
                <td><?php echo $a16;?></td>
                </tr>
                <tr>
                <td>your satisfaction level with respect to faculty guidance on the project ?</td>
                <td><?php echo $a17;?></td>
                </tr>
                <tr>
                <td>Is the feedback taken from you atleast once a month ?</td>
                <td><?php echo $a18;?></td>
                </tr>
                <tr>
                <td>Relevance and adequacy of examples used by the faculty teaching ?</td>
                <td><?php echo $a19;?></td>
                </tr>
             </tbody>
             <tfoot>
              <tr>
                <td>Comment</td>
                <td><?php echo $comment;?></td>
              </tr>
            </tfoot>
        </table>
    </div>
    </div>
    </section>
</body>
</html>