<!--for delete Record -->
<?php
    $msg="kk";
    $opr="";
    if(isset($_GET['opr']))
    $opr=$_GET['opr'];
    
if(isset($_GET['rs_id'])) 
    $id=$_GET['rs_id'];

if(isset($_GET['usr_id']))
    $iid=$_GET['usr_id'];

if(isset($_GET['approval'])){
    if($_GET['approval'] == 1){
        if(isset($_GET['spec'])){
            $special = $_GET['spec'];
        }
        $sql_in=mysqli_query($con,"UPDATE minor_applications SET approval = 'y' WHERE roll_number = '$iid'");
        $sql_fetch=mysqli_query($con,"SELECT * FROM stu_table WHERE roll_number = '$iid'");
        // echo $iid;
        $row3 = mysqli_fetch_array($sql_fetch);
        $row3['minor'] = $row3['minor']." ".$special;
        $upd = $row3['minor'];
        // echo $upd;
        $sql_push=mysqli_query($con,"UPDATE stu_table SET minor = '$upd' WHERE roll_number = '$iid'");
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
        $sql_in=mysqli_query($con,"DELETE FROM minor_applications WHERE roll_number = '%$iid%'");
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
    // echo $msg;
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
            <th style="text-align: center;">Name</th>
            <th style="text-align: center;">Roll Number</th>
            <th style="text-align: center;">Department</th>
            <th style="text-align: center;">Specialization</th>
            <th style="text-align: center;">Courses Done</th>
            <th style="text-align: center;">Approve?</th>
        </tr>
        
        <?php
    $key="";
    if(isset($_POST['searchtxt']))
        $key=$_POST['searchtxt'];
    
    if($key !="")
        $sql_sel=mysqli_query($con,"SELECT * FROM minor_applications WHERE name like '%$key%' AND approval like 'w' AND department like '$dept'");
    else
        $sql_sel=mysqli_query($con,"SELECT * FROM minor_applications WHERE approval like 'w' AND department like '$dept'");
       
    $i=0;
    while($row=mysqli_fetch_array($sql_sel)){
    $i++;
    ?>
      <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $row['name'];?></td>
            <td><?php echo $row['roll_number'];?></td>
            <td><?php echo $row['department'];?></td>
            <td><?php echo $row['specialization'];?></td>
            <td><?php echo $row['courses'];?></td>
            <td><a href="?tag=minor_request&usr_id=<?php echo $row['roll_number'];?>&spec=<?php echo $row['specialization']?>&approval=1" title="Update"><button> Approve </button></a><a href="?tag=minor_request&usr_id=<?php echo $row['roll_number'];?>&approval=2" title="Reject"><button> Reject </button></a></td> 
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
