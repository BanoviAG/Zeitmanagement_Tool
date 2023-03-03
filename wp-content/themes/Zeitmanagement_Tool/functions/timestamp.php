<?php
include ('../../../../wp-load.php');
include ('../template-parts/connection/db-connection.php');
global $current_user;
$current_user = wp_get_current_user();

if(isset($_POST['start'])) {
    $query_startTimer = "INSERT INTO timestamps (check_in,user) VALUES (now(),'$current_user->user_login')";
    $query_run = mysqli_query($con, $query_startTimer);

}
?>