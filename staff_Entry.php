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
	$name=$_POST['fnametxt']; 
	$dob=$_POST['yy']."/".$_POST['mm']."/".$_POST['dd'];
	$addr=$_POST['addrtxt'];
	$phone=$_POST['phonetxt'];
	$yr = $_POST['yrjoining'];
	$user=$_POST['usernametxt'];
    $desig = $_POST['designation'];
    $loc = $_POST['location']; 	
    $pass = $_POST['passwordtxt'];

$sql_ins=mysqli_query($con,"INSERT INTO staff_table 
						VALUES('$name' ,'$user', '$dob','$addr', '$phone', '$desig' , '$loc' , '$yr')");

$sql_in=mysqli_query($con,"INSERT INTO user_table 
						VALUES ('$user','$pass','staff')");

if($sql_ins==true)
	$msg="1 Row Inserted";
else
	$msg="Insert Error:".mysqli_error($con);
	
}
//------------------uodate data----------
if(isset($_POST['btn_upd'])){
	$name=$_POST['fnametxt']; 
	$dob=$_POST['yy']."/".$_POST['mm']."/".$_POST['dd'];
	$addr=$_POST['addrtxt'];
	$phone=$_POST['phonetxt'];
	$yr = $_POST['yrjoining'];
	$user=$_POST['usernametxt'];
    $desig = $_POST['designation'];
    $loc = $_POST['location']; 	
    $pass = $_POST['passwordtxt'];
	echo $id;

	$sql_ins=mysqli_query($con,"UPDATE staff_table SET  name = '$name' ,address = '$addr', ph_no =  '$phone', designation =  '$desig' ,location =  '$loc' ,yr_joining =  '$yr' where user_id = '$id'");
	$sql_update1=mysqli_query($con,"UPDATE user_table SET pass='$pass' 
							WHERE
								user_id like '%$iid%'
							");


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
	$sql_upd=mysqli_query($con,"SELECT * FROM staff_table WHERE user_id like '%$iid%'");
	$rs_upd=mysqli_fetch_array($sql_upd);
	$sql_upd1=mysqli_query($con,"SELECT * FROM user_table WHERE user_id like '%$iid%'");
	$rs_upd1=mysqli_fetch_array($sql_upd1);
	
	list($y,$m,$d)=explode('/',$rs_upd['dob']);
?>

<!-- for form Upadte-->

<div class="panel panel-default">
  		<div class="panel-heading"><h1><span class="glyphicon glyphicon-user"></span> Staff Entry Form</h1></div>
  			<div class="panel-body">
			<div class="container">
				<p style="text-align:center;">Here, you'll update new Staff's detail to record into database.</p>
			</div>

 
<div class="container_form">
    <form method="post">
				<div class="teacher_name_pos">
					<input type="text" name="fnametxt" class="form-control" value="<?php echo $rs_upd['name'];?>" />
			
				</div><br>
				
			<!--	<div class="teacher_radio_pos">
					<input type="radio" name="gender" value="M" <?php if($rs_upd['gender']=="M") echo "checked";?> /> <span class="p_font">&nbsp;Male</span>
					<input type="radio" name="gender" value="F" <?php if($rs_upd['gender']=="F") echo "checked";?> /> <span class="p_font">&nbsp;Female</span>
				</div><br>-->
				
				<div class="teacher_bday_box">
					<span class="p_font">Birthday: </span>&nbsp;&nbsp;&nbsp;
					<div class="select_style">
    					<select name="yy">
       						<option>Year</option>
       						<?php
							$sel="";
							for($i=1985;$i<=2015;$i++){	
								if($i==$y){
									$sel="selected='selected'";}
								else
								$sel="";
							echo"<option value='$i' $sel>$i </option>";
							}
							
						?>
						</select>
					</div>
					
					<div class="select_style">
    					<select name="mm">
       						<option>Month</option>
       						<?php
							$sel="";
                            $mm=array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
                            $i=0;
                            foreach($mm as $mon){
                                $i++;
									if($i==$m){
										$sel=$sel="selected='selected'";}
									else
										$sel="";
                                echo"<option value='$i' $sel> $mon</option>";		
                            }
                        ?>
                        </select>
					</div>
					
					<div class="select_style">
    					<select name="dd">
       						<option>date</option>
       						<?php
						$sel="";
                        for($i=1;$i<=31;$i++){
							if($i==$d){
								$sel=$sel="selected='selected'";}
							else
								$sel="";
                        ?>
                        <option value="<?php echo $i ;?>"<?php echo $sel?> >
                        <?php
                        if($i<10)
                            echo"0"."$i" ;
                        else
                            echo"$i";	
							  
						?>
						</option>	
						<?php 
						}?>
						</select>
					</div>
					
		     	</div><br><br>
				
				<div class="teacher_address_pos">
					<input type="text" name="addrtxt" class="form-control" value='<?php echo $rs_upd['address'];?>' />
				</div><br>
				
				<div class="teacher_mobile_pos">
					<input type="text" name="phonetxt" class="form-control" value="<?php echo $rs_upd['ph_no'];?>" />
				</div><br>
				
				<div class="teacher_year_pos">
					<input type="text" name="yrjoining" class="form-control" value='<?php echo $rs_upd['yr_joining'];?>' />
				</div><br>					

				<div class="teacher_user_pos">
					<input type="text" name="usernametxt" class="form-control" value='<?php echo $rs_upd['user_id'];?>' />
				</div><br>

				<div class="teacher_pass_pos">
					<input type="text" name="passwordtxt" class="form-control" value='<?php echo $rs_upd1['pass'];?>' />
				</div><br>
				
				<div class="teacher_designation_pos">
					<input type="text" name="designation" class="form-control" value='<?php echo $rs_upd['designation'];?>' />
				</div><br>

                <div class="teacher_location_pos">
					<input type="text" name="location" class="form-control" value='<?php echo $rs_upd['location'];?>' />
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
  		<div class="panel-heading"><h1><span class="glyphicon glyphicon-user"></span> Staff Entry Form</h1></div>
  			<div class="panel-body">
			<div class="container">
				<p style="text-align:center;">Here, you'll add new Staff's detail to record into database.</p>
			</div>

<div class="container_form">
    <form method="post">
				<div class="teacher_name_pos">
					<input type="text" name="fnametxt" class="form-control" placeholder="Name" />

				</div><br>
				
				<div class="teacher_bday_box">
					<span class="p_font">Birthday: </span>&nbsp;&nbsp;&nbsp;
					<div class="select_style">
    					<select name="yy">
       						<option>Year</option>
       						<?php
							for($i=1985;$i<=2015;$i++){	
							echo"<option value='$i'>$i</option>";
							}
						?>
						</select>
					</div>
					
					<div class="select_style">
    					<select name="mm">
       						<option>Month</option>
       						<?php
                            $mm=array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
                            $i=0;
                            foreach($mm as $mon){
                                $i++;
                                echo"<option value='$i'> $mon</option>";		
                            }
                        ?>
                        </select>
					</div>
					
					<div class="select_style">
    					<select name="dd">
       						<option>date</option>
       						<?php
                        for($i=1;$i<=31;$i++){
                        ?>
                        <option value="<?php echo $i; ?>">
                        <?php
                        if($i<10)
                            echo"0".$i;
                        else
                            echo"$i";	  
						?>
						</option>	
						<?php 
						}?>
						</select>
					</div>
					
		     	</div><br><br>
				
				<div class="teacher_address_pos">
					<input type="text" name="addrtxt" class="form-control" placeholder="Address" />
				</div><br>
				
				<div class="teacher_mobile_pos">
					<input type="text" name="phonetxt" class="form-control" placeholder="Mobile no." />
				</div><br>
				
				<div class="teacher_mobile_pos">
					<input type="text" name="yrjoining" class="form-control" placeholder="yr_joining" />
				</div><br>

				<div class="teacher_mobile_pos">
					<input type="text" name="usernametxt" class="form-control" placeholder="username" />
				</div><br>
				
				<div class="teacher_mobile_pos">
					<input type="text" name="passwordtxt" class="form-control" placeholder="password" />
				</div><br>
				
                <div class="teacher_mobile_pos">
					<input type="text" name="designation" class="form-control" placeholder="designation" />
				</div><br>

                <div class="teacher_mobile_pos">
					<input type="text" name="location" class="form-control" placeholder="location" />
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
