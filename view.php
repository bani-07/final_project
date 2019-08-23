<?php session_start(); ?>
 
<?php
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>
 
<?php
//including the database connection file
include_once("connection.php");
 
//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM stu_alumni WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");
?>
 
<html>
<head>
    <title>Homepage</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
 
<body>
    <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
    
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
      <li><a href="add.html">Add New Data</a></li>
      <li><a href="logout.php">Log Out</a></li>
      
    </ul>
  </div>
</nav>
  
    

<br/><br/>
    
<table width='80%' border=0 class="table table-bordered">
    <tr bgcolor='#CCCCCC'>
        <td>Name</td>
        <td>Department</td>
        <td>Batch</td>
		<td>Graduation Year</td>
		<td>Identity</td>
		<td>Company Name</td>
		<td>Office Location</td>
		<td>Duration</td>
		<td>Email</td>
		<td>Update</td>
    </tr>
    <?php
    while($res = mysqli_fetch_array($result)) {        
        echo "<tr>";
        echo "<td>".$res['name']."</td>";
        echo "<td>".$res['department']."</td>";
        echo "<td>".$res['batch']."</td>";  
        echo "<td>".$res['grad_year']."</td>";
        echo "<td>".$res['identity']."</td>";
        echo "<td>".$res['company_name']."</td>";
        echo "<td>".$res['office_location']."</td>";
        echo "<td>".$res['duration']."</td>";  
        echo "<td>".$res['email']."</td>";
        echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";        
    }
    ?>
</table>    
</body>
</html>