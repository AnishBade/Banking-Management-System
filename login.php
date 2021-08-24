

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
      <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
  <!-- build:css css/main.css -->
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="node_modules/bootstrap-social/bootstrap-social.css">
  <link rel="stylesheet" type="text/css" href="css/styles.css">
  <!-- endbuild -->

    <title>Nyatapola Bank</title>
</head>

<body>
    <nav class="navbar navbar-dark navbar-expand-sm fixed-top">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand mr-auto" href="index.php"><img src="img/nyatapola2.jpg" height="30" width="41"></a>            
            <div class="collapse navbar-collapse" id="Navbar">
                <ul class ="navbar-nav mr-auto">
                         <li class="nav-item active"><a class="nav-link" href="#"><span class="fa fa-home "></span>Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="./aboutus.html"><span class="fa fa-info fa-lg"></span>About</a></li>
                    
                    <li class="nav-item"><a class="nav-link" href="./contactus.html"><span class="fa fa-address-card"></span>Contact</a></li>
                </ul>
                <span class="navbar-text">
                    <!-- <a data-toggle="modal" data-target="#loginModal"> -->
                    <a  id="choiceModalOpen" role="button">
                        <span class="fa fa-sign-in"></span>Login</a>
                </span>
            </div>
            
        </div>
    </nav>
             


  

    <header class="jumbotron" id="jumbotron">
        <div class="container" >
            <div class="row row-header">
                <div class="col-12 col-sm-6 ">
                    <h1>Nyatapola Bank</h1>
                    <br>
                    <h3>No. 1 Commercial Bank in Nepal</h3>
                    <h3>बैंक पनि, साथी पनि</h3>

                </div>
             
                    <div class="col-12 col-sm-6 align-self-center">
                        <img src="img/nyatapola2.jpg" class="img-fluid" height="220" width="180">
                    </div>
    
                    <!-- <div class="col-12 col-sm align-self-center">
                        <a role="button" class="btn btn-block  btn-warning"
                            role="button"
                            id="reserveModalOpen">Reserve Table</a>
                    </div> -->

            </div>
        </div>
    </header>


    <div class="container">
        <div class="row row-content">
           <div class="col">
                <section class="h-100 gradient-form" style="background-color: #eee;">
                    <div class="container py-5 h-100">
                        <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-xl-10">
                            <div class="card rounded-3 text-black">
                            <div class="row g-0">
                                <div class="col-lg-6">
                                <div class="card-body p-md-5 mx-md-4">

                                    <div class="text-center">
                                    <img src="img/nyatapola2.jpg" style="width: 185px;" alt="logo">
                                    <h4 class="mt-1 mb-5 pb-1">We are Nyatapola Bank Team</h4>
                                    </div>
                                    <form action="" method="post">
                                        <h2>Please Login with your <?php echo $_SESSION['type'].' ' ?>id</h2>
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form2Example11"><?php echo $_SESSION['type'] ?>Id </label>
                                            <input type="text" name="id" id="form2Example11" class="form-control" placeholder=<?php echo $_SESSION['type'] ?>Id >
                                            
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form2Example22">Password</label>
                                             <input type="password" id="form2Example22" class="form-control" name="password"/>
                                        </div>
                                        
                                        
                                        <p><input type="submit" value="Submit"></p>
                                        <?php 
                                                if($_SESSION['type']=='customer'){
                                                    echo "Don't have an account?".'<br>';
                                                    echo "<input type=submit value='Create new' name='signup'>";
                                                } 
                                            
                                        ?>

                                        <!-- <div class="d-flex align-items-center justify-content-center pb-4">
                                            <p class="mb-0 me-2">Don't have an account?</p>
                                            <button type="button" class="btn btn-outline-danger">Create new</button>
                                        </div> -->
                                        
                                    </form>

                                    

                                </div>
                                </div>
                                <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                    <h4 class="mb-4">We are more than just a company</h4>
                                    <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </section>

            </div>
       </div>



    </div>


    <footer class="footer ">
        <div class="container ">
            <div class="row">             
                <div class="col-4 offset-1 col-sm-2">
                    <!-- offset-1 pushes the row by one column -->
                    <h5>Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Home</a></li>
                        <li><a href="aboutus.html">About</a></li>
                        <li><a href="./contactus.html">Contact</a></li>
                    </ul>
                </div>
                <div class="col-7 col-sm-5">
                    <h5>Our Headquarter: </h5>
                    <address >
		              Madhyapur Thimi-07<br>
		              Bhaktapur<br>
		              Nepal<br>
		              <i class="fa fa-phone fa-lg"></i> +852 1234 5678<br>
		              <span class="fa fa-fax fa-lg"></span> +852 8765 4321<br>
		              <i class="fa fa-envelope fa-lg"></i> <a href="mailto:nyatapolabank@gmail.np">nyatapolabank@gmail.np</a>
		           </address>
                </div>
                <div  class="col-12 col-sm-4 align-self-center">
                    <div class="text-center">
                        <a class="btn btn-social-icon btn-google" href="http://google.com/+"><i class="fa fa-google fa-lg"></i></a>
                        <a class="btn btn-social-icon btn-facebook" href="http://www.facebook.com/profile.php?id="><i class="fa fa-facebook fa-lg"></i></a>
                        <a class="btn btn-social-icon btn-linkedin" href="http://www.linkedin.com/in/"><i class="fa fa-linkedin fa-lg"></i></a>
                        <a class="btn btn-social-icon btn-twitter" href="http://twitter.com/"><i class="fa fa-twitter fa-lg"></i></a>
                        <a class="btn btn-social-icon btn-google" href="http://youtube.com/"><i class="fa fa-youtube fa-lg"></i></a>
                        <a class="btn btn-social-icon " href="mailto:" ><i class="fa fa-envelope-o fa-lg"></i></a>
                    </div>
                </div>
           </div>
           <div class="row justify-content-center">             
                <div class="col-auto">
                    <p>© Copyright 2021 Nyatapola Bank Private Limited</p>
                </div>
           </div>
        </div>
    </footer>
    <div class="alert alert-warning alert-dismissible" align="center" role="alert">
        <button type="button" class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
        <strong>Warning: &nbsp; </strong>Please
        <a href="tel:+85212345678" class="alert-link">call</a>
        us to create you new DEMAT account
    </div>
    <!-- jQuery first, then Popper.js, then Bootstrap JS. -->
   <!-- build:js js/main.js -->
  <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
  <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="js/scripts.js"></script>

  <!-- endbuild -->


</body>

</html>

