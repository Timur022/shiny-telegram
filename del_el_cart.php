<?php
    try {
        $dbh = new PDO('mysql:host=127.0.0.1:3307;dbname=nit', 'root', '');
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage();
        die();
    }
    $us = $dbh->prepare("SELECT * FROM composition WHERE id = ".$_GET['id']);
    $us->execute();
    $composition = $us->fetch(PDO::FETCH_ASSOC);

    $us = $dbh->prepare("SELECT * FROM product WHERE id = ".$composition['product']);
    $us->execute();
    $product_cart = $us->fetch(PDO::FETCH_ASSOC);

    $dbh->prepare("DELETE FROM composition WHERE id=?")->execute([$_GET['id']]);
    $dbh->prepare("UPDATE product SET quantity=? WHERE id=?")->execute([$product_cart['quantity']+$composition['quantity'], $composition['product']]);
    header('Location: cart.php');

 ?>