<?php
session_start();
require_once "pdo.php";
if(isset($_GET['customer']) || isset($_GET['staff']) || isset($_GET['manager'])){
    if(isset($_GET['customer'])){
        $type='customer';

    }elseif(isset($_GET['staff'])){
        $type='staff';
 
    } 
    elseif(isset($_GET['manager'])){
        $type='manager';
       
    }
    header("Location:login.php?type=$type");
    return;
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
    <div id="choiceModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg" role="content">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Login as a :  </h4>
                    <button type="button" class="close" id="choiceModalClose">&times;</button>
                </div>
                <div class="modal-body">
                    <p>
                        <form action="" method="get">
                            <div class="row form-group">
                                <div class="col-12 col-sm">
                                    <input type="submit" value="Customer" name="customer">
                                    <input type="submit" value="Staff" name="staff">
                                    <input type="submit" value="Manager" name=manager>
                                </div>
                            </div>
                        </form>
                    </p>
                    
                </div>
            </div>
        </div>
    </div>                


    <div id="loginModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg" role="content">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Login </h4>
                    <button type="button" class="close" id="loginModalClose">&times;</button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-sm-4">
                                    <label class="sr-only" for="exampleInputEmail3">Email address</label>
                                    <input type="email" class="form-control form-control-sm mr-1" id="exampleInputEmail3" placeholder="Enter email">
                            </div>
                            <div class="form-group col-sm-4">
                                <label class="sr-only" for="exampleInputPassword3">Password</label>
                                <input type="password" class="form-control form-control-sm mr-1" id="exampleInputPassword3" placeholder="Password">
                            </div>
                            <div class="col-sm-auto">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox">
                                    <label class="form-check-label"> Remember me
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <button type="button" class="btn btn-secondary btn-sm ml-auto" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary btn-sm ml-1">Sign in</button>        
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>                


    <header class="jumbotron" id="jumbotron">
        <div class="container" >
            <div class="row row-header">
                <div class="col-12 col-sm-6 ">
                    <h1>Nyatapola Bank</h1>
                    <br>
                    <h3>No. 1 Commercial Bank in Nepal</h3>
                    <h3>बैंक पनि, साथी पनि</h3>

                </div>
             
                    <div class="col-12 col-sm-3 align-self-center">
                        <img src="img/nyatapola2.jpg" class="img-fluid" height="220" width="180">
                    </div>
                    <div class="col-12 col-sm-3 align-self-center">
                        <h2>Propreiters:</h2>
                        <p>Anish Bade, 075bei008</p>
                        <p>Ashish Khatakho, 075bei009</p>
                        <p>Pradeep Kumar Khanal, 075bei002</p>
                    </div>
    
                    <!-- <div class="col-12 col-sm align-self-center">
                        <a role="button" class="btn btn-block  btn-warning"
                            role="button"
                            id="reserveModalOpen">Reserve Table</a>
                    </div> -->

            </div>
        </div>
    </header>
    <div id="reserveModal" class="modal fade" role="dialog">
        <!-- <div class="modal-dialog modal-lg" role="content">
           
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class=modal-title text-white" >Reserve a Table </h3>
                    <button type="button" class="close" id="reserveModalClose">&times;</button>
                </div>
                <div class="modal-body">

                    <form>
                        <div class="row form-group">
                            <div class="col-12 col-sm-2">Number of Guests</div>
                            <div class="col-12 col-sm">
                                <input type=radio id="one" name="number">
                                    <label for="one" ><strong>1</strong> &nbsp;</label>
                                <input type=radio id="two"  name="number">
                                    <label for="two"><strong>2</strong>&nbsp; </label>
                                <input type=radio id="three" name="number">
                                    <label for="three" ><strong>3</strong> &nbsp;</label>
                                <input type=radio id="four" name="number">
                                    <label for="four"><strong>4</strong> &nbsp; </label>
                                <input type=radio id="four" name="number">
                                    <label for="five"><strong>5</strong> &nbsp;  </label>
                                <input type=radio id="six" name="number">
                                    <label for="six"><strong>6</strong> &nbsp; </label>
                            </div>
                        </div>
                        
                        <div class="row form-group">
                            <div class="col-12 col-sm-2 align-self-center">Section</div>
                            <div class="col-12 col-md-8 btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-success active ">
                                    <input type="radio" required name="section"   checked autocomplete="off"> Non-Smoking
                                </label>
                                <label class="btn btn-danger ">
                                    <input type="radio" required name="section" autocomplete="off"> Smoking
                                </label>
                            </div>
                        </div>

                        
                        <div class="form-group row">
                            <div class="col-12 col-sm-2">
                                Date and Time
                            </div>
                            
                            <div class="col-12 col-sm-4">
                                <input type="text" placeholder="Date"  class="form-control"> 
                            </div>
                            <div class="col-12 col-sm-4 ">
                                <input type="text" placeholder="Time"  class="form-control"> 
                            </div>
                            <div class="col-12 col-sm"></div>
                            
                        </div>
                        <div class="form-group row">
                            <div class="col-12 offset-sm-2">
                                <button class="btn btn-primary">Reserve</button>
                            </div>
                            
                        </div>

                    </form>
                </div>


            </div>
        </div> -->

    </div>

    <div class="container">
        <div class="row row-content">
           <div class="col">
                <div id="mycarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <img class="d-block img-fluid"
                                src="img/nyatapola4.jpg" height="700" width="1200" alt="Nyatapola Bank">
                         
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid"
                                src="img/nyatapola1.jpg" alt="Nyatapola Bank">
                                       
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid"
                                src="img/nyatapola2.jpg" height="700" width="500" position="center" alt="Nyatapola Bank">
                                                 
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid"
                                src="img/nyatapola3.jpg" height="750" width="1100" alt="Nyatapola Bank">
                                                 
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid"
                                src="img/nyatapola4.jpg" height="700" width="1200" alt="Nyatapola Bank">
                                                 
                        </div>
                        <ol class="carousel-indicators  ">
                            <li data-target="#mycarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#mycarousel" data-slide-to="1"></li>
                            <li data-target="#mycarousel" data-slide-to="2"></li>
                            <li data-target="#mycarousel" data-slide-to="3"></li>
                            <li data-target="#mycarousel" data-slide-to="4"></li>
                        </ol>
                        <a class="carousel-control-prev" href="#mycarousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#mycarousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon "></span>
                        </a>
                        <button class="btn btn-danger btn-sm" id="carouselButton" data-toggle="tooltip" data-html="true"  title="Pause"
                            data-placement="bottom">
                            <span class="fa fa-pause"></span>
                        </button>
                        

                    </div>
                </div>

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