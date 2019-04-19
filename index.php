<?php
	session_start();
	
	require("connect.php");
	
	$msg="";
	if(isset($_POST['btn_log'])){
		$uname=$_POST['unametxt'];
		$pwd=$_POST['pwdtxt'];
		$_SESSION['unametxt'] = $uname;
		$sql=mysqli_query($con,"SELECT * FROM user_table
								WHERE user_id='$uname' AND pass='$pwd' 
								
							");
						
		$cout=mysqli_num_rows($sql);
			if($cout>0){
				$row=mysqli_fetch_array($sql);
					if($row['type']=='admin'){
						$msg="Login trov hery!.....";	
						header("location: admin.php");
					}
					if($row['type']=='student'){
						$msg="Login trov hery!.....";	
						header("location: student.php");
					}
					if($row['type']=='teacher'){
						$msg="Login trov hery!.....";	
						header("location: faculty.php");
					}
					if($row['type']=='dugc'){
						$msg="Login trov hery!.....";	
						header("location: dugc.php");
					}
					if($row['type']=='staff'){
						$msg="Login trov hery!.....";	
						header("location: staff.php");
					}
					
			}
			
			else
					$msg="Invalid login authentication, try again/Contact admin for login permission";
}

?>

<!DOCTYPE html>
<!--
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Login V6</title>
	
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>

<body >
	<!--<div class="container">
    	<div class="container2">
    		<div class="h1_pos">-->

<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-85 p-b-20">

    			<h1>Welcome to IITK</h1>
    		<br>
<span class="login100-form-title p-b-70">
						
					</span>
					<span class="login100-form-avatar">
						<img src="images/avat.jpg" alt="AVATAR">
					</span>

    		<form method="post">
                    <input type="text" class="form-control" name="unametxt" placeholder="Username" title="Enter username here" /><br>
                    <input type="password" class="form-control" name="pwdtxt" placeholder="Password" title="Enter username here" /><br>
    		<input type="submit" href="#" class="btn btn-default" name="btn_log" value="Sign in" style="float: right;"/>
    		<div class="about_pos">
                    <a href="AboutManagement.php" style="text-decoration:none; color: silver">About management</a>
    		</div>
    		</form>
</div>
    	</div>
    </div>
	
        <h2 style="color: #3a28a5; text-align: center;">
            <?php echo $msg; ?>
        </h2>    
</body>
</html>
