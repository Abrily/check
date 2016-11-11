
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
                        <li><a href="#">Stores</a>
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

				<li  >
                                    <a href="adminList.php"><i class="fa fa-list"></i>Admin</a>
                                </li>

				 

                                <li class="active">
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

                

		<div class="col-md-9" id="wishlist">

                    

                    <div class="box">
                        <h3>Store List<a href="signupStore.php" class="btn btn-primary btn-sm" style="float:right">Add New Store</a>                
</h3>

                        <hr>
                    <div class="input-group">
                        <input type="text" class="form-control" id="storeSearchID" placeholder="Search">
                        <span class="input-group-btn">

			<button type="submit" class="btn btn-primary"><i class="fa fa-search" onclick="searchStore()"></i></button>

		    </span>
                    </div>
					<hr/>
								<p style="color:red" id="errorSearch"></p>

                    </div>

                    <div class="row products" id="storesID">

                        
    <?php 



	$storeQuery  = "SELECT * FROM store ORDER BY RegisterDateTime ASC  LIMIT 8";
 	$storeResult = $conn->query($storeQuery);

$i = 0;
	while ($storeRow = $storeResult->fetch_array()) 
	{




		$LoginID =  $storeRow['StoreID'];
		$Password =  $storeRow['Password'];
		$storeName =  $storeRow['StoreName'];
		$PhoneNumber =  $storeRow['PhoneNumber1'];
		$EmailID=  $storeRow['EmailID'];
		$OpenTime =  $storeRow['OpenTime'];
		$CloseTime=  $storeRow['CloseTime'];
		$WeekOff =  $storeRow['WeekOff'];
		$RDateTime =  $storeRow['RegisterDateTime'];
		$RegisterDateTime = date("F j, Y, g:i a", strtotime($RDateTime));
		$PlaceName =  $storeRow['PlaceName'];
		$CityName =  $storeRow['CityName'];
		$StateName =  $storeRow['StateName'];
		$CountryName =  $storeRow['CountryName'];
		$ZIP =  $storeRow['ZIP'];
		$Latitude =  $storeRow['Latitude'];
		$Lonitude =  $storeRow['Longitude'];
		$StoreValidity =  $storeRow['StoreValidity'];
		$Mode =  $storeRow['BussinessMode'];

		$BussinessMode = "InStore";
		if($Mode == 1)
		{
			$BussinessMode = "Online";
			
		}

		$StoreImage=  $storeRow['StoreImage'];
		$storeImagePath = "storeImages"."/".$StoreImage;

		$Address = $PlaceName.", ".$CityName ;

		$storeTiming = "Store will open from ".$OpenTime." to " .$CloseTime;


		$Address =  $storeRow['AddressName'];


		$storeAddress = $Address.", ".$PlaceName.", ".$CityName.", ".$StateName.", ".$CountryName.", ".$ZIP;

		$storeStatus = "NO";
	
		

		



                echo '<div class="col-md-3 col-sm-4" >
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="#">';
if(file_exists($storeImagePath)){
	echo '<img class="img-responsive" src='.$storeImagePath.' alt="Card image cap">';
	}else{
	echo '<img class="img-responsive" src="defaultImage/default.png" alt="Card image cap">';

	}                                           echo' </a>
                                        </div>
                                        <div class="back">
                                            <a href="#">'
;

if(file_exists($storeImagePath)){
	echo '<img class="img-responsive" src='.$storeImagePath.' alt="Card image cap">';
	}else{
	echo '<img class="img-responsive" src="defaultImage/default.png" alt="Card image cap">';

	}


echo    '
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="#" class="invisible">
                                    <img src="img/product1.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h4><a href="#">'.$storeName.' </a></h4>
                                    <p>'.$Address.'<p>
                                    <p class="buttons">

        <button  class="btn btn-default" data-toggle="modal" data-target="#myModal'.$i.'" >Details</button>


                                    </p>
                                </div>
                                <!-- /.text -->

                              
                            </div>
                            <!-- /.product -->
                        </div>


<!-- Modal -->
<div class="modal fade" id="myModal'.$i.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"> Store Detail</h4>

      </div>
      <div class="modal-body">



      <div class="card">

    <div class="container">
  <div class="row vdivide">
    <div class="col-sm-3 text-center">';
	if(file_exists($storeImagePath)){
	echo '<img class="img-responsive" src='.$storeImagePath.' alt="Card image cap">';
	}else{
	echo '<img class="img-responsive" src="storeImages/devindrappa201507031435944694.jpg" alt="Card image cap">';

	}
	echo '</div>
    <div class="col-sm-3 ">

<div class="card-block">
    
    <h4 class="card-title" style ="color:#17a589">'.$storeName.'</h4>
    <p class="card-text"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;'.$PlaceName.'</p>
<p><hr></p>
    <h5 class="card-title">Login ID: '.$LoginID.'</h5>

    <h5 class="card-title"> <i class="fa fa-phone-square" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; '.$PhoneNumber.'</h5>
    <h5 class="card-title"><i class="fa fa-envelope" aria-hidden="true"></i> &nbsp;&nbsp;&nbsp;'.$EmailID.'</h5>


  </div>
    </div>
  </div>
</div>
  

<br/>
<div class="container">
<div class="col-sm-3 col-md-6">
  <div class="card-block">
   
<hr>
    <p class="card-text">Store Registerd on : '.$RegisterDateTime .'</p>
<p><hr></p>
    <h5 class="card-title">Store Timing : </h5>
    <h5 class="card-title"><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;'.$storeTiming.'</h5>
<p><hr></p>
    <h5 class="card-title">Store Address : </h5>
    <p class="card-text"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;'.$storeAddress.'</p>
<p><hr></p>
    <h5 class="card-title">Week Off : </h5>
<p class="card-text">'.$WeekOff .'</p>
<!--<h5 class="card-title">Latitude : </h5>
<p class="card-text">'.$Latitude .'</p>
<h5 class="card-title">Longitude : </h5>
<p class="card-text">'.$Lonitude .'</p>
-->




';

echo'<hr>








  </div>
</div>
</div>
      
  
  
</div>
   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>';


  





$i++;


               }
               ?>








                    </div>
                    <!-- /.products -->
					                    <div class="pages" onclick="getMoreStore()">

