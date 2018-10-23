<?php

require 'db.php';
session_start();

if ( $_SSERVER['REQUEST_METHOD'] == 'POST')
{
    $email  = $mysqli->escape_string($_POST['email']);
    $result = $mysqli->query("SELECT * FROM users WHERE email='$email'");

    if ( $result->num_rows == 0 )
    {
        $_SESSION['message'] = "User with that email doesn't exist!";
        header("location: error.php");
    } else {
        $user = $result->fetch_assoc();
        $email = $user['email'];
        $hash = $user['hash'];
        $first_name = $user['first_name'];

        $_SESSION['message'] = "<p> Please check your email <span> $email </span>"
        . " for a confirnmation link to complete your password reset!</p>";

# Send registration confirmation link (reset.php)
    $to = $email;
    $subject = 'Password Reset Link ( ert.com)';
    $message_body = '
    Hello' . $first_name . ',
    You have requested password reset!
    Please click this linl reset your password:
    http://localhost/login-system/reset.php?email=' . $email. '$hash=' . $hash;

    mail($to, $subject, $message);

    header("location: success.php");
    }
}
?>
