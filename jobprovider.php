<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Job Provider</title>
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>
<body>
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                    </div>
                    <div class="signin-form">
                        <h2 class="form-title">Update</h2>
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="qualify"><i class="fa-solid fa-graduation-cap"></i></label>
                                <input type="text" name="qualify" id="qualify" placeholder="Qualification"/>
                            </div>
                            <div class="form-group">
                                <label for="jobs"><i class="fa-solid fa-briefcase"></i></label>
                                <input type="text" name="jobs" id="jobs" placeholder="Job Titles"/>
                            </div>
                         
                            <div class="form-group form-button">
                                <input type="submit" name="update" id="update" class="form-submit" value="Add new"/>
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
session_start();
$provider_email = $_SESSION["user_email"];
// echo $provider_email; exit;
require("jobconnection.php");
$query = "SELECT * FROM `jobs` WHERE email = '$provider_email'";
$data= $connection->query($query);
$total= mysqli_num_rows($data);
echo "<table style='border: 1px solid black; border-collapse: collapse;'>";
echo "<tr><th style='border: 1px solid black; border-collapse: collapse;'>ID</th><th style='border: 1px solid black; border-collapse: collapse;'>Email</th><th style='border: 1px solid black; border-collapse: collapse;'>Qualification</th><th style='border: 1px solid black; border-collapse: collapse;'>Job Titles</th><th style='border: 1px solid black; border-collapse: collapse;'>User</th><th style='border: 1px solid black; border-collapse: collapse;'>Is Applied</th></tr>";

if ($total > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($data)) {
        echo "<tr>";
        echo "<td style='border: 1px solid black; border-collapse: collapse;'>" . $row["id"] . "</td>";
        echo "<td style='border: 1px solid black; border-collapse: collapse;'>" . $row["email"] . "</td>";
        echo "<td style='border: 1px solid black; border-collapse: collapse;'>" . $row["qualification"] . "</td>";
        echo "<td style='border: 1px solid black; border-collapse: collapse;'>" . $row["jobtitles"] . "</td>";
        echo "<td style='border: 1px solid black; border-collapse: collapse;'>" . $row["user"] . "</td>";
        echo "<td style='border: 1px solid black; border-collapse: collapse;'>" . $row["isapplied"] . "</td>";
        echo "<td style='border: 1px solid black; border-collapse: collapse;'><a href='jobedit.php?id=" . $row["id"] . "'>Edit</a></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>0 results</td></tr>";
}

echo "</table>";

if(isset($_POST["update"])){
    $qualification=$_POST["qualify"];
    $job=$_POST["jobs"];
    
    $insert= "INSERT INTO `jobs`(`id`, `email`, `qualification`, `jobtitles`, `user`, `isapplied`) VALUES ('','$provider_email','$qualification','$job','Not Assigned','No')";
    if($connection->query($insert)=== true){
        // header("Location: jobprovider.php");
        header("Location: jobprovider.php");
    }else {
        echo "Error: " . $insert . $connection->error;
    }

    $connection->close();

}



?>





