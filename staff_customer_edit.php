<?php
require_once 'pdo.php';
session_start();

if ( ! isset($_SESSION['id']) ) {

	die("ACCESS DENIED");

}
// If the user requested logout go back to index.php

if ( isset($_POST['cancel']) ) {

    header('Location: staff_customer.php');

    return;

}
$name = htmlentities($_SESSION['name']);

if (isset($_REQUEST['customer_id']))

{
// Check to see if we have some POST data, if we do process it

	if (isset($_POST['customer_name']) && isset($_POST['customer_address']) && isset($_POST['branch_id']) && isset($_POST['account_balance'])) 

	{

	    if (strlen($_POST['customer_name']) < 1 || strlen($_POST['customer_address']) < 1 || strlen($_POST['branch_id']) < 1 || strlen($_POST['account_balance']) < 1)

	    {

	        $_SESSION['error'] = "All fields are required";

	        header("Location: staff_customer_edit.php?customer_id=" . htmlentities($_REQUEST['customer_id']));

	        return;

	    }



	    if (!is_numeric($_POST['branch_id']) ) 

	    {

	        $_SESSION['error'] = "Branch ID must be an integer";

	        header("Location: staff_customer_edit.php?customer_id=" . htmlentities($_REQUEST['customer_id']));

			return;

	    } 



	    if ( !is_numeric($_POST['account_balance'])) 

	    {

	        $_SESSION['error'] = "Account Balance must be an integer";

	        header("Location: staff_customer_edit.php?customer_id=" . htmlentities($_REQUEST['customer_id']));

	        return;

	    } 



	    $customer_name = htmlentities($_POST['customer_name']);

	    $customer_address = htmlentities($_POST['customer_address']);

	    $branch_id = htmlentities($_POST['branch_id']);

	    $account_balance = htmlentities($_POST['account_balance']);



    	$customer_id = htmlentities($_REQUEST['customer_id']);



	    $stmt = $pdo->prepare("

	    	UPDATE customer

	    	SET customer_name = :customer_name, customer_address = :customer_address, branch_id = :branch_id, account_balance = :account_balance

		    WHERE customer_id = :customer_id

	    ");



	    $stmt->execute(array(

	        ':customer_name' => $customer_name, 

	        ':customer_address' => $customer_address, 

	        ':branch_id' => $branch_id,

	        ':account_balance' => $account_balance,

	        ':customer_id' => $customer_id,

        ));



	    $_SESSION['success'] = 'Record edited';

	  



	    header('Location: staff_customer.php');

		return;

	}





	$customer_id = htmlentities($_REQUEST['customer_id']);



	$stmt = $pdo->prepare("

	    SELECT customer_id,customer_name,customer_address,branch_id,account_balance FROM customer 

	    WHERE customer_id = :customer_id

	");



	$stmt->execute([

	    ':customer_id' => $customer_id, 

	]);



	$customer = $stmt->fetch(PDO::FETCH_ASSOC);



}



?>

<!DOCTYPE html>

<html>

    <head>

        <title>MIC EUROPE BANK</title>

        
    </head>

    <body>

       

            <h1><?php echo htmlentities($customer['customer_name']) ?></h1>

            <?php

    


            ?>

            <form method="post" >

               

                    <label  for="customer_name">Customer Name:</label>
                        <input  type="text" name="customer_name" id="customer_name" value="<?php echo htmlentities($customer['customer_name']); ?>">
<br>
                    <label  for="customer_address">Customer Address:</label>
                    <input  type="text" name="customer_address" id="customer_address" value="<?php echo htmlentities($customer['customer_address']); ?>">
<br>

                    <label for="branch_id">Branch Id</label>
                        <input type="text" name="branch_id" id="branch_id" value="<?php echo htmlentities($customer['branch_id']); ?>">
<br>
                <label for="account_balance">Account Balance:</label>
                        <input  type="text" name="account_balance" id="account_balance" value="<?php echo htmlentities($customer['account_balance']); ?>">
<br>
                        <input  type="submit" value="Save">

                        <input  type="submit" name="cancel" value="Cancel">

            </form>



      
    </body>

</html>