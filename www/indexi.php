<?php

include 'includes/db.php';
include 'includes/function.php';
include 'includes/new_header.php';
?> 

  <!-- main content starts here -->
  <div class="main">
    <div class="book-display">

    <?php

      $displayimage = displayTopBookImage($conn, 'uploads/3965457780download_(1).jpg');

      echo $displayimage;


    ?>
      <!-- <div class="display-book"></div> -->
      <div class="info">

      <?php  

      $displayTopselling = displayTopSelling($conn, 'uploads/3965457780download_(1).jpg');

      echo $displayTopselling;


           ?>
   

        <form>
          <label for="book-amout">Amount</label>
          <input type="number" class="book-amount text-field">
          <input class="def-button add-to-cart" type="submit" name="" value="Add to cart">
        </form>
      </div>
    </div>
    <div class="trending-books horizontal-book-list">
      <h3 class="header">Trending</h3>
      <ul class="book-list">

      <?php

          $trending = trendingBooks($conn);

          echo $trending;


      ?>
       
    </ul>
    </div>
    <div class="recently-viewed-books horizontal-book-list">
      <h3 class="header">Most Viewed</h3>
      <ul class="book-list">
        <div class="scroll-back"></div>
        <div class="scroll-front"></div>

        <?php $mostViewed = mostViewed($conn);

          echo $mostViewed;


             ?>
    </ul>
    </div>
    
  </div>
  <!-- footer starts here-->
  <div class="footer">
    <p class="copyright">&copy; copyright 2016</p>
  </div>
</body>
</html>
