



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Job Confirm</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    

                    <div class="signin-form">
                        <h2 class="form-title">Are you sure to Apply for the Job?</h2>
                        <form method="POST" class="register-form" id="login-form">
                            <!-- <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="qualify" id="qualify" placeholder="Your Qualification"/>
                            </div> -->

                            <div class="form-group form-button">
                                <input type="submit" name="confirm" id="confirm" class="form-submit" value="Yes"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>


<?php 
$job_id = $_GET["id"];
$user_id = $_GET['user_id'];
require("jobconnection.php");

// echo $id;
// echo $job_id;
$sql="SELECT  `email`   FROM `users` WHERE `id`='$user_id' ";
$result= $connection->query($sql);
if ($result->num_rows > 0) {
    // fetch the data as an associative array
    $row = $result->fetch_assoc();
    // access the email field and assign it to a variable
    $email = $row['email']; 
    // do something with the email variable
  }

if(isset($_POST["confirm"])){
    // $sql="SELECT  `email`   FROM `users` WHERE `id`='$id' ";
  
    $update= "UPDATE `jobs` SET `user`='$email',`isapplied`='Yes' WHERE `id`='$job_id'"; 
    if($connection->query($update)=== true){
        header("Location: jobseeker.php");
    }else {
        echo "Error: " . $update . $connection->error;
    }
  
    $connection->close();
  
  }

?>