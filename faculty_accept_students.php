<?php
$iid = "";
$iid=$_SESSION['unametxt'];

$time_sql = mysqli_query($con, "SELECT * FROM management"); 
$row = mysqli_fetch_array($time_sql);
$year = $row['year'];
$sem = $row['semester'];
$add_drop = $row['add_drop'];
$curr_enroll = "Add Drop";
if($add_drop=="N"){
    if($sem==2){
        $sem = 1;
        $year = $year + 1;
    }
    else
        $sem = 2;
    $curr_enroll = "Next Semester Registration";
}

$sql_roll = mysqli_query($con, "SELECT fac_id FROM fac_table where user_id like '%$iid%'");
$data = mysqli_fetch_array($sql_roll);
$id = $data['fac_id'];
$opr = "";
if(isset($_GET['opr']))
	$opr=$_GET['opr'];
	
if(isset($_GET['rs_id']))
	$r_no=$_GET['rs_id'];

if(isset($_GET['course_id']))
	$c_id=$_GET['course_id'];
	
	if($opr=="accept")
{
	$upd_sql=mysqli_query($con,"UPDATE student_reg_forms SET status='PA' where roll_number = $r_no AND course_id = '$c_id' AND year = $year AND semester = $sem");
	if($upd_sql)
		$msg="<div style='background-color: white;padding: 20px;border: 1px solid black;margin-bottom: 25px;''>"
                . "<span class='p_font'>"
                . "1 Student Accepted... !"
                . "</span>"
                . "</div>";
	
	else
		$msg="Could not Accept :".mysqli_error($con);
			
}

    if($opr=="reject")
    {
        $upd_sql=mysqli_query($con,"UPDATE student_reg_forms SET status='R' where roll_number = $r_no AND course_id = '$c_id' AND year = $year AND semester = $sem");
        if($upd_sql)
            $msg="<div style='background-color: white;padding: 20px;border: 1px solid black;margin-bottom: 25px;''>"
                    . "<span class='p_font'>"
                    . "1 Student Accepted... !"
                    . "</span>"
                    . "</div>";
        
        else
            $msg="Could not Accept :".mysqli_error($con);
                
    }
      
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style_entry.css" />
</head>
<body>
<div class="panel panel-default">
  		<div class="panel-heading"><h1><span class="glyphicon glyphicon-user"></span>Accept Students</h1></div>
  			<div class="panel-body">
			<div class="container">
				<p style="text-align:center;">You can accept or reject the students applications for your courses.</p>
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
    <tr>
    <td>Enrollment Type</td>
    <td><?php echo $curr_enroll;?></td>
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
            <th style="text-align: center;" colspan="2">Options</th>
        </tr>
        </thead>
        <?php $sql_reg=mysqli_query($con,"SELECT * FROM student_reg_forms as S inner join offering as O on S.course_id = O.course_id where O.fac_id=$id AND O.year = $year AND O.semester = $sem AND S.status = 'W' ORDER BY S.course_id ");
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
                <form method="post">
                 <td><a href="?tag=accept_students&opr=accept&course_id=<?php echo $row['course_id'];?>&rs_id=<?php echo $row['roll_number'];?>" title="Accept"><img style="-webkit-box-shadow: 0px 0px 0px 0px rgba(50, 50, 50, 0.75);-moz-box-shadow:    0px 0px 0px 0px rgba(50, 50, 50, 0.75);box-shadow:         0px 0px 0px 0px rgba(50, 50, 50, 0.75);" src="picture/update.png" height="20" alt="Update" /></a></td>
            <td><a href="?tag=accept_students&opr=reject&course_id=<?php echo $row['course_id'];?>&rs_id=<?php echo $row['roll_number'];?>" title="Reject"><img style="-webkit-box-shadow: 0px 0px 0px 0px rgba(50, 50, 50, 0.75);-moz-box-shadow:    0px 0px 0px 0px rgba(50, 50, 50, 0.75);box-shadow:         0px 0px 0px 0px rgba(50, 50, 50, 0.75);" src="picture/delete.jpg" height="20" alt="Delete" /></a></td>
                </form>
            </tr>
        <?php	
        }          
        ?>
</table>

		</div>
	</div>
</body>
</html>
