<?php
$iid = "";
$iid=$_SESSION['unametxt'];
$time_sql = mysqli_query($con, "SELECT * FROM management"); 
$row = mysqli_fetch_array($time_sql);
$year = $row['year'];
$sem = $row['semester'];
$time_sql = mysqli_query($con, "SELECT * FROM management"); 
$row = mysqli_fetch_array($time_sql);
$sql_roll = mysqli_query($con, "SELECT roll_number FROM stu_table where user_id like '%$iid%'");
$data = mysqli_fetch_array($sql_roll);
$id = $data['roll_number'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style_entry.css" />
</head>
<body>
<div class="panel panel-default">
  		<div class="panel-heading"><h1><span class="glyphicon glyphicon-user"></span>Academic Details</h1></div>
  			<div class="panel-body">
			<div class="container">
				<p style="text-align:center;">Transcript</p>
			</div>
<div class="table_margin">
<table class="table table-bordered">
        <thead>
            <tr>
            <th style="text-align: center;">S No.</th>
 	    <th style="text-align: center;">Course Id</th>
            <th style="text-align: center;">Course Name</th>
            <th style="text-align: center;">year</th>
            <th style="text-align: center;">semester</th>
            <th style="text-align: center;">Grade</th>
            <th style="text-align: center;">Type</th>
	    <th style="text-align: center;">Nature</th>
        </tr>
        </thead>
        <?php $sql_reg=mysqli_query($con,"SELECT * FROM stu_acad where roll_number='$id' ");
        $i=0;
        while($row=mysqli_fetch_array($sql_reg)){
            $course = $row['course_id'];
            $sql_course = mysqli_query($con, "SELECT * FROM offering WHERE course_id like '%$course%' AND year = $year AND semester = $sem ");
            $courses = mysqli_fetch_array($sql_course);
            $sql_master = mysqli_query($con, "SELECT course_name FROM master_course_list WHERE course_id like '%$course%' ");
            $course_name = mysqli_fetch_array($sql_master);
            $i++;
        ?>
          <tr>
                <td><?php echo $i;?></td>
            <td><?php echo $row['course_id'];?></td>
             <td><?php echo  $course_name['course_name'];?></td>
            <td><?php echo $row['year'];?></td> 
                <td><?php echo $row['semester'];?></td>
                <td><?php echo $row['grade'];?></td>
                <td><?php echo $row['type'];?></td>
                <td><?php echo $row['nature'];?></td>
            </tr>
        <?php	
        }          
        ?>
</table>

		</div>
	</div>
</body>
</html>
