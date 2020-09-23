<?php 

	$date = $_GET['myDate'];
	$newDate = date("M nS Y", strtotime($date));
	echo $newDate;



 ?>