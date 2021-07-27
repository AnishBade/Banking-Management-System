<?php
session_start();
require_once "pdo.php";

if(isset($_POST['show'])){
    header('Location:customer_detail.php');
    return;
}elseif(isset($_POST['withdraw'])){
    header('Location:customer_withdraw.php');
    return;
}elseif(isset($_POST['logout'])){
    header('Location:logout.php');
    return;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION['name'] ?></title>
</head>
<body>
    <p>
        <h1>Welcome to MIC EUROPE BANK LIMITED <?php echo $_SESSION['name'] ?></h1>
    </p>
    <form action="" method="post">
        <p><input type="submit" value="Show account details" name="show"></p>
        <p><input type="submit" value="withdraw money" name="withdraw"></p>
        <p><input type="submit" value="Logout" name="logout"></p>
    </form>
</body>
</html>