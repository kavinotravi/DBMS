<?php
$iid = "";

$iid=$_SESSION['unametxt'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style_entry.css" />
</head>
<body>
<?php
	$sql_upd=mysqli_query($con,"SELECT * FROM fac_table WHERE user_id like  '%$iid%' ");
    $rs_upd=mysqli_fetch_array($sql_upd);	
?>

<!-- for view-->

<div class="panel panel-default">
  		<div class="panel-heading"><h1><span class="glyphicon glyphicon-user"></span> Faculty Profile</h1></div>
  			<div class="panel-body">
			<div class="container">
				<p style="text-align:center;">Here, you will see all your information.</p>
			</div>

 
<div class="information_container">
    <table class = "table without borders">
    <tr>
        <td>Name</td>
        <td><?php echo $rs_upd['name'];?></td>
    </tr>
    <tr>
        <td>Faculty Id</td>
        <td><?php echo $rs_upd['fac_id'];?></td>
    </tr>
    <tr>
        <td>Gender</td>
        <td><?php echo $rs_upd['gender'];?></td>
    </tr>
    <tr>
        <td>Date of Birth</td>
        <td><?php echo $rs_upd['dob'];?></td>
    </tr>
    <tr>
        <td>Address</td>
        <td><?php echo $rs_upd['address'];?></td>
    </tr>
    <tr>
        <td>Phone Number</td>
        <td><?php echo $rs_upd['ph_no'];?></td>
    </tr>
    <tr>
        <td>Department</td>
        <td><?php echo $rs_upd['department'];?></td>
    </tr>
    <tr>
        <td>Designation</td>
        <td><?php echo $rs_upd['designation'];?></td>
    </tr>
    <tr>
        <td>Campus Address</td>
        <td><?php echo $rs_upd['campus_address'];?></td>
    </tr>
    <tr>
        <td>Year of Joining</td>
        <td><?php echo $rs_upd['yr_joining'];?></td>
    </tr>
    <tr>
        <td>CC User Id</td>
        <td><?php echo $rs_upd['user_id'];?></td>
    </tr>
    </table>
</body>
</html>
