<?php
session_start();
require_once 'function.php';



$loginError="";
if(isset($_POST['LoginButton']))
{
	$username=sanitizeString($_POST['username']);

$password=sha1($_POST['password']);
$select="SELECT * FROM administrator WHERE AdminID LIKE '$username' and AdminPassword='$password'";
$result=$conn->query($select);
if($result->num_rows > 0)
	{
	$_SESSION['a613808ccbd6388b54916685220690e9d3d57258']=$username;
$row=$result->fetch_array();


	$_SESSION['AdminName']=$row['AdminName'];
echo '<META HTTP-EQUIV="Refresh" Content="0; URL=adminHome.php">';
//echo "done";
}
else
	{
	$loginError='<div class="alert alert-danger fade in">
  <i class="close icon"></i>
    Invalid username Or Password
  
</div>';
}
}
?>






<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Obaju e-commerce template">
    <meta name="author" content="Ondrej Svestka | ondrejsvestka.cz">
    <meta name="keywords" content="">

    <title>
        MyCityMyApp login
    </title>

    <meta name="keywords" content="">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>

    <!-- styles -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.css" rel="stylesheet">

    <!-- theme stylesheet -->
    <link href="css/style.default.css" rel="stylesheet" id="theme-stylesheet">

    <!-- your stylesheet with modifications -->
    <link href="css/custom.css" rel="stylesheet">

    <script src="js/respond.min.js"></script>

    <link rel="shortcut icon" href="favicon.png">



</head>

<body>
    <!-- *** TOPBAR ***
 _________________________________________________________ -->
        <?php  include_once 'include/header.php'; ?>


    <!-- *** NAVBAR END *** -->

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">

                    



                    

                <div class="col-md-6">
                    <div class="box">
                        <h1>Login</h1>

                        <p class="lead">admin login</p>


                        <hr>

     				<span style="color:red" id="message"><?php echo $loginError; ?></span></br>

</hr>


                        <form action="admin.php" name="storeLoginForm" onsubmit="return storeLoginFormValidation()" method="post">
                            <div class="form-group">
                                <label for="email">User name</label>
                                <input type="text" class="form-control" id="usernameID" name="username">
      				</br><span style="color:red" id="usernameErrID"></span>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="passwordID" name="password">
     				</br><span style="color:red" id="passwordErrID"></span>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" name = "LoginButton"><i class="fa fa-sign-in"></i> Log in</button>



                            </div>
                        </form>
                    </div>
                </div>
                </div>


            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


        <!-- *** FOOTER ***
 _________________________________________________________ -->
             <?php include_once 'include/footer.php'; ?>







</body>

</html>
