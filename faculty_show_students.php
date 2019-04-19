<?php
$iid = "";
$iid=$_SESSION['unametxt'];

$time_sql = mysqli_query($con, "SELECT * FROM management"); 
$row = mysqli_fetch_array($time_sql);
$year = $row['year'];
$sem = $row['semester'];
$sql_roll = mysqli_query($con, "SELECT fac_id FROM fac_table where user_id like '%$iid%'");
$data = mysqli_fetch_array($sql_roll);
$id = $data['fac_id'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style_entry.css" />
</head>
<body>
<div class="panel panel-default">
  		<div class="panel-heading"><h1><span class="glyphicon glyphicon-user"></span>Current Student Enrollment</h1></div>
  			<div class="panel-body">
			<div class="container">
				<p style="text-align:center;">All the students enrolled in your courses this semester.</p>
			</div>

<div class="information_container">
    <table class = "table without borders">
    <tr>
        <td>Year</td>
        <td><?php echo $year;?></td>
    </tr>
    <tr>
        <td>Semester</td>
        <td><?php echo $sem;?></td>
    </tr>
    </table>
</div>
<div class="table_margin">
<table class="table table-bordered">
        <thead>
            <tr>
            <th style="text-align: center;">S No.</th>
 	    <th style="text-align: center;">Course Id</th>
            <th style="text-align: center;">Course Name</th>
            <th style="text-align: center;">Student Roll Number</th>
            <th style="text-align: center;">Student Name</th>
        </tr>
        </thead>
        <?php $sql_reg=mysqli_query($con,"SELECT * FROM student_reg_forms as S inner join offering as O on S.course_id = O.course_id where O.fac_id=$id AND O.year = $year AND O.semester = $sem AND S.status = 'A' ORDER BY S.course_id ");
        $i=0;
        while($row=mysqli_fetch_array($sql_reg)){
            $student = $row['roll_number'];
            $student_sql = mysqli_query($con, "SELECT name from stu_table WHERE roll_number = $student");
            $student_name = mysqli_fetch_array($student_sql);
            $course = $row['course_id'];
            $course_sql = mysqli_query($con, "SELECT course_name FROM master_course_list where course_id = '$course' ");
            $course_name = mysqli_fetch_array($course_sql);
            $i++;
        ?>
          <tr>
                <td><?php echo $i;?></td>
            <td><?php echo $row['course_id'];?></td>
             <td><?php echo  $course_name['course_name'];?></td>
            <td><?php echo $student;?></td> 
                <td><?php echo $student_name['name'];?></td>
            </tr>
        <?php	
        }          
        ?>
</table>

		</div>
	</div>
</body>
</html>
