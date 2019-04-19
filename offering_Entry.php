<?php
$id="";
$opr="";
$msg = "";
$iid = "";
$iiid = "";
if(isset($_GET['opr']))
	$opr=$_GET['opr'];

if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];

if(isset($_GET['usr_id']))
	$iid=$_GET['usr_id'];

if(isset($_GET['third_id']))
	$iiid=$_GET['third_id'];
	


//--------------add data-----------------	
if(isset($_POST['btn_sub'])){
	$cid=$_POST['course_id']; 
	$yr=$_POST['year'];
	$semester=$_POST['sem'];
	$fac_id=$_POST['fac_id'];
	$mod=$_POST['modular'];
	$venue=$_POST['venue']; 	

$sql_ins=mysqli_query($con,"INSERT INTO offering 
						VALUES('$cid' ,'$yr','$semester','$fac_id','$mod','$venue')");

if($sql_ins==true)
	$msg="1 Row Inserted";
else
	$msg="Insert Error:".mysqli_error($con);
	
}
//------------------uodate data----------
if(isset($_POST['btn_upd'])){
	$cid=$_POST['course_id']; 
	$yr=$_POST['year'];
	$semester=$_POST['sem'];
	$fac_id=$_POST['fac_id'];
	$mod=$_POST['modular'];
	$venue=$_POST['venue']; 	
	
	
	$del_sql=mysqli_query($con,"DELETE FROM offering WHERE course_id='$id' and year='$iid' and semester = '$iiid'");
	$sql_ins=mysqli_query($con,"INSERT INTO offering 
						VALUES('$cid' ,'$yr','$semester','$fac_id','$mod','$venue')");
	echo $id;	


	if($sql_ins=='true')
		echo "<div style='background-color: white;padding: 20px;border: 1px solid black;margin-bottom: 25px;''>"
                . "<span class='p_font'>"
                . "Record Updated Successfully... !"
                . "</span>"
                . "</div>";
	else
		$msg="Update Failed...!";
	}

echo $msg
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style_entry.css" />
</head>
<body>
<?php

if($opr=="upd")
{
	$sql_upd=mysqli_query($con,"SELECT * FROM offering WHERE course_id = '$id' and year='$iid' and semester = '$iiid' ");
	$rs_upd=mysqli_fetch_array($sql_upd);

?>

<!-- for form Update-->

<div class="panel panel-default">
  		<div class="panel-heading"><h1><span class="glyphicon glyphicon-user"></span> Offering Entry Form</h1></div>
  			<div class="panel-body">
			<div class="container">
				<p style="text-align:center;">Here, you'll update offering details to record into database.</p>
			</div>


<div class="container_form">
    <form method="post">	
				

				<div class="teacher_name_pos">
					<input type="text" name="course_id" class="form-control" value="<?php echo $rs_upd['course_id'];?>" />

				</div><br>
				
				<div class="teacher_id_pos">
					<input type="text" name="year" class="form-control" value="<?php echo $rs_upd['year'];?>" />

				</div><br>
		     	
				<div class="teacher_Department_pos">
					<input type="text" name="sem" class="form-control" value="<?php echo $rs_upd['semester'];?>" />
				</div><br>
				
				<div class="teacher_credits_pos">
					<input type="text" name="fac_id" class="form-control" value="<?php echo $rs_upd['fac_id'];?>" />
				</div><br>
				
				<div class="teacher_radio_pos">
					<input type="radio" name="modular" value="Y" <?php if($rs_upd['modular']=="Y") echo "checked";?> /> <span class="p_font">&nbsp;Modular</span>
					<input type="radio" name="modular" value="N" <?php if($rs_upd['modular']=="N") echo "checked";?> /> <span class="p_font">&nbsp;Not Modular</span>
				</div><br>
				
				<div class="teacher_venue_pos">
					<input type="text" name="venue" class="form-control" value="<?php echo $rs_upd['venue'];?>" />
				</div><br>
				
				


								
				<div class="teacher_btn_pos">
					<input type="submit" name="btn_upd" href="#" class="btn btn-primary btn-large" value="Update" />&nbsp;&nbsp;&nbsp;
					<input type="reset"  href="#" class="btn btn-primary btn-large" value="Cancel" />
				</div>
                                    </form>
			</div>
		</div>
	</div><!-- end of style_informatios -->

<?php	
}
else
{
?>
<!-- for form Register-->
	
<div class="panel panel-default">
  		<div class="panel-heading"><h1><span class="glyphicon glyphicon-user"></span> Offering Entry Form</h1></div>
  			<div class="panel-body">
			<div class="container">
				<p style="text-align:center;">Here, you'll add a new offering's detail in the database.</p>
			</div>

<div class="container_form">
    <form method="post">
				<div class="teacher_mail_pos">
					
					<select name="course_id" class="form-control" placeholder = "Department" >
					<?php
				    $sql = mysqli_query($con, "SELECT course_id From master_course_list");
				    while ($row = mysqli_fetch_array($sql)){
					$course = $row['course_id'];
					$sql_master = mysqli_query($con, "SELECT course_name FROM master_course_list WHERE course_id like '%$course%' ");
					$course_name = mysqli_fetch_array($sql_master);
				    echo "<option value='". $row['course_id'] ."'>" .$row['course_id']."-".$course_name['course_name']."</option>" ;
				    }
				    ?>
				</select>
				</div><br>
				    
				
				<div class="teacher_name_pos">
					<input type="text" name="year" class="form-control" placeholder="Year" />

				</div><br>
		     	
				<div class="teacher_name_pos">
					<input type="text" name="sem" class="form-control" placeholder="Semester(odd/even)" />
				</div><br>
				
				<div class="teacher_name_pos">
					<input type="text" name="fac_id" class="form-control" placeholder="fac_id" />
				</div><br>
				
				<div class="teacher_name_pos">
					<input type="radio" name="modular" value="Y" /> <span class="p_font">&nbsp;Modular</span>
					<input type="radio" name="modular" value="N" /> <span class="p_font">&nbsp;Not-Modular</span>
				</div><br>
				
				<div class="teacher_name_pos">
					<input type="text" name="venue" class="form-control" placeholder="venue" />
				</div><br>
							
				<div class="teacher_btn_pos">
					<input type="submit" name="btn_sub" href="#" class="btn btn-primary btn-large" value="Register" />&nbsp;&nbsp;&nbsp;
					<input type="reset"  href="#" class="btn btn-primary btn-large" value="Cancel" />
				</div>
                                    </form>
			</div>
		</div>
	</div>
<?php
}
?>
</body>
</html>
