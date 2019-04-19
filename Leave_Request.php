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

if(isset($_GET['approval'])){
    if($_GET['approval'] == 1){
        $sql_in=mysqli_query($con,"UPDATE leave_applications SET approval = 'Y' WHERE id like '%$iid%'");
        if($sql_in)
            $msg="<div style='background-color: white;padding: 20px;border: 1px solid black;margin-bottom: 25px;''>"
                    . "<span class='p_font'>"
                    . "1 Record Updated... !"
                    . "</span>"
                    . "</div>";
        
        else
            $msg="Could not Update :".mysqli_error($con);
    }
    else{
        $sql_in=mysqli_query($con,"DELETE FROM leave_applications WHERE id like '%$iid%'");
        if($sql_in)
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
// {
//  $del_sql=mysqli_query($con,"DELETE FROM stu_table WHERE roll_number=$id");
//  $del_sql1=mysqli_query($con,"DELETE FROM user_table WHERE user_id like '%$iid%'");
//  if($del_sql)
//      $msg="<div style='background-color: white;padding: 20px;border: 1px solid black;margin-bottom: 25px;''>"
//                 . "<span class='p_font'>"
//                 . "1 Record Deleted... !"
//                 . "</span>"
//                 . "</div>";
    
//  else
//      $msg="Could not Delete :".mysqli_error($con);
            
// }
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
            <!-- <a href="?tag=student_entry"><input type="button" class="btn btn-large btn-primary" value="Register new" name="butAdd"/></a> -->
            </div>
        </form>
    </div><br><br>
            
            
<div class="table_margin">
<table class="table table-bordered">
        <thead>
        <tr>
            <th style="text-align: center;">S No.</th>
            <th style="text-align: center;">Applicant Type</th>
            <th style="text-align: center;">Name</th>
            <th style="text-align: center;">User ID</th>
            <th style="text-align: center;">Nature of Leave</th>
            <th style="text-align: center;">Reason</th>
            <th style="text-align: center;">Start Date</th>
            <th style="text-align: center;">End Date</th>
            <th style="text-align: center;">Approve? (Y/N)</th>
        </tr>
        
        <?php
    $key="";
    if(isset($_POST['searchtxt']))
        $key=$_POST['searchtxt'];
    
    if($key !="")
        $sql_sel=mysqli_query($con,"SELECT * FROM leave_applications WHERE name like '$key' AND approval like 'W'");
    else
        $sql_sel=mysqli_query($con,"SELECT * FROM leave_applications WHERE approval like 'W'");
       
    $i=0;
    if($sql_sel){
        while($row=mysqli_fetch_array($sql_sel)){
        $i++;
        ?>
          <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $row['applicant_type'];?></td>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['id'];?></td>
                <td><?php echo $row['nature_leave'];?></td>
                <td><?php echo $row['Reason'];?></td>
                <td><?php echo $row['start_date'];?></td>
                <td><?php echo $row['end_date'];?></td>
                <td><a href="?tag=leave_request&usr_id=<?php echo $row['id'];?>&approval=1" title="Update"><button> Approve </button></a><a href="?tag=leave_request&usr_id=<?php echo $row['id'];?>&approval=2" title="Update"><button> Reject </button></a></td> 

          </tr>
        <?php   
        }
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
