<?php include 'header.php' ?>




<?php
$totalprice = $_POST['price'] * $_POST['quantity'];


?>

<html>
<body>


<section class="jumbotron text-center">
    <div class="container">
        <h3 class="jumbotron-heading">Winkelmand</h3>
    </div>
</section>
<section>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card bg-light mb-3">
                    <div class="card-body">
                        <div class="product-container">
                            <div class="col-6 col-lg-3">
                                <img class="img-fluid" src="img/rpg.jpg" />
                            </div>
                            </div>
                        <div class="container-product">
                            <div class="col-6 col-lg-4"
                            <span class="product-title"><?php echo $_POST['productName'] ?> </span>
                            <span class="product-price"> <?php echo $_POST['price']?></span>
                            <span class="product-price"> <?php echo 'x' . $_POST['quantity']?></span>
                        </div>
                        <div class="button-container">
                            <span class="product-totaal">Totaal: &euro; <?php echo $totalprice; ?></span>
                            <button class="btn product-button">Afrekenen</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</body>
</html>
<?php include 'footer.php' ?>
