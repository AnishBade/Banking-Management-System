<?php
session_start();
require_once 'pdo.php';

if(isset($_POST['name']) && isset($_POST['address']) && isset($_POST['branch_id']) && isset($_POST['password'])){
    $sql='insert into customer(customer_name,customer_address,branch_id,customer_password) values(:name,:address,:branch_id,:password)';
    $stmt=$pdo->prepare($sql);
    $stmt->execute(array(
        ':name'=>$_POST['name'],
        ':address'=>$_POST['address'],
        ':branch_id'=>$_POST['branch_id'],
        ':password'=>$_POST['password']
    ));
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
    <title>Sign Up</title>
</head>
<body>
    <h1>MIC Europe Bank Limited</h1>
    <h2>Create a new account</h2>
    <form action="" method="post">
        <p>Name:<input type="text" name="name"></p>
        <p>Address: <input type="text" name="address"></p>
        <p>
            <label for="branch">Choose a branch:</label>

            <select name="branch_id" id="branch">
                <option value="1" default>Bhaktapur</option>
                <option value="2">Lalitpur</option>
                <option value="3">Kathmandu</option>
                
            </select>
        </p>
        <p>Password: <input type="password" name="password"></p>
        <p><input type="submit" value="Submit"></p>
    </form>
</body>
</html>