<?php session_start(); ?>
 
<?php
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>
 
<html>
<head>
    <title>Add Data</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
 
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="view.php">View Result</a></li>
      
      
    </ul>
    
  </div>
</nav>
<?php
//including the database connection file
include_once("connection.php");
 
if(isset($_POST['Submit'])) {    
   $name = $_POST['name'];
$department = $_POST['department'];
$batch = $_POST['batch'];
$grad_year = $_POST['grad_year'];
$identity = $_POST['identity'];
$company_name = $_POST['company_name'];
$office_location = $_POST['office_location'];
$duration = $_POST['duration'];
$email = $_POST['email'];
    $loginId = $_SESSION['id'];
        
    // checking empty fields
    if(empty($name) || empty($batch) || empty($identity)) {                
        if(empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($batch)) {
            echo "<font color='red'>batch field is empty.</font><br/>";
        }
        
        if(empty($identity)) {
            echo "<font color='red'>Identity field is empty.</font><br/>";
        }
        
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        // if all the fields are filled (not empty) 
            
        //insert data to database    
        $result = mysqli_query($mysqli, "INSERT INTO stu_alumni(name,department,batch,grad_year,identity,company_name,office_location,duration,email, login_id) VALUES('$name','$department','$batch','$grad_year','$identity','$company_name','$office_location','$duration','$email', '$loginId')");
        
        //display success message
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='view.php'>View Result</a>";
    }
}
?>
</body>
</html>