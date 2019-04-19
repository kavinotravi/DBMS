<?php
$iid = "";
$iid=$_SESSION['unametxt'];

$time_sql = mysqli_query($con, "SELECT * FROM management"); 
$row = mysqli_fetch_array($time_sql);
$year = $row['year'];
$sem = $row['semester'];
$sql_roll = mysqli_query($con, "SELECT roll_number FROM stu_table where user_id like '%$iid%'");
$data = mysqli_fetch_array($sql_roll);
$id = $data['roll_number'];

if(isset($_GET['opr']))
    $opr=$_GET['opr'];
else
    $opr="";
$c_id="";
if(isset($_GET['c_id']))
	$c_id=$_GET['c_id'];
if($opr=="del"){
    $sql_remove = mysqli_query($con, "DELETE FROM student_reg_forms WHERE roll_number=$id AND year = $year AND semester = $sem AND course_id like '%$c_id%' ");
    if($sql_remove)
		$msg="<div style='background-color: white;padding: 20px;border: 1px solid black;margin-bottom: 25px;''>"
                . "<span class='p_font'>"
                . "1 Record Deleted... !"
                . "</span>"
                . "</div>";
	
	else
		echo "Could not Delete";
			
}

if(isset($_POST['btn_add'])){
    $course_to_add = $_POST["Course"];
    $course_type = $_POST["Course_Type"];
    $course_nature = $_POST["Course_Nature"];
    $credit_count_sql = mysqli_query($con, "SELECT sum(credits) FROM student_reg_forms WHERE roll_number=$id AND year = $year AND semester = $sem ");
    $course_count = mysqli_query($con, "SELECT * FROM student_reg_forms WHERE roll_number=$id AND course_id like '%$course_to_add%'");
    $no_rows = mysqli_num_rows($course_count);
    $course_count2 = mysqli_query($con, "SELECT * FROM stu_acad WHERE roll_number=$id AND course_id like '%$course_to_add%' AND GRADE IN (10, 8, 6, 4)");
    $no_rows2 = mysqli_num_rows($course_count2);
    if($no_rows > 0){
        echo "<div style='background-color: white;padding: 20px;border: 1px solid black;margin-bottom: 25px;''>"
                    . "<span class='p_font'>"
                    . "You cannot do one course multiple times... !"
                    . "</span>"
                    . "</div>";
    }
    elseif($no_rows2 > 0){
        echo "<div style='background-color: white;padding: 20px;border: 1px solid black;margin-bottom: 25px;''>"
                    . "<span class='p_font'>"
                    . "You cannot do one course multiple times... !"
                    . "</span>"
                    . "</div>";
    }
    else{
    $sql_credit = mysqli_query($con, "SELECT credits FROM master_course_list WHERE course_id like '%$course_to_add%' ");
    $credits = mysqli_fetch_array($sql_credit);
    $cre = $credits['credits'];
    $insert_sql = mysqli_query($con, "INSERT INTO student_reg_forms VALUES($id, '$course_to_add', $year, '$sem', $cre ,'$course_type', '$course_nature', 'W') ");
    if($insert_sql=="true")
    echo "<div style='background-color: white;padding: 20px;border: 1px solid black;margin-bottom: 25px;''>"
                    . "<span class='p_font'>"
                    . "Course added successfully Successfully... !"
                    . "</span>"
                    . "</div>";
        else
            echo "Update Failed...! Try after some time";
    }
}

if(isset($_POST['btn_sub'])){
    $sql_accept_count1 = mysqli_query($con, "SELECT sum(credits) FROM student_reg_forms WHERE roll_number=$id AND year = $year AND semester = $sem AND status = 'W' ");
    $sql_accept_count2 = mysqli_query($con, "SELECT sum(credits) FROM student_reg_forms WHERE roll_number=$id AND year = $year AND semester = $sem AND status = 'PA' ");
    $sql_accept_count3 = mysqli_query($con, "SELECT sum(credits) FROM student_reg_forms WHERE roll_number=$id AND year = $year AND semester = $sem AND status = 'FS' ");
    $sql_accept_count4 = mysqli_query($con, "SELECT sum(credits) FROM student_reg_forms WHERE roll_number=$id AND year = $year AND semester = $sem AND status = 'A' ");
    $count1 = mysqli_fetch_array($sql_accept_count1);
    $count2 = mysqli_fetch_array($sql_accept_count2);
    $count3 = mysqli_fetch_array($sql_accept_count3);
    $count4 = mysqli_fetch_array($sql_accept_count4);
    if($count4['sum(credits)'] > 0)
    echo "<div style='background-color: white;padding: 20px;border: 1px solid black;margin-bottom: 25px;''>"
                    . "<span class='p_font'>"
                    . "Your Form has been accepted... !"
                    . "</span>"
                    . "</div>";
    else if($count3['sum(credits)'] > 0)
    echo "<div style='background-color: white;padding: 20px;border: 1px solid black;margin-bottom: 25px;''>"
    . "<span class='p_font'>"
    . "Your form has already been submitted... !"
    . "</span>"
    . "</div>";
    else if($count1['sum(credits)'] > 0)
    echo "<div style='background-color: white;padding: 20px;border: 1px solid black;margin-bottom: 25px;''>"
                    . "<span class='p_font'>"
                    . "All your courses have not been accepted by the faculty... !"
                    . "</span>"
                    . "</div>";
    else if(($count2['sum(credits)'] < 65) and ($count2['sum(credits)'] > 33)){
        $sql_submit_form = mysqli_query($con, "UPDATE student_reg_forms SET status = 'FS' WHERE roll_number=$id AND year = $year AND semester = $sem");
        echo "<div style='background-color: white;padding: 20px;border: 1px solid black;margin-bottom: 25px;''>"
                    . "<span class='p_font'>"
                    . "Form submitted... !"
                    . "</span>"
                    . "</div>";
    }
    else{
        echo "<div style='background-color: white;padding: 20px;border: 1px solid black;margin-bottom: 25px;''>"
                    . "<span class='p_font'>"
                    . "Total number of credits should between 36 and 64... !"
                    . "</span>"
                    . "</div>";
    }
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
  		<div class="panel-heading"><h1><span class="glyphicon glyphicon-user"></span>Add Drop</h1></div>
  			<div class="panel-body">
			<div class="container">
				<p style="text-align:center;">Add Drop for Current Semester</p>
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
            <th style="text-align: center;">Instructor</th>
            <th style="text-align: center;">Credits</th>
            <th style="text-align: center;">Modular</th>
            <th style="text-align: center;">Type</th>
	    <th style="text-align: center;">Nature</th>
            <th style="text-align: center;">Status</th>
            <th style="text-align: center;">Options</th>
        </tr>
        </thead>
        <?php $sql_reg=mysqli_query($con,"SELECT * FROM student_reg_forms where roll_number=$id AND year = $year AND semester = $sem ");
        $i=0;
        while($row=mysqli_fetch_array($sql_reg)){
            $course = $row['course_id'];
            $sql_course = mysqli_query($con, "SELECT * FROM offering WHERE course_id like '%$course%' AND year = $year AND semester = $sem ");
            $courses = mysqli_fetch_array($sql_course);
            $faculty_id = $courses['fac_id'];
            $faculty_sql = mysqli_query($con, "SELECT name FROM fac_table where fac_id = $faculty_id ");
            $faculty = mysqli_fetch_array($faculty_sql);
            $sql_master = mysqli_query($con, "SELECT course_name FROM master_course_list WHERE course_id like '%$course%' ");
            $course_name = mysqli_fetch_array($sql_master);
            $i++;
        ?>
          <tr>
                <td><?php echo $i;?></td>
            <td><?php echo $row['course_id'];?></td>
             <td><?php echo  $course_name['course_name'];?></td>
            <td><?php echo $faculty['name'];?></td> 
                <td><?php echo $row['credits'];?></td>
                <td><?php echo $courses['modular'];?></td>
                <td><?php echo $row['type'];?></td>
                <td><?php echo $row['nature'];?></td>
            <td><?php echo $row['status'];?></td>
            <td><a href="?tag=add_drop&opr=del&c_id=<?php echo $row['course_id'];?>" title="Delete"><img style="-webkit-box-shadow: 0px 0px 0px 0px rgba(50, 50, 50, 0.75);-moz-box-shadow:    0px 0px 0px 0px rgba(50, 50, 50, 0.75);box-shadow:         0px 0px 0px 0px rgba(50, 50, 50, 0.75);" src="picture/delete.jpg" height="20" alt="Delete" /></a></td>
         
            </tr>
        <?php	
        }          
        ?>
</table>
<div class="container_form">
    <form method="post">
<div class="information_container">
<table class = "table without borders">
<tr>
<td> Choose the Courses </td>
<td>
    <select name="Course" class="form-control">
    <?php
    $sql = mysqli_query($con, "SELECT course_id From offering where year = $year AND semester = $sem");
    while ($row = mysqli_fetch_array($sql)){
        $course = $row['course_id'];
        $sql_master = mysqli_query($con, "SELECT course_name FROM master_course_list WHERE course_id like '%$course%' ");
        $course_name = mysqli_fetch_array($sql_master);
    echo "<option value='". $row['course_id'] ."'>" .$row['course_id']."-".$course_name['course_name']."</option>" ;
    }
    ?>
    </td>
    </tr>
    <td> Choose Course Type </td>
<td>
    <select name="Course_Type" class="form-control">
    <option value="IC"> Institute Compulsory </option>
    <option value="DC"> Department Compulsory </option>
    <option value="DE">Department Elective </option>
    <option value="OE"> Open Elective </option>
    <option value="HSS"> Humanities and Social Studies </option>
    <option value="UGP"> Undergraduate Project </option>
    <option value="Thesis"> Thesis </option>
    </select>
    </td>
    </tr>
    <tr>
    <td> Choose Nature of Course </td>
    <td> 
    <select name="Course_Nature" class="form-control">
    <option value="Fresh"> Fresh </option>
    <option value="Repeat"> Repeat </option>
    <option value="Substitute"> Substitute </option>
    </td>
    </tr>
    </table>
    

            <div class="teacher_btn_pos">
					<input type="submit" name="btn_add" href="#" class="btn btn-primary btn-large" value="Add Course" />&nbsp;&nbsp;&nbsp;
					<input type="submit"  name="btn_sub" href="#" class="btn btn-primary btn-large" value="Submit Form" />
				</div>
                </div>                    </form>				
            </div>
		</div>
	</div>
</body>
</html>
