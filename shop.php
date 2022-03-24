<?php
    try {
        $dbh = new PDO('mysql:host=127.0.0.1:3307;dbname=nit', 'root', '');
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage();
        die();
    }
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
                    $pr = $dbh->prepare('SELECT * FROM product WHERE name LIKE "%'.$_GET['search'].'%"');
                    $pr->execute();
                    $product = $pr->fetchAll(PDO::FETCH_ASSOC);
                }
                elseif ($_GET['category'] != null) {
                    $pr = $dbh->prepare('SELECT * FROM product WHERE category="'.$_GET['category'].'"');
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
                for ($j=0; $j < ceil(count($product)/12); $j++) {
                    echo '<div class="row rowids" id="'.strval($j+1).'">';
                    for ($i=0; $i < 12; $i++) {
                        if ($product[$i]['foto'] != null) {
                        echo '<div class="col-md-3 col-sm-6">';
                     ?>
                        <div class="single-shop-product">
                            <div class="product-upper">
                                <?php echo '<img src="img/' . $product[$i]['foto'] . '1.png" alt="">'; ?>
                            </div>
                            <?php echo '<h2><a href="single-product.php?product=' . $product[$i]['name'] . '&foto=1">' . $product[$i]['name'] . '</a></h2>';?>
                            <div class="product-carousel-price">
                                <?php echo '<ins>' . $product[$i]['price'] . ' руб.</ins>'; ?>
                            </div>

                            <div class="product-option-shop">
                                <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="/canvas/shop/?add-to-cart=70">В корзину</a>
                            </div>
                        </div>
                    </div>
                <?php }}}?>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="product-pagination text-center">
                        <nav>
                          <ul class="pagination">
                            <script>
                                var li = 1;
                            </script>
                            <li>
                                <a href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                              </a>
                            </li>
                            <?php
                            for ($i=0; $i < ceil(count($product)/12); $i++) {
                                echo '<li><a href="#'.strval($i+1).'" onclick="function() {
                                    document.getElementsByClassName(\'rowids\').hidden = true;
                                    document.getElementById(\''.strval($i+1).'\').hidden = false;
                                    li='.strval($i+1).'
                                }">'.strval($i+1).'</a></li>';
                            } ?>
                            <li>
                              <a href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                              </a>
                            </li>
                          </ul>
                        </nav>                        
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php include 'footer.php'; ?>
  </body>
</html>