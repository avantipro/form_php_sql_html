<?php

require 'db.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sing-up/Login Form</title>
    <?php include 'css/css.html'; ?>
  </head>
<?php

if ( $_SERVER['REQUEST_MRTHOD'] = 'POST')
{
    if ( isset($_POST['login'])) {
        require 'login.php';
    }

    elseif ( isset($_POST['register']) ) {
      require 'register.php';
    }
}

?>
  <body>
<div class="form">
  <ul class="tab-group">
    <li class="tab"><a href="#singup">Sing Up</a></li>
    <li class="tab active"><a href="#login">Log In</a></li>
  </ul>

  <div class="tab-content">
    <div id="login">
      <h1>Welcome Back!</h1>

      <form class="" action="index.php" method="post" autocomplete="off">

         <div class="field-wrap">
           <label>
              Email Address<span clas="req">*</span>
           </label>
           <input type="email" required autocomplete="off" name="email"/>
         </div>

         <div class="field-wrap">
           <label>
              Password <span clas="req">*</span>
           </label>
           <input type="password" required autocomplete="off" name="password"/>
         </div>

         <p class="forgot"><a href="forgot.php"> Forgot Password? </a></p>

         <button class="button button-block" type="submit" name="login">Log In</button>


      </form>
    </div>
  </div>
</div>
  </body>
</html>
