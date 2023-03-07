<?php
include ('../../../../wp-load.php');
include ('../template-parts/connection/db-connection.php');

$username = $_POST['username'];
$email = $_POST['email'];
$arbeitsumfang = $_POST['arbeitsumfang'];
$edit = $_GET['edit'];

$query_editUser = "UPDATE wp_users SET user_login = '$username', user_nicename = '$username', display_name = '$username', user_email = '$email', arbeitsumfang = '$arbeitsumfang' WHERE user_email = '$edit'";
$query_runEditUser = mysqli_query($con, $query_editUser);
?>