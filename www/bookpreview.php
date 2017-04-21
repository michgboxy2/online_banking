<?php

include 'includes/db.php';
include 'includes/function.php';
include 'includes/new_header.php';

?>

  <div class="main">
    <p class="global-error">You have not chosen any amount!</p>
    <div class="book-display">

    <?php

    $display = bookDisplay($conn);
    echo $display;

    ?>
      <!-- <div class="display-book"></div> -->
   
      <div class="info">

      <?php

     

      $bd = bookDetails($conn);

         echo $bd;

        if(array_key_exists('review', $_POST)){

          $error = [];


          if(empty($_POST['comment'])){

           }
       

        if(empty($error)){

           if(isset($_GET['book_id']))
          {

        $bid = loopingBook($conn, $_GET['book_id']);
          
          }

          $clean = array_map('trim', $_POST);

          $review = review($conn, $clean,$user_id, $bid['book_id']);

                         }
      }                   



      ?>
        
        <!-- <h2 class="book-title">Javascript &amp; Jquery </h2>  -->
        <!-- <h3 class="book-author">by Jon Duckett</h3>  -->
        <!-- <h3 class="book-price">$125</h3>  -->
        

        <form>
          <label for="book-amout">Amount</label>
          <input type="number" class="book-amount text-field" name="amount">
          <input class="def-button add-to-cart" type="submit" name="amount" value="Add to cart">
        </form>
      </div>
    </div>
    <div class="book-reviews">
      <h3 class="header">Reviews</h3>
      <ul class="review-list">
        <li class="review">
          <div class="avatar-def user-image">
            <h4 class="user-init">jm</h4>
          </div>
          <div class="info">
            <h4 class="username">Jon Williams</h4>
            <p class="comment">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit,
              sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </p>
          </div>
        </li>
        <li class="review">
          <div class="avatar-def user-image">
            <h4 class="user-init">AE</h4>
          </div>
          <div class="info">
            <h4 class="username">Abby Essien</h4>
            <p class="comment">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit,
              sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
              Lorem ipsum dolor sit amet, consectetur adipisicing elit,
              sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </p>
          </div>
        </li>
        <li class="review">
          <div class="avatar-def user-image">
            <h4 class="user-init">SB</h4>
          </div>
          <div class="info">
            <h4 class="username">Sandra Bullock</h4>
            <p class="comment">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit,
              sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
              Lorem ipsum dolor sit amet, consectetur adipisicing elit,
              sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </p>
          </div>
        </li>
      </ul>
      <div class="add-comment">
        <h3 class="header">Add your comment</h3>
        <form class="comment" action="bookpreview.php" method="POST">
          <textarea class="text-field" name="review" placeholder="write something" name="comment"></textarea>
          <button class="def-button post-comment" input type="submit" name="review" >Upload comment</button>
          
        </form>
      </div>
    </div>
  </div>
  <div class="footer">
    <p class="copyright">&copy; copyright 2016</p>
  </div>
</body>
</html>
