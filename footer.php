<?php
    require_once 'config.php';
    if (isset($_POST['news_submit'])){
	    $to = $_POST['newsletter_email'];
	    $subject = "Спасибо за подписку!";
	    $message = 'Вы подписались на новости. Спасибо!';

		if (mail($to,$subject,$message,$headers)) {
		    $dbh->prepare("UPDATE user SET newsletter=? WHERE id=?")->execute([$to, $_COOKIE['id']]);
		}
		else {
		    echo "ERROR";
		}
	}
	echo '<div class="footer-top-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="footer-about-us">
                        <h2><img src="https://nitshop.ru/wp-content/uploads/2020/12/LOGOTIP1min.png"></h2>
                        <p>Мы в социальных сетях</p>
                        <div class="footer-social">
                            <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Навигация </h2>
                        <ul>
                            <li><a href="index.php">Главная страница</a></li>';
        if ($_COOKIE['entitlement'] != 'user' and $_COOKIE['entitlement'] != null){
	        echo '<li><a href="panel.php">Админ панель</a></li>';
        }
        echo '<li><a href="shop.php">Магазин</a></li>
                            <li><a href="cart.php">Корзина</a></li>
                            <li><a href="aboutus.php">О нас</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Категории</h2>
                        <ul>
                            <li><a href="shop.php?category=Адаптеры">Адаптеры</a></li>
                            <li><a href="shop.php?category=Картриджи">Картриджи</a></li>
                            <li><a href="shop.php?category=Корпусы">Корпусы</a></li>
                            <li><a href="shop.php?category=Материнские платы">Материнские платы</a></li>
                            <li><a href="shop.php?category=Программное обеспечение">Программное обеспечение</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="footer-newsletter">
                        <h2 class="footer-wid-title">Новостная рассылка</h2>
                        <p>Подпишитесь на нашу рассылку новостей и получайте эксклюзивные предложения, которые вы больше нигде не найдете, прямо на свой почтовый ящик!</p>
                        <div class="newsletter-form">
                            <form method="post" action="">
                                <input type="email" name="newsletter_email" placeholder="Введите свой e-mail">
                                <input type="submit" name="news_submit" value="Подписаться">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer top area -->

    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="copyright">
                        <p>&copy; 2022 NIT</p>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer bottom area -->

    <script src="https://code.jquery.com/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.easing.1.3.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/script.js"></script>';
 ?>
