<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "ecommerce";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

$query = "SELECT * FROM `orders` ORDER BY status ASC";
$result = $conn->query($query); // Change $db_con to $conn here
if ($result) {
    $row_count = $result->num_rows;
    $orders = [];
    while ($row = $result->fetch_assoc()) {
        $orders[] = $row;
    }
    $result->free_result();
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Handlee:wght@400&display=swap">

    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"></script>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Spartan:wght@100;200;300;400;500;600;700;800;900&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Spartan", sans-serif;
        }

        #logo a {
            text-decoration: none;
            color: #ffff;
            font-family: "Handlee", sans-serif;
            margin-left: -40px;
            margin-right: 100px;
        }

        #header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px 80px;
            background-color: #041e42;
            height: 90px;
            left: 0;
            flex-wrap: wrap;
            width: 100%;
        }

        .navbar {
            display: flex;
            align-items: center;
            justify-content: center;
            justify-content: space-around;
        }

        .navbar li {
            list-style: none;
            padding: 0 20px;
        }

        .navbar li a {
            text-decoration: none;
            font-size: 16px;
            font-weight: 600;
            color: white;
            top: 0px;
        }

        .navbar li a:hover {
            font-size: 17px;
        }

        ul li ul.dropdown li {
            display: block;
            color: black;
            margin-bottom: 15px;
            margin-top: 15 px;
        }

        ul li:hover ul.dropdown {
            display: block;
        }

        ul.dropdown a {
            color: black;
        }

        ul li ul.dropdown {
            width: 100%;
            background: white;
            position: absolute;
            z-index: 99;
            display: none;
            color: black;
            width: 100px;
            border-radius: 10px;
            border-left: none;
        }

        .search-container {
            display: flex;
            align-items: center;
        }

        .form input {
            display: flex;
            width: 300px;
            flex: 1;
            border-radius: 18px;
            height: 40px;
            width: 300px;
            margin-right: 30px;
            border: 0;
            outline: 0;
            font-size: 18px;
        }

        .search-btn {
            padding: 10px;
            margin-left: -25px;
            border-radius: 30px;
        }
    </style>
</head>

<body>
    <section id="header">
        <div class="head">
            <ul class="navbar">
                <h2 id="logo"><a href="index.php">EVARA</a></h2>
                <li>
                    <form action="chercher.php" method="GET" class="form">
                        <div class="search-container">
                            <label for="search_name"></label>
                            <input type="text" name="search_name" class="search" placeholder="Search by Name:"
                                value="<?php echo $search_name; ?>">
                            <button type="submit" class="search-btn">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="about.html">About us</a></li>
                <li><a href="contact.html">contact us</a></li>
                <li><a href="addtocart.php"><i class="fas fa-shopping-bag" style="color: white;"></i></a></li>
                <li><a href="profile.html"><i class="fas fa-user" style="color: #ffffff;"></i></a>
                    <ul class="dropdown">
                        <li><a href="profil.php">My Profil</a></li>
                        <li><a href="orders.php">My Orders</a></li>
                        <li><a href="logout">Log out</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </section>

    <section id="body">
        <br>
        <div class="title">
            <h1>Mes orders</h1>
            <h4></h4>
        </div>
        <div class="title">
            <h1>
                <?php
                if (!$orders) {
                    echo "Pas de orderss";
                }
                ?>
            </h1>
        </div>

        <table>
            <tr>
                <th>ordersID</th>
                <th>Produit</th>
                <th>NomProduit</th>
                <th>Nom Client</th>
                <th>Adresse</th>
                <th>CodePostal</th>
                <th>Téléphone</th>
                <th>Quantité</th>
                <th>Prix</th>
                <th>Date</th>
                <th>Status</th>
            </tr>
            <?php
            /*foreach ($orders as $order) {
                echo '<tr><td>' . $order['command_id'] . '</td>';

                $id = $order["product_id"];
$query = "SELECT * FROM products WHERE id = ? LIMIT 1";
$stmt = $conn->prepare($query);

if ($stmt) {
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();
    $stmt->close();
} else {
    echo "Error preparing statement: " . $conn->error;
}*/


                echo '<td><img width="80" src="' . $product["image_path"] . '"/></td>';
                echo '<td>' . $product['name'] . '</td>';
                echo '<td>' . $order['username'] . '</td>';
                echo '<td>' . $order['adress'] . '</td>';
                echo '<td>' . $order['code_postal'] . '</td>';
                echo '<td>' . $order['number_phone'] . '</td>';
                echo '<td>' . $order['quantity'] . '</td>';
                echo '<td>' . $order['total_amount'] . '$</td>';
                echo '<td>' . $order['date_of_delivering'] . '</td>';

                if ($order["status"] == "Completed") {
                    echo '<td>Livrée</td>';
                } else {
                    echo '<td>Non Livréé</td>';
                }

                echo '</tr>';
            
            ?>
        </table>

    </section>

</body>

</html>
