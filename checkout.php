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

// Check if the checkout form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["checkout"])) {
  // Add your validation and processing logic here

  // For example, you can get the user information from the form
  $user_name = $_POST["user_name"];
  $email = $_POST["email"];
  $address = $_POST["address"];
  $code_postal=$_POST["code_postal"];
  $number_phone=$_POST["number_phone"];
  $quantity=$_POST["quantity"];
  $total_amount=$_POST["total_amount"];
  


  // Insert the order information into the orders table
  $insert_order_query = "INSERT INTO orders (user_name, email, address,code_postal,number_phone,quantity,total_amount) VALUES (?, ?, ?)";
  $stmt = $conn->prepare($insert_order_query);

  if ($stmt) {
    $stmt->bind_param("sss", $customer_name, $email, $address);
    $stmt->execute();

    // Get the last inserted order ID
    $order_id = $stmt->insert_id;

    // Insert each item from the cart into the order_items table
    foreach ($_SESSION["cart"] as $product_id => $product) {
      $insert_item_query = "INSERT INTO order_items (order_id, product_id, quantity, total_price) VALUES (?, ?, ?, ?)";
      $stmt_item = $conn->prepare($insert_item_query);

      if ($stmt_item) {
        $stmt_item->bind_param("iiid", $order_id, $product_id, $product["quantity"], $product["total_price"]);
        $stmt_item->execute();
        $stmt_item->close();
      } else {
        die("Error in the prepared statement for adding order items.");
      }
    }

    // Clear the cart after successful checkout
    $_SESSION["cart"] = array();

    // Redirect to a thank you page or any other page
    header("Location: thank_you.php");
    exit();
  } else {
    die("Error in the prepared statement for adding orders.");
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Checkout</title>
  <!-- Add your stylesheets and scripts here -->
</head>

<body>
  <section id="header">
    <!-- Your header content -->
  </section>

  <section id="cart" class="section-p1">
    <table width=100%>
      <!-- Your cart table content -->
    </table>

    <?php
    if (!empty($cart_data)) {
      echo "<p class='total-amount' id='total'>Total Amount: $" . $total_amount . "</p>";
    }
    ?>

    <div>
      <h2>Checkout</h2>
      <form method="post" action="">
        <label for="user_name">Name:</label>
        <input type="text" name="user_name" required>

        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <label for="codepostal">Code Postale:</label>
        <input type="text" name="code_postal" required>


        <label for="address">Address:</label>
        <textarea name="address" required></textarea>

        
        <label for="number">Phone Number:</label>
        <input name="number_phone" required></input>

        
        <label for="total">Total:</label>
        <input name="Total_amount" required></input>



        <input type="submit" name="checkout" value="Checkout">
      </form>
    </div>
  </section>
</body>

</html>
