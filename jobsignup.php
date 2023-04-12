<?php

require("jobconnection.php");

if(isset($_POST['signup'])){
    $name= $_POST['name'];
    $email= $_POST['email'];
    $phno= $_POST['phno'];
    $jobtype= $_POST['job']; 
    $password= $_POST['password'];
    $confirm_password= $_POST['confirm_password'];
    

    $insert = "INSERT INTO `users`(`id`, `name`, `email`, `user`, `phonenum`, `password`) VALUES ('','$name','$email','$jobtype','$phno','$password')";

    if($connection->query($insert)=== true){
        //data saved successfully
    }else {
        echo "Error: " . $insert . $connection->error;
    }
    // close database connection
    $connection->close();

    // redirect to login page
    header("Location: joblogin.php");
    exit();

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="register-form" onsubmit="return validate()">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email"/>
                            </div>
                            <div class="form-group">
                                <label for="phno"><i class="fa-solid fa-phone"></i></label>
                                <input type="text" name="phno" id="phno"  placeholder="Phone Number"/>
                            </div>
                            <div class="job" style=" display: inline-block; justify-content: space-between;  text-align: left;">
                            <label for="job"></label>
                            <input type="radio" name="job" value="seeker" required> Job Seeker
                            <input type="radio" name="job" value="provider" required> Job Provider
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" id="password" name="password" minlength="8" placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" id="confirm_password" name="confirm_password" minlength="8" placeholder="Retype password" >
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                        <!-- <a href="#" class="signup-image-link">I am already member</a> -->
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>