<?php session_start(); ?>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
 
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
       <li class="active"><a href="login.php">Go back</a></li>
      
      
    </ul>
    
  </div>
</nav>

<br />
<?php
include("connection.php");
 
if(isset($_POST['submit'])) {
    $user = mysqli_real_escape_string($mysqli, $_POST['username']);
    $pass = mysqli_real_escape_string($mysqli, $_POST['password']);
 
    if($user == "" || $pass == "") {
        echo "Either username or password field is empty.";
        echo "<br/>";
        
    } else {
        $result = mysqli_query($mysqli, "SELECT * FROM login WHERE username='$user' AND password=md5('$pass')")
        or die("Could not execute the select query.");
        
        $row = mysqli_fetch_assoc($result);
        
        if(is_array($row) && !empty($row)) {
            $validuser = $row['username'];
            $_SESSION['valid'] = $validuser;
            
            $_SESSION['name'] = $row['name'];
            $_SESSION['id'] = $row['id'];
        } else {
            echo "Invalid username or password.";
            echo "<br/>";
            
        }
 
        if(isset($_SESSION['valid'])) {
            header('Location: index.php');            
        }
    }
} else {
?>
<div class="container">
    
    <div class="col-lg-4 col-md-12">
    <div class="card bg-primary card-form">
        <div class="card-body">
    <p><font size="+2">Login</font></p>
    <div class="card bg-primary card-form">
    <form name="form1" method="post" action="">
        
        	
             <div class="form-group">
                Username
                <input type="text" class="form-control" name="username">
            </div>
            <div class="form-group">
                Password
                <input type="password" class="form-control input-group mb-3" name="password">
           </div>
            
                <td>&nbsp;</td>
                <td><input class="btn btn-outline-light btn-block" type="submit" name="submit" value="Submit"></td>
            </tr>
        </table>
    </form>
 </div>   
</div>
</div>
</div>
</div>
<?php
}
?>
</body>
</html>