<!DOCTYPE html>
    <head>
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<title>Регистрация</title>
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
        <?php
            require_once 'config.php';
         ?>
    </head>
    <body>
    	<?php
        include 'header.php';
        include 'branding.php';
        $active1 = '>';
        $active2 = '>';
        $active3 = '>';
        $active4 = '>';
        $active5 = '>';
        $active6 = '>';
        include 'mainmenu.php'; ?>
    	<div class="container mt-4">
    		<div class="row">
    			<div class="col">
    			    <!-- Форма регистрации -->
    				<h2>Форма регистрации</h2>
    				<form action="signup.php" method="post">
    					<input type="text" class="form-control" name="login" id="login" placeholder="Введите логин"><br>
    					<input type="email" class="form-control" name="email" id="email" placeholder="Введите Email"><br>
    					<input type="password" class="form-control" name="password" id="password" placeholder="Введите пароль"><br>
    					<input type="password" class="form-control" name="password_2" id="password_2" placeholder="Повторите пароль"><br>
    					<button class="btn btn-success" name="do_signup" type="submit">Зарегистрировать</button>
    				</form>
    				<br>
    				<p>Если вы зарегистрированы, тогда нажмите <a href="login.php">здесь</a>.</p>
                    <?php
                        $data = $_POST;
                        if(isset($data['do_signup'])) {

                                // Регистрируем
                                // Создаем массив для сбора ошибок
                            $errors = array();

                            // Проводим проверки
                                // trim — удаляет пробелы (или другие символы) из начала и конца строки
                            if(trim($data['login']) == '') {

                                $errors[] = "Введите логин!";
                            }

                            if(trim($data['email']) == '') {

                                $errors[] = "Введите Email";
                            }

                            if($data['password'] == '') {

                                $errors[] = "Введите пароль";
                            }

                            if($data['password_2'] != $data['password']) {

                                $errors[] = "Повторный пароль введен не верно!";
                            }
                                 // функция strlen - получает длину строки
                                // Если логин будет меньше 5 символов и больше 90, то выйдет ошибка
                            if(strlen($data['login']) < 5 || strlen($data['login']) > 90) {

                                $errors[] = "Недопустимая длина логина";

                            }

                            if (strlen($data['password']) < 8 || strlen($data['password']) > 90){

                                $errors[] = "Недопустимая длина пароля (от 8 символов)";

                            }

                            // проверка на правильность написания Email
                            if (!preg_match("/[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,3}/i", $data['email'])) {

                                $errors[] = 'Неверно введен е-mail';

                            }

                            // Проверка на уникальность логина

                            if($dbh->query("SELECT login FROM \"user\" WHERE login='" . $data['login'] . "'")->rowCount() > 0) {

                                $errors[] = "Пользователь с таким логином существует!";
                            }

                            // Проверка на уникальность email

                            if($dbh->query("SELECT email FROM \"user\" WHERE email='" . $data['email'] . "'")->rowCount() > 0) {

                                $errors[] = "Пользователь с таким Email существует!";
                            }


                            if(empty($errors)) {

                                $dbh->prepare("INSERT INTO \"user\" (login, email, hash, entitlement) VALUES (?, ?, ?, ?)")->execute([$data['login'], $data['email'], md5($data['password']), 'user']);

                                echo '<div style="color: green; ">Вы успешно зарегистрированы! Можно <a href="login.php">авторизоваться</a>.</div><hr>';

                            } else {
                                echo '<div style="color: red; ">' . array_shift($errors). '</div><hr>';
                            }
                        }
                     ?>
    			</div>
    		</div>
    	</div>

        <?php include 'footer.php'; ?>
    </body>
</html>
