<?php
session_start();
require_once 'pdo.php';
if(isset($_POST['logout'])){
    header('Location:logout.php');
    return;
}

if(isset($_POST['show'])){
    header('Location:staff_customer.php');
    return;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff</title>
</head>

<body>
    <h1><?php echo $_SESSION['name']; ?></h1> 
    <table border='2'>
        <tr>
            <th>staff_id</th>
            <th>Name</th>
            <th>Address</th>
            <th>branch</th>
        </tr>
            <?php
                $sql='select staff_id,staff_name,staff_address,branch_id from staff where staff_id=:id ';
                $stmt=$pdo->prepare($sql);
                $stmt->execute(array(
                    ':id'=>$_SESSION['id']
                ));
                while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                    echo "<tr><td>";
                    echo($row['staff_id']);
                    echo "</td><td>";
                    echo($row['staff_name']);
                    echo "</td><td>";
                    echo($row['staff_address']);
                    echo "</td><td>";
                    echo($row['branch_id']);
                    echo "</td></tr>";
                    $_SESSION['branch_id']=$row['branch_id'];
        
                }
                
            ?>
    </table>  

    <form action="" method="post">
        <p>
            <input type="submit" name="show" value="Show Customer Details" id="">
        </p>

        <p>
            <input type="submit" name="logout" value="Logout" id="">
        </p>

    </form> 
</body>
</html>