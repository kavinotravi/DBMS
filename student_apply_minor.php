<?php
$iid = "";
$iid=$_SESSION['unametxt'];

$sql_roll = mysqli_query($con, "SELECT roll_number, name FROM stu_table where user_id like '%$iid%'");
$data = mysqli_fetch_array($sql_roll);
$id = $data['roll_number'];
$name = $data['name'];

if(isset($_POST['btn_add'])){
    $DEPT = $_POST["dept"];
    $special = $_POST["specialization"];
    $courses = $_POST["courses"];

    $insert_sql = mysqli_query($con, "INSERT INTO minor_applications VALUES('$name', $id, '$DEPT', '$special', '$courses', 'W') ");
    if($insert_sql=="true")
    echo "<div style='background-color: white;padding: 20px;border: 1px solid black;margin-bottom: 25px;''>"
                    . "<span class='p_font'>"
                    . "Minor Application... !"
                    . "</span>"
                    . "</div>";
        else
            echo "Update Failed...! Try after some time";
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
  		<div class="panel-heading"><h1><span class="glyphicon glyphicon-user"></span>Applications for Minor</h1></div>
  			<div class="panel-body">
			<div class="container">
				<p style="text-align:center;">Applications for Minor</p>
			</div>
<div class="table_margin">
<table class="table table-bordered">
        <thead>
            <tr>
            <th style="text-align: center;">S No.</th>
 	    <th style="text-align: center;">Department</th>
            <th style="text-align: center;">Specialization</th>
            <th style="text-align: center;">Courses</th>
            <th style="text-align: center;">Status</th>
            </tr>
        </thead>
        <?php $sql_reg=mysqli_query($con,"SELECT * FROM minor_applications where roll_number=$id ");
        $i=0;
        
        while($row=mysqli_fetch_array($sql_reg)){
            $i++;
        ?>
          <tr>
                <td><?php echo $i;?></td>
            <td><?php echo $row['department'];?></td>
             <td><?php echo  $row['specialization'];?></td>
            <td><?php echo $row['courses'];?></td> 
                <td><?php echo $row['approval'];?></td>
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
<td> Department </td>
<td> 
					<select name="dept" class="form-control"  >
					<option value="CSE"> CSE </option>
					<option value="EE"> EE </option>
					<option value="ME">ME </option>
					<option value="MTH"> MTH </option>
					<option value="CE"> CE </option>
					<option value="CHE"> CHE </option>
					<option value="CHM"> CHM </option>
					<option value="ECO"> ECO </option>
					<option value="BSBE"> BSBE </option>
					<option value="MSE"> MSE </option>
					<option value="AE"> AE </option>
				</select>
				    </td>
</tr>

<tr>
<td> Specialization </td>
<td> <input type="text" name="specialization" class="form-control"/> </td>
</tr>
<tr>
<td> Courses </td>
<td> <input type="text" name="courses" class="form-control"/> </td>
</tr>

</table>
            <div class="teacher_btn_pos">
					<input type="submit" name="btn_add" href="#" class="btn btn-primary btn-large" value="Apply for Minor" />&nbsp;&nbsp;&nbsp;
					<input type="reset"  href="#" class="btn btn-primary btn-large" value="Cancel" />
				</div>
                </div>                    </form>				
            </div>
		</div>
	</div>
</body>
</html>
