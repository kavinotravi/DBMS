<?php
$con = mysqli_connect("localhost","root", "") or die("No Connection");
mysqli_select_db($con,"project") or die("No Database connected!");
?>