<p class="loadMore" style="float:center">
                            <a  class="btn btn-primary btn-lg"  id="noLoad"><i class="fa fa-chevron-down" ></i> Load more</a>
                        </p>
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
var p=0;
function getMoreStore() {
	
 p++;
 console.log(p);

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
             var key=parseInt(xmlhttp.responseText);
			 if(key==1){
              document.getElementById("noLoad").innerHTML="No more stores"
			 }else{
               $("#storesID").append(xmlhttp.responseText);

			 }
            }
        };
       xmlhttp.open("GET", "loadMoreStore.php?p="+p, true);
        xmlhttp.send();
    
}
</script>
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
	
function changeStatus(store) {
//alert("hello");

//alert("hello"+store.id+":"+store.value);
var storeID = store.id;
var status = store.value;

//alert("hello"+status+":"+storeID);

			
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
//alert("reponse"+xhttp.responseText);
	
	if(xhttp.responseText == 1)
	{
		store.innerHTML  = "Remove";
		store.value = 1;
	}else if(xhttp.responseText == 0){

		store.innerHTML  = "Top Store";
		store.value = 0;
	}



    }
  };
  xhttp.open("GET", "updateTopStore.php?storeID=" +storeID+"&status="+status, true);
  xhttp.send();


  
}








function updateBrandFormValidation() {

	var flag = true;
	var topBrandName = document.forms["updateBrandForm"]["TopBrandName"].value;
	var errorCategoryName = document.getElementById("categoryErrID");

	if ((topBrandName == "SelectTopBrand") || (!topBrandName) || (topBrandName.length==0 )) {

		errorCategoryName.innerHTML = "Invalid Top Brand name";
		flag =  false;

	} 
	else {

		errorCategoryName.innerHTML = "";

	}


	return flag;

		
}


	</script>

<script>
function searchStore() {
var searchStoreID=document.getElementById("storeSearchID").value;
var errorSearch=document.getElementById("errorSearch");

errorSearch.innerHTML="";
var p=0;


if(searchStoreID =="" )
{
errorSearch.innerHTML="<div class='alert alert-warning'>Please enter search keyword...</div>";

			} else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				console.log(xmlhttp.responseText);
               document.getElementById("storesID").innerHTML = xmlhttp.responseText;
            }
        };
       xmlhttp.open("GET", "storeSearch.php?keyword="+searchStoreID+"&p="+p, true);
        xmlhttp.send();
		
    }

}
</script>


</body>

</html>

<?php } ?>
