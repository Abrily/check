<?php
session_start();

include_once 'function.php';

if(!isset($_SESSION['a613808ccbd6388b54916685220690e9d3d57258']))
{
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';
}
elseif(isset($_SESSION['a613808ccbd6388b54916685220690e9d3d57258']))
{

$message="";

if(isset($_POST['addCityName']))
{

                                                      
$cityname=sanitizeString($_POST['cityName']);
$pincodeNo=sanitizeString($_POST['pinCodeNo']);

$status=0;
$sqlCheck="SELECT * FROM cityname WHERE cityName='$cityname'";

$resultCheck=$conn->query($sqlCheck);
if($resultCheck->num_rows > 0)
	{

	$message="<div class='alert alert-danger'><p>Oops.., City name already exists</p></div>";

	}
	else
	{
	$sqlAdd="INSERT INTO cityname(cityName,cityPinCode) values('$cityname','$pincodeNo')";



$resultAdd=$conn->query($sqlAdd);
	
	if($resultAdd)
	{
		$message="<div class='alert alert-info'><p>City added successfully!</p></div>";
		}
	else
	{
		$message="<div class='alert alert-warning'><p>Error! Please fill the required fields</p></div>";
		}
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
MyCityMyApp    </title>

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
                        <li><a href="#">City</a>
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

				
				<li class="active">
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


				
                                <li>
                                    <a href="myAccount.php"><i class="fa fa-user"></i> My account</a>
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

                <div class="col-md-6" id="customer-order">
                    <div class="box">
                        <h3>Add City </h3> 
                          <hr>
						       			<span style="color:red" id="message"><?php echo $message; ?></span>

                        <form action="addCity.php" name="AddCityNameForm" onsubmit="return AddCityNameFormValidation()" method="post">
                            <div class="form-group">
                                <label for="email">City name</label>
                                <input type="text" class="form-control" id="cityNameID" name="cityName">
      				</br><span style="color:red" id="cityNameErrID"></span>
                            </div>                  
                            <div class="form-group">
                                                      
                                <label for="password">Pin code</label>
                                <input type="number" class="form-control" id="pinCodeNoID" name="pinCodeNo">
     				</br><span style="color:red" id="pinCodeErrID"></span>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" name = "addCityName"><i class="fa fa-sign-in"></i>Add City</button>



                            </div>
                        </form>









                   
                









                       

                        

                    </div>
                </div>

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


        <!-- *** FOOTER ***
 _________________________________________________________ -->
  

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




<script type="text/javascript">





function AddCityNameFormValidation() {

	var flag = true;

	var cityName = document.forms["AddCityNameForm"]["cityName"].value;
    	var pinCodeNo = document.forms["AddCityNameForm"]["pinCodeNo"].value;

 	var errorCityName = document.getElementById("cityNameErrID"); 
    	var errorPinCodeNo = document.getElementById("pinCodeErrID"); 

	if (!cityName || cityName.length==0) {

		errorCityName.innerHTML = "Invalid city name";
		flag =  false;
	} else {

		errorCityName.innerHTML = "";
	}

	if (!pinCodeNo || pinCodeNo.length==0) {

		errorPinCodeNo.innerHTML = "Invalid PIN code no";
		flag =  false;
	} else {

		errorPinCodeNo.innerHTML = "";

	}

	return flag;

}





</script>




</body>

</html>
<?php } ?>