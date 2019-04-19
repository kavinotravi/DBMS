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
$opr = "";
if(isset($_GET['opr']))
	$opr=$_GET['opr'];
	
if(isset($_GET['rs_id']))
	$r_no=$_GET['rs_id'];

    if(isset($_GET['course_id']))
	$c_id=$_GET['course_id'];

if(isset($_GET['grade']))
	$grade=$_GET['grade'];

if($opr=="graded"){
    $old_sql=mysqli_query($con,"SELECT * FROM student_reg_forms  where roll_number = $r_no AND course_id = '$c_id' AND year = $year AND semester = $sem");
    $old = mysqli_fetch_array($old_sql);
    $old_credits = $old['credits'];
    $old_type = $old['type'];
    $old_nature = $old['nature'];
    $new_sql=mysqli_query($con, "INSERT INTO stu_acad VALUES ('$r_no', '$c_id', '$sem', '$year', '$old_type', '$old_credits', '$old_nature', '$grade')");
	if($new_sql){
		$msg="<div style='background-color: white;padding: 20px;border: 1px solid black;margin-bottom: 25px;''>"
                . "<span class='p_font'>"
                . "Grade Submitted... !"
                . "</span>"
                . "</div>";
        $old_del_sql = mysqli_query($con, "DELETE from student_reg_forms where roll_number = $r_no AND course_id = '$c_id' AND year = $year AND semester = $sem"); 
        $cpi = 0.0;
        $sum_credits = 0;
        $cpi_sql = mysqli_query($con, "SELECT credits, grade FROM stu_acad where roll_number = $r_no");

        while($cpi_rows = mysqli_fetch_array($cpi_sql)){
            $credit = $cpi_rows['credits'];
            $score = $cpi_rows['grade'];
            $sum_credits = $sum_credits + $credit;
            $cpi = $cpi + ($credit * $score);
        }
        $cpi = $cpi/$sum_credits;
        $sql_set_cpi = mysqli_query($con, "UPDATE stu_table SET cpi = $cpi where roll_number = $r_no");
    }
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
  		<div class="panel-heading"><h1><span class="glyphicon glyphicon-user"></span>Grade Submissions</h1></div>
  			<div class="panel-body">
			<div class="container">
				<p style="text-align:center;">Grade Submissions for the current year and semester.</p>
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
            <th style="text-align: center;" colspan="6">Options</th>
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
                <form method="post">
                 <td><a href="?tag=submit_grade&opr=graded&grade=10&course_id=<?php echo $row['course_id'];?>&rs_id=<?php echo $row['roll_number'];?>" title="A"><img style="-webkit-box-shadow: 0px 0px 0px 0px rgba(50, 50, 50, 0.75);-moz-box-shadow:    0px 0px 0px 0px rgba(50, 50, 50, 0.75);box-shadow:         0px 0px 0px 0px rgba(50, 50, 50, 0.75);" src="images/a.png" height="20" alt="A" /></a></td>
            <td><a href="?tag=submit_grade&opr=graded&grade=8&course_id=<?php echo $row['course_id'];?>&rs_id=<?php echo $row['roll_number'];?>" title="B"><img style="-webkit-box-shadow: 0px 0px 0px 0px rgba(50, 50, 50, 0.75);-moz-box-shadow:    0px 0px 0px 0px rgba(50, 50, 50, 0.75);box-shadow:         0px 0px 0px 0px rgba(50, 50, 50, 0.75);" src="images/b.png" height="20" alt="B" /></a></td>
            <td><a href="?tag=submit_grade&opr=graded&grade=6&course_id=<?php echo $row['course_id'];?>&rs_id=<?php echo $row['roll_number'];?>" title="C"><img style="-webkit-box-shadow: 0px 0px 0px 0px rgba(50, 50, 50, 0.75);-moz-box-shadow:    0px 0px 0px 0px rgba(50, 50, 50, 0.75);box-shadow:         0px 0px 0px 0px rgba(50, 50, 50, 0.75);" src="images/c.png" height="20" alt="C" /></a></td>
            <td><a href="?tag=submit_grade&opr=graded&grade=4&course_id=<?php echo $row['course_id'];?>&rs_id=<?php echo $row['roll_number'];?>" title="D"><img style="-webkit-box-shadow: 0px 0px 0px 0px rgba(50, 50, 50, 0.75);-moz-box-shadow:    0px 0px 0px 0px rgba(50, 50, 50, 0.75);box-shadow:         0px 0px 0px 0px rgba(50, 50, 50, 0.75);" src="images/d.png" height="20" alt="D" /></a></td>
            <td><a href="?tag=submit_grade&opr=graded&grade=2&course_id=<?php echo $row['course_id'];?>&rs_id=<?php echo $row['roll_number'];?>" title="E"><img style="-webkit-box-shadow: 0px 0px 0px 0px rgba(50, 50, 50, 0.75);-moz-box-shadow:    0px 0px 0px 0px rgba(50, 50, 50, 0.75);box-shadow:         0px 0px 0px 0px rgba(50, 50, 50, 0.75);" src="images/e.png" height="20" alt="E" /></a></td>
            <td><a href="?tag=submit_grade&opr=graded&grade=0&course_id=<?php echo $row['course_id'];?>&rs_id=<?php echo $row['roll_number'];?>" title="F"><img style="-webkit-box-shadow: 0px 0px 0px 0px rgba(50, 50, 50, 0.75);-moz-box-shadow:    0px 0px 0px 0px rgba(50, 50, 50, 0.75);box-shadow:         0px 0px 0px 0px rgba(50, 50, 50, 0.75);" src="images/f.png" height="20" alt="F" /></a></td>
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
