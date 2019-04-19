<?php
$iid = "";
$msg = "";
$iid=$_SESSION['unametxt'];
$sql_upd1=mysqli_query($con,"SELECT * FROM user_table WHERE user_id like '%$iid%'");
$row=mysqli_fetch_array($sql_upd1);
if(isset($_POST['btn_upd'])){
    $old_pass = $_POST['password'];
    $new_pass1 = $_POST['password1'];
    $new_pass2 = $_POST['password2'];
    if($old_pass == $row['pass']){
        if($new_pass1 == $new_pass2){
            //$del_sql=mysqli_query($con,"DELETE FROM user_table WHERE user_id like '%$iid%'");
            $sql_in=mysqli_query($con,"UPDATE user_table SET pass = '$new_pass1' WHERE user_id like '%$iid%'");
            if($sql_in=='true')
		echo "<div style='background-color: white;padding: 20px;border: 1px solid black;margin-bottom: 25px;''>"
                . "<span class='p_font'>"
                . "Password Updated Successfully... !"
                . "</span>"
                . "</div>";
	else
    echo "<div style='background-color: white;padding: 20px;border: 1px solid black;margin-bottom: 25px;''>"
    . "<span class='p_font'>"
    . "Update Failed... !"
    . "</span>"
    . "</div>";
        }
        else{
            echo "<div style='background-color: white;padding: 20px;border: 1px solid black;margin-bottom: 25px;''>"
                . "<span class='p_font'>"
                . "The new passwords do not match... !"
                . "</span>"
                . "</div>";
        }
    }
    else{
        echo "<div style='background-color: white;padding: 20px;border: 1px solid black;margin-bottom: 25px;''>"
                . "<span class='p_font'>"
                . "The old password is incorrect... !"
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
  		<div class="panel-heading"><h1><span class="glyphicon glyphicon-user"></span>Change Password Form</h1></div>
  			<div class="panel-body">
			<div class="container">
				<p style="text-align:center;">Please enter your old password follwed by the new password.</p>
			</div>

<div class="container_form">
    <form method="post">
            <div class="teacher_name_pos">
                <input type="password" name="password" class="form-control" placeholder="Old Password" />
            </div><br>
            <div class="teacher_name_pos">
					<input type="password" name="password1" class="form-control" placeholder="New Password" />
				</div><br>
            <div class="teacher_name_pos">
                <input type="password" name="password2" class="form-control" placeholder="New Password" />
            </div><br>
            <div class="teacher_btn_pos">
					<input type="submit" name="btn_upd" href="#" class="btn btn-primary btn-large" value="Update" />&nbsp;&nbsp;&nbsp;
					<input type="reset"  href="#" class="btn btn-primary btn-large" value="Cancel" />
				</div>
                                    </form>				
            </div>
		</div>
	</div>
</body>
</html>

 
