<?php
session_start();
require_once 'pdo.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager</title>
</head>

<body>
    <h1><?php echo $_SESSION['name']; ?></h1> 
    <table border='2'>
        <tr>
            <th>manager_id</th>
            <th>Name</th>
            <th>password</th>
            <th>branch</th>
        </tr>
            <?php
                $sql='select manager_id,manager_name,password,branch_id from manager where manager_id=:id ';
                $stmt=$pdo->prepare($sql);
                $stmt->execute(array(
                    ':id'=>$_SESSION['id']
                ));
                while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                    echo "<tr><td>";
                    echo($row['manager_id']);
                    echo "</td><td>";
                    echo($row['manager_name']);
                    echo "</td><td>";
                    echo($row['password']);
                    echo "</td><td>";
                    echo($row['branch_id']);
                    echo "</td></tr>";
                }
        
            ?>
    </table>   
</body>
</html>