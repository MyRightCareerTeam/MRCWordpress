<?php
// $q = intval($_GET['q']);
$user = $_GET['user_id'];
$page = $_GET['page_id'];

$con = mysqli_connect('localhost','root','','wpdb');
if (!$con)
  {
  die('Could not connect: ' . mysqli_error($con));
  }

// mysqli_select_db($con,"ajax_demo");

$sql="SELECT `content` FROM `user_content` WHERE `page_id` = '".$page."' and `user_id` = '".$user."'";

$result = mysqli_query($con,$sql);

$row = mysqli_fetch_array($result);

echo $row['content'];

mysqli_close($con);
?>