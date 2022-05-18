<?php
    require_once 'config.php';

    $us = $dbh->prepare("SELECT * FROM product WHERE id = ".$_GET['product_id']);
    $us->execute();
    $product_cart = $us->fetch(PDO::FETCH_ASSOC);

    $dbh->prepare("UPDATE product SET quantity=? WHERE id=?")->execute([$product_cart['quantity']-$_GET['quantity'], $_COOKIE['product_id']]);
    $dbh->prepare("INSERT INTO composition (amount, user, product, quantity) VALUES (?, ?, ?, ?)")->execute([$product_cart['price']*$_GET['quantity'], $_COOKIE['id'], $_GET['product_id'], $_GET['quantity']]);
    header('Location: cart.php');
 ?>
