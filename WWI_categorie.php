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
    <div style="background-color: whitesmoke; max-width: 200px; float: right;">Categorie: <?php print($categorie); ?></div>
    <br>
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
            <div class="card" style="width: 25rem; height: 27rem; float: left;margin: 63px; background-color: greenyellow;">
                <div class="card-body">
                    <h5 class="card-title" style="height: 4rem;"><?php print($naam . " " . "&euro;" . $prijs); ?></h5>
                    <img class="img-fluid" src="Afbeeldingen/milkaoreo.jpg" style="width: 20rem; length: 13rem; margin-top: 3rem; margin-bottom: 4rem; margin-left: 1.5rem;">
                    <form method="get" action="productpagina.php"><button type="submit" value="<?php print($id) ?>" name="Id">Lees meer!</button></form>
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
