<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "ecommerce";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $item_id = $_GET['id'];

    // Delete item from the cart
    $delete_query = $conn->prepare("DELETE FROM cart WHERE id = ?");
    $delete_query->bind_param("i", $item_id);
    $delete_query->execute();
    $delete_query->close();
}

// Redirect back to the cart page
header("Location: addtocart.php");
exit();
?>
