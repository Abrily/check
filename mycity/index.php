<?php

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
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" type="text/css" rel="stylesheet">
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


 <!-- styles -->
    <link href="css/downloaded.css" rel="stylesheet">



</head>

<body>
    <!-- *** TOPBAR ***
 _________________________________________________________ -->
     <?php  include_once 'include/header.php'; ?>

            

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">

                   

                  

                    <div class="box info-bar">
                        <div class="row">
                          
                             <div class="col-sm-6 col-md-2 search-show">
                            <select name="categoryName" id="categoryNameID" class="form-control" onchange="getSubCategoryList(this.value)">
                            <option value="0">Category</option>
							<option value='0'>All</option>



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
                            </div>
<div class="col-sm-6 col-md-3 search-show">
<div id="subcatID">

                            <select name="categoryName" id="subCategoryNameID" class="form-control" >
                            <option value="0">Select Sub Category</option>
							<option value="0">All</option>


   </select></div>

                            </div>
                            <div class="col-sm-12 col-md-5 search-show">
                                <input type="text" class="form-control" id="autocomplete" name = "autocompleteName" placeholder="Enter your address"

             onFocus="geolocate()"/>







                            </div>
                            <div class="col-sm-12 col-md-2 search-show">
							
				<input type="hidden" name = "latitudeName" id="latitudeID" type="text" name = "latitude" ></input>
				<input type="hidden"   name = "longitudeName" id="longitudeID" type="text" name = "longitude" ></input>

                               <button type="submit" class="form-control btn-5" name = "GetOffers" onclick="getOffers()" >Get Offers</button>
               
                            </div>

                            
                        </div>
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
                            <div class="product" data-toggle="modal" data-target="#myModal'.$i.'" >
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="#">';
if(file_exists($storeImagePath)){
	echo '<img class="img-responsive" src='.$storeImagePath.' alt="Card image cap">';
	}else{
	echo '<img class="img-responsive" src="storeImages/devindrappa201507031435944694.jpg" alt="Card image cap">';

	}                                           echo' </a>
                                        </div>
                                        <div class="back">
                                            <a href="#">'
;

if(file_exists($storeImagePath)){
	echo '<img class="img-responsive" src='.$storeImagePath.' alt="Card image cap">';
	}else{
	echo '<img class="img-responsive" src="storeImages/devindrappa201507031435944694.jpg" alt="Card image cap">';

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

                    <div class="pages" onclick="getMoreOffers()">

                        <p class="loadMore">
                            <div class="btn btn-primary btn-lg" id="noLoad"><i class="fa fa-chevron-down" ></i> Load more</div>
                        </p>

                        <ul class="pagination">
                            <li><a href="#">&laquo;</a>
                            </li>
                            <li class="active"><a href="#">1</a>
                            </li>
                            <li><a href="#">2</a>
                            </li>
                            <li><a href="#">3</a>
                            </li>
                            <li><a href="#">4</a>
                            </li>
                            <li><a href="#">5</a>
                            </li>
                            <li><a href="#">&raquo;</a>
                            </li>
                        </ul>
                    </div>


                </div>
                <!-- /.col-md-9 -->

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
        if ($(this).attr("href") == "index.php"){
          
     console.log(this);
               $(this).css("background","#17c866");

            }
    })
});
});
</script>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBY8fQ8_cNw1CC-dMWztNXssLBGzSQJgP8&libraries=places&callback=initAutocomplete"
                        async defer></script>


       <script>
            // This example displays an address form, using the autocomplete feature
            // of the Google Places API to help users fill in the information.
            
            // This example requires the Places library. Include the libraries=places
            // parameter when you first load the API. For example:
            // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
            
            var placeSearch, autocomplete;
            var componentForm = {
                street_number: 'short_name',
                route: 'long_name',
                locality: 'long_name',
                administrative_area_level_1: 'short_name',
                country: 'long_name',
                postal_code: 'short_name'
            };
        
        function initAutocomplete() {
            // Create the autocomplete object, restricting the search to geographical
            // location types.


    	

            autocomplete = new google.maps.places.Autocomplete(
                                                               /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
                                                               {types: ['geocode']});
                                                               
                                                               // When the user selects an address from the dropdown, populate the address
                                                               // fields in the form.
                                                               autocomplete.addListener('place_changed', fillInAddress);
        }
        
        function fillInAddress() {
            // Get the place details from the autocomplete object.
            var place = autocomplete.getPlace();
            
            for (var component in componentForm) {
                //document.getElementById(component).value = '';
                //document.getElementById(component).disabled = false;
            }
            
            // Get each component of the address from the place details
            // and fill the corresponding field on the form.
            for (var i = 0; i < place.address_components.length; i++) {
                var addressType = place.address_components[i].types[0];
                if (componentForm[addressType]) {
                    var val = place.address_components[i][componentForm[addressType]];
                    //document.getElementById(addressType).value = val;
                }
            }

	

		
	
	//document.getElementById('route').value = place.name;
	document.getElementById('latitudeID').value = place.geometry.location.lat();
	document.getElementById('longitudeID').value = place.geometry.location.lng();







        }
        
        // Bias the autocomplete object to the user's geographical location,
        // as supplied by the browser's 'navigator.geolocation' object.
        function geolocate() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                                                         var geolocation = {
                                                         lat: position.coords.latitude,
                                                         lng: position.coords.longitude
                                                         };
                                                         var circle = new google.maps.Circle({
                                                                                             center: geolocation,
                                                                                             radius: position.coords.accuracy
                                                                                             });
                                                         autocomplete.setBounds(circle.getBounds());
                                                         });
            }
        }
        </script>

