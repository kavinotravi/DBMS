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

if(isset($_GET['third_id']))
	$iiid=$_GET['third_id'];
	
	if($opr=="del")
{
	$del_sql=mysqli_query($con,"DELETE FROM offering WHERE course_id='$id' and year = '$iid' and semester = '$iiid' ");
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
            <a href="?tag=offering_entry"><input type="button" class="btn btn-large btn-primary" value="Register new" name="butAdd"/></a>
            </div>
        </form>
    </div><br><br>
            
            
<div class="table_margin">
<table class="table table-bordered">
        <thead>
            <tr>
            <th style="text-align: center;">S No.</th>
 	    <th style="text-align: center;">Course Id</th>
            <th style="text-align: center;">Year</th>
            <th style="text-align: center;">Semester</th>
            <th style="text-align: center;">Fac_Id</th>
            <th style="text-align: center;">Modular</th>
            <th style="text-align: center;">Venue</th>
            <th style="text-align: center;" colspan="2">Operation</th>
        </tr>
        
        <?php
	$key="";
	if(isset($_POST['searchtxt']))
		$key=$_POST['searchtxt'];
	
	if($key !="")
		$sql_sel=mysqli_query($con,"SElECT * FROM offering WHERE course_id  like '%$key%' ORDER by year, semester");
	else
		 $sql_sel=mysqli_query($con,"SELECT * FROM offering ORDER by year, semester");
	
		
       
    $i=0;
    while($row=mysqli_fetch_array($sql_sel)){
    $i++;
    ?>
      <tr>
            <td><?php echo $i;?></td>
	    <td><?php echo $row['course_id'];?></td>
            <td><?php echo $row['year'];?></td>
            <td><?php echo $row['semester'];?></td>
            <td><?php echo $row['fac_id'];?></td>
	    <td><?php echo $row['modular'];?></td>
            <td><?php echo $row['venue'];?></td>	
            <td><a href="?tag=offering_entry&opr=upd&usr_id=<?php echo $row['year'];?>&third_id=<?php echo $row['semester'];?>&rs_id=<?php echo $row['course_id'];?>" title="Update"><img style="-webkit-box-shadow: 0px 0px 0px 0px rgba(50, 50, 50, 0.75);-moz-box-shadow:    0px 0px 0px 0px rgba(50, 50, 50, 0.75);box-shadow:         0px 0px 0px 0px rgba(50, 50, 50, 0.75);" src="picture/update.png" height="20" alt="Update" /></a></td>
            <td><a href="?tag=view_offering&opr=del&usr_id=<?php echo $row['year'];?>&third_id=<?php echo $row['semester'];?>&rs_id=<?php echo $row['course_id'];?>" title="Delete"><img style="-webkit-box-shadow: 0px 0px 0px 0px rgba(50, 50, 50, 0.75);-moz-box-shadow:    0px 0px 0px 0px rgba(50, 50, 50, 0.75);box-shadow:         0px 0px 0px 0px rgba(50, 50, 50, 0.75);" src="picture/delete.jpg" height="20" alt="Delete" /></a></td>
             
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
