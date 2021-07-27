<?php

session_start();
require_once 'pdo.php';

$_SESSION['type']=$_GET['type'];

if(isset($_POST['signup'])){
    header('Location:customer_signup.php');
    return;
}else if(isset($_POST['id']) && isset($_POST['password'])){
    $type=$_SESSION['type'];
    $sql='select '.$type.'_name from '.$type.' where '.$type.'_id=:id && '.$type.'_password=:password';
    $stmt=$pdo->prepare($sql);
    $stmt->execute(array(
        ':id'=>$_POST['id'],
        ':password'=>$_POST['password']
    ));
    $present=false;
    $name=false;
    while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
        $name=$row[$type.'_name'];
    }
    if($name){
        $_SESSION['id']=$_POST['id'];
        $_SESSION['password']=$_POST['password'];
        $_SESSION['name']=$name;
        header('Location:'.$type.'.php');
        return;
    }else echo $type." of this data not found";
          
    
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
    <h2>Login with your <?php echo $_SESSION['type'].' ' ?>id</h2>
    <p>
        <form action="" method="post">
            <p><?php echo $_SESSION['type'] ?>Id: <input type="text" name="id" ></p>
            <p>Password: <input type="password" name="password"></p>
            <p><input type="submit" value="Submit"></p>
            <p>
                <?php 
                    if($_SESSION['type']=='customer'){
                        echo "Don't have an account?".'<br>';
                        echo "<input type=submit value='Sign Up' name='signup'>";
                    } 
                ?>
            </p>
        </form>
    </p>
</body>
</html>