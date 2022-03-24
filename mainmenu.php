<?php
	try {
        $dbh = new PDO('mysql:host=127.0.0.1:3307;dbname=nit', 'root', '');
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage();
        die();
    }
    $co = $dbh->prepare("SELECT * FROM product");
    $co->execute();
    $product = $co->fetchAll(PDO::FETCH_ASSOC);
	echo '<div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Переключение навигации</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li'. $active1 .'<a href="index.php">Главная</a></li>
                        <li'. $active2 .'<a href="shop.php">Магазин</a></li>
                        <li'. $active3 .'<a href="single-product.php?product='.$product[rand(0, count($product))]['name'].'&foto=1">Товар</a></li>
                        <li'. $active4 .'<a href="cart.php">Корзина</a></li>
                        <li'. $active5 .'<a href="checkout.php">Доставка</a></li>
                        <li'. $active6 .'<a href="aboutus.php">О нас</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>';
 ?>