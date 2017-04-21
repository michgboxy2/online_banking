<?php

include 'includes/new_header.php';



?>
         <?php

    $error = [];
    if(array_key_exists('submit', $_POST))

    {

      if(empty($_POST['email']))
        {

          $error['email'] = "please enter email";
        }


      if(empty($_POST['pword']))

          {
            $error['pword'] = "please enter password";

          }

      if(empty($error))

              {

                $clean = array_map('trim',$_POST);
                $chk = UserLogin($conn, $clean);
                #print_r($chk); exit();
                
                if($chk[0])
                  {
                    $_SESSION['logged'] = true;
                    $_SESSION['username'] = $chk[1]['username'];
                    $_SESSION['id'] = $chk[1]['user_id'];
                    $_SESSION['email'] = $chk[1]['email'];
                    $_SESSION['firstname'] = $chk['1']['firstname'];
                    $_SESSION['lastname'] - $chk[1]['lastname'];

                      redirect('indexi.php');
                  }
                  else 
                  {
                    redirect('user_login.php?msg=invalid email or password');
                  }
              }




    }



    ?>
  <!-- main content starts here -->
  <div class="main">
    <div class="login-form">


      <form class="def-modal-form" action="user_login.php" method="POST">
        <div class="cancel-icon close-form"></div>
        <label for="login-form" class="header"><h3>Login</h3></label>
        <?php

            if(isset($_GET['msg'])){
              echo "<p>".$_GET['msg']."</p>";
            }

        ?>
        <input type="text" class="text-field email" placeholder="Email" name="email">

        <!-- <?php $display# = displayErrors($error,'email'); echo $display;  ?> -->
        <!-- <p class="form-error">invalid email</p> -->
        <input type="password" class="text-field password" placeholder="Password" name="pword">

        <!-- <?php $display #= displayErrors($error,'pword'); echo $display; ?> -->
        <!--clear the error and use it later just to show you how it works -->
        <!-- <p class="form-error">wrong password</p> -->

        <input type="submit" class="def-button login" value="Login">
      </form>
    </div>
  </div>
  <!-- footer starts here-->
  <div class="footer">
    <p class="copyright">&copy; copyright 2016</p>
  </div>
</body>
</html>
