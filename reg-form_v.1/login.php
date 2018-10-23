<?php

$email = $mysqlo->escape_string($_POST['email']);
$result = $mysqli->query("SELECT * FROM users WHERE email='$email'");

if ( $result->num_rows == 0 )
{
    $_SESSION['message'] = "User with that email doesn't exist!";
    header("location: error.php");
} else {
    $user = $result->fetch_assoc();

    if ( password_verify($_POST['password'], $user['password']) ) {
        $_SESSION['email'] = $user['email'];
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['last_name'] = $user['last_anme'];
        $_SESSION['active'] = $user['active'];

        $_SESSION['logged_id'] = true;
        header("location: profile.php");
    } else {
        $_SESSION['message'] = "Your have entered wrong password, try again";
        header("location: error.php"); 
    }
}
