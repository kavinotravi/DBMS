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
            <th style="text-align: center;">Roll Number</th>
            <th style="text-align: center;">Course Code</th>
            <th style="text-align: center;">Year</th>
            <th style="text-align: center;">Semester</th>
            <th style="text-align: center;">Credits</th>
        </tr>
        
    <?php
    $key="";
    if(isset($_POST['searchtxt']))
        $key=$_POST['searchtxt'];

    $sql_dummy_sel = mysqli_query($con,"SELECT * FROM management");
    $row3 = mysqli_fetch_array($sql_dummy_sel);
    $current_year = $row3['year'];
    $current_semester = $row3['semester'];

    
    if($key !="")
        $sql_sel=mysqli_query($con,"SELECT * FROM student_reg_forms INNER JOIN stu_table ON student_reg_forms.roll_number = stu_table.roll_number WHERE stu_table.name like '%$key%' AND stu_table.department like '$dept' AND student_reg_forms.year = '$current_year' AND student_reg_forms.semester = '$current_semester' AND student_reg_forms.status like 'A'");
    else
        $sql_sel=mysqli_query($con,"SELECT * FROM student_reg_forms INNER JOIN stu_table ON student_reg_forms.roll_number = stu_table.roll_number WHERE stu_table.department like '$dept' AND student_reg_forms.year = '$current_year' AND student_reg_forms.semester = '$current_semester' AND student_reg_forms.status like 'A'");
       
    $i=0;
    while($row=mysqli_fetch_array($sql_sel)){
    $i++;
    ?>
      <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $row['name'];?></td>
            <td><?php echo $row['roll_number'];?></td>
            <td><?php echo $row['course_id'];?></td>
            <td><?php echo $row['year'];?></td>
            <td><?php echo $row['semester'];?></td>
            <td><?php echo $row['credits'];?></td>
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
