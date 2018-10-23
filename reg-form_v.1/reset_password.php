<?php





if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

    if ( $_POST['newpassword'] == $_POST['confirmpassword'] ) {
        $new_password = password($_POST['newpassword'], PASSWORD_ENCRYPT);

        $email = $mysqli->escape_string($_POST['email']);
        $hash = $mysqli->escape_string($_POST['hash']);

        $sql = "UPDATE users SET password='$new_password', hash='$hash' WHERE email='$email'";

        if ( $mysqli->query($sql) ) {
            $_SESSION['message'] = "Your password has been reset succefully!";
            header("location: success.php");
        }
    } else {
        $_SESSION['message'] = "Two passwords you entered dont't match, try again!";
        header("location: error.php");
    }
}
