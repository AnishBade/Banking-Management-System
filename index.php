<?php
session_start();
require_once 'pdo.php';

if(isset($_GET['customer']) || isset($_GET['staff']) || isset($_GET['manager'])){
    if(isset($_GET['customer'])){
        $type='customer';

    }elseif(isset($_GET['staff'])){
        $type='staff';
 
    } 
    elseif(isset($_GET['manager'])){
        $type='manager';
       
    }
    header("Location:login.php?type=$type");
    return;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MIC Europe Login Portal</title>
</head>
<body>
    <h1>MIC EUROPE BANK LIMITED</h1>
    <h2>Login as a :</h2>
    <p>
        <form action="" method="get">
            <div>
                <input type="submit" value="Customer" name="customer">
                <input type="submit" value="Staff" name="staff">
                <input type="submit" value="Manager" name=manager>
            </div>
        </form>
    </p>
</body>
</html>