<?php
$text = $_GET['text'];
$user = $_GET['user_id'];
$page = $_GET['page_id'];

$con = mysqli_connect('localhost','root','','wpdb');
if (!$con)
  {
  die('Could not connect: ' . mysqli_error($con));
  }

// mysqli_select_db($con,"ajax_demo");

$sql="UPDATE `wpdb`.`user_content` SET  `content` = '".$text."' WHERE  `user_content`.`page_id` =".$page." AND  `user_content`.`user_id` =".$user;

mysqli_query($con,$sql);

mysqli_close($con);
?>