<?php
	echo '<div class="header-area">';
    echo '    <div class="container">';
    echo '        <div class="row">';
    echo '            <div class="col-md-8">';
    echo '                <div class="user-menu">';
    if ($_COOKIE['id'] != null) {
		echo '                    <a href="logout.php"><i class="fa fa-user"></i> Выход</a>';
	}
	else{
	    echo '                    <a href="login.php"><i class="fa fa-user"></i> Вход</a>';
	    echo '                    <a href="signup.php"><i class="fa fa-user"></i> Регистрация</a>';
	}
    echo '                </div>';
    echo '            </div>';
    echo '            <div class="col-md-4">';
    echo '                <div class="header-right">';
    echo '                </div>';
    echo '            </div>';
    echo '        </div>';
    echo '    </div>';
    echo '</div>';
 ?>