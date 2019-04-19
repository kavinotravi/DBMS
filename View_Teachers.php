<!--for delete Record -->
<?php
	$msg="";
	$opr="";
	if(isset($_GET['opr']))
	$opr=$_GET['opr'];
	
if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];

if(isset($_GET['usr_id']))
	$iid=$_GET['usr_id'];
	
	if($opr=="del")
{
    $del_sql1=mysqli_query($con,"DELETE FROM user_table WHERE user_id like '%$iid%'");
	$del_sql=mysqli_query($con,"DELETE FROM fac_table WHERE fac_id=$id");
	
	if($del_sql)
		$msg="<div style='background-color: white;padding: 20px;border: 1px solid black;margin-bottom: 25px;''>"
                . "<span class='p_font'>"
                . "1 Record Deleted... !"
                . "</span>"
                . "</div>";
	
	else
		$msg="Could not Delete :".mysqli_error($con);
			
}
	echo $msg;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style_view.css" />
</head>

<body>
<div class="btn_pos">
        <form method="post">
            <input type="text" name="searchtxt" class="input_box_pos form-control" placeholder="Search name.." />
            <div class="btn_pos_search">
            <input type="submit" class="btn btn-primary btn-large" name="btnsearch" value="Search"/>&nbsp;&nbsp;
            <a href="?tag=teachers_entry"><input type="button" class="btn btn-large btn-primary" value="Register new" name="butAdd"/></a>
            </div>
        </form>
    </div><br><br>
            
            
<div class="table_margin">
<table class="table table-bordered">
        <thead>
            <tr>
            <th style="text-align: center;">S No.</th>
            <th style="text-align: center;">Name</th>
            <th style="text-align: center;">Gender</th>
            <th style="text-align: center;">Date of Birth</th>
	    <th style="text-align: center;">Department</th>
	    <th style="text-align: center;">Faculty Id.</th>
            <th style="text-align: center;">Address</th>
            <th style="text-align: center;">Campus Address</th>
	    <th style="text-align: center;">Phone</th>
	    <th style="text-align: center;">Designation</th>
            <th style="text-align: center;">Yr_joining</th>
	    <th style="text-align: center;">User_Id</th>
            <th style="text-align: center;" colspan="2">Operation</th>
        </tr>
        
        <?php
	$key="";
	if(isset($_POST['searchtxt']))
		$key=$_POST['searchtxt'];
	
	if($key !="")
		$sql_sel=mysqli_query($con,"SElECT * FROM fac_table WHERE name  like '%$key%' ");
	else
		 $sql_sel=mysqli_query($con,"SELECT * FROM fac_table");
	
		
       
    $i=0;
    while($row=mysqli_fetch_array($sql_sel)){
    $i++;
    ?>
      <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $row['name'];?></td>
            <td><?php echo $row['gender'];?></td>
            <td><?php echo $row['dob'];?></td>
	    <td><?php echo $row['department'];?></td>
	    <td><?php echo $row['fac_id'];?></td>
	    <td><?php echo $row['address'];?></td>
            <td><?php echo $row['campus_address'];?></td>
	    <td><?php echo $row['ph_no'];?></td>
            <td><?php echo $row['designation'];?></td>
	    <td><?php echo $row['yr_joining'];?></td>
	    <td><?php echo $row['user_id'];?></td>	
            <td><a href="?tag=teachers_entry&opr=upd&usr_id=<?php echo $row['user_id'];?>&rs_id=<?php echo $row['fac_id'];?>" title="Update"><img style="-webkit-box-shadow: 0px 0px 0px 0px rgba(50, 50, 50, 0.75);-moz-box-shadow:    0px 0px 0px 0px rgba(50, 50, 50, 0.75);box-shadow:         0px 0px 0px 0px rgba(50, 50, 50, 0.75);" src="picture/update.png" height="20" alt="Update" /></a></td>
            <td><a href="?tag=view_teachers&opr=del&usr_id=<?php echo $row['user_id'];?>&rs_id=<?php echo $row['fac_id'];?>" title="Delete"><img style="-webkit-box-shadow: 0px 0px 0px 0px rgba(50, 50, 50, 0.75);-moz-box-shadow:    0px 0px 0px 0px rgba(50, 50, 50, 0.75);box-shadow:         0px 0px 0px 0px rgba(50, 50, 50, 0.75);" src="picture/delete.jpg" height="20" alt="Delete" /></a></td>
             
        </tr>
    <?php	
    }
	// ----- for search studnens------	
		
	
    ?>
    </table>
</form>
</div>
</body>
</html>


<!--
<td>
        	<a href="?tag=student_entry"><input type="button" title="Add new student" name="butAdd" value="Add New" id="button-search" /></a>
        </td>
        <td>
        	<input type="text" name="searchtxt" title="Enter name for search " class="search" autocomplete="off"/>
        </td>
        <td style="float:right">
        	<input type="submit" name="btnsearch" value="Search" id="button-search" title="Search Student" />
        </td>
-->
