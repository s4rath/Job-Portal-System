



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Job Seeker</title>

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
                    

                    <div class="signin-form">
                        <h2 class="form-title">Search</h2>
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="email"><i class="fa-solid fa-graduation-cap"></i></label>
                                <input type="text" name="qualify" id="qualify" placeholder="Your Qualification"/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="search" id="search" class="form-submit" value="Search"/>
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

// Get session variable
$id = $_SESSION['user_id'];

// Output session variable
// echo 'Welcome, ' . $id . '!';
require("jobconnection.php");

// $query = "SELECT * FROM `jobs` WHERE email = '$provider_email'";

if(isset($_POST['search'])){
    $qualification= $_POST['qualify'];


    $query = "SELECT * FROM `jobs` WHERE qualification = '$qualification'";
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
            echo "<td style='border: 1px solid black; border-collapse: collapse;'><a href='jobconfirm.php?id=" . $row["id"] . "&user_id=" . $id . "'>Apply</a></td>";
            echo "</tr>";
        }
    } else {
    echo "<tr><td colspan='4'>No Jobs Found</td></tr>";
    }

    echo "</table>";

   

}


?>