<?php

include 'includes/db.php';
include 'includes/function.php';

?>




<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="style/styles.css">
    <title>Home</title>
</head>
<body id="home">
  <!-- DO NOT TAMPER WITH CLASS NAMES! -->

  <!-- top bar starts here -->
  <div class="top-bar">
    <div class="top-nav">
      <a href="index.html"><h3 class="brand"><span>B</span>rain<span>F</span>ood</h3></a>
      <ul class="top-nav-list">
        <li class="top-nav-listItem Home"><a href="indexi.php">Home</a></li>
        <li class="top-nav-listItem catalogue"><a href="catalogue.php">Catalogue</a></li>
        <li class="top-nav-listItem login"><a href="user_login.php">Login</a></li>
        <li class="top-nav-listItem register"><a href="add_user.php">Register</a></li>
        <li class="top-nav-listItem cart">
          <div class="cart-item-indicator">
            <p>12</p>
          </div>
          <a href="cart.php">Cart</a>
        </li>
      </ul>
      <form class="search-brainfood">
        <input type="text" class="text-field" placeholder="Search all books">
      </form>
    </div>
  </div>
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
        <!-- <h2 class="book-title">Eloquent Javascript</h2> -->
        <!-- <h3 class="book-author">by Marijn Haverbeke</h3> -->
        <!-- <h3 class="book-price">$200</h3> -->

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
        <!-- <li class="book"> -->
          <!-- <a href="#"><div class="book-cover"></div></a> -->
          <!-- <div class="book-price"><p>$125</p></div> -->
        <!-- </li> -->
        <!-- <li class="book"> -->
          <!-- <a href="#"><div class="book-cover"></div></a> -->
          <!-- <div class="book-price"><p>$90</p></div> -->
        <!-- </li> -->
        <!-- <li class="book"> -->
          <!-- <a href="#"><div class="book-cover"></div></a> -->
          <!-- <div class="book-price"><p>$250</p></div> -->
        <!-- </li> -->
        <!-- <li class="book"> -->
          <!-- <a href="#"><div class="book-cover"></div></a> -->
          <!-- <div class="book-price"><p>$50</p></div> -->
        <!-- </li> -->
      <!-- </ul> -->
    </div>
    <div class="recently-viewed-books horizontal-book-list">
      <h3 class="header">Recently Viewed</h3>
      <ul class="book-list">
        <div class="scroll-back"></div>
        <div class="scroll-front"></div>
        <li class="book">
          <a href="#"><div class="book-cover"></div></a>
          <div class="book-price"><p>$250</p></div>
        </li>
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
  <!-- footer starts here-->
  <div class="footer">
    <p class="copyright">&copy; copyright 2016</p>
  </div>
</body>
</html>
