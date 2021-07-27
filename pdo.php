<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=bade_dbms', 
   'anish', 'bade');
// $pdo =new PDO('mysql:host=localhost;dbname=bade_dbms','','');t=localhost;port=3306;dbname=bade
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
?>