<?php
session_start();
require_once 'pdo.php';

if ( isset($_SESSION['success']) ) {
    echo '<p style="color:green">'.$_SESSION['success']."</p>\n";
    unset($_SESSION['success']);
}

if ( isset($_SESSION['error']) ) {
    echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
    unset($_SESSION['error']);
}

if(isset($_POST['logout'])){
    header('Location:logout.php');
    return;
}elseif(isset($_POST['home'])){
    header('Location:staff.php');
    return;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer</title>
</head>

<body>
    <h1><?php echo $_SESSION['name']; ?></h1> 
    <table border='2'>
        <tr>
            <th>customer_id</th>
            <th>Name</th>
            <th>Address</th>
            <th>branch_id</th>
            <th>account_balance</th>
            <th>action</th>
        </tr>
            <?php
                $sql='select customer_id,customer_name,customer_address,branch_id,account_balance from customer where branch_id=:branch_id ';
                $stmt=$pdo->prepare($sql);
                $stmt->execute(array(
                    ':branch_id'=>$_SESSION['branch_id']
                ));
                while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                    echo "<tr><td>";
                    echo($row['customer_id']);
                    echo "</td><td>";
                    echo($row['customer_name']);
                    echo "</td><td>";
                    echo($row['customer_address']);
                    echo "</td><td>";
                    echo($row['branch_id']);
                    echo "</td><td>";
                    echo($row['account_balance']);
                    echo "</td><td>";
                    ?>
                    <a href="staff_customer_edit.php?customer_id=<?php echo $row['customer_id']; ?>">Edit</a> / <a href="staff_customer_delete.php?customer_id=<?php echo $row['customer_id']; ?>">Delete</a></td>
                    <?php
                }
        
            ?>
    </table> 

    <p>
        <form action="" method="post">
            <input type="submit" value="Logout" name="logout">
            <input type="submit" name="home" value="Back to Home">
        </form>
    </p>  
</body>
</html>