<?php
    require_once 'config.php';
    $co = $dbh->prepare('SELECT * FROM "composition" WHERE "user"='.$_COOKIE['id']);
    $co->execute();
    $composition = $co->fetchAll(PDO::FETCH_ASSOC);
	echo '    <div class="site-branding-area">';
	echo '        <div class="container">';
	echo '            <div class="row">';
	echo '                <div class="col-sm-6">';
	echo '                    <div class="logo">';
	echo '                        <h1><a href="index.php"><img src="https://nitshop.ru/wp-content/uploads/2020/12/LOGOTIP1min.png"></a></h1>';
	echo '                    </div>';
	echo '                </div>';
	echo '                <div class="col-sm-6">';
	echo '                    <div class="shopping-item">';
	if ($composition[0]['amount'] != null) {
		$compsum = 0;
		for ($i=0; $i < count($composition); $i++) {
			$compsum = $compsum + $composition[$i]['amount'];
		}
		echo '                        <a href="cart.php">Корзина - <span class="cart-amunt">' . $compsum . ' руб.</span> <i class="fa fa-shopping-cart"></i> <span class="product-count">' . count($composition) . '</span></a>';
	}
	else{
		echo '                        <a href="cart.php">Корзина - <span class="cart-amunt">0 руб.</span> <i class="fa fa-shopping-cart"></i> <span class="product-count">' . count($composition) . '</span></a>';
	}
	echo '                    </div>';
	echo '                </div>';
	echo '            </div>';
	echo '        </div>';
	echo '    </div>';
 ?>
