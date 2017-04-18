<?php

include 'includes/db.php';
include 'includes/function.php';

?>


<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="style/styles.css">
    <title>Catalogue</title>
</head>
<body id="catalogue">
  <!-- DO NOT TAMPER WITH CLASS NAMES! -->
  <!-- top bar starts here -->
  <div class="top-bar">
    <div class="top-nav">
      <a href="indexi.php"><h3 class="brand"><span>B</span>rain<span>F</span>ood</h3></a>
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
  <!-- side bar starts here -->
  <div class="side-bar">
    <div class="categories">
      <h3 class="header">CATALOGUES</h3>
      <ul class="category-list">

      <?php $catalogue = catalogue($conn);

          echo $catalogue;

         ?>

        <!-- <a href="catalogue.php?cat_id=16"><li class="category">SCI-FI</li></a> -->
        <!-- <a href="catalogue.php"><li class="category">FICTION</li></a> -->
        <!-- <a href="catalogue.php"><li class="category">THRILLER</li></a> -->
         <!-- <a href="#"><li class="category">Literature</li></a> -->
        <!-- <a href="#"><li class="category">Mathematics</li></a> -->
        <!-- <a href="#"><li class="category">Engineering</li></a> -->
        <!-- <a href="#"><li class="category">Politics</li></a> -->
        <!-- <a href="#"><li class="category">Music</li></a> -->
        <!-- <a href="#"><li class="category">Literature</li></a> -->
        <!-- <a href="#"><li class="category">Mathematics</li></a> -->
        <!-- <a href="#"><li class="category">Engineering</li></a> -->
        <!-- <a href="#"><li class="category">Politics</li></a> -->
        <!-- <a href="#"><li class="category">Music</li></a> -->
      </ul>
    </div>
  </div>
  <!-- main content starts here -->
  <div class="main">
    <div class="main-book-list horizontal-book-list">
      <ul class="book-list">

      <?php

       $ca = catalogueBooks($conn, $_GET['cat_id']);

        echo $ca;

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
        <!-- <li class="book"> -->
          <!-- <a href="#"><div class="book-cover"></div></a> -->
          <!-- <div class="book-price"><p>$250</p></div> -->
        <!-- </li> -->
        <!-- <li class="book"> -->
          <!-- <a href="#"><div class="book-cover"></div></a> -->
          <!-- <div class="book-price"><p>$50</p></div> -->
        <!-- </li> -->
        <!-- <li class="book"> -->
          <!-- <a href="#"><div class="book-cover"></div></a> -->
          <!-- <div class="book-price"><p>$125</p></div> -->
        <!-- </li> -->
        <!-- <li class="book"> -->
          <!-- <a href="#"><div class="book-cover"></div></a> -->
          <!-- <div class="book-price"><p>$90</p></div> -->
        <!-- </li> -->
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
