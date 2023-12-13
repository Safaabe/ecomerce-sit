<?php
include('connexion_bdd.php');
session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id']) && isset($_POST['quantity'])) {
        $productId = $_POST['product_id'];
        $quantity = $_POST['quantity'];

        // Vérifier si le produit est déjà dans le panier
        $checkProductQuery = "SELECT * FROM cart WHERE user_id = '$user_id' AND product_id = '$product_id'";
        $checkProductResult = mysqli_query($connexion, $checkProductQuery);

        if ($checkProductResult) {
            if (mysqli_num_rows($checkProductResult) > 0) {
                // Le produit est déjà dans le panier, mettez à jour la quantité
                $updateQuantityQuery = "UPDATE cart SET quantity = quantity + '$quantity' WHERE user_id = '$user_id' AND product_id = '$product_id'";
                $updateQuantityResult = mysqli_query($connexion, $updateQuantityQuery);

                if ($updateQuantityResult) {
                    echo "La quantité du produit a été mise à jour dans le panier.";
                } else {
                    echo "Erreur lors de la mise à jour de la quantité : " . mysqli_error($connexion);
                }
            } else {
                // Le produit n'est pas dans le panier, ajoutez-le
                $addToCartQuery ="INSERT INTO cart (user_id, product_id, product_name, product_price, product_image, quantity, total_price) VALUES (?, ?, ?, ?, ?, ?, ?)";
                /*$addToCartQuery = "INSERT INTO cart(user_id, product_id, quantity,) VALUES ('$userId', '$productId', '$quantity')";*/
                $addToCartResult = mysqli_query($connexion, $addToCartQuery);

                if ($addToCartResult) {
                    echo "Produit ajouté au panier avec succès.";
                } else {
                    echo "Erreur lors de l'ajout au panier : " . mysqli_error($connexion);
                }
            }
        } else {
            echo "Erreur lors de la vérification du produit dans le panier : " . mysqli_error($connexion);
        }
    }
} else {
    echo "Utilisateur non connecté.";
    // Redirigez l'utilisateur vers la page de connexion si nécessaire
    // header('Location: login.php');
    exit;
}
?>


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_to_cart"])) {
    // Handle the "Add to Cart" form submission
    $product_id = $_POST["product_id"];
    $product_name = $_POST["product_name"];
    $product_price = $_POST["product_price"];
    $product_image = $_POST["product_image"];
    $quantity = $_POST["quantity"];

    // Calculate the total price for the product
    $total_price = $product_price * $quantity;

    // Add the product to the cart (session)
    if (!isset($_SESSION["cart"])) {
      $_SESSION["cart"] = array();
    }

    // Check if the product is already in the cart
    if (isset($_SESSION["cart"][$product_id])) {
      // Increment the quantity if the product is already in the cart
      $_SESSION["cart"][$product_id]["quantity"] += $quantity;
    } else {
      // Add a new entry to the cart for the product
      $_SESSION["cart"][$product_id] = array(
        "name" => $product_name,
        "price" => $product_price,
        "image" => $product_image,
        "quantity" => $quantity,
        "total_price" => $total_price
      );

      // Add the product to the database cart
      $user_id; // Replace this with the actual user ID when you have user authentication
      $query = "INSERT INTO cart (user_id, product_id, product_name, product_price, product_image, quantity, total_price) VALUES (?, ?, ?, ?, ?, ?, ?)";
      $stmt = $conn->prepare($query);
      $stmt->bind_param("iisdidi", $user_id, $product_id, $product_name, $product_price, $product_image, $quantity, $total_price);
      $stmt->execute();
      $stmt->close();
    }

    // Redirect to the "addtocart.php" page after adding the product to the cart
    header("Location: addtocart.php");
    exit();
  }
}





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



#cart-container {
      background-color: #fff;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
      padding: 20px;
      width: 80%;
      max-width: 800px;
      padding-top: 100px;
    }

    .cart-item {
      border: 1px solid #ddd;
      padding: 15px;
      margin-bottom: 15px;
      border-radius: 8px;
      display: flex;
      align-items: center;
    }

    .cart-item img {
      max-width: 120px;
      max-height: 120px;
      margin-right: 15px;
      border-radius: 8px;
    }

    .cart-item p {
      margin: 10px;
    }

    .cart-item-info {
      display: inline;
      flex-grow: 1;
      justify-content: space-between;
    }

    .remove-link {
      margin-left: auto;
      margin-top: 0px;
    }

    .total-amount {
      font-size: 18px;
      margin-top: 15px;
    }

    .empty-cart {
      text-align: center;
      color: #777;
    }

    .cart-item a {
      text-decoration: none;
      color: #007BFF;
      cursor: pointer;
      margin-left: 550px;
      top: 20px;
      margin-top: 0px;
    }

    .cart-item a:hover {
      color: #0056b3;
    }

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