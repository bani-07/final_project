<?php session_start(); ?>
<html>
<head>
    <title>Homepage</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
 
<body>
    
    <?php
    if(isset($_SESSION['valid'])) {            
        include("connection.php");                    
        $result = mysqli_query($mysqli, "SELECT * FROM login");
    ?>                
        Welcome <?php echo $_SESSION['name'] ?> <br/>


         <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
      <li><a href="logout.php">Log Out</a></li>
      
    </ul>
  </div>
</nav>
        <br/>
        <a class="view" href='view.php'>View job Description</a>
        
        <br/><br/>
    <?php    
    } else {

        
        echo " <nav class='navbar navbar-inverse'> <ul class='nav navbar-nav'> 
        <li> <a href='register.php'> Sign Up</a></li>      
        <li> <a href='login.php'> Login</a> </li>      
           </ul></nav>";
        
      echo "You must be logged in to view this page.<br/><br/>";
        
    }
    ?>
    <div class="jumbotron">
        <h1 style="text-align: center;">Find A Student/Alumni</h1>
        <p class="lead text-center" >You Can Find Student And Alumni Here</p>

        <div style="display: block;width: 115px;height: 45px; background: #79B9E1; padding: 10px; text-align: center;border-radius: 5px;color: white;font-weight: bold;margin-left: 610px;">
    <a href="student.php" class="button">Find Student</a><br>
</div>
<div style="display: block;width: 115px;height: 45px; background: #79B9E1; padding: 10px; text-align: center;border-radius: 5px;color: white;font-weight: bold;margin-left: 610px;margin-top: 10px;">
    <a href="alumni.php" class="button">Find Alumni</a>
</div>
        </div>
    </div>  
</body>
</html>