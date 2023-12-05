<?php

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "ecomerce";

$conn = new mysqli($servername, $username, $password, $dbname);
/*if(!$connected){
	header("Location: login.php");
  }*/
$id = @$_POST["id"];
$query = "SELECT * FROM products WHERE id = ? LIMIT 1";
$stmt = $db_con->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

$produit = $result->fetch_assoc();
$stmt->close();


if (isset($_POST["submit"])) {

    $nom = $_POST["nom"];
    $adress = $_POST["adress"];
    $codepostal = $_POST["codepostal"];
    $tel = $_POST["tel"];
    $quantite = intval($_POST["quant"]);
    $prix_total = intval($_POST["prixtotal"]);
    $liv = 1;
    $sql = "INSERT INTO `commandes` (nom, adress, codepostal, tel, quantite, prix_total, user_id, produit_id, livred) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $db_con->prepare($sql);
    $stmt->bind_param("ssssiiiii", $nom, $adress, $codepostal, $tel, $quantite, $prix_total, $_SESSION["client_id"], $_POST["produit_id"], $liv);
    if ($stmt->execute()) {
        header("Location: mescommandes.php");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
    $db_con->close();
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Commander</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        input,
        textarea {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #45D62E;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        @media (max-width: 600px) {
            .container {
                padding: 10px;
            }
        }
    </style>
</head>

<body><br><br>
    <div class="container">
        <h2>Commander</h2>
        <form enctype="multipart/form-data" action="" method="post">
            <label for="nom">Nom Complet :</label><br>
            <input required name="nom" type="text"><br>
            <label for="adress">Adress :</label><br>
            <input required name="adress" type="text"><br>
            <label for="adress">Code Postal :</label><br>
            <input required name="codepostal" type="text"><br>
            <label for="adress">Téléphone :</label><br>
            <input required name="tel" type="text"><br>
            <label for="adress">Quantité :</label><br>
            <input value="<?php echo $_POST["quantity"]; ?>" name="quant" type="number"><br>
            <label for="prix">Prix Total ($) :</label><br>
            <?php
            $quantitee = intval($_POST["quantity"]);
            $prix = intval($produit["price"]);
            $prix_total = $quantitee * $price;
            ?>
            <input value="<?php echo $prix_total ?>" name="prixtotal" type="text"><br>
            <input type="hidden" name="produit_id" value="<?php echo $produit["id"]; ?>">
            <input type="submit" name="submit" value="Commander">
        </form>
    </div>
</body>

</html>