<?php
// Get Users
$con = mysqli_connect("localhost", "root", "", "zeitmanagement_tool");
$query_getUsers = "SELECT ID, display_name, user_email, arbeitsumfang FROM wp_users";
$result = mysqli_query($con, $query_getUsers);

// Delete User
if(isset($_GET['delete'])) {
    $delete = $_GET['delete'];
    $query_deleteUserFromID = "DELETE FROM wp_users WHERE ID = '$delete'";
    $query_run = mysqli_query($con, $query_deleteUserFromID);
    header('Location: ../../../../benutzer-verwalten/');
}
    
?>