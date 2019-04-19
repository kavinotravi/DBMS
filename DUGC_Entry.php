<?php
$id="";
$opr="";
$msg = "";
$iid = "";
if(isset($_GET['opr']))
	$opr=$_GET['opr'];

if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];

if(isset($_GET['usr_id']))
	$iid=$_GET['usr_id'];


//--------------add data-----------------	
if(isset($_POST['btn_sub'])){
	$name=$_POST['name']; 
	$cid=$_POST['fac_id'];
	$department=$_POST['dept'];
	$user_id=$_POST['user_id'];
	$dugc = $_POST['dugc'];
	$pass = $_POST['pass'];	
	$activ = $_POST['active'];	 	

	
	$sql_ins1=mysqli_query($con,"INSERT INTO user_table 
						VALUES('$dugc','$pass','dugc')");

	$sql_ins=mysqli_query($con,"INSERT INTO dugc 
						VALUES('$name' ,'$cid','$user_id','$department','$activ','$dugc')");

if($sql_ins==true)
	$msg="1 Row Inserted";
else
	$msg="Insert Error:".mysqli_error($con);
	
}
//------------------uodate data----------
if(isset($_POST['btn_upd'])){
	$name=$_POST['name']; 
	$cid=$_POST['fac_id'];
	$department=$_POST['dept'];
	$user_id=$_POST['user_id'];
	$dugc = $_POST['dugc'];
	$pass = $_POST['pass'];
	$activ = $_POST['active'];	 	
	
	/*$del_sql=mysqli_query($con,"DELETE FROM dugc WHERE fac_id='$id'");
	$del_sql=mysqli_query($con,"DELETE FROM user_table WHERE user_id='$iid'");	
	$sql_ins=mysqli_query($con,"INSERT INTO dugc 
						VALUES('$name' ,'$cid','$user_id','$department','$activ')");
	$sql_ins1=mysqli_query($con,"INSERT INTO user_table 
						VALUES('$dugc' ,'$pass','dugc')");
	
	*/
	$update1 = mysqli_query($con, "UPDATE user_table SET pass='$pass' where user_id='$iid' ");
	$update2 = mysqli_query($con, "UPDATE dugc SET name = '$name', department = '$department', active='$activ' where dugc_id = '$iid' ");

	echo $id;
	


	if($update1=='true')
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
	$sql_upd=mysqli_query($con,"SELECT * FROM dugc WHERE fac_id = '$id' ");
	$rs_upd=mysqli_fetch_array($sql_upd);
	$sql_upd1=mysqli_query($con,"SELECT * FROM user_table WHERE user_id = '$iid' ");
	$rs_upd1=mysqli_fetch_array($sql_upd1);

?>

<!-- for form Upadte-->

<div class="panel panel-default">
  		<div class="panel-heading"><h1><span class="glyphicon glyphicon-user"></span> DUGC Entry Form</h1></div>
  			<div class="panel-body">
			<div class="container">
				<p style="text-align:center;">Here, you'll update DUGC's detail to record into database.</p>
			</div>


<div class="container_form">
    <form method="post">

				<div class="teacher_name_pos">
					<input type="text" name="name" class="form-control" value="<?php echo $rs_upd['name'];?>" />

				</div><br>
				
				<div class="teacher_id_pos">
					<input type="text" name="fac_id" class="form-control" value="<?php echo $rs_upd['fac_id'];?>" />

				</div><br>
		     	
				<div class="teacher_Department_pos">
					<input type="text" name="dept" class="form-control" value="<?php echo $rs_upd['department'];?>" />
				</div><br>
				
				<div class="teacher_credits_pos">
					<input type="text" name="user_id" class="form-control" value="<?php echo $rs_upd['user_id'];?>" />
				</div><br>
				
				<div class="teacher_pass_pos">
					<input type="text" name="dugc" class="form-control" value="<?php echo $rs_upd1['user_id'];?>"/>
				</div><br>

				<div class="teacher_pass_pos">
					<input type="text" name="pass" class="form-control" value="<?php echo $rs_upd1['pass'];?>"/>
				</div><br>
				
				<div class="teacher_radio_pos">
					<input type="radio" name="active" value="Y" <?php if($rs_upd['active']=="Y") echo "checked";?> /> <span class="p_font">&nbsp;Current</span>
					<input type="radio" name="active" value="N" <?php if($rs_upd['active']=="N") echo "checked";?> /> <span class="p_font">&nbsp;Past</span>
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
  		<div class="panel-heading"><h1><span class="glyphicon glyphicon-user"></span> DUGC Entry Form</h1></div>
  			<div class="panel-body">
			<div class="container">
				<p style="text-align:center;">Here, you'll add a new DUGC detail into the Database.</p>
			</div>

<div class="container_form">
    <form method="post">
				<div class="teacher_name_pos">
					<input type="text" name="name" class="form-control" placeholder="Enter DUGC Name" />

				</div><br>
				
				<div class="teacher_name_pos">
					<input type="text" name="fac_id" class="form-control" placeholder="Enter Faculty Id" />

				</div><br>
		     	
				<div class="teacher_name_pos">
					
					<select name="dept" class="form-control" placeholder = "Department" >
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
				</select></div>
				<br>
				
				<div class="teacher_name_pos">
					<input type="text" name="user_id" class="form-control" placeholder="Faculty User_id" />
				</div><br>

				<div class="teacher_name_pos">
					<input type="text" name="dugc" class="form-control" placeholder="DUGC User_id" />
				</div><br>

				<div class="teacher_name_pos">
					<input type="text" name="pass" class="form-control" placeholder="pass" />
				</div><br>
				
				<div class="teacher_radio_pos">
					<input type="radio" name="active" value="Y" /> <span class="p_font">&nbsp;Current</span>
					<input type="radio" name="active" value="N" /> <span class="p_font">&nbsp;Past</span>
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
