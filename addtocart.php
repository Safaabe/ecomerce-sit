<?php
session_start();

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "ecommerce";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shopping Cart</title>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const searchInput = document.querySelector(".search");



      // Clear the search input after page load
      window.onload = function() {
        searchInput.value = '';
      };
    });



    document.addEventListener("DOMContentLoaded", function() {
      const searchInput = document.querySelector(".search");

      const filterForm = document.querySelector('.form');
      filterForm.addEventListener('submit', function(event) {
        // Optionally, you can clear the search input on form submission
        // searchInput.value = '';
      });
    });
  </script>

  <!--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Hedvig Letters Serif">-->

  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Handlee:wght@400&display=swap">

  <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"></script>
  <link rel="stylesheet" href="addtocart.css">
</head>

<body>
  <section id="header">

    <div class="head">
      <ul class="navbar">
        <h2 id="logo"><a href="index.php">EVARA</a></h2>



        <li>
          <div class="search-box">
            <div class="row">
              <input type="text" id="input-box" placeholder="search anything" autocomplete="off">
              <button><i class="fas fa-search"></i></button>
            </div>
            <div class="result-box">

            </div>
          </div>
        </li>


        <li><a href="shop.php">Shop</a></li>
        <li><a href="about.html">About us</a></li>
        <li><a href="contact.html">contact us</a></li>
        <li><a href="addtocart.php"><i class="fas fa-shopping-bag" style="color: white;"></i></a></li>
        <li><a href="profile.html"><i class="fas fa-user" style="color: #ffffff;"></i></a>
          <ul class="dropdown">
            <li><a href="profil.php">log in</a></li>
            <li><a href="logout.php">sign up</a></li>
          </ul>
        </li>
     </ul>
    </div>
  </section>
<div id="cart-container">
    <?php
    // Fetch all products from the cart table
    $cart_query = $conn->query("SELECT * FROM cart");
    if ($cart_query) {
      $cart_data = $cart_query->fetch_all(MYSQLI_ASSOC);

      // Check if the cart is not empty
      if (!empty($cart_data)) {
        // Display the cart items
        foreach ($cart_data as $cart_item) {
    ?>
          <div class="cart-item">
            <?php if (isset($cart_item['product_image'])) : ?>
              <img src="<?php echo $cart_item['product_image']; ?>" alt="<?php echo isset($cart_item['product_name']) ? $cart_item['product_name'] : ''; ?>">
            <?php endif; ?>
            <div class="cart-item-info">
              <p><?php echo isset($cart_item['product_name']) ? $cart_item['product_name'] : ''; ?></p>
              <p>Price: $<?php echo isset($cart_item['product_price']) ? $cart_item['product_price'] : ''; ?></p>
              <p>Quantity: <?php echo isset($cart_item['quantity']) ? $cart_item['quantity'] : ''; ?></p>
              <p>Total: $<?php echo isset($cart_item['total_price']) ? $cart_item['total_price'] : ''; ?></p>
              <a href="delete.php?product_id=<?php echo $cart_item['product_id']; ?>">Remove</a>
            </div>
          </div>
    <?php
        }

        // Display the total amount
        $total_amount = array_sum(array_column($cart_data, 'total_price'));
        echo "<p class='total-amount'>Total Amount: $" . $total_amount . "</p>";
      } else {
        // Display a message when the cart is empty
        echo "<p class='empty-cart'>Your cart is empty.</p>";
      }
    } else {
      // Display an error message if the query fails
      echo "<p class='empty-cart'>Error: " . $conn->error . "</p>";
    }

    $conn->close();
    ?>
  </div>

</body>

</html>