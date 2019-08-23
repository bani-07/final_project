<?php session_start(); ?>
 
<?php
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>
 
<?php
// including the database connection file
include_once("connection.php");
 
if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    
$name = $_POST['name'];
$department = $_POST['department'];
$batch = $_POST['batch'];
$grad_year = $_POST['grad_year'];
$identity = $_POST['identity'];
$company_name = $_POST['company_name'];
$office_location = $_POST['office_location'];
$duration = $_POST['duration'];
$email = $_POST['email'];  
    
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
    } else {    
        //updating the table
        $result = mysqli_query($mysqli, "UPDATE stu_alumni SET name='$name', department='$department', batch='$batch',grad_year='$grad_year',identity='$identity',company_name='$company_name',office_location='$office_location',duration='$duration',email='$email' WHERE id=$id");
        
        //redirectig to the display page. In our case, it is view.php
        header("Location: view.php");
    }
}
?>
<?php
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM stu_alumni WHERE id=$id");
 
while($res = mysqli_fetch_array($result))
{
 $name = $res['name'];
$department = $res['department'];
$batch = $res['batch'];
$grad_year = $res['grad_year'];
$identity = $res['identity'];
$company_name = $res['company_name'];
$office_location = $res['office_location'];
$duration = $res['duration'];
$email = $res['email']; 
}
?>
<html>
<head>    
    <title>Edit Data</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
 
<body>

    <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
      <li><a href="view.php">view Data</a></li>
      <li><a href="logout.php">Log Out</a></li>
      
    </ul>
  </div>
</nav>

    
    <br/><br/>
    <div class="form">
        <div class="col-lg-4 col-md-12">
    <form name="form1" method="post" action="edit.php">
       
       
<div class="form-group">
                Name
                <input type="text" class="form-control" name="name" value="<?php echo $name;?>">
            </div>
            <div class="form-group">
                Department
                <input type="text" class="form-control" name="department" value="<?php echo $department;?>">
            </div>
            <div class="form-group">
                Batch
                <input type="text" class="form-control" name="batch" value="<?php echo $batch;?>">
            </div>
             <div class="form-group">
                Graduation Year
                <input type="text" class="form-control" name="grad_year" value="<?php echo $grad_year;?>">
            </div>
             <div class="form-group">
                <p>Please select your identity:</p>
  <input type="radio" name="identity" value="student"> Student<br>
  <input type="radio" name="identity" value="alumni"> Alumni<br>
   
            </div>
             <div class="form-group">
                Company Name
                <input type="text" class="form-control" name="company_name" value="<?php echo $company_name;?>">
            </div>
         <div class="form-group">
                Office Location
                <input type="text" class="form-control" name="office_location" value="<?php echo $office_location;?>">
            </div>
         <div class="form-group">
                Duration
                <input type="text" class="form-control" name="duration" value="<?php echo $duration;?>">
            </div>
             <div class="form-group">
                Email
                <input type="text" class="form-control" name="email" value="<?php echo $email;?>">
            </div>
             
                <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
            
        </div>
    </form>
  </div>
  </div>  
</body>
</html>