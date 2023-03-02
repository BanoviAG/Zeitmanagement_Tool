<?php
// Get Users
$con = mysqli_connect("localhost", "root", "", "zeitmanagement_tool");
$query_getUsers = "SELECT display_name, user_email, arbeitsumfang FROM wp_users";
$result = mysqli_query($con, $query_getUsers);

// Delete User
if(isset($_GET['delete'])) {
    $delete = $_GET['delete'];
    $query_deleteUserFromMail = "DELETE FROM wp_users WHERE user_email = '$delete'";
    $query_run = mysqli_query($con, $query_deleteUserFromMail);
    header('Location: ../../../../benutzer-verwalten/');
}
    
?>