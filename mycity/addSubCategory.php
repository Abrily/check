

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

if(isset($_POST['addSubCateory']))
{


	$subCategoryName = sanitizeString($_POST['productName']);
	$categoryName = sanitizeString($_POST['categoryName']);
	$amountName = sanitizeString($_POST['amount']);
    $orderNoName = sanitizeString($_POST['orderNoName']);


	
$categoryImageName;



$time = time();

//$timestamp = $categoryName .date("Ymd", $time).$time;
$timestamp = date("Ymd", $time).$time;

$uploaddir      = "subCategoryIcon/"; //location to store image



$tempfile       = $_FILES["file"]["name"];

$imageUploadTimeMD5 = md5($timestamp);

//echo $fileNameMd5;

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

    

	

    if (file_exists("subCategoryIcon/" . $_FILES["file"]["name"]))

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
$sqlCheck="SELECT * FROM `subcategory` "

        ."WHERE `SubCategoryName`='$subCategoryName' "

        ."LIMIT 1";

$resultCheck=$conn->query($sqlCheck);
if($resultCheck->num_rows > 0)
	{

	$message="<div class='alert alert-warning'><p>Error! Sub Category name already existed</p></div>";

	}
	else
	{


		$time = time();

		$timestamp = date("Ymd", $time).$time;

		$subCategoryID = "SCID".$timestamp;


	$temp = "";




	$sqlAdd="INSERT INTO subcategory (SubCategoryName, SubCategoryIconPath,md5Hash,OrderNo,CategoryID,Amount) VALUES('$subCategoryName','$categoryImageName','$temp','$orderNoName','$categoryName','$amountName')";



$resultAdd=$conn->query($sqlAdd);
	
	if($resultAdd)
	{
		$message="<div class='alert alert-info'><p>Sub Category added successfully!</p></div>";
		}
	else
	{
		$message="<div class='alert alert-danger'><p>Error! Please fill the required fields</p></div>";
		}
	}




		
	

  

}


    $categoryNameQuery  = "SELECT * FROM category ORDER BY CategoryName ASC";
    $categoryNameResult = $conn->query($categoryNameQuery);
    $categoryNameNumRows=$categoryNameResult->num_rows;

    //$categoryNameNumRows    = mysql_num_rows($categoryNameResult);











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
        MyCityMyApp
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
                        <li><a href="#">Sub Category</a>
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
				
				<li class="active">
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
                        <h3>Add Product </h3> 
                          <hr>
     				<span style="color:red" id="message"><?php echo $message; ?></span>

                        <form action="addSubCategory.php" name="AddProductNameForm" onsubmit="return addSubCategoryFormValidation()" method="post" enctype="multipart/form-data">

			<div class="form-group">
                                <label for="email">Category Name</label>
                                

			<select class="form-control" name="categoryName" id="categoryID" required>
                                                    <option>Select Category</option>


<?php 


	$categoryQuery  = "SELECT * FROM category ORDER BY OrderNo ASC";
 	$categoryResult = $conn->query($categoryQuery);


	while ($categoryRow = $categoryResult->fetch_array()) 
	{
		$categoryID =  $categoryRow['CategoryID'];
		$categoryName =  $categoryRow['CategoryName'];

	
		echo '<option value='.$categoryID. '>'.$categoryName.'</option>';


	}


?>

          </select>





      				</br><span style="color:red" id="categoryErrID"></span>
                            </div>


                            <div class="form-group">
                                <label for="email">Sub Category Name</label>
                                <input type="text" class="form-control" id="productID" name="productName" required>
      				</br><span style="color:red" id="productErrID"></span>
                            </div>
                            <div class="form-group">
                                <label for="password">Sub Category Icon</label>
                                <input type="file" class="form-control" id="file" name="file">
     				</br><span style="color:red" id="productImageErrID"></span>
                            </div>

 <div class="form-group">
                                <label for="password">Amount</label>
                                <input type="text" class="form-control" id="amount" name="amount">
     				</br><span style="color:red" id="productImageErrID"></span>
                            </div>

			
			<div class="form-group">
                                <label for="password">Listing Order No</label>
                                <input type="number" class="form-control" id="orderNoID" name="orderNoName" min="1"  step="1" >
     				</br><span style="color:red" id="orderNoErrID"></span>
                            </div>


                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" name = "addSubCateory"><i class="fa fa-sign-in"></i>Add SubCategory</button>



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





function addSubCategoryFormValidation() {

	var flag = true;
	var categoryName = document.forms["AddProductNameForm"]["categoryName"].value;
	//var subcategoryName = document.forms["AddProductNameForm"]["subCategoryName"].value;
	var productName = document.forms["AddProductNameForm"]["productName"].value;

	var productIcon = document.forms["AddCategoryForm"]["file"].value;
	var orderNo = document.forms["AddCategoryForm"]["orderNoName"].value;



	var errorCategoryName = document.getElementById("categoryErrID"); 
	//var errorSubCategoryName = document.getElementById("subCategoryErrID"); 
	var errorProductName = document.getElementById("productErrID"); 
	var errorProductIcon = document.getElementById("productImageErrID"); 
    	var errorOrderNo = document.getElementById("orderNoErrID"); 

	if (!categoryName || (categoryName.length==0) || categoryName == "Select Category" ) {

		errorCategoryName.innerHTML = "Invalid Category name";
		flag =  false;
	} else {

		errorCategoryName.innerHTML = "";
	}

	/*

	if (!subcategoryName || subcategoryName.length==0) {
		errorSubCategoryName.innerHTML = "Invalid sub Category name";
		flag =  false;
	} else {
		errorSubCategoryName.innerHTML = "";
	}
	*/

	if (!productName || productName.length==0) {
	
		errorProductName.innerHTML = "Invalid Product name";
		flag =  false;
	 else {
	
		errorProductName.innerHTML = "";
	}

/*
	if (!productIcon || productIcon.length==0) {

		errorProductIcon.innerHTML = "Invalid product icon image";
		flag =  false;
	} else {
	
		errorProductIcon.innerHTML = "";
	}



	if (!orderNo || orderNo.length==0) {

		errorOrderNo.innerHTML = "Invalid prduct order no";
		flag =  false;
	} else {
	
		errorOrderNo.innerHTML = "";
	}
*/




	return flag;

}



function categoryNameChange(selectedCategory) {



	//alert("hello");





  if (selectedCategory == "Select Category") {

    //document.getElementById("txtHint").innerHTML="";

    return;

  } 

  if (window.XMLHttpRequest) {

    // code for IE7+, Firefox, Chrome, Opera, Safari

    xmlhttp=new XMLHttpRequest();

  } else { // code for IE6, IE5

    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

  }

  xmlhttp.onreadystatechange=function() {

    if (xmlhttp.readyState==4 && xmlhttp.status==200) {



		alert(xmlhttp.responseText);



	document.getElementById("subCategoryID").innerHTML=xmlhttp.responseText;





    }

  }



	

xmlhttp.open("GET","getSubCategory.php?CategoryID="+selectedCategory,true);





  xmlhttp.send();



	  

}


</script>








</body>

</html>
<?php   }  ?>
