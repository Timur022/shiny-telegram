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
    $us = $dbh->prepare("SELECT * FROM user WHERE id = ".$_COOKIE['id']);
    $us->execute();
    $user = $us->fetch(PDO::FETCH_ASSOC);
    $us_views = $user['last_view'];
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
        $active2 = '>';
        $active3 = ' class="active">';
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
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Товары</h2>
                        <?php
                        for ($i=0; $i < 4; $i++) {
                        ?>
                        <div class="thubmnail-recent">
                            <?php echo '<img src="img/' . $product[$i]['foto'] . '1.png" class="recent-thumb" alt="">'; ?>
                            <?php echo '<h2><a href="single-product.php?product=' . $product[$i]['name'] . '&foto=1">' . $product[$i]['name'] . '</a></h2>';?>
                            <div class="product-sidebar-price">
                                <?php echo '<ins>' . $product[$i]['price'] . ' руб.</ins>'; ?>
                            </div>                             
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <?php
                $us = $dbh->prepare("SELECT * FROM product WHERE name='". $_GET['product'] ."'");
                $us->execute();
                $single = $us->fetch(PDO::FETCH_ASSOC);
                $dbh->prepare("UPDATE product SET views=? WHERE id=?")->execute([$single['views']+1, $single['id']]);
                $data = $_POST;
                if(isset($data['submit'])) {
                    $dbh->prepare("INSERT INTO reviews (product, user, rate, message) VALUES (?, ?, ?, ?)")->execute([$single['id'], $_COOKIE['id'], $data['rating'], $data['review']]);
                    $us = $dbh->prepare("SELECT * FROM reviews WHERE product = ". $single['id']);
                    $us->execute();
                    $reviewssold = $us->fetchAll(PDO::FETCH_ASSOC);
                    $ratesr = 0;
                    if ($reviewssold[0]['id'] != null){
                        for ($j=0; $j < count($reviewssold); $j++) {
                            $ratesr = $ratesr + $reviewssold[$j]['rate'];
                        }
                        $ratesr = $ratesr/count($reviewssold);
                    }
                    $dbh->prepare("UPDATE product SET sr_rate=? WHERE id=?")->execute([$ratesr, $single['id']]);
                }
                elseif (isset($data['delete'])) {
                    $us = $dbh->prepare("SELECT * FROM reviews WHERE user = ". $_COOKIE['id'] . " AND product = ". $single['id']);
                    $us->execute();
                    $reviews = $us->fetch(PDO::FETCH_ASSOC);
                    $dbh->prepare("DELETE FROM reviews WHERE id=?")->execute([$reviews['id']]);
                    $us = $dbh->prepare("SELECT * FROM reviews WHERE product = ". $single['id']);
                    $us->execute();
                    $reviewssold = $us->fetchAll(PDO::FETCH_ASSOC);
                    $ratesr = 0;
                    if ($reviewssold[0]['id'] != null){
                        for ($j=0; $j < count($reviewssold); $j++) {
                            $ratesr = $ratesr + $reviewssold[$j]['rate'];
                        }
                        $ratesr = $ratesr/count($reviewssold);
                    }
                    $dbh->prepare("UPDATE product SET sr_rate=? WHERE id=?")->execute([$ratesr, $single['id']]);
                }
                ?>
                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="product-breadcroumb">
                            <a href="shop.php">Главная</a>
                            <?php echo '<a href="shop.php?category='.$single['category'].'">'. $single['category'] .'</a>'; ?>

                            <?php echo '<a href="">'. $single['name'] .'</a>'; ?>

                        </div>
                        
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="product-images">
                                    <div class="product-main-img tab-pane fade in active" id="1">
                                        <?php
                                        echo '<img src="img/'. $single['foto'] .'1.png" alt="">';?>
                                    </div>
                                    
                                    <div class="product-gallery">
                                        <?php
                                        echo '<img src="img/'. $single['foto'] .'1.png" alt="">';
                                        echo '<img src="img/'. $single['foto'] .'2.png" alt="">';
                                        echo '<img src="img/'. $single['foto'] .'3.png" alt="">';
                                        echo '<img src="img/'. $single['foto'] .'4.png" alt="">';
                                         ?>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="product-inner">
                                    <?php echo '<h2 class="product-name">' . $single['name'] . '</h2>';?>
                                    <div class="product-inner-price">
                                        <?php echo '<ins>' . $single['price'] . ' руб.</ins>';?>
                                    </div>    
                                    
                                    <form action="upd_cart.php" class="cart">
                                        <div class="quantity">
                                            <?php
                                            echo '<input type="hidden" value="'.$single['id'].'" name="product_id">';
                                            echo '<input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" max="'.$single['quantity'].'" step="1">';
                                            ?>
                                            <input type="hidden"value="1" name="cart">
                                        </div>
                                        <button class="add_to_cart_button" type="submit">В корзину</button>
                                    </form>   
                                    
                                    <div class="product-inner-category">
                                        <?php
                                        echo '<p>Категория: <a href="shop.php?category='.$single['category'].'">'. $single['category'] .'</a>. Тэги:';
                                        $tags = explode(' ', $single['tags']);
                                        for ($i=0; $i < count(explode(' ', $single['tags'])); $i++) {
                                            echo '<a href=""> '.$tags[$i].'</a>';
                                        }
                                        echo '. </p>';
                                         ?>
                                    </div> 
                                    
                                    <div role="tabpanel">
                                        <ul class="product-tab" role="tablist">
                                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Описание</a></li>
                                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Отзывы</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                <h2>Описание товара</h2>
                                                <?php
                                                echo '<p>'.$single['about'].'</p>'
                                                 ?>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="profile">
                                                <form action="" method="POST">
                                                    <h2>Отзыв</h2>
                                                    <div class="submit-review">
                                                        <?php
                                                        $us = $dbh->prepare("SELECT * FROM reviews WHERE user = ". $_COOKIE['id'] . " AND product = ". $single['id']);
                                                        $us->execute();
                                                        $reviews = $us->fetch(PDO::FETCH_ASSOC);
                                                        if ($reviews['id'] != null) {
                                                         ?>
                                                        <div class="rating-chooser">
                                                            <p>Ваша оценка</p>

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
                                                                <?php echo '<div class="rating__value">'.$reviews['rate'].'</div>'; ?>
                                                            </div>
                                                        </div>
                                                        <?php echo '<p><label for="review">Ваш отзыв</label></p>';
                                                        echo '<p>'.$reviews['message'].'</p>';
                                                        echo '<p><input type="submit" name="delete" value="Удалить"></p>';
                                                        }
                                                        elseif ($_COOKIE['id'] != null) {?>
                                                        <div class="rating-chooser">
                                                            <p>Ваша оценка</p>

                                                            <div class="rating rating_set">
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
                                                                echo '<div class="rating__value">'.$single['sr_rate'].'</div>';
                                                                ?>
                                                            </div>
                                                        </div>
                                                        <p><label for="review">Ваш отзыв</label> <textarea name="review" id="" cols="30" rows="10"></textarea></p>
                                                        <p><input type="submit" name="submit" value="Отправить"></p>
                                                        <?php
                                                        }
                                                        else {
                                                            ?>
                                                            <div class="rating-chooser">
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
                                                                echo '<div class="rating__value">'.$single['sr_rate'].'</div>';
                                                                ?>
                                                            </div>
                                                        </div>
                                                            <?php
                                                            echo '<p>Авторизуйтесь для добавления отзыва</p>';
                                                        }
                                                        ?>
                                                    </div>
                                                </form>
                                                <?php
                                                $us = $dbh->prepare("SELECT * FROM reviews WHERE product = ".$single['id']);
                                                $us->execute();
                                                $reviewsAll = $us->fetchAll(PDO::FETCH_ASSOC);
                                                for ($i=0; $i < count($reviewsAll); $i++) {
                                                    $us = $dbh->prepare("SELECT * FROM user WHERE id = ".$reviewsAll[$i]['user']);
                                                    $us->execute();
                                                    $userrew = $us->fetch(PDO::FETCH_ASSOC);
                                                 ?>
                                                <div>
                                                    <?php echo '<h2>'.$userrew['login'].'</h2>'; ?>
                                                    <div class="submit-review">
                                                        <div class="rating-chooser">
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
                                                                <?php echo '<div class="rating__value">'.$reviewsAll[$i]['rate'].'</div>'; ?>
                                                            </div>
                                                        </div>
                                                        <?php echo '<p><label for="review">Отзыв</label></p>';
                                                        echo '<p>'.$reviewsAll[$i]['message'].'</p>'; ?>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="related-products-wrapper">
                            <h2 class="related-products-title">Сопутствующие товары</h2>
                            <div class="related-products-carousel">
                                <?php
                                $us = $dbh->prepare("SELECT * FROM product WHERE category LIKE '%".$single['category']."%'");
                                $us->execute();
                                $prod_cat = $us->fetchAll(PDO::FETCH_ASSOC);
                                for ($i=0; $i < count($prod_cat); $i++) {
                                 ?>
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <?php echo '<img src="img/'.$prod_cat[$i]['foto'].'1.png" alt="">'; ?>
                                        <div class="product-hover">
                                            <?php echo '<a href="upd_cart.php?product_id='.$prod_cat[$i]['id'].'&quantity=1&cart=1" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> В корзину</a>'; ?>
                                            <?php echo '<a href="single-product.php?product=' . $prod_cat[$i]['name'] . '&foto=1" class="view-details-link"><i class="fa fa-link"></i> Подробнее</a>'; ?>
                                        </div>
                                    </div>

                                    <?php echo '<h2><a href="single-product.php?product=' . $prod_cat[$i]['name'] . '&foto=1">'.$prod_cat[$i]['name'].'</a></h2>'; ?>

                                    <div class="product-carousel-price">
                                        <?php echo '<ins>'.$prod_cat[$i]['price'].' руб.</ins>'; ?>
                                    </div> 
                                </div>
                            <?php } ?>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>


    <?php include 'footer.php'; ?>
  </body>
</html>