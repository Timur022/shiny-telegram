<?php
    require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>НИТ</title>
    
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">

  </head>
  <body>
   
    <?php
        include 'header.php';
        include 'branding.php';
        $active1 = '>';
        $active2 = ' class="active">';
        $active3 = '>';
        $active4 = '>';
        $active5 = '>';
        $active6 = '>';
        include 'mainmenu.php'; ?>
    
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Магазин</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="single-sidebar">
            <h2 class="sidebar-title" style="margin: 0px 20px 20px 20px;">Поиск товаров</h2>
            <form action="">
                <input type="text" name="search" placeholder="Поиск товаров..." style="margin: 0px 20px 20px 20px;">
                <input type="submit" value="Поиск" style="margin: 0px 0px 20px 20px;">
            </form>
        </div>
        <div class="container">
            <?php
                if ($_GET['search'] != null){
                    $pr = $dbh->prepare("SELECT * FROM product WHERE name LIKE '%".$_GET['search']."%'");
                    $pr->execute();
                    $product = $pr->fetchAll(PDO::FETCH_ASSOC);
                }
                elseif ($_GET['category'] != null) {
                    $pr = $dbh->prepare("SELECT * FROM product WHERE category = '".$_GET['category']."'");
                    $pr->execute();
                    $product = $pr->fetchAll(PDO::FETCH_ASSOC);
                }
                elseif ($_GET['sort'] == 'top') {
                    $pr = $dbh->prepare('SELECT * FROM product ORDER BY sold');
                    $pr->execute();
                    $product = $pr->fetchAll(PDO::FETCH_ASSOC);
                }
                elseif ($_GET['sort'] == 'new') {
                    $us = $dbh->prepare("SELECT * FROM product ORDER BY id DESC");
                    $us->execute();
                    $product = $us->fetchAll(PDO::FETCH_ASSOC);
                }
                else{
                    $pr = $dbh->prepare("SELECT * FROM product");
                    $pr->execute();
                    $product = $pr->fetchAll(PDO::FETCH_ASSOC);
                }
                $arr_prod = [];
                for ($i=0; $i < count($product); $i++) {
                    $arr_prod[] = $i+1;
                }
                $arr_ch = array_chunk($arr_prod, 12);
                for ($j=0; $j < count($product); $j++) {
                    if ($product[$j]['foto'] != null) {
                    echo '<div class="col-md-3 col-sm-6">';
                     ?>
                    <div class="single-shop-product">
                        <div class="product-upper">
                            <?php echo '<img src="img/' . $product[$j]['foto'] . '1.png" alt="">'; ?>
                        </div>
                        <?php echo '<h2><a href="single-product.php?product=' . $product[$j]['name'] . '&foto=1">' . $product[$j]['name'] . '</a></h2>';?>
                        <div class="product-carousel-price">
                            <?php echo '<ins>' . $product[$j]['price'] . ' руб.</ins>'; ?>
                        </div>

                        <div class="product-option-shop">
                            <?php echo '<a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="upd_cart.php?product_id='.$product[$j]['id'].'&quantity=1&cart=1">В корзину</a>';?>
                        </div>
                    </div>
                <?php
                    }
                echo("</div>");
                }?>
            </div>
        </div>
    </div>


    <?php include 'footer.php'; ?>
  </body>
</html>
