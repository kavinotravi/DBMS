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



if(isset($_GET['accepted']))
{
    if($_GET['accepted'] == 1){
        echo "Accpeted!";
        $acc_sql=mysqli_query($con,"UPDATE student_reg_forms SET status = 'y' WHERE roll_number='$id'and year = '$iid' and semester = '$iiid'");
        if($acc_sql)
            $msg="<div style='background-color: white;padding: 20px;border: 1px solid black;margin-bottom: 25px;''>"
                    . "<span class='p_font'>"
                    . "1 Record Updated... !"
                    . "</span>"
                    . "</div>";
        
        else
            $msg="Could not Update :".mysqli_error($con);
    }
    else{
        $del_sql=mysqli_query($con,"DELETE FROM student_reg_forms WHERE roll_number='$id'and year = '$iid' and semester = '$iiid' and status = 'n'");
        if($del_sql)
            $msg="<div style='background-color: white;padding: 20px;border: 1px solid black;margin-bottom: 25px;''>"
                    . "<span class='p_font'>"
                    . "1 Record Deleted... !"
                    . "</span>"
                    . "</div>";
        
        else
            $msg="Could not Delete :".mysqli_error($con);
    }
}   
    
    $dept = $_SESSION['department'];

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
            </div>
        </form>
    </div><br><br>
            
            
<div class="table_margin">
<table class="table table-bordered">
        <thead>
            <tr>
            <th style="text-align: center;">S No.</th>
 	        <th style="text-align: center;">Name</th>
            <th style="text-align: center;">Faulty ID</th>
            <th style="text-align: center;">Course Code</th>
            <th style="text-align: center;">Year</th>
            <th style="text-align: center;">Semester</th>
            <th style="text-align: center;">Credits</th>
            <th style="text-align: center;" colspan="2">Number of Students</th>
        </tr>
        
    <?php
	$key="";
	if(isset($_POST['searchtxt']))
		$key=$_POST['searchtxt'];

    $sql_dummy_sel = mysqli_query($con,"SELECT * FROM management");
    $row3 = mysqli_fetch_array($sql_dummy_sel);
    $current_year = $row3['year'];
    $current_semester = $row3['semester'];

    if($key !=""){
		$sql_sel=mysqli_query($con,"SELECT * FROM offering INNER JOIN fac_table ON fac_table.fac_id = offering.fac_id AND fac_table.name like '%$key%' AND fac_table.department like '$dept' AND offering.year = '$current_year' AND offering.semester like '$current_semester'");
    }
    else
		$sql_sel=mysqli_query($con,"SELECT * FROM offering INNER JOIN fac_table ON fac_table.fac_id = offering.fac_id AND fac_table.department like '%$dept%' AND offering.year = '$current_year' AND offering.semester like '$current_semester'");
       
    $i=0;
    // echo $dept;
    while($row=mysqli_fetch_array($sql_sel)){
    $cid = $row['course_id'];
    $credits = mysqli_query($con,"SELECT * FROM master_course_list WHERE course_id like '$cid'");
    $no_s = mysqli_query($con, "SELECT COUNT(roll_number) FROM student_reg_forms WHERE course_id LIKE '$cid' GROUP BY course_id ");
    $row2 = mysqli_fetch_array($no_s);
    $row1 = mysqli_fetch_array($credits);
    $i++;
    ?>
      <tr>
            <td><?php echo $i;?></td>
	        <td><?php echo $row['name'];?></td>
            <td><?php echo $row['fac_id'];?></td>
            <td><?php echo $row['course_id'];?></td>
            <td><?php echo $row['year'];?></td>
            <td><?php echo $row['semester'];?></td>
            <td><?php echo $row1['credits'];?></td>
            <td><?php echo $row2['COUNT(roll_number)']?></td>
             
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
