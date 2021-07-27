
<?php

require_once 'pdo.php';

session_start();



if ( ! isset($_SESSION['id']) ) {

	die("ACCESS DENIED");

}



/*try 

{

    $pdo = new PDO("mysql:host=localhost;dbname=coursera_building_database_applications_in_php", "root", "root");

    // set the PDO error mode to exception

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}

catch(PDOException $e)

{

    echo "Connection failed: " . $e->getMessage();

    die();

}

*/

if (isset($_REQUEST['customer_id']))

{

    $customer_id = htmlentities($_REQUEST['customer_id']);



    if (isset($_POST['delete'])) 

    {

        $stmt = $pdo->prepare("

            DELETE FROM customer

            WHERE customer_id = :customer_id

        ");



        $stmt->execute([

            ':customer_id' => $customer_id, 

        ]);



        $_SESSION['success'] = 'Record deleted';




        header('Location: staff_customer.php');

        return;

    }



    $stmt = $pdo->prepare("

        SELECT * FROM customer 

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

        <title>Anish Bade</title>
    </head>

    <body>

    



            <p>

                Confirm: Deleting <?php echo htmlentities($customer['customer_id']); ?>

            </p>



            <form method="post" class="form-horizontal">


                    

                        <input class="btn btn-primary" type="submit" name="delete" value="Delete">

                        <a class="btn btn-default" href="staff_customer.php">Cancel</a>

                


            </form>




    </body>

</html>



