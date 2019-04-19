
<!--first button-->
<?php $permission_sql = mysqli_query($con, "SELECT * FROM management"); 
$row = mysqli_fetch_array($permission_sql);
$add_drop = $row['add_drop'];
$new_reg = $row['new_registration'];
$grade_sub = $row['grade_submission'];
if(($add_drop=="Y") Or ($new_reg=="Y")){
	$accept_tag = "accept_students";
}
else{
	$accept_tag = "not_allowed";
}
if($grade_sub=="Y"){
	$grade_sub_tag = "submit_grade";
}
else{
	$grade_sub_tag = "not_allowed";
}
?>

<div class="btn-group-vertical">
                                <div class="btn-group">
  					<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>
  					  Profile <span class="caret"></span> 					
  					</button>
  				<ul class="dropdown-menu" role="menu">
  				  <li><a href="faculty.php?tag=view_profile">View Profile</a></li>
  				  <li><a href="faculty.php?tag=change_password">Change Password</a></li>
  				</ul>
				</div>
				
				<!--second button-->
				<div class="btn-group">
  					<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>
  					  Courses <span class="caret"></span> 					
  					</button>
  				<ul class="dropdown-menu" role="menu">
  				  <li><a href="faculty.php?tag=show_students">Current Students</a></li>
  				  <li><a href="faculty.php?tag=<?php echo $accept_tag; ?>">Accept Students</a></li> 
                  <li><a href="faculty.php?tag=<?php echo $grade_sub_tag; ?>">Submit Grade</a></li>
  				</ul>
				</div>
				
				<!--third button-->
				<div class="btn-group">
  					<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>
  					  Applications <span class="caret"></span>
  					</button>
  				<ul class="dropdown-menu" role="menu">
  				  <li><a href="faculty.php?tag=leave_request">Leave Applications</a></li>
                    </ul>
				</div>
			</div>	
                               
