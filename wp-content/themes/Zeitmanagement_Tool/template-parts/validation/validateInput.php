<?php
function emptyInputSignup($username, $email, $password, $ConfPassword) {
    return empty($email) || empty($username) || empty($password) || empty($ConfPassword);
}

function invalidEmail($email) {
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function pwdMatch($password, $ConfPassword) {
    $result;
    if ($password !== $ConfPassword) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function emptyInputLogin($username, $password) {
    if (empty($username) || empty($password)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

?>