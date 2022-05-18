<?php 
try {
    $dbh = new PDO('pgsql:host=ec2-44-195-169-163.compute-1.amazonaws.com;port=5432;dbname=d9ok3cqiodrttb;', 'pcapbbwejsukfu', '4b1e4e19d50d23c36aade2fe7a6bc048f7affb9c50efb152e6c96904d9711489');
 } catch (PDOException $e) {
    print "Error!: " . $e->getMessage();
    die();
 }
?>
