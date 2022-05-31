<?php try {
    $dbh = new PDO('pgsql:host=ec2-52-30-67-143.eu-west-1.compute.amazonaws.com;port=5432;dbname=ddve8o07jnqq2j;', 'ddzzglpcjdrdau', '0649ced53a2998fdff690fb107b3990d5cb8a847a45f3d62b38441f11661e154');
 } catch (PDOException $e) {
    print "Error!: " . $e->getMessage();
    die();
 }
?>