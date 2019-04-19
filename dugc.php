<?php
	session_start();
	require("connect.php");
	$tag="";
	$uname = $_SESSION['unametxt'];
	// echo $uname;
	$dept_query = mysqli_query($con, "SELECT * FROM dugc WHERE dugc_id like '$uname'");
	$dept_array = mysqli_fetch_array($dept_query);
	$_SESSION['department'] = $dept_array['department'];
	$sql_sel = mysqli_query($con,"SELECT * FROM dugc WHERE user_id like '$uname'");
	// echo gettype($sql_sel);
	// $row2 = mysqli_fetch_array($sql_sel);
	// $_SESSION['department'] = $row2['department'];
	if (isset($_GET['tag']))
	$tag=$_GET['tag'];

	// $sql=mysqli_query($con,"SELECT * FROM user_table WHERE user_id like'$uname' AND pass like '$pwd' ");
?>


<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Welcome to University Management system</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="jquery-1.11.0.js"></script>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.css"/>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css"/>
<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
<link rel="stylesheet" type="text/css" href="css/home.css" />
</head>

<body>
    
    <div class="logout_btn">
        <a href="index.php" class="btn btn-primary btn-large">Logout <i class="icon-white icon-check"></i></a>
    </div>
    
    <div class="img_home_pos">
        <a href="dugc.php"><img src="images/img21.jpg" height="90" alt="IIT KANPUR" /></a><span class="header_pos">IIT KANPUR </span>
    </div><br>
                        
                        <div style="position:absolute; left:10px; top:200px;">
                            <?php        
                            include './drop_down_menu_dugc.php';
                            ?>
                        </div>
		
		<div class="container_middle">		
			
			<div style="position:absolute; left:200px; top:120px;">
				<?php
   						if($tag=="home" or $tag=="")
							include("home.php");
                        elseif($tag=="leave_request")
                            include("Leave_Request.php");
                        elseif($tag=="minor_request")
                            include("Minor_Request.php");
                        elseif($tag=="students_courses")
                            include("Student_Courses.php");	
                        elseif($tag=="teacher_courses")
                            include("Teacher_Courses.php");
                        elseif($tag=="add_drop")
                            include("Add_Drop.php");
      //                   elseif($tag=="offering_entry")
      //                       include("offering_Entry.php");	
						// elseif($tag=="view_teachers")
						// 	include("View_Teachers.php");
						// elseif($tag=="view_students")
						// 	include("View_Students.php");
						// elseif($tag=="view_courses")
						// 	include("View_Courses.php");
						// elseif($tag=="view_offering")
						// 	include("View_Offering.php");
						// elseif($tag=="view_staff")
						// 	include("View_Staff.php");
						// elseif($tag=="view_DUGC")
						// 	include("View_DUGC.php");
						// elseif($tag=="view_registration")
						// 	include("View_Registration.php");	
							/*$tag= $_REQUEST['tag'];
							
							/*if(empty($tag)){
								include ("Students_Entry.php");
							}
							else{
								include $tag;
							}*/
									
                        ?>
                    </div>
		</div>                
	</div>
        
        <div class="bottom_pos">
            <a href="AboutManagement.php" style="text-decoration: none;">About management</a>
        </div>
</body>
</html>
