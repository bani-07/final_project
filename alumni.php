<?php

include_once("connection.php");
 

$result = mysqli_query($mysqli, "SELECT name,department,batch,grad_year,company_name,office_location,duration,email FROM stu_alumni WHERE identity='alumni'");
?>



<!DOCTYPE html>

<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h2 style="text-align: center;">Here all the informations about alumni</h2>
	<table width='80%' border=0 class="table table-bordered">
    <tr bgcolor='#CCCCCC'>
        <td>Name</td>
        <td>Department</td>
        <td>Batch</td>
        <td>Graduation Year</td>
        <td>company name</td>
        <td>office location</td>
        <td>duration</td>
        <td>email</td>

		
    </tr>
    <?php
    while($res = mysqli_fetch_array($result)) {  
          
      echo "<tr>";
        echo "<td>".$res['name']."</td>";
        echo "<td>".$res['department']."</td>";
        echo "<td>".$res['batch']."</td>";
        echo "<td>".$res['grad_year']."</td>";
        echo "<td>".$res['company_name']."</td>";
        echo "<td>".$res['office_location']."</td>";
        echo "<td>".$res['duration']."</td>"; 
        echo "<td>".$res['email']."</td>";
       
        
              
    }
    ?>
</table>    
</body>
</html>