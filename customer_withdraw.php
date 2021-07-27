<?php 
session_start();
require_once 'pdo.php';

if(isset($_POST['amount']) && isset($_POST['withdraw'])){
    if(!(is_numeric($_POST['amount']))){
        $_SESSION['error']='Amount must be a numeric value!!!';
      
        header('Location:customer_withdraw.php');
        return;
    }else{
        $sql='update customer
                set account_balance=account_balance-:amount 
                where customer_id=:id';
        $stmt=$pdo->prepare($sql);
        $stmt->execute(array(
            ':amount'=>$_POST['amount'],
            ':id'=>$_SESSION['id']
        ));
        $_SESSION['success']='Account successfully Updated !!! ';
        header('Location:customer_withdraw.php');
        return;
    }
}elseif(isset($_POST['home'])){
    header('Location:customer.php');
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
    <title><?php echo $_SESSION['name']  ?></title>
</head>
<body>
    <?php
        if(isset($_SESSION['error'])){
            echo "<h1 style='color:red'>".$_SESSION['error'].'</h1>';
             unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
            echo "<h1 style='color:green'>".$_SESSION['success']."</h1>";
             unset($_SESSION['success']);
        }

    ?>
    <table border='2'>
        <tr>
            <th>customer_id</th>
            <th>Name</th>
            <th>account_balance</th>
        </tr>
            <?php
                $sql='select customer_id,customer_name,account_balance from customer where customer_id=:id';
                $stmt=$pdo->prepare($sql);
                $stmt->execute(array(
                    ':id'=>$_SESSION['id']
                ));
                while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                    echo "<tr><td>";
                    echo($row['customer_id']);
                    echo "</td><td>";
                    echo($row['customer_name']);
                    echo "</td><td>";
                    echo($row['account_balance']);
                    echo "</td></tr>";
                }
        
            ?>
    </table> 

    <form action="" method="post">
        <p>Amount to be withdrawn: <input type="text" name="amount"></p>
        <p><input type="submit" value="Withdraw" name="withdraw"></p>
        <p><input type="submit" value="Go to home page" name="home"></p>
        <p><input type="submit" value="Logout" name="logout"></p>
    </form>

</body>
</html>