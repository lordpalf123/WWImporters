<?php include 'header.php' ?>

<?php
$dsn = 'mysql:dbname=wideworldimporters;host=127.0.0.1';
$user = 'root';
$password = '';

$pdo = new PDO($dsn, $user, $password);
$id = $_GET['Id'];
$sql = 'SELECT * FROM stockitems WHERE StockItemID = ?';
$stmt = $pdo->prepare($sql);
$stmt->execute(array($id));
 while($row = $stmt->fetch()) {
    $naam = $row["StockItemName"];
    $prijs = $row["RecommendedRetailPrice"];
}
?>


    <div class="container">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="homepagina.php">Hoofdpagina</a></li>
                        <li class="breadcrumb-item"><a href="WWI_categorie.php">Categorieën</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Product</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <!-- Image -->
            <div class="col-12 col-lg-6">
                <div class="card bg-light mb-3">
                    <div class="card-body">
                            <img class="img-fluid" src="img/rpg.jpg" />
                            <h4 class="text-center"></h4>
                    </div>
                </div>
            </div>

            <!-- Add to cart -->
            <div class="col-12 col-lg-6 add_to_cart_block">
                <div class="card bg-light mb-3">
                    <div class="card-body">
                        <p name="productName" value="<?php echo $naam;?>">
                        <p class="price">&euro; <?php echo $prijs;?></p>
                        <form method="post" action="cart.php">
                            <div class="form-group">
                            </div>
                            <div class="form-group">
                                <label>Aantal :</label>
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control" step="1" id="quantity" name="quantity" min="1" max="100" value="1">
                                </div>
                            </div>
                        </form>
                            <button href="cart.php" type="submit" class="btn btn-success btn-lg btn-block text-uppercase">Toevoegen</button>
                        </form>
                        <div class="product_rassurance">
                            <ul class="list-inline">
                                <li class="list-inline-item"><i class="fa fa-truck fa-2x"></i><br/>Snelle bezorging</li>
                                <li class="list-inline-item"><i class="fa fa-credit-card fa-2x"></i><br/>Veilig betalen</li>
                                <li class="list-inline-item"><i class="fa fa-phone fa-2x"></i><br/>+31 6 30 93 21 18</li>
                            </ul>
                        </div>
                        <div class="reviews_product p-3 mb-2 ">
                            3 reviews
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            (4/5)
                            <a class="pull-right" href="#reviews">Bekijk alle reviews</a>
                        </div>
                        <div class="datasheet p-3 mb-2 bg-info text-white">
                            <a href="" class="text-white"><i class="fa fa-file-text"></i> Download DataSheet</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Description -->
            <div class="col-12">
                <div class="card border-light mb-3">
                    <div class="card-header bg-primary text-white text-uppercase"><i class="fa fa-align-justify"></i> Description</div>
                    <div class="card-body">
                        <p class="card-text">
                        Een raketwerper RPG 3, top kwaliteit en beschikbaar van meerdere productielanden.
                        </p>
                        <p class="card-text">
                            Beste van de markt en ook betaalbaar.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Reviews -->
            <div class="col-12" id="reviews">
                <div class="card border-light mb-3">
                    <div class="card-header bg-primary text-white text-uppercase"><i class="fa fa-comment"></i> Reviews</div>
                    <div class="card-body">
                        <div class="review">
                            <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                            <meta itemprop="datePublished" content="01-01-2016">January 01, 2018

                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            door Frank Steen
                            <p class="blockquote">
                            <p class="mb-0">Mooi als je een daggie op pad gaat met de kids om op wilde asielzoekers te jagen, aardig zwaar ding, en de munitie vervangen kost te veel tijd waardoor je niet alles afruimt. </p>
                            <hr>
                        </div>
                        <div class="review">
                            <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                            <meta itemprop="datePublished" content="01-01-2016">January 01, 2018

                            <span class="fa fa-star" aria-hidden="true"></span>
                            <span class="fa fa-star" aria-hidden="true"></span>
                            <span class="fa fa-star" aria-hidden="true"></span>
                            <span class="fa fa-star" aria-hidden="true"></span>
                            <span class="fa fa-star" aria-hidden="true"></span>
                            door Erik-Jan Pietersen
                            <p class="blockquote">
                            <p class="mb-0">Prima ding, niet van dichtbij afvuren, kan gevaarlijk zijn. Functioneert verder goed, is zeer effectief tegen allochtonen van alle soorten. Blij mee</p>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php include 'footer.php' ?>