<?php
    require_once 'config.php';
    $data = $_POST;

    // Пользователь нажимает на кнопку "Авторизоваться" и код начинает выполняться
    if(isset($data['do_login'])) {

     // Создаем массив для сбора ошибок
     $errors = array();

     // Проводим поиск пользователей в таблице users
     $us = $dbh->prepare("SELECT * FROM \"user\" WHERE login = '". $data['login'] . "'");
     $us->execute();
     $user = $us->fetch(PDO::FETCH_ASSOC);
     if($user) {

        // Если логин существует, тогда проверяем пароль
        if(md5($data['password']) == $user['hash']) {

            // Все верно, пускаем пользователя
            setcookie('id', $user['id'], strtotime('+30 days'));
            setcookie('user', $user['login'], strtotime('+30 days'));
            setcookie('email', $user['email'], strtotime('+30 days'));
            setcookie('entitlement', $user['entitlement'], strtotime('+30 days'));

            // Редирект на главную страницу
            header('Location: index.php');
            exit();

        } else {

        $errors[] = 'Пароль неверно введен!';

        }

     } else {
        $errors[] = 'Пользователь с таким логином не найден!';
     }

    if(!empty($errors)) {

            echo '<div style="color: red; ">' . array_shift($errors). '</div><hr>';

        }

    }
?>
<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Вход</title>
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
        $active2 = '>';
        $active3 = '>';
        $active4 = '>';
        $active5 = '>';
        $active6 = '>';
        include 'mainmenu.php'; ?>

        <div class="container mt-4">
            <div class="row">
                <div class="col">
                    <!-- Форма авторизации -->
                    <h2>Форма авторизации</h2>
                    <form action="login.php" method="post">
                        <input type="text" class="form-control" name="login" id="login" placeholder="Введите логин" required><br>
                        <input type="password" class="form-control" name="password" id="pass" placeholder="Введите пароль" required><br>
                        <button class="btn btn-success" name="do_login" type="submit">Авторизоваться</button>
                    </form>
                    <br>
                    <p>Если вы еще не зарегистрированы, тогда нажмите <a href="signup.php">здесь</a>.</p>
                </div>
            </div>
        </div>

        <?php include 'footer.php'; ?>
    </body>
</html>
