<?php

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "ecommerce";

$conn = new mysqli($servername, $username, $password, $dbname);



// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$category = @$_GET["category"];
if ($category) {
  $query = "SELECT * FROM `products` WHERE category = ?";
  $stmt = $conn->prepare($query);  // Use $conn instead of $db_con
  $stmt->bind_param("s", $category);
} else {
  $query = "SELECT * FROM `products`";
  $stmt = $conn->prepare($query);  // Use $conn instead of $db_con
}
$stmt->execute();
$result = $stmt->get_result();
$row = $result->num_rows;
$products = [];
while ($row = $result->fetch_assoc()) {
  $products[] = $row;
}

//search
$search_name = isset($_GET['search_name']) ? $_GET['search_name'] : '';
$sql = 'SELECT * FROM products WHERE name LIKE ?';
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $search_name_param);
$search_name_param = '%' . $search_name . '%';
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();
// Close the database connection


?>























<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="shop.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SHOP</title>

  <script>



    document.addEventListener("DOMContentLoaded", function() {
      const searchInput = document.querySelector(".search");

      // Add an event listener to detect changes in the search field
      searchInput.addEventListener("input", function() {
        // Automatically submit the form when there is a change
        this.form.submit();
      });

      // Clear the search input after page load
      window.onload = function() {
        searchInput.value = '';
      };
    });
  </script>

  <!--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Hedvig Letters Serif">-->

  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Handlee:wght@400&display=swap">

  <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"></script>
</head>

<body>
  <section id="header">

    <div class="head">
      <ul class="navbar">
        <h2 id="logo"><a href="index.php">EVARA</a></h2>
        <li>
          <form action="" method="GET" class="form">
            <label for="search_name"></label>
            <input type="text" name="search_name" class="search" placeholder="Search by Name:" value="<?php echo $search_name; ?>">
          </form>
        <li id='catego'>
          <div class="abc">
            <select name="category" id="category">
              <option value="all">All</option>
              <option value="Clothes">Clothes</option>
              <option value="Shoes">Shoes</option>
              <option value="Accessories">Accessories</option>
            </select>
            <button type="submit">Filter</button>
          </div>
        </li>
      </li>
 </form>
<li><a href="shop.php">Shop</a></li>

        <li><a href="about.html">About us</a></li>
        <li><a href="contact.html">contact us</a></li>
        <li><a href="cart.html"><i class="fas fa-shopping-bag" style="color: white;"></i></a></li>
        <li><a href="profile.html"><i class="fas fa-user" style="color: #ffffff;"></i></a>
          <ul class="dropdown">
            <li><a href="login.php">log in</a></li>
            <li><a href="UserRegister.php">sign up</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </section>
  <div id="hero">
    <img src="hero2.jpg" alt="">
  </div>


  <div class="container">
    <?php
    foreach ($products as $products) {
      echo '<div class="product">';
      echo '<td><img width="150" src="' . $products["image_path"] . '"/></td>';
      echo '<h3 class="cat">' . $products['category'] . '</h3>';
      echo '<h3>' . $products['name'] . '</h3>';
      
      echo '<p>Price: $' . $products['price'] . '</p>';
      echo '<a href="produit.php?id=' . $products['id'] . '">Voir Produit</a>';
      echo '</div>';
    }
    ?>

    <footer class="section-p1">
      <div class="col">
        <h4 id="lol">EVARA</h4>
        <h4>contact</h4>
        <p><strong>Address:</strong>586 california,street 88,Morocco</p>
        <p><strong>Phone:</strong>+212 689 541 25</p>
        <p><strong>Hours</strong>10:00 -18:00,Mon -Sat </p>
        <div class="follow">
          <h4>Follow us</h4>
          <div class="icon">
            <div class="icon">
              <a href="#"><i class="fab fa-facebook fa-2x" style="color: #000000;"></i></a>
              <a href="#"><i class="fab fa-instagram fa-2x" style="color: #000000;"></i></a>
              <a href="#"><i class="fab fa-twitter fa-2x" style="color: #000000;"></i></a>
            </div>

          </div>
        </div>
      </div>
      <div class="col">
        <h4>About</h4>
        <a href="#">About us</a>
        <a href="#">Delivery information</a>
        <a href="#">privacy Policy</a>
        <a href="#">Tems & Conditions</a>
        <a href="#">contact us</a>

      </div>
      <div class="col">
        <h4></h4>
        <a href="#">Sign In</a>
        <a href="#">View Cart</a>
        <a href="#"> My Wishlist</a>
        <a href="#">Track My Order</a>
        <a href="#"> Helps</a>
      </div>
      <div class="pay">
        <p>Secured Payment Gateway</p>
        <img src="pay.png" alt="">
      </div>

  </div>
  </footer>
</body>

</html>


<!--<?php
/*if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $selectedCategory = $_POST['category'];

    $sql = ($selectedCategory === 'all')
        ? "SELECT * FROM products"
        : "SELECT * FROM products WHERE category = '$selectedCategory'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div>';
            echo '<h2>' . $row['name'] . '</h2>';
            echo '<p>Category: ' . $row['category'] . '</p>';
            // Add more details as needed
            echo '</div>';
        }
    } else {
        echo 'No products found.';
    }
}

$conn->close();
?>-->*/
