<?php

include 'includes/db.php';
include 'includes/function.php';
include 'includes/new_header.php';
?>
  <!-- side bar starts here -->
  <div class="side-bar">
    <div class="categories">
      <h3 class="header">Categories</h3>
      <ul class="category-list">

      <?php $catalogue = catalogue($conn);

          echo $catalogue;

         ?>

      </ul>
    </div>
  </div>
  <!-- main content starts here -->
  <div class="main">
    <div class="main-book-list horizontal-book-list">
      <ul class="book-list">

      <?php

       $ca = catalogueBooks($conn);

        echo $ca;

         ?>
      

       </ul>
      <div class="actions">
        <button class="def-button previous">Previous</button>
        <button class="def-button next">Next</button>
      </div>
    </div>
    <div class="recently-viewed-books horizontal-book-list">
      <h3 class="header">Trending Books</h3>
      <ul class="book-list">
        <div class="scroll-back"></div>
        <div class="scroll-front"></div>
       
            <?php

          $trending = trendingBooks($conn);

          echo $trending;


      ?>

        <!-- <li class="book"> -->
          <!-- <a href="#"><div class="book-cover"></div></a> -->
          <!-- <div class="book-price"><p>$250</p></div> -->
        <!-- </li> -->
        <li class="book">
          <a href="#"><div class="book-cover"></div></a>
          <div class="book-price"><p>$50</p></div>
        </li>
        <li class="book">
          <a href="#"><div class="book-cover"></div></a>
          <div class="book-price"><p>$125</p></div>
        </li>
        <li class="book">
          <a href="#"><div class="book-cover"></div></a>
          <div class="book-price"><p>$90</p></div>
        </li>
      </ul>
    </div>
    
  </div>
  <!-- footer starts here -->
  <div class="footer">
    <p class="copyright">&copy; copyright 2016</p>
  </div>
</body>
</html>
