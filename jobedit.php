<?php
$id = $_GET["id"];
$sql = "SELECT * FROM `jobs` WHERE id = '$id'";
require("jobconnection.php");
$result = mysqli_query($connection, $sql);
if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
} else {
  echo "0 results";
}


if(isset($_POST["update"])){
  $qualification=$_POST["qualify"]; 
  $job=$_POST["jobtitles"];
  $user=$_POST["users"];
  $applied=$_POST["isapplied"];

  
  $update= "UPDATE `jobs` SET `qualification`='$qualification',`jobtitles`='$job',`user`='$user',`isapplied`='$applied' WHERE `id`='$id'"; 
  if($connection->query($update)=== true){
      header("Location: jobprovider.php");
  }else {
      echo "Error: " . $insert . $connection->error;
  }

  $connection->close();

}





?>



<!DOCTYPE html>
<html>
  <head>
    <title>Job Updation</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="css\jobedit.css">
  </head>
  <body>
    <div class="testbox">
      <form method="POST" >
        <div class="banner">
          <h1>Job Updation</h1>
        </div>
       
        <div class="item">
          <p>Email: <span class="required">*</span></p>
          <div class="name-item">
            <input type="text" name="email" placeholder="Email" value="<?php echo $row['email']; ?>" disabled />
          </div>
        </div>
        <div class="contact-item">
          <div class="item">
            <p>Qualification: <span class="required">*</span></p>
            <input type="text" name="qualify" value="<?php echo $row['qualification']; ?>" />
          </div>
          <div class="item">
            <p>Job Titles: <span class="required">*</span></p>
            <input type="text" name="jobtitles" value="<?php echo $row['jobtitles']; ?>" />
          </div>
        </div>
        
       
        <div class="contact-item">
        <div class="item">
          <p>Users :</p>
          <input type="text" name="users" value="<?php echo $row['user']; ?>" />
          </div>
        </div>
        <div class="question">
          <p>Applied: </p>
          <div class="question-answer">
            <div>
              <input type="radio" value="Yes" id="radio_5" name="isapplied" value="1" <?php if ($row['isapplied'] == 'Yes') { echo "checked"; }?> />
              <label for="radio_5" class="radio"><span>Yes</span></label>
            </div>
            <div>
              <input type="radio" value="No" id="radio_6" name="isapplied" value="0" <?php if ($row['isapplied'] == "No") { echo "checked"; }?> />
              <label for="radio_6" class="radio"><span>No</span></label>
            </div>
          </div>
        </div>
        <div class="btn-block">
          <input type="submit" name="update" value="Update">
        </div>
      </form>
    </div>
  </body>
</html>