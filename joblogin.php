<?php

require("jobconnection.php");

if(isset($_POST["signin"])){
    $email=$_POST["email"];
    $password=$_POST["password"];
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result= $connection->query($sql);

    if($result->num_rows){
        $row= $result->fetch_assoc();
       

        if($password==$row['password']&& $row['user']=='seeker'){
            session_start();
            
            $_SESSION["user_id"]=$row["id"];
            header('Location: jobseeker.php');
            exit();
            
            

           

        }else if($password==$row['password']&&$row['user']=='provider'){
                
            session_start();

            $_SESSION["user_email"]=$row["email"];
            // echo "Provider Login Successfully";
            header('Location: jobprovider.php');
            exit();

        }
        else{
            echo "Incorrect password";
        }
    }else{
        echo "User Not found";
    }

    $connection->close();

}



?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Job Login</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                        <!-- <a href="#" class="signup-image-link">Create an account</a> -->
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Login</h2>
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="email"><i class="fa-solid fa-envelope"></i></label>
                                <input type="text" name="email" id="email" placeholder="Your Email"/>
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password"/>
                            </div>
                           
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                            </div>
                        </form>
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