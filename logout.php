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
    $active2 = '>';
    $active3 = '>';
    $active4 = '>';
    $active5 = '>';
    $active6 = '>';
    include 'mainmenu.php'; ?>
    <?php
      setcookie('id', null, '-1');
      setcookie('user', null, '-1');
      setcookie('email', null, '-1');
      setcookie('entitlement', null, '-1');
      header('Location: index.php');
      exit();
    ?>

    <?php include 'footer.php'; ?>
  </body>
</html>