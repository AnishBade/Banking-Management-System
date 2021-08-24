
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
if(isset($_REQUEST['cancel'])){
    header('Location:staff_customer.php');
    reuturn;
}
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
        <!-- build:css css/main.css -->
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="node_modules/bootstrap-social/bootstrap-social.css">
  <link rel="stylesheet" type="text/css" href="css/styles.css">
  <!-- endbuild -->

        <title>Anish Bade</title>
    </head>

    <body>



    <div class="container">
                    Confirm: Deleting <?php echo htmlentities($customer['customer_id']); ?>

        <div class="row row-content">
            <div class="col">
                 <form method="post" class="form-horizontal">
                    <input type="submit" class="btn btn-danger btn-lg ms-2"  name="delete" value="Delete">
                    <input type="submit" class="btn btn-primary btn-lg ms-2"  name="cancel" value="Cancel">
                </form>
            </div>
       </div>



    </div>


    </body>

</html>



