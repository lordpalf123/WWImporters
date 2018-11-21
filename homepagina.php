<?php include 'header.php' ?>
<?php include 'footer.php' ?>
<?php
$maxquery = "SELECT max(StockItemID)FROM stockitems";
$minquery = "SELECT min(StockItemID)FROM stockitems";
$maxexe = $pdo->prepare($maxquery);
$maxexe->execute();
while ($row = $maxexe->fetch()) {
    $maxid = $row["max(StockItemID)"];
}
$minexe = $pdo->prepare($minquery);
$minexe->execute();
while ($row = $minexe->fetch()) {
    $minid = $row["min(StockItemID)"];
}
$randomproductid = rand($minid, $maxid);
$randomproductid2 = rand($minid, $maxid);
$r1query = "SELECT StockItemName, RecommendedRetailPrice FROM stockitems WHERE StockItemID = ?";
$r2query = "SELECT StockItemName, RecommendedRetailPrice FROM stockitems WHERE StockItemID = ?";

$r1exe = $pdo->prepare($r1query);
$r1exe->execute(array($randomproductid));
while ($row = $r1exe->fetch()) {
    $Randomnaam1 = $row["StockItemName"];
    $Randomprijs1 = $row["RecommendedRetailPrice"];
}

$r2exe = $pdo->prepare($r2query);
$r2exe->execute(array($randomproductid2));
while ($row = $r2exe->fetch()) {
    $Randomnaam2 = $row["StockItemName"];
    $Randomprijs2 = $row["RecommendedRetailPrice"];
}
?>
<!DOCTYPE html>
<html>
    <head>
        <style>
            body {
                background-image: url("Afbeeldingen/chocoladeschap.jpg");
            }
        </style>
        <meta name="viewport" content="width=device-width, initial-scale=1">

    </head>
    <body>
        <div class="card" style=" background-color: red; width: 40rem; height: 42rem; float: left;margin-left: 250px; margin-top: 125px;">
            <div class="card-body">
                <img src="Afbeeldingen/usbstick-hout.webp" class="img-fluid" style="background-color: blue; width: 40rem; height: 30rem;">
                <h5 class="card-title"> <?php print($Randomnaam1); ?></h5>
                <h5 class="card-title"> <?php print($Randomprijs1); ?></h5>
                <form method="get" action="productpagina.php"><button type="submit" value="<?php print($randomproductid) ?>" name="Id">Lees meer!</button></form>
            </div>
        </div>
        <div class="card" style="background-color: blue;width: 40rem; height: 42rem; float: left;margin-left: 250px; margin-top: 125px;">
            <div class="card-body">
                <img src="Afbeeldingen/usbstick-controller.webp" class="img-fluid" style="background-color: blue; width: 40rem; height: 30rem;">
                <h5 class="card-title"> <?php print($Randomnaam2); ?></h5>
                <h5 class="card-title"> <?php print($Randomprijs2); ?></h5>
                <form method="get" action="productpagina.php"><button type="submit" value="<?php print($randomproductid2) ?>" name="Id">Lees meer!</button></form>
            </div>
        </div>

    </body>
</html>

