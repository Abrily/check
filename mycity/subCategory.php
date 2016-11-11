
<?php
session_start();
if(!isset($_SESSION['a613808ccbd6388b54916685220690e9d3d57258']))
{
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';
}
elseif(isset($_SESSION['a613808ccbd6388b54916685220690e9d3d57258']))
{
include_once 'function.php';

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

                <div class="col-md-9" id="customer-order">
                    <div class="box">
                        <h3>SubCategory List</h3> 

		<a href="addSubCategory.php" class="btn btn-primary btn-sm">Add New SubCategory</a>                

                        <hr>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>

					<th>Sl No</th>
                                        <th>OrderNo</th>
                                        <th>SubCategoryIcon</th>
                                        <th>SubCategoryName</th>
                                        <th>SubcategoryID</th>
                                        <th>CategoryName</th>
                                        <th>ImageName</th>

                                    </tr>
                                </thead>
                                <tbody>

<?php 


	$productQuery  = "SELECT * FROM subcategory ORDER BY CategoryID ASC";
 	$productResult = $conn->query($productQuery);
	$slNo = 1;


	while ($productRow = $productResult->fetch_array()) 
	{
		
		$ProductID =  $productRow['SubCategoryID'];
		$ProductName =  $productRow['SubCategoryName'];
		$ProductImage =  $productRow['SubCategoryIconPath'];
		$CategoryID =  $productRow['CategoryID'];
		$OrderNo =  $productRow['OrderNo'];
		$productIconPath = "subCategoryIcon/".$ProductImage;

		$categoryQuery  = "SELECT * FROM category where CategoryID = '$CategoryID'";
 		$categoryResult = $conn->query($categoryQuery);



		while ($categoryRow = $categoryResult->fetch_array()) 
		{
		

			$categoryName =  $categoryRow['CategoryName'];
		}
		
	
		echo '<tr>
 			<td>'.$slNo.'</td>
		      <td>'.$OrderNo.'</td>
		      <td>';

			  if(file_exists($productIconPath)){

echo '<img src='.$productIconPath.' alt="No image">';


			  }else{

echo '<img src="defaultImage/default.png" alt="No image">';



			  }
                        echo '</td>

                      <td>'.$ProductName.'</td>
                      <td>'.$ProductID.'</td>
                      <td>'.$categoryName.'</td>
                      <td>'.$ProductImage.'</td>
                      </tr>';
		$slNo++;

	}


?>

                                    
                                   
                                </tbody>
                               
                            </table>

                        </div>
                        <!-- /.table-responsive -->

                        

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



</body>

</html>
<?php } ?>