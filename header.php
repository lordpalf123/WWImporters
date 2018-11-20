<!DOCTYPE html>

<?php
$db = "mysql:host=localhost;dbname=wideworldimporters;port=3306";
$user = "root";
$pass = "";
$pdo = new PDO($db, $user, $pass);
$query = "SELECT StockGroupName FROM Stockgroups";
$stmt = $pdo->prepare($query);
$stmt->execute();
?>
<html>
<head>
    <title>Webshop</title>

    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js" integrity="sha384-pjaaA8dDz/5BgdFUPX6M/9SUZv4d12SUPF0axWc+VRZkx5xU3daN+lYb49+Ax+Tl" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="homepagina.php">Hoofdpagina<span class="sr-only">(current)</span></a>
            </li>

                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Categorien
                </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php while ($row = $stmt->fetch()) {
                            $categorie = $row["StockGroupName"];
                            print("<a class='dropdown-item' name='product' href='WWI_categorie.php?categorie=".$categorie."'>" . $categorie . "</a>");
                        } ?>
                    </div>
            </li>
                <div>
                <a href="cart.php" class="btn btn-cart btn-lg test" >
                    <span class="glyphicon glyphicon-shopping-cart"></span>
                </a>
                </div>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-1" type="search" placeholder="Zoeken..." aria-label="Zoeken">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Zoeken</button>
        </form>
    </div>
</nav>