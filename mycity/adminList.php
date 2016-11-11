
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
                        <li><a href="#">Admin List</a>
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

				<li class="active" >
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
                        <h3>Admin List</h3> 

		<a href="addAdmin.php" class="btn btn-primary btn-sm">Add New Admin</a>                

                        <hr>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>

					<th>Sl No</th>
                                        <th>AdminID</th>
                                        <th>AdminName</th>
										<th>ProfileImage</th>
                                        <th>AdminEmailID </th>
                                        <th>AdminPhone</th>
                                        

                                    </tr>
                                </thead>
                                <tbody>

<?php 


	$productQuery  = "SELECT * FROM administrator ORDER BY AdminID ASC";
 	$productResult = $conn->query($productQuery);
	$slNo = 1;


	while ($productRow = $productResult->fetch_array()) 
	{
		

		
		$AdminID =  $productRow['AdminID'];
		$AdminName =  $productRow['AdminName'];
		$ProfileImage =  $productRow['ProfileImage'];
		$AdminEmailID =  $productRow['AdminEmailID'];
		$AdminPhone =  $productRow['AdminPhone'];
		$profilIconPath = "adminProfileImages/".$ProfileImage;

		
		
	
		echo '<tr>
 			<td>'.$slNo.'</td>
		      <td>'.$AdminID.'</td>
			  <td>'.$AdminName.'</td>
		      <td>';
                    if(file_exists($profilIconPath)){

                          echo '<img src='.$profilIconPath.' alt="No image">';


						  }else{

                          echo '<img src="defaultImage/default.png" alt="No image">';


}
						  
						  echo    '</td>

                      
                      <td>'.$AdminEmailID.'</td>
                      <td>'.$AdminPhone.'</td>
                      
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