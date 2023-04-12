<?php
session_start();
include_once "php/connection.php";

//for log out
if(!isset($_SESSION['username'])){ 
    echo "you are logged out";
    header('location:login.php'); 
}

?>

<?php

//for inserting the records
include_once "php/connection.php";
if(isset($_POST['submit'])){
    $center = mysqli_real_escape_string($con, $_POST['center']);
    $faculty = mysqli_real_escape_string($con, $_POST['faculty']);
    $course = mysqli_real_escape_string($con, $_POST['course']);
    $q1 = mysqli_real_escape_string($con, $_POST['q1']);
    $q2 = mysqli_real_escape_string($con, $_POST['q2']);
    $q3 = mysqli_real_escape_string($con, $_POST['q3']);
    $q4 = mysqli_real_escape_string($con, $_POST['q4']);
    $q5 = mysqli_real_escape_string($con, $_POST['q5']);
    $q6 = mysqli_real_escape_string($con, $_POST['q6']);
    $q7 = mysqli_real_escape_string($con, $_POST['q7']);
    $q8 = mysqli_real_escape_string($con, $_POST['q8']);
    $q9 = mysqli_real_escape_string($con, $_POST['q9']);
    $q10 = mysqli_real_escape_string($con, $_POST['q10']);
    $q11 = mysqli_real_escape_string($con, $_POST['q11']);
    $q12 = mysqli_real_escape_string($con, $_POST['q12']);
    $q13 = mysqli_real_escape_string($con, $_POST['q13']);
    $q14 = mysqli_real_escape_string($con, $_POST['q14']);
    $q15 = mysqli_real_escape_string($con, $_POST['q15']);
    $q16 = mysqli_real_escape_string($con, $_POST['q16']);
    $q17 = mysqli_real_escape_string($con, $_POST['q17']);
    $q18 = mysqli_real_escape_string($con, $_POST['q18']);
    $q19 = mysqli_real_escape_string($con, $_POST['q19']);
    $name = $_SESSION['username'];
    $code = $_SESSION['code'];
    $comment = mysqli_real_escape_string($con, $_POST['comment']);
    $cnow = time();

 //   inserting records
 $insertquery = "insert into sfd (center,faculty,course,q1,q2,q3,q4,q5,q6,q7,q8,q9,q10,q11,q12,q13,q14,q15,q16,q17,q18,q19,name,code,comment,sdate) values ('$center','$faculty','$course','$q1','$q2','$q3','$q4','$q5','$q6','$q7','$q8','$q9','$q10','$q11','$q12','$q13','$q14','$q15','$q16','$q17','$q18','$q19','$name','$code','$comment',now())";


    //for submit limition
    $SubmissionTime = "SELECT sdate FROM `sfd` WHERE name=$name";
    $lastSubmissionTime = strtotime($SubmissionTime);
    $differenceInSeconds = $cnow - $lastSubmissionTime;
    $differenceInDays = floor($differenceInSeconds / (60 * 60 * 24));
    if ($differenceInDays <= 30) {
        echo "You can resubmit the form again after " . (30 - $differenceInDays) . " days.";
    } 
    else{
        // connection alerts
        $iquery = mysqli_query($con,$insertquery);
        if($iquery){
          ?>
          <script>
            alert("Thanks For Your Feedback !!!");
          </script>
          <?php
        }else{
          ?>
          <script>
            alert("Please Input Properly !!!");
          </script>
          <?php
        }
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
    <link rel="stylesheet" href="style/survey.css">
    <title>Feedback</title>
    
</head>
<body>
    <header>
        <nav>
            <img src="img/logo.png" alt="logo">
               <div class="profile-details">
                  <img src="img/user.png" alt="">
                  <span class="admin_name"><?php echo $_SESSION['username'];?></span>
                  <span class="admin_name"><?php echo $_SESSION['code'];?></span>
                  <a href="logout.php" class="logout">Logout</a>
              </div>
            <h1>Student Feedback Survey</h1>
            <p>Kindly fill this evaluation survey as it will facilitate us in providing better service to you. We ensure complete confidentiality of the feedback given by you.</p>   
        </nav>
    </header>
    <section>
        <hr>
        <div class="info">
        <form action="#" method="POST" autocomplete="off" enctype="multipart/form-data">
                <label for="center">Center Name:</label>
                <input type="text" id="center" name="center" placeholder="Konnagar" required>
                <label for="faculty">Faculty Name:</label>
                <input type="text" id="faculty" name="faculty" placeholder="Teacher name" required>
                <label for="course">Course Name:</label>
                <input type="text" id="course" name="course" placeholder="Course name" required>

            
        </div>

        <p class="info">Please put a selection on the option given below:-</p>
        <hr>
    </section>
    <section>
        <div class="container">
        <div class="q">
            <div class="ques1">
            <h2>Question 1 <i class="uil uil-question-circle"></i></h2>
            <br>
           <p class="questions">Did your class ever cancel due to absence of faculty?</p>
           <br>

           <label><input type="radio" id="never" name="q1" value="never" required>
            Never</label>
            <br>
            <label><input type="radio" id="q1" name="q1" value="sometimes" required>
            Sometimes</label>
            <br>
            <label><input type="radio" id="q1" name="q1" value="frequently" required>
            Frequently</label>
            <br>
            <label><input type="radio" id="q1" name="q1" value="mostly" required>
            Mostly</label>
            <br>

           </div>                   
        </div>
        <!-- 2 -->
        <div class="q">
            <div class="ques2">
            <h2>Question 2 <i class="uil uil-question-circle"></i></h2>
            <br>
           <p class="questions">Where you issued course for the modules being taught.</p>
           <br>

           <label><input type="radio" id="q1" name="q2" value="Yes" required>
            Yes</label><br>
            <label><input type="radio" id="q1" name="q2" value="low" required>
            Low</label><br>
            <label><input type="radio" id="q1" name="q2" value="Very few" required>
            Very few</label><br>
            <label><input type="radio" id="q1" name="q2" value="mostly" required>
            Mostly</label><br>

           </div>                   
        </div>
        <!-- 3 -->
        <div class="q">
            <div class="ques2">
            <h2>Question 3 <i class="uil uil-question-circle"></i></h2>
            <br>
           <p class="questions">Did the theory classes start and end in time.</p>
           <br>

           <label><input type="radio" id="q1" name="q3" value="never" required>
            Never</label><br>
            <label><input type="radio" id="q1" name="q3" value="sometimes" required>
            Sometimes</label><br>
            <label><input type="radio" id="q1" name="q3" value="frequently" required>
            Frequently</label><br>
            <label><input type="radio" id="q1" name="q3" value="mostly" required>
            Mostly</label><br>

           </div>                  
        </div>
        <!-- 4 -->
        <div class="q">
            <div class="ques2">
            <h2>Question 4 <i class="uil uil-question-circle"></i></h2>
            <br>
           <p class="questions">Are the modules taken as per time table?</p>
           <br>

           <label><input type="radio" id="q1" name="q4" value="never" required>
            Never</label><br>
            <label><input type="radio" id="q1" name="q4" value="sometimes" required>
            Sometimes</label><br>
            <label><input type="radio" id="q1" name="q4" value="frequently" required>
            Frequently</label><br>
            <label><input type="radio" id="q1" name="q4" value="mostly" required>
            Mostly</label><br>

           </div>                   
        </div>
        <!-- 5 -->
        <div class="q">
            <div class="ques2">
            <h2>Question 5 <i class="uil uil-question-circle"></i></h2>
            <br>
           <p class="questions">Does faculty teacch concepts and clear doubts to yopur satifaction ?</p>
           <br>

           <label><input type="radio" id="q1" name="q5" value="never" required>
            Never</label><br>
            <label><input type="radio" id="q1" name="q5" value="sometimes" required>
            Sometimes</label><br>
            <label><input type="radio" id="q1" name="q5" value="frequently" required>
            Frequently</label><br>
            <label><input type="radio" id="q1" name="q5" value="mostly" required>
            Mostly</label><br>

           </div>                   
        </div>
        <!-- 6 -->
        <div class="q">
            <div class="ques2">
            <h2>Question 6 <i class="uil uil-question-circle"></i></h2>
            <br>
           <p class="questions">Does the theory classes conduct by using ohp or terminal ?</p>
           <br>

           <label><input type="radio" id="q1" name="q6" value="never" required>
            Never</label><br>
            <label><input type="radio" id="q1" name="q6" value="sometimes" required>
            Sometimes</label><br>
            <label><input type="radio" id="q1" name="q6" value="frequently" required>
            Frequently</label><br>
            <label><input type="radio" id="q1" name="q6" value="mostly" required>
            Mostly</label><br>

           </div>                   
        </div>
        <!-- 7 -->
        <div class="q">
            <div class="ques2">
            <h2>Question 7 <i class="uil uil-question-circle"></i></h2>
            <br>
           <p class="questions">your understanding for the topic covred.</p>
           <br>

           <label><input type="radio" id="q1" name="q7" value="Excellent" required>
            Excellent</label><br>
            <label><input type="radio" id="q1" name="q7" value="Good" required>
            Good</label><br>
            <label><input type="radio" id="q1" name="q7" value="Average" required>
            Average</label><br>
            <label><input type="radio" id="q1" name="q7" value="Fair" required>
            Fair</label><br>

           </div>                   
        </div>
        <!-- 8 -->
        <div class="q">
            <div class="ques2">
            <h2>Question 8 <i class="uil uil-question-circle"></i></h2>
            <br>
           <p class="questions">is techinical assistance always available in the class?</p>
           <br>

           <label><input type="radio" id="q1" name="q8" value="never" required>
            Never</label><br>
            <label><input type="radio" id="q1" name="q8" value="sometimes" required>
            Sometimes</label><br>
            <label><input type="radio" id="q1" name="q8" value="frequently" required>
            Frequently</label><br>
            <label><input type="radio" id="q1" name="q8" value="mostly" required>
            Mostly</label><br>

           </div>                   
        </div>
        <!-- 9 -->
        <div class="q">
            <div class="ques2">
            <h2>Question 9 <i class="uil uil-question-circle"></i></h2>
            <br>
           <p class="questions">are you assisted for the lab excrises given in the courseware?</p>
           <br>

           <label><input type="radio" id="q1" name="q9" value="never" required>
            Never</label><br>
            <label><input type="radio" id="q1" name="q9" value="sometimes" required>
            Sometimes</label><br>
            <label><input type="radio" id="q1" name="q9" value="frequently" required>
            Frequently</label><br>
            <label><input type="radio" id="q1" name="q9" value="mostly" required>
            Mostly</label><br>
 
           </div>                   
        </div>
        <!-- 10 -->
        <div class="q">
            <div class="ques2">
            <h2>Question 10 <i class="uil uil-question-circle"></i></h2>
            <br>
           <p class="questions">ware you able to work out lab exercises with faculty's help in the lab ?</p>
           <br>

           <label><input type="radio" id="q1" name="q10" value="never" required>
            Never</label><br>
            <label><input type="radio" id="q1" name="q10" value="sometimes" required>
            Sometimes</label><br>
            <label><input type="radio" id="q1" name="q10" value="frequently" required>
            Frequently</label><br>
            <label><input type="radio" id="q1" name="q10" value="mostly" required>
            Mostly</label><br>
              
           </div>                   
        </div>
        <!-- 11 -->
        <div class="q">
            <div class="ques2">
            <h2>Question 11 <i class="uil uil-question-circle"></i></h2>
            <br>
           <p class="questions">do you always get a machine to work during the regular lab hours ?</p>
           <br>

           <label><input type="radio" id="q1" name="q11" value="never" required>
           Never</label><br>
           <label><input type="radio" id="q1" name="q11" value="sometimes" required>
            Sometimes</label><br>
            <label><input type="radio" id="q1" name="q11" value="frequently" required>
            Frequently</label><br>
            <label><input type="radio" id="q1" name="q11" value="mostly" required>
            Mostly</label><br>

           </div>                   
        </div>
        <!-- 12 -->
        <div class="q">
            <div class="ques2">
            <h2>Question 12 <i class="uil uil-question-circle"></i></h2>
            <br>
           <p class="questions">have you encountred a problem with respect to the software in the lab ?</p>
           <br>

           <label><input type="radio" id="q1" name="q12" value="never" required>
            Never</label><br>
            <label><input type="radio" id="q1" name="q12" value="sometimes" required>
            Sometimes</label><br>
            <label><input type="radio" id="q1" name="q12" value="frequently" required>
            Frequently</label><br>
            <label><input type="radio" id="q1" name="q12" value="mostly" required>
            Mostly</label><br>

           </div>                   
        </div>
        <!-- 13 -->
        <div class="q">
            <div class="ques2">
            <h2>Question 13 <i class="uil uil-question-circle"></i></h2>
            <br>
           <p class="questions">Have you encountred a problem with respect to the machine in the lab ?
           <br>

           <label><input type="radio" id="q1" name="q13" value="never" required>
            Never</label><br>
            <label><input type="radio" id="q1" name="q13" value="sometimes" required>
            Sometimes</label><br>
            <label><input type="radio" id="q1" name="q13" value="frequently" required>
            Frequently</label><br>
            <label><input type="radio" id="q1" name="q13" value="mostly" required>
            Mostly</label><br>

           </div>                   
        </div>
        <!-- 14 -->
        <div class="q">
            <div class="ques2">
            <h2>Question 14 <i class="uil uil-question-circle"></i></h2>
            <br>
           <p class="questions">does machine problems get sorted with in a stipulated time ?</p>
           <br>

           <label><input type="radio" id="q1" name="q14" value="never" required>
            Never</label><br>
            <label><input type="radio" id="q1" name="q14" value="sometimes" required>
            Sometimes</label><br>
            <label><input type="radio" id="q1" name="q14" value="frequently" required>
            Frequently</label><br>
            <label><input type="radio" id="q1" name="q14" value="mostly" required>
            Mostly</label><br>

           </div>                   
        </div>
        <!-- 15 -->
        <div class="q">
            <div class="ques2">
            <h2>Question 15 <i class="uil uil-question-circle"></i></h2>
            <br>
           <p class="questions">are the assignments and examnations conducted as per the schedule?</p>
           <br>

           <label><input type="radio" id="q1" name="q15" value="never" required>
            Never</label><br>
            <label><input type="radio" id="q1" name="q15" value="sometimes" required>
            Sometimes</label><br>
            <label><input type="radio" id="q1" name="q15" value="frequently" required>
            Frequently</label><br>
            <label><input type="radio" id="q1" name="q15" value="mostly" required>
            Mostly</label><br>

           </div>                   
        </div>
        <!-- 16 -->
        <div class="q">
            <div class="ques2">
            <h2>Question 16 <i class="uil uil-question-circle"></i></h2>
            <br>
           <p class="questions">Are you evalueted after each module (test/assignments/quizs)?</p>
           <br>

           <label><input type="radio" id="q1" name="q16" value="never" required>
            Never</label><br>
            <label><input type="radio" id="q1" name="q16" value="sometimes" required>
            Sometimes</label><br>
            <label><input type="radio" id="q1" name="q16" value="frequently" required>
            Frequently</label><br>
            <label><input type="radio" id="q1" name="q16" value="mostly" required>
            Mostly</label><br>

           </div>                   
        </div>
        <!-- 17-->
        <div class="q">
            <div class="ques2">
            <h2>Question 17 <i class="uil uil-question-circle"></i></h2>
            <br>
           <p class="questions">your satisfaction level with respect to faculty guidance on the project?</p>
           <br>

           <label><input type="radio" id="q1" name="q17" value="excellent" required>
            Excellent</label><br>
            <label><input type="radio" id="q1" name="q17" value="fair" required>
            Fair</label><br>
            <label><input type="radio" id="q1" name="q17" value="Average" required>
            Average</label><br>
            <input type="radio" id="q1" name="q17" value="Good" required>
            Good</label><br>

           </div>                   
        </div>
        <!-- 18 -->
        <div class="q">
            <div class="ques2">
            <h2>Question 18 <i class="uil uil-question-circle"></i></h2>
            <br>
           <p class="questions">Is the feedback taken from you atleast once a month?</p>
           <br>

           <label><input type="radio" id="q1" name="q18" value="No" required>
            No</label><br>
            <label><input type="radio" id="q1" name="q18" value="Yes" required>
            Yes</label><br>

           </div>                   
        </div>
        <!-- 19 -->
        <div class="q">
            div class="ques19">
            <h2>Question 19 <i class="uil uil-question-circle"></i></h2>
            <br>
           <p class="questions">Relevance and adequacy of examples used by the faculty teaching?</p>
           <br>

           <label><input type="radio" id="q1" name="q19" value="Excellent" required>
            Excellent</label><br>
            <label><input type="radio" id="q1" name="q19" value="Good" required>
            Good</label><br>
            <label><input type="radio" id="q1" name="q19" value="Average" required>
            Average</label><br>
            <label><input type="radio" id="q1" name="q19" value="fair" required>
            Fair</label><br>

           </div>                   
        </div>
    </div>
    <hr>
        <div class="cont">
            <p class="i">Please use the following space to provide any other feedback about the course/centre etc. tht you would like to give</p>

                <!-- <label for="name">Full Name:</label>
                <input type="text"  placeholder=" Full Name" name="name" required>
                <label for="code">Code:</label>
                <input type="text"  placeholder="Student code" name="code" required>
                <br> -->
                <label>Advise:
                <textarea rows="4" cols="50" name="comment" required placeholder="Type your thoughts"></textarea></label>
                    
                    <br>
                    <label for="termCon" class="text"><input type="checkbox" id="termCon" required>
                    I accepted all terms and conditions</label>
                    <br>
                    <input type="submit" name="submit" id="submit" value="Submit">
            </form>

        </div>
        <hr>
    </section>
    <footer>
        <p> Made by @sarat & Koustav (8607,8608)</p>
    </footer>
</body>
</html>