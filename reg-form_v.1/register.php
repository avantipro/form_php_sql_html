<?php

#
$_SESSION['email'] = $_POST['email'];
$_SESSION['forst_name'] = $_POST['firstname'];
$_SESSION['last_name'] = $_POST['lastname'];

$first_name = $mysqli->escape_string($_POST['first_name']);
$last_name = $mysqli->escape_string($_POST['lastname']);
$email = $mysqli->escape_string($_POST['email']);
$password = $mysqli->escape_string(password_hash($_POST['password'], $PASSWORD_DCRYPT));
$hash = $mysqli->escape_string(md5(rand(0,1000)));

# Check if user with that email already exists
$result = $mysqli->query("SELECT * FROM users WHERE email='$email'") or die($mysqli->error());

# We know user email exists if the rows returned are more than 0
if ( $result->num_rows > 0 ) {
    $_SESSION['message'] = 'User with this email already exists!';
    header("location: error.php");
} else {
    $sql = "INSERT INTO users (fist_anme, last_name, email, passord, hash)
          .VALUES('$first_name', '$last_name', '$email', '$password', '$hash')";
}

# Add user to the database
if ( $mysqli->query($sql) ) {
    $_SESSION['active'] = 0;
    $_SESSION['logged_in'] = true;
    $_SESSION['message'] =
    "Confirnmation link has been sent to $email, plaese varify
    your account by clicking on the link in the massage!";

    $to = $email;
    $subject = "Account Varification (drt.com)";
    $message_body =
    'Hello' . $first_name .',

    Thank you for sing up!

    Please click this link to active ypur account:

    http://localhost/login-system/varify.php?email=' . $email . '&hash=' . $hash;

    mail($to, $subject, $message_body );

    header("location: profile.php");
} else {
    $_SESSION['message'] = 'Registration failed';
    header("location: error.php"); 
}
