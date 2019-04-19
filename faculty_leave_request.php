<?php
$iid = "";
$iid=$_SESSION['unametxt'];

$sql_roll = mysqli_query($con, "SELECT fac_id, name FROM fac_table where user_id like '%$iid%'");
$data = mysqli_fetch_array($sql_roll);
$id = $data['fac_id'];
$name = $data['name'];

if(isset($_POST['btn_add'])){
    $nature = $_POST["Nature_Leave"];
    $reason = $_POST["reason"];
    $start=$_POST['start_yy']."/".$_POST['start_mm']."/".$_POST['start_dd'];
    $end=$_POST['end_yy']."/".$_POST['end_mm']."/".$_POST['end_dd'];

    $insert_sql = mysqli_query($con, "INSERT INTO leave_applications VALUES('teacher', '$name', $id, '$nature', '$reason', '$start', '$end', 'W') ");
    if($insert_sql=="true")
    echo "<div style='background-color: white;padding: 20px;border: 1px solid black;margin-bottom: 25px;''>"
                    . "<span class='p_font'>"
                    . "Leave Request submitted successfully... !"
                    . "</span>"
                    . "</div>";
        else
            echo "Update Failed...! Try after some time";
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
  		<div class="panel-heading"><h1><span class="glyphicon glyphicon-user"></span>Leave Application</h1></div>
  			<div class="panel-body">
			<div class="container">
				<p style="text-align:center;">Leave Application</p>
			</div>
<div class="table_margin">
<table class="table table-bordered">
        <thead>
            <tr>
            <th style="text-align: center;">S No.</th>
 	    <th style="text-align: center;">Nature of Leave</th>
            <th style="text-align: center;">Reason</th>
            <th style="text-align: center;">Start Date</th>
            <th style="text-align: center;">End Data</th>
            <th style="text-align: center;">Status</th>
            </tr>
        </thead>
        <?php $sql_reg=mysqli_query($con,"SELECT * FROM leave_applications where id=$id AND applicant_type = 'teacher' ");
        $i=0;
        
        while($row=mysqli_fetch_array($sql_reg)){
            $i++;
        ?>
          <tr>
                <td><?php echo $i;?></td>
            <td><?php echo $row['nature_leave'];?></td>
             <td><?php echo  $row['Reason'];?></td>
            <td><?php echo $row['start_date'];?></td> 
                <td><?php echo $row['end_date'];?></td>
                <td><?php echo $row['approval'];?></td>         
            </tr>
        <?php	
        }
              
        ?>
</table>
<div class="container_form">
    <form method="post">
<div class="information_container">
<table class = "table without borders">
<tr>
<td> Nature of Leave </td>
<td> <select name ="Nature_Leave" class="form-control"> 
<option name = "med"> Medical </option> 
<option name = "cas"> Casual </option>
</select></td>
</tr>

<tr>
<td> Reason </td>
<td> <input type="text" name="reason" class="form-control"/> </td>
</tr>

<tr>
<td> Start Date </td>
<td> <div class="teacher_bday_box">
					<div class="select_style">
    					<select name="start_yy">
       						<option>Year</option>
       						<?php
							$sel="";
							for($i=1985;$i<=2015;$i++){	
								if($i==$y){
									$sel="selected='selected'";}
								else
								$sel="";
							echo"<option value='$i' $sel>$i </option>";
							}
							
						?>
						</select>
					</div>
					
					<div class="select_style">
    					<select name="start_mm">
       						<option>Month</option>
       						<?php
							$sel="";
                            $mm=array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
                            $i=0;
                            foreach($mm as $mon){
                                $i++;
									if($i==$m){
										$sel=$sel="selected='selected'";}
									else
										$sel="";
                                echo"<option value='$i' $sel> $mon</option>";		
                            }
                        ?>
                        </select>
					</div>
					
					<div class="select_style">
    					<select name="start_dd">
       						<option>date</option>
       						<?php
						$sel="";
                        for($i=1;$i<=31;$i++){
							if($i==$d){
								$sel=$sel="selected='selected'";}
							else
								$sel="";
                        ?>
                        <option value="<?php echo $i ;?>"<?php echo $sel?> >
                        <?php
                        if($i<10)
                            echo"0"."$i" ;
                        else
                            echo"$i";	
							  
						?>
						</option>	
						<?php 
						}?>
						</select>
					</div>
					
		     	</div> </td>
</tr>
<tr> <td> End Date </td>
<td> <div class="teacher_bday_box">
					<div class="select_style">
    					<select name="end_yy">
       						<option>Year</option>
       						<?php
							$sel="";
							for($i=1985;$i<=2015;$i++){	
								if($i==$y){
									$sel="selected='selected'";}
								else
								$sel="";
							echo"<option value='$i' $sel>$i </option>";
							}
							
						?>
						</select>
					</div>
					
					<div class="select_style">
    					<select name="end_mm">
       						<option>Month</option>
       						<?php
							$sel="";
                            $mm=array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
                            $i=0;
                            foreach($mm as $mon){
                                $i++;
									if($i==$m){
										$sel=$sel="selected='selected'";}
									else
										$sel="";
                                echo"<option value='$i' $sel> $mon</option>";		
                            }
                        ?>
                        </select>
					</div>
					
					<div class="select_style">
    					<select name="end_dd">
       						<option>date</option>
       						<?php
						$sel="";
                        for($i=1;$i<=31;$i++){
							if($i==$d){
								$sel=$sel="selected='selected'";}
							else
								$sel="";
                        ?>
                        <option value="<?php echo $i ;?>"<?php echo $sel?> >
                        <?php
                        if($i<10)
                            echo"0"."$i" ;
                        else
                            echo"$i";	
							  
						?>
						</option>	
						<?php 
						}?>
						</select>
					</div>
					
		     	</div> </td>
</tr>

</table>
            <div class="teacher_btn_pos">
					<input type="submit" name="btn_add" href="#" class="btn btn-primary btn-large" value="Apply for Leave" />&nbsp;&nbsp;&nbsp;
					<input type="reset"  href="#" class="btn btn-primary btn-large" value="Cancel" />
				</div>
                </div>                    </form>				
            </div>
		</div>
	</div>
</body>
</html>
