<?php 
include ('wp-load.php');
include ('wp-content/themes/Zeitmanagement_Tool/template-parts/connection/db-connection.php');
global $current_user;
$current_user = wp_get_current_user();
$query_getUserInfo = "SELECT display_name, user_email, arbeitsumfang, ID FROM wp_users WHERE display_name = '$current_user->user_login'";
$query_runGetProfile = mysqli_query($con, $query_getUserInfo);
?>