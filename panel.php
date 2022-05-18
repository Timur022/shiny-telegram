<?php
    session_start();
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
    $active2 = '>';
    $active3 = '>';
    $active4 = '>';
    $active5 = '>';
    $active6 = '>';
    include 'mainmenu.php';

    $us = $dbh->prepare("SELECT * FROM brand");
    $us->execute();
    $brand = $us->fetchAll(PDO::FETCH_ASSOC);?>

    <div class="maincontent-area">
      <div class="container" style="margin: 50px;">
        <form action="add_prod.php" enctype="multipart/form-data">
          <table>
            <tr>
              <td style="padding: 10px;"><label for="review">Наименование товара: </label></td>
              <td style="padding: 10px;"><input type="text" name="name"></td>
            </tr>
            <tr>
              <td style="padding: 10px;"><label for="review">Бренд: </label></td>
              <td style="padding: 10px;"><select name="brand">
              <option value="">Выберите бренд...</option>
              <?php
              for ($i=0; $i < count($brand); $i++) {
                echo '<option value="'.$brand[$i]['id'].'">'.$brand[$i]['name'].'</option>';
              }
               ?>
            </select></td>
            </tr>
            <tr>
              <td style="padding: 10px;"><label for="review">Цена (руб.): </label></td>
              <td style="padding: 10px;"><input type="text" name="price"></td>
            </tr>
            <tr>
              <td style="padding: 10px;"><label for="review">Гарантия (мес.): </label></td>
              <td style="padding: 10px;"><input type="text" name="warranty"></td>
            </tr>
            <tr>
              <td style="padding: 10px;"><label for="review">Количество (шт.): </label></td>
              <td style="padding: 10px;"><input type="text" name="quantity"></td>
            </tr>
            <tr>
              <td style="padding: 10px;"><label for="review">Категория: </label></td>
              <td style="padding: 10px;"><input type="text" name="category"></td>
            </tr>
            <tr>
              <td style="padding: 10px;"><label for="review">Тэги: </label></td>
              <td style="padding: 10px;"><input type="text" name="tags"></td>
            </tr>
            <tr>
              <td style="padding: 10px;"><label for="review">Описание: </label></td>
              <td style="padding: 10px;"><textarea name="about" cols="40" rows="5"></textarea></td>
            </tr>
            <tr>
              <td style="padding: 10px;"><label for="review">Характеристики: </label></td>
              <td style="padding: 10px;"><textarea name="specifications" cols="40" rows="5"></textarea></td>
            </tr>
            <tr>
              <td style="padding: 10px;"><label for="review">Фото: </label></td>
              <td style="padding: 10px;"><input type="text" name="foto"></td>
            </tr>
          </table>
          <p><input type="submit" name="submit" value="Добавить"></p>
        </form>
      </div>
    </div>

    <?php include 'footer.php'; ?>
  </body>
</html>