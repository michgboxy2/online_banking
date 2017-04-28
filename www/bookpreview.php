<?php
session_start();
$uid = $_SESSION['ID']; 
$title = 'book preview';

  if(isset($_GET['book_id'])){
    $book_id = $_GET['book_id'];
  }

include 'includes/db.php';
include 'includes/function.php';
include 'includes/new_header.php';

    $error = [];

    if(array_key_exists('review', $_POST)){

      if(empty($_POST['comment'])){
       $error['comment'] = "please post a comment";
        
      }

      if(empty($error)){
        $clean = array_map('trim', $_POST);
        PostReview($conn,$clean,$book_id,$uid);


      }
    



}

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

       
     ?>
        

        <form method="post" action="">
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
            <?php
             $userDetails = getUsernameById($conn, $book_id); 
             $showComment = ShowReview($conn,$userDetails['username'],$book_id); echo $showComment; ?>
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
        <form class="comment" action="<?php echo 'bookpreview.php?book_id='.$book_id ?>" method="POST">
          <textarea class="text-field" name="comment" placeholder="write something"></textarea>
          <button class="def-button post-comment" input type="submit" name="review">Upload comment</button>
          
        </form>
      </div>
    </div>
  </div>
  <div class="footer">
    <p class="copyright">&copy; copyright 2016</p>
  </div>
</body>
</html>
