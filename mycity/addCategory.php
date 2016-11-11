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

if(isset($_POST['AddCategory']))
{


	$categoryName = sanitizeString($_POST['categoryName']);
	$categoryOrderName = sanitizeString($_POST['orderNoName']);

	$categoryImageName;

	$time = time();

	//$timestamp = $categoryName .date("Ymd", $time).$time;
	$timestamp = date("Ymd", $time).$time;

	$uploaddir      = "categoryIcon/"; //location to store image

	$tempfile       = $_FILES["file"]["name"];

	$imageUploadTimeMD5 = md5($timestamp);
	$tempfileExtn = substr($tempfile, strrpos($tempfile, '.')+1);
	$filename       = $timestamp.".".$tempfileExtn;
	$categoryImageName = $filename;

	//$final_location = $uploaddir.$filename;
	//$final_location = $filename;

	$allowedExts = array("gif", "jpeg", "jpg", "png");
	$temp = explode(".", $_FILES["file"]["name"]);
	$extension = end($temp);

	if ((($_FILES["file"]["type"] == "image/gif")

	|| ($_FILES["file"]["type"] == "image/jpeg")

	|| ($_FILES["file"]["type"] == "image/jpg")

	|| ($_FILES["file"]["type"] == "image/pjpeg")

	|| ($_FILES["file"]["type"] == "image/x-png")

	|| ($_FILES["file"]["type"] == "image/png"))

	&& in_array($extension, $allowedExts))
	{

  		if ($_FILES["file"]["error"] > 0)

    		{

    			echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
			$categoryImageName = "defaultImage.jpg";
		}

  	else

    	{

      		if (file_exists("categoryIcon/" . $_FILES["file"]["name"]))

      		{
	  	
			echo $_FILES["file"]["name"] . " already exists. ";
       		}

    		else
		 {

       			//chmod("categoryIcon", 0777);
	   		$final_location = $uploaddir.$categoryImageName;
			move_uploaded_file($_FILES["file"]["tmp_name"], $final_location);
		}

	}

  }







$status=0;
$sqlCheck="SELECT * FROM `category` "

        ."WHERE `CategoryName`='$categoryName' "

        ."LIMIT 1";

$resultCheck=$conn->query($sqlCheck);
if($resultCheck->num_rows > 0)
	{

	$message="<div class='alert alert-warning'><p>Error! Category name already existed</p></div>";

	}
	else
	{


		$time = time();
		$timestamp = date("Ymd", $time).$time;
		$categoryID = "CID".$timestamp;


	$sqlAdd="INSERT INTO category (CategoryName,categoryIconPath, md5Hash, OrderNo) VALUES('$categoryName','$categoryImageName', '$imageUploadTimeMD5', '$categoryOrderName')";



$resultAdd=$conn->query($sqlAdd);
	
	if($resultAdd)
	{
		$message="<div class='alert alert-info'><p>Category added successfully!</p></div>";
		}
	else
	{
		$message="<div class='alert alert-danger'><p>Error! Please fill the required fields</p></div>";
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
        Offer2you
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
                        <li><a href="#">Category</a>
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


                                <li class="active">
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
                        <h3>Add Category </h3> 
                          <hr>
						       				<span style="color:red" id="message"><?php echo $message; ?></span>


                        <form action="addCategory.php" name="AddCategoryForm" onsubmit="return addCategoryFormValidation()" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="email">Category Name</label>
                                <input type="text" class="form-control" id="categoryID" name="categoryName" required>
      				</br><span style="color:red" id="categoryNameErrID"></span>
                            </div>
                            <div class="form-group">
                                <label for="password">Category Icon</label>
                                <input type="file" class="form-control" id="file" name="file" required>
     				</br><span style="color:red" id="categoryImageErrID"></span>
                            </div>



			
			<div class="form-group">
                                <label for="password">Listing Order No</label>
                                <input type="number" class="form-control" id="orderNoID" name="orderNoName" min="1"  step="1"  required>
     				</br><span style="color:red" id="orderNoErrID"></span>
                            </div>



                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" name = "AddCategory"><i class="fa fa-sign-in"></i>Add Category</button>



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

<script>



function addCategoryFormValidation() {

	var flag = true;

	var categoryName = document.forms["AddCategoryForm"]["categoryName"].value;
	var categoryIcon = document.forms["AddCategoryForm"]["file"].value;
	var orderNo = document.forms["AddCategoryForm"]["orderNoName"].value;

    	var errorCategoryName = document.getElementById("categoryNameErrID"); 
    	var errorCategoryIcon = document.getElementById("categoryImageErrID"); 
    	var errorOrderNo = document.getElementById("orderNoErrID"); 

	if (!categoryName || categoryName.length==0) {

		errorCategoryName.innerHTML = "Invalid category name";
		flag =  false;
	} else {
	
		errorCategoryName.innerHTML = "";
	}


	if (!categoryIcon || categoryIcon.length==0) {

		errorCategoryIcon.innerHTML = "Invalid category icon image";
		flag =  false;
	} else {
	
		errorCategoryIcon.innerHTML = "";
	}



	if (!orderNo || orderNo.length==0) {

		errorOrderNo.innerHTML = "Invalid category order no";
		flag =  false;
	} else {
	
		errorOrderNo.innerHTML = "";
	}


	return flag;

}





</script>









</body>

</html>
<?php } ?>