<script>
function getOffers() {
 
var latDD=document.getElementById("latitudeID").value;
var cityNameID=document.getElementById("cityNameID").value;
var subCategoryNameID=document.getElementById("subCategoryNameID").value;
var categoryNameID=document.getElementById("categoryNameID").value;

var longitudeID=document.getElementById("longitudeID").value;

console.log("lat:"+latDD+" "+"cityNameID:"+cityNameID+" "+"categoryNameID:"+categoryNameID+" "+"longitudeID:"+longitudeID+"subCategoryNameID:"+subCategoryNameID);





if(latDD ="" || cityNameID==" " || categoryNameID==" " ||longitudeID=="")
{
//alert("Please fill required fields");

			} else {
				document.getElementById("storesID").innerHTML="Loading...";

var latDD=document.getElementById("latitudeID").value;

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				console.log(xmlhttp.responseText);
               document.getElementById("storesID").innerHTML = xmlhttp.responseText;
            }
        };
       xmlhttp.open("GET", "searchOffersByArea.php?lat="+ latDD+"&cityNameID=" + cityNameID+"&categoryNameID=" + categoryNameID+"&longitudeID=" + longitudeID+"&p="+0+"&subCategoryNameID="+subCategoryNameID, true);
        xmlhttp.send();
    }

}
</script>
<script>
var p=0;
function getMoreOffers11() {
 p++;
 console.log(p);
var latitudeID=document.getElementById("latitudeID").value;
var cityNameID=document.getElementById("cityNameID").value;
var categoryNameID=document.getElementById("categoryNameID").value;
var longitudeID=document.getElementById("longitudeID").value;

console.log(latitudeID+" "+cityNameID+" "+categoryNameID+" "+longitudeID);



if(latitudeID ="" || cityNameID==" " || categoryNameID==" " ||longitudeID=="")
{
alert("Please fill required fields");

			} else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				console.log(xmlhttp.responseText);
               document.getElementById("storesID").appendChild = xmlhttp.responseText;
            }
        };
       xmlhttp.open("GET", "getOffersWeb.php?latitudeID="+ latitudeID+"&cityNameID=" + cityNameID+"&categoryNameID=" + categoryNameID+"&longitudeID=" + longitudeID+"&p="+p, true);
        xmlhttp.send();
    }

}
</script>
<script>
var p=0;
function getMoreOffers() {
	
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
	
function getSubCategoryList(catID) {

	if(catID!="0"){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
console.log(xhttp.responseText);	
document.getElementById("subcatID").innerHTML=xhttp.responseText;
	
    }
  };
  xhttp.open("GET", "subCategoryByID.php?catID=" +catID, true);
  xhttp.send();

	}
  
}
</script>
<script>
	
function updateOfferViewCount(offerID) {


	{	
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {

	
    }
  };
  xhttp.open("GET", "updateOfferCount.php?offerID=" +offerID, true);
  xhttp.send();


  
}






function FindOffersFormValidation() {

/*
cityName
categoryName
latitudeName
longitudeName

FindOffersForm
GetOffers
	*/



	var flag = true;

	var categoryName = document.forms["AddBrandNameForm"]["categoryName"].value;
	var productName = document.forms["AddBrandNameForm"]["productName"].value;
	var brandName = document.forms["AddBrandNameForm"]["brandName"].value;

	var errorCategoryName = document.getElementById("categoryErrID"); 
	var errorProductName = document.getElementById("productErrID"); 
	var errorBrandName = document.getElementById("brandErrID"); 


	if (!categoryName || categoryName.length==0) {

		errorCategoryName.innerHTML = "Invalid Category name";
		flag =  false;

	} else {

		errorCategoryName.innerHTML = "";

	}

	if (!productName || productName.length==0) {

		errorProductName.innerHTML = "Invalid Product name";
		flag =  false;

	} else {

		errorProductName.innerHTML = "";

	}

	if (!brandName || brandName.length==0) {

		errorBrandName.innerHTML = "Invalid Brand name";
		flag =  false;

	} else {

		errorBrandName.innerHTML = "";

	}

	return flag;



}

</script>



</body>

</html>
