<?php include 'header.php' ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <head>
        <title>Webshop</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
</head>
<body>
<?php

try {
    $db = "mysql:host=localhost;dbname=wideworldimporters;port=3306";
    $username = 'root';
    $password = '';
    $pdo = new PDO($db, $username, $password);

} catch (PDOException $e) {
    print("Error!: " . $e->getMessage());
}
$categorie = filter_input(INPUT_GET, 'categorie', FILTER_SANITIZE_STRING);
?>
<h3>Je gekozen categorie is <?php print($categorie); ?></h3> <br>

<?php
$sql = "SELECT * FROM stockitems WHERE StockItemID IN (SELECT StockItemID FROM stockitemstockgroups WHERE StockGroupID = (SELECT StockGroupID from stockgroups WHERE StockGroupName = ?))";
$producten = $pdo->prepare($sql);
$producten->execute([$categorie]);
if ($producten->rowCount() > 0) {


    while ($rij = $producten->fetch()) {
        $naam = $rij["StockItemName"];
        $prijs = $rij["RecommendedRetailPrice"];
        $id = $rij["StockItemID"];
        ?>
        <div class="card" style="width: 18rem; height: 22rem; float: left; margin: 10px;">
        <div class="card-body">
            <h6 class="card-title"><?php print($naam . " " . "&euro;" . $prijs); ?></h6>
                <img class="img-fluid" src="img/rpg.jpg" />
            <form method="get" action="productpagina.php"><button type="submit" value="<?php print($id)?>" name="Id">Toevoegen aan winkelwagen</button></form>
        </div>
        </div>
        <?php

    }
} else {
    print("geen resultaten");
}
?> <br>

</body>

</html>
