<?php
    session_start();
    try {
        $dbh = new PDO('mysql:host=127.0.0.1:3307;dbname=nit', 'root', '');
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage();
        die();
    }
    $us = $dbh->prepare("SELECT * FROM product ORDER BY id DESC");
    $us->execute();
    $product = $us->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>НИТ</title>
    
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">
  </head>
  <body>
   
    <?php
    include 'header.php';
    include 'branding.php';
    $active1 = ' class="active">';
    $active2 = '>';
    $active3 = '>';
    $active4 = '>';
    $active5 = '>';
    $active6 = '>';
    include 'mainmenu.php'; ?>
    <div class="bgr">
        <div class="container">
            <img src="img/Z490_SOAR_space_web-banner_16_1330x350px.jpg">
            <h2 class="section-title"><b>GIGABYTE представляет материнские платы AORUS Z490-серии</b></h2>
            <h3 class="section-title">Цифровой модуль питания процессоров Intel® Core™ 10-поколения, до 16 фаз питания/до 90 А на фазу, прогрессивная система нового поколения для охлаждения ключевых компонентов</h3>
        </div>
    </div>
    <div class="promo-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo">
                        <i class="fa fa-refresh"></i>
                        <p>30 Дней возврата</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo">
                        <i class="fa fa-truck"></i>
                        <p>Бесплатная доставка</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo">
                        <i class="fa fa-lock"></i>
                        <p>Безопасные платежи</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo">
                        <i class="fa fa-gift"></i>
                        <p>Новые продукты</p>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End promo area -->
    
    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title">Последние продукты</h2>
                        <div class="product-carousel">
                            <?php
                            for ($i=0; $i < 6; $i++) {
                                if ($product[$i]['name'] != null) {
                                     ?>
                                    <div class="single-product">
                                        <div class="product-f-image">
                                            <?php echo '<img src="img/' . $product[$i]['foto'] . '1.png" alt="">'; ?>
                                            <div class="product-hover">
                                                <?php
                                                echo '<a href="upd_cart.php?product_id='.$product[$i]['id'].'&quantity=1&cart=1" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> В корзину</a>';
                                                 ?>

                                            </div>
                                        </div>

                                        <?php echo '<h2><a href="single-product.php?product=' . $product[$i]['name'] . '&foto=1">' . $product[$i]['name'] . '</a></h2>';?>

                                        <div class="product-carousel-price">
                                            <?php echo '<ins>' . $product[$i]['price'] . ' руб.</ins>'; ?>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                             ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End main content area -->
    
    <div class="brands-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="brand-wrapper">
                        <h2 class="section-title">Бренды</h2>
                        <div class="brand-list">
                            <?php
                            $br = $dbh->prepare("SELECT * FROM brand");
                            $br->execute();
                            $brands = $br->fetchAll(PDO::FETCH_ASSOC);
                            for ($i=0; $i < count($brands); $i++) {
                                if ($brands[$i]['logo'] != null){
                                    echo '<img src="img/' . $brands[$i]['logo'] . '.jpg" alt="">';
                                }
                            }
                             ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End brands area -->

    <div class="product-widget-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">Топ продаж</h2>
                        <a href="shop.php?sort=top" class="wid-view-more">Смотреть всё</a>
                        <?php
                            $br = $dbh->prepare("SELECT * FROM product ORDER BY sold DESC");
                            $br->execute();
                            $soldpro = $br->fetchAll(PDO::FETCH_ASSOC);
                            for ($i=0; $i < 3; $i++) {?>
                        <div class="single-wid-product">
                            <?php
                            echo '<a href="single-product.php?product='.$soldpro[$i]['name'].'&foto=1"><img src="img/'.$soldpro[$i]['foto'].'1.png" alt="" class="product-thumb"></a>';
                            echo '<h2><a href="single-product.php?product='.$soldpro[$i]['name'].'">'.$soldpro[$i]['name'].'</a></h2>';
                            ?>
                            <div class="rating">
                                <div class="rating__body">
                                    <div class="rating__active"></div>
                                    <div class="rating__items">
                                        <input type="radio" class="rating__item" value="1" name="rating">
                                        <input type="radio" class="rating__item" value="2" name="rating">
                                        <input type="radio" class="rating__item" value="3" name="rating">
                                        <input type="radio" class="rating__item" value="4" name="rating">
                                        <input type="radio" class="rating__item" value="5" name="rating">
                                    </div>
                                </div>
                                <?php
                                echo '<div class="rating__value">'.$soldpro[$i]['sr_rate'].'</div>';
                                ?>
                            </div>
                            <div class="product-wid-price">
                                <?php echo '<ins>'.$soldpro[$i]['price'].' руб.</ins>'; ?>
                            </div>                            
                        </div>
                    <?php } ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">Новое</h2>
                        <a href="shop.php?sort=new" class="wid-view-more">Смотреть всё</a>
                        <?php
                            for ($i=0; $i < 3; $i++) {?>
                        <div class="single-wid-product">
                            <?php
                            echo '<a href="single-product.php?product='.$product[$i]['name'].'&foto=1"><img src="img/'.$product[$i]['foto'].'1.png" alt="" class="product-thumb"></a>';
                            echo '<h2><a href="single-product.php?product='.$product[$i]['name'].'">'.$product[$i]['name'].'</a></h2>';
                            ?>
                            <div class="rating">
                                <div class="rating__body">
                                    <div class="rating__active"></div>
                                    <div class="rating__items">
                                        <input type="radio" class="rating__item" value="1" name="rating">
                                        <input type="radio" class="rating__item" value="2" name="rating">
                                        <input type="radio" class="rating__item" value="3" name="rating">
                                        <input type="radio" class="rating__item" value="4" name="rating">
                                        <input type="radio" class="rating__item" value="5" name="rating">
                                    </div>
                                </div>
                                <?php
                                echo '<div class="rating__value">'.$product[$i]['sr_rate'].'</div>';
                                ?>
                            </div>
                            <div class="product-wid-price">
                                <?php echo '<ins>'.$product[$i]['price'].' руб.</ins>'; ?>
                            </div>
                        </div>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End product widget area -->
    

    <?php include 'footer.php'; ?>
  </body>
</html>