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
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_to_cart"])) {
  $product_id = $_POST["product_id"];
  $product_name = $_POST["product_name"];
  $product_price = $_POST["product_price"];
  $product_image = $_POST["product_image"];
  $quantity = $_POST["quantity"];

  $total_price = $product_price * $quantity;

  if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = array();
  }

  if (isset($_SESSION["cart"][$product_id])) {
    $_SESSION["cart"][$product_id]["quantity"] += $quantity;
  } else {
    $_SESSION["cart"][$product_id] = array(
      "name" => $product_name,
      "price" => $product_price,
      "image" => $product_image,
      "quantity" => $quantity,
      "total_price" => $total_price
    );

    $query = "INSERT INTO cart (product_id, product_name, product_price, product_image, quantity, total_price) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);

    if ($stmt) {
      $stmt->bind_param("isdidi", $product_id, $product_name, $product_price, $product_image, $quantity, $total_price);
      $stmt->execute();
      $stmt->close();
    } else {
      die("Error in the prepared statement for adding to cart.");
    }
  }

  header("Location: addtocart.php");
  exit();
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

  <section id="cart" class="section-p1">
    <table width=100%>
      <thead>
        <tr id="hed">
          <td>Products</td>
          <td>Name</td>
          <td>Price</td>
          <td>Quantity</td>
          <td>Subtotal</td>
          <td>Remove</td>
        </tr>
      </thead>
      <tbody>
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
              <tr>
                <td><img src='<?php echo $cart_item['product_image']; ?>' alt='<?php echo $cart_item['product_name']; ?>' id='imag'></td>
                <td>
                  <h3><?php echo $cart_item['product_name']; ?></h3>
                </td>
                <td><?php echo $cart_item['product_price']; ?>$</td>
                <td><?php echo $cart_item['quantity']; ?></td>
                <td><?php echo $cart_item['total_price']; ?>$</td>
                <td><a href='delete.php?id=<?php echo $cart_item['id']; ?>'>Remove</a></td>
              </tr>
        <?php
            }
            // Display the total amount
            $total_amount = array_sum(array_column($cart_data, 'total_price'));
          } else {
            // Display a message when the cart is empty
            echo "<tr><td colspan='6' class='empty-cart'>Your cart is empty.</td></tr>";
          }
        } else {
          // Display an error message if the query fails
          echo "<tr><td colspan='6' class='empty-cart'>Error: " . $conn->error . "</td></tr>";
        }
        ?>
      </tbody>
    </table>

    <?php
    if (!empty($cart_data)) {
      echo "<p class='total-amount' id='total'>Total Amount: $" . $total_amount . "</p>";
    }
    ?>
  </section>
  <div>
    <button  type="submit" class="check" name="checkout">Chechout</button>
  </div>
</body>

</html>