<?php  
include 'wp-load.php';
include 'wp-content/themes/Zeitmanagement_Tool/template-parts/connection/db-connection.php';
global $current_user;
$current_user = wp_get_current_user();

$query_getSecondsWorkedToday = "SELECT `total_seconds`, `DATE(``check_in``)` FROM difference_in_days WHERE user = '$current_user->user_login'";
$query_runSecondsWorkedToday = mysqli_query($con, $query_getSecondsWorkedToday);

$query_getArbeitsumfang = "SELECT 'arbeitsumfang' FROM 'wp_users' WHERE 'display_name' = '$current_user->user_login'";
$query_runArbeitsumfang = mysqli_query($con, $query_getArbeitsumfang);

$query_getDatesThisWeek = "SELECT SUM(`total_seconds`), `DATE(``check_in``)`, `user`, `arbeitsumfang` FROM  difference_in_days, wp_users WHERE  YEARWEEK(`DATE(``check_in``)`, 1) = YEARWEEK(CURDATE(), 1) AND user = '$current_user->user_login'";
$query_runDatesThisWeek = mysqli_query($con, $query_getDatesThisWeek);
?>