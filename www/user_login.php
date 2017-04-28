<?php
session_start();

$title = 'login';

include 'includes/db.php';

include 'includes/function.php';

#include 'includes/new_header.php';


  $error = [];
  
if(array_key_exists('login', $_POST)){

     if(empty($_POST['email'])){
      $error['email'] = "Please enter email";
    } 

     if(empty($_POST['password'])){
        $error['password'] = "please enter password";
    }

     if(empty($error)){
        $clean = array_map('trim', $_POST);
        $check = UserLogin($conn,$clean);
        #print_r($check); exit();


        $_SESSION['ID'] = $check;
        #print_r($_SESSION['ID']); exit();
        header("Location:indexi.php");
    }
}



?>

  <!-- main content starts here -->
   <div class="main">
    <div class="login-form">
      <form class="def-modal-form" action="user_login.php" method="post">
        <div class="cancel-icon close-form"></div>
        <label for="login-form" class="header"><h3>Login</h3></label>
        <input type="text" name="email" class="text-field email" placeholder="Email">
        <!-- <p class="form-error">invalid email</p> -->
        <input type="password" name="password" class="text-field password" placeholder="Password">
        <!--clear the error and use it later just to show you how it works -->
        <!-- <p class="form-error">wrong password</p> -->
        <input type="submit" name="login" class="def-button login" value="Login">
      </form>
    </div>
  </div>
  <!-- footer starts here-->
  <div class="footer">
    <p class="copyright">&copy; copyright 2016</p>
  </div>
</body>
</html>
