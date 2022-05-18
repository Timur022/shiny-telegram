<?php
    require_once 'config.php'
    try{
	    $dbh->prepare("INSERT INTO 'product' ('name', 'brand', 'price', 'warranty', 'quantity', 'category', 'tags', 'about', 'specifications', 'foto') VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)")->execute([$_GET['name'], $_GET['brand'], $_GET['price'], $_GET['warranty'], $_GET['quantity'], $_GET['category'], $_GET['tags'], $_GET['about'], $_GET['specifications'], $_GET['foto']]);
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage();
        die();
    }
    header('Location: panel.php');
 ?>
