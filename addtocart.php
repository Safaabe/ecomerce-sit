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

$cart_query = $conn->query("SELECT * FROM cart");
$cart_data = $cart_query->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Add your head content here -->
    <title>Shopping Cart</title>
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"></script>
</head>
<style>
    body {
    font-family: Arial, sans-serif;
}

#products {
    display: flex;
    flex-wrap: wrap;
    margin: 20px;
}

.container {
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 20px;
    width: 200px;
    margin: 10px;
}

.imag img {
    width: 100%;
    height: auto;
}

.des {
    text-align: center;
}

#trash {
    position: absolute;
    top: 10px;
    right: 10px;
    cursor: pointer;
}
    
</style>
<body>




<table>
    <thead>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $total_amount = 0;

        foreach ($cart_data as $cart_item) {
            $subtotal = $cart_item['price'] * $cart_item['quantity'];
            $total_amount += $subtotal;
         ?> 
          <tr>
            <td>
                <div class="container">
                    <div class="imag">
                        <img src='<?php echo $cart_item['image']; ?>' alt='<?php echo $cart_item['name']; ?>' id='imag'>
                    </div>
                    <div class="des">
                        <h3><?php echo $cart_item['name']; ?></h3>
                    </div>
                    <a href='delete.php?id=<?php echo $cart_item['id']; ?>'><i class='far fa-trash-alt' id='trash'></i></a>
                </div>
            </td>
            <td>$<?php echo $cart_item['price']; ?></td>
            <td><?php echo $cart_item['quantity']; ?></td>
            <td><a href='delete.php?id=<?php echo $cart_item['id']; ?>'>Remove</a></td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<p>Total Amount: <?php echo $total_amount; ?></p>

<!-- Add additional content or buttons here -->

</body>
</html>