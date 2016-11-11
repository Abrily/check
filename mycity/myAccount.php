
<?php
session_start();
$message="";
if(!isset($_SESSION['a613808ccbd6388b54916685220690e9d3d57258']))
{
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';
}
elseif(isset($_SESSION['a613808ccbd6388b54916685220690e9d3d57258']))
{
include_once 'function.php';





	if(isset($_POST['saveChanges'])){

$adminID=$_SESSION['a613808ccbd6388b54916685220690e9d3d57258'];
$nameAdmin=($_POST['nameAdmin']);
$phone=($_POST['phone']);
$email=($_POST['email']);
$passwordConform="SELECT * FROM administrator WHERE AdminID LIKE '$adminID' LIMIT 1";
$passwordResult=$conn->query($passwordConform);

if($passwordResult->num_rows>0){

$upadteAdmin="UPDATE administrator SET AdminName='$nameAdmin',AdminEmailID='$email',AdminPhone='$phone' WHERE adminID LIKE '$adminID'";
$conn->query($upadteAdmin);



}


	}
	if(isset($_POST['savePassword'])){

$adminID=$_SESSION['a613808ccbd6388b54916685220690e9d3d57258'];
$passwordOld=sha1($_POST['passwordOld']);
$password1=sha1($_POST['password1']);
$password2=sha1($_POST['password2']);





 $passwordConform="SELECT * FROM administrator WHERE AdminID LIKE '$adminID' AND AdminPassword='$passwordOld' LIMIT 1";
$passwordResult=$conn->query($passwordConform);

if($passwordResult->num_rows>0){

if($password1==$password2){

$setPassword="UPDATE administrator SET AdminPassword='$password1' WHERE AdminID LIKE '$adminID'";
$conn->query($setPassword);
$message="Password changed successfully...!";


}else{

$message="Password mismatch...!";
}


}else{
$message="Incorrect password...!";


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
        My City My App
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
    

     <?php  include_once 'include/adminHeader.php'; ?>


    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">

                    <ul class="breadcrumb">
                        <li><a href="index.html">Home</a>
                        </li>
                        <li><a href="#">My Account</a>
                        </li>

			

                                        

                    </ul>

                </div>

                <div class="col-md-3">
                    <!-- *** CUSTOMER MENU ***
 _________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Admin section</h3>
                        </div>

                        <div class="panel-body">
<ul class="nav nav-pills nav-stacked">

				
				<li >
                                    <a href="adminHome.php"><i class="fa fa-list"></i>City</a>
                                </li>


                                <li >
                                    <a href="category.php"><i class="fa fa-list"></i>Category</a>
                                </li>
				
				<li >
                                    <a href="subCategory.php"><i class="fa fa-list"></i>Sub Category</a>
                                </li>

				<li >
                                    <a href="adminList.php"><i class="fa fa-list"></i>Admin</a>
                                </li>

				 

                                <li>
                                    <a href="stores.php"><i class="fa fa-list"></i>Store</a>
                                </li>


				<li>
                                    <a href="BD.php"><i class="fa fa-list"></i>BD</a>
                                </li>


				
                                <li class="active">
                                    <a href="storeAccount.php"><i class="fa fa-user"></i> My account</a>
                                </li>
                                <li>
                                    <a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <!-- /.col-md-3 -->

                    <!-- *** CUSTOMER MENU END *** -->
                </div>

               
                <div class="col-md-9">
                    <div class="box">
					<h1>My account</h1>
                        <p class="lead">Change your personal details or your password here.</p>

					<h3>Personal details</h3>
                        <form action="myAccount.php" name="passwordCahnge" onsubmit="return passwordFormValidation()" method="POST">
 <?php
 


$adminUsername=$_SESSION['a613808ccbd6388b54916685220690e9d3d57258'];

$adminDetails="SELECT * FROM administrator WHERE AdminID LIKE '$adminUsername' LIMIT 1";
$adminResult=$conn->query($adminDetails);
if($adminResult->num_rows>0){
$adminRow=$adminResult->fetch_array();
$Name=$adminRow['AdminName'];
$AdminEmailID=$adminRow['AdminEmailID'];
$AdminPhone=$adminRow['AdminPhone'];
$ProfileImage=$adminRow['ProfileImage'];



echo ' <div class="row">        


<div class="col-sm-6">
                                    <div class="form-group">
                                        <img src="adminProfileImages/'.$ProfileImage.'" style="width:240;height:320px;padding:10px;border:10px solid black;">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="firstname">Name</label>
                                        <input type="text" class="form-control" value='.$Name.' id="firstname" name="nameAdmin">
                                    </div>
                                </div>
                                

                            
                               <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="phone">Telephone</label>
                                        <input type="text" class="form-control" id="phone" value='.$AdminPhone.' name="phone">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" id="email" value='.$AdminEmailID.' name="email">
                                    </div>
                                </div>
                                <div class="col-sm-12 text-center">
                                    <button type="submit" class="btn btn-primary" name="saveChanges"><i class="fa fa-save"></i> Save changes</button>

                                </div>
                            </div>';

}



							?>
                                

                           
                        </form>
                        
                        <h3>Change password</h3>
                          <hr/>
 										<span class="neatie-message" style="color:red"><?php echo $message; ?></span>

						  <hr/>
                        <form action="myAccount.php" name="passwordCahnge" onsubmit="return passwordFormValidation()" method="POST">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="password_old">Old password</label>
                                        <input type="password" class="form-control" id="password_old" name="passwordOld" required>
										<span id="passwordErrOld"></span>
                                    </div>
                                </div>
                            </div>
							<div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="password_1">New password</label>
                                        <input type="password" class="form-control" id="password_1" name="password1" required>
										<span id="passwordErr1"></span>

                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="password_2">Retype new password</label>
                                        <input type="password" class="form-control" id="password_2" name="password2" required>
									  <span id="passwordErr2"></span>

                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->

                            <div class="col-sm-12 text-center">
                                <button type="submit" class="btn btn-primary" name="savePassword"><i class="fa fa-save"></i> Save new password</button>
                            </div>
                        </form>

                        <hr>

                        
                    </div>
                </div>


            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


        <!-- *** FOOTER ***
 _________________________________________________________ -->

 <script>
  function passwordFormValidation() {
	var flag = true;
	                        

	var passwordOld = document.forms["passwordCahnge"]["password_old"].value;
    	var password1 = document.forms["passwordCahnge"]["password_1"].value;
		    	var password2 = document.forms["passwordCahnge"]["password_2"].value;

									  <span id="passwordErr2"></span>

 	var passwordErrOld = document.getElementById("passwordErrOld"); 
	 	var passwordErr1 = document.getElementById("passwordErr1"); 

 	var passwordErr2 = document.getElementById("passwordErr2"); 


	if (passwordOld.length==0  || password1.length==0 || password2.length==0) {

		errorCityName.innerHTML = "Invalid password";
		flag =  false;
	} else {

		errorCityName.innerHTML = "";
	}

	
	if (!password2 || password2.length==0) {
	        passwordErr2.innerHTML = "confirm Password must be filled out";
	        flag =  false;

	} else {
        
		if(password1 != password2 )
		{
        			        flag =  false;

			passwordErr2.innerHTML = "Password miss match";
		}
		else {

		passwordErr2.innerHTML = "";
		}

    	}


	return flag;

}





</script>



        <?php include_once 'include/footer.php'; ?>

<script>
$(document).ready(function() {


$(function() {
    var pgurl = window.location.href.substr(window.location.href
    .lastIndexOf("/")+1);
    
    $(".navbar-nav a").each(function(){
        if($(this).attr("href") == pgurl){


            console.log(this);
            $(this).css("background","#17c866");
        }
/*
        if ($(this).attr("href") == "index.php"){
          
     		console.log(this);
               $(this).css("background","#17c866");

            }
	*/	

    })
});
});
</script>



</body>

</html>
<?php } ?>