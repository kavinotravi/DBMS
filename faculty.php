<?php
	session_start();
	require("connect.php");
	$tag="";
	if (isset($_GET['tag']))
	$tag=$_GET['tag'];
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
        <a href="faculty.php"><img src="images/img21.jpg" height="90" alt="IIT KANPUR" /></a><span class="header_pos">IIT KANPUR</span>
    </div><br>
                        
                        <div >
                            <?php        
                            include './faculty_drop_down.php';
                            ?>
                        </div>
		
		<div style="position:absolute; left:200px; top:120px;">	
			
			<div class="container_show_post">
				<?php
   						if($tag=="home" or $tag=="")
							include("home.php");
                        elseif($tag=="view_profile")
                            include("faculty_profile.php");
                        elseif($tag=="change_password")
                            include("student_change_password.php");
                        elseif($tag=="show_students")
                            include("faculty_show_students.php");	
                        elseif($tag=="accept_students")
                            include("faculty_accept_students.php");
                        elseif($tag=="submit_grade")
                            include("faculty_submit_grade.php");
                        elseif($tag=="leave_request")
                            include("faculty_leave_request.php");	
						elseif($tag=="not_allowed")
							include("not_allowed.php");
                        ?>

                    </div>
		</div>                
	</div>
        
        <div class="bottom_pos">
            <a href="AboutManagement.php" style="text-decoration: none;">About management</a>
        </div>
</body>
</html>
