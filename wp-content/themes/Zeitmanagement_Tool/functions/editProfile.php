<?php 
include ('../../../../wp-load.php');
include ('../template-parts/connection/db-connection.php');
$id = $_GET['edit'];
$username = $_POST['username'];
$email = $_POST['email'];
$arbeitsumfang = $_POST['arbeitsumfang'];
$query_editProfile = "UPDATE wp_users SET user_login = '$username', user_nicename = '$username', display_name = '$username', user_email = '$email', arbeitsumfang = '$arbeitsumfang' WHERE ID = '$id'";
$query_runEditProfile = mysqli_query($con, $query_editProfile);
header('Location: ../../../../profil/');
?>