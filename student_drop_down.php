
<!--first button-->
<?php $permission_sql = mysqli_query($con, "SELECT * FROM management"); 
$row = mysqli_fetch_array($permission_sql);
$add_drop = $row['add_drop'];
$new_reg = $row['new_registration'];
if($add_drop=="Y"){
	$add_drop_tag = "add_drop";
}
else{
	$add_drop_tag = "not_allowed";
}
if($new_reg=="Y"){
	$new_reg_tag = "next_sem";
}
else{
	$new_reg_tag = "not_allowed";
}
?>

<div class="btn-group-vertical">
                                <div class="btn-group">
  					<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>
  					  Profile <span class="caret"></span> 					
  					</button>
  				<ul class="dropdown-menu" role="menu">
  				  <li><a href="student.php?tag=view_profile">View Profile</a></li>
  				  <li><a href="student.php?tag=change_password">Change Password</a></li>
  				</ul>
				</div>
				
				<!--second button-->
				<div class="btn-group">
  					<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>
  					  Academic <span class="caret"></span> 					
  					</button>
  				<ul class="dropdown-menu" role="menu">
					<li><a href="student.php?tag=transcript">View Transcript</a></li>
  				  <li><a href="student.php?tag=curr_sem">Current Semester Registration</a></li>
  				  <li><a href="student.php?tag=<?php echo $add_drop_tag; ?>">Add-Drop</a></li> 
                  <li><a href="student.php?tag=<?php echo $new_reg_tag; ?>">Next Semester Registration</a></li>
  				</ul>
				</div>
				
				<!--third button-->
				<div class="btn-group">
  					<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>
  					  Applications to DUGC <span class="caret"></span>
  					</button>
  				<ul class="dropdown-menu" role="menu">
  				  <li><a href="student.php?tag=leave_request">Leave Applications</a></li>
  				  <li><a href="student.php?tag=apply_minor">Minor Applications</a></li>
  				</ul>
				</div>
			</div>	
                               
