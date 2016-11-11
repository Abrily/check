<?php

session_start();

$storeCreateMessage = "";

$filepath="";

include_once 'function.php';


$message="";
if (isset($_POST['StoreRegisterSubmit'])) {

// username and password sent from form

$username = sanitizeString($_POST['storeId']);
$password = sha1(sanitizeString($_POST['storepassword']));
$organizationname = sanitizeString($_POST['storeName']);
$emailid = sanitizeString($_POST['emailid']);
$telephoneno = sanitizeString($_POST['telephoneNumber']);
$telephoneno2 = sanitizeString($_POST['telephoneNumber2']);

$servicestarttime  = sanitizeString($_POST['StoreStartTime']);
$serviceendtime  = sanitizeString($_POST['StoreEndTime']);
$weekoff  = sanitizeString($_POST['WeekOFF']);
$streetName  = sanitizeString($_POST['streetName']);


$areaName  = sanitizeString($_POST['areaName']);
$cityName  = sanitizeString($_POST['cityName']);
$zipCode  = sanitizeString($_POST['ZipCode']);
$stateName  = sanitizeString($_POST['stateName']);
$countryName  = sanitizeString($_POST['countryName']);
$latitude  = sanitizeString($_POST['latitudeName']);
$longitude  = sanitizeString($_POST['longitudeName']);
$ZipCode  = sanitizeString($_POST['ZipCode']);
$latitudeName  = sanitizeString($_POST['latitudeName']);
$longitudeName  = sanitizeString($_POST['longitudeName']);
$category = $_POST['categoryID'];
$subCategory = $_POST['subCategoryName'];
$establishedDate = $_POST['establishedDate'];
$Owner = $_POST['Owner'];
$Aboutstore = $_POST['Aboutstore'];
$registerBy = $_POST['registerBy'];






$profileImageName;


$datemysql=date("Y-m-d");
$time = time();

$timestamp = $username.date("Ymd", $time).$time;

$uploaddir      = "storeImages/"; //location to store image



$tempfile       = $_FILES["file"]["name"];

$tempfileExtn = substr($tempfile, strrpos($tempfile, '.')+1);

$filename       = $timestamp.".".$tempfileExtn;

$profileImageName = $filename;



//$final_location = $uploaddir.$filename;



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

	 $profileImageName = "defaultImage.jpg";



    }

  else

    {

    

	

    if (file_exists("storeImages/" . $_FILES["file"]["name"]))

      {

      

	  echo $_FILES["file"]["name"] . " already exists. ";

	  

	  }

    else

      {

       chmod("storeImages", 0777);
	   
	   
$final_location = $uploaddir.$profileImageName;

      move_uploaded_file($_FILES["file"]["tmp_name"], $final_location);



	  }





	}







 }











// Create query

  $sqlStatement = "SELECT * FROM `store` "

        ."WHERE StoreID='$username' "

	    ."LIMIT 1";





$sqlResult = $conn->query($sqlStatement);



if ( $obj = $sqlResult->fetch_array() )	{



$storeCreateMessage = "<div class='alert alert-danger'>Username not available.. </div>";







}

else {





$dateTime = new DateTime("now", new DateTimeZone('Asia/Calcutta'));

$mysqldate = $dateTime->format("Y-m-d H:i:s");

/*
queryMysql("INSERT INTO store VALUES('$username','$password','$organizationname', '$telephoneno','$emailid','$profileImageName',

'$servicestarttime','$serviceendtime','$weekoff','$mysqldate','$streetAddress','$cityName', '$stateName', '$countryName','$zipCode','$latitude','$longitude','0' ,'$profileImageName')");
*/


$conn->query("INSERT INTO store(StoreID,Password,StoreName,PhoneNumber1,PhoneNumber2 ,EmailID ,StoreImage ,Category ,SubCategory,EstablishedDate,OwnerName,AboutStore,OpenTime,CloseTime,WeekOff, AddressName,PlaceName ,CityName ,StateName ,CountryName ,ZIP, Latitude ,Longitude, StoreValidity,BussinessMode, RegisteredBy,RegisterDateTime) VALUES('$username','$password','$organizationname', '$telephoneno','$telephoneno2','$emailid','$profileImageName','$category','$subCategory','$establishedDate','$Owner','$Aboutstore',

'$servicestarttime','$serviceendtime','$weekoff','$streetName','$areaName','$cityName', '$stateName', '$countryName',
'$zipCode','$latitude','$longitude','0' ,'0','$registerBy','$datemysql')");
 





              

$message = "<div class='alert alert-info'>successfully created... </div>";










//echo '<META HTTP-EQUIV="Refresh" Content="0; URL=storeHome.php">';    

//exit;








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
My City My App    </title>

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



<script type="text/javascript" src="scripts/default.js"></script>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.21/themes/redmond/jquery-ui.css" />

<!-- Time picker -->

<link rel="stylesheet" type="text/css" href="jsdatepicker/src/jquery.ptTimeSelect.css" />

<script type="text/javascript" src="jsdatepicker/src/jquery.ptTimeSelect.js"></script>


<script src="js/jquery-ui-1.10.3.js"></script>








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
                        <li><a href="#">Store</a>
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

                <div class="col-md-6" id="customer-order">
                    <div class="box">
                        <h3>Store Signup </h3> 
<hr/>
      				<span style="color:red"><?php  echo $message; ?></span>

                          <hr>

                        <form action="signupStore.php" name="StoreRegisterForm" onsubmit="return StoreRegisterFormValidation()" method="post" enctype="multipart/form-data">

<div class="form-group">
                                <label for="email">Detect Current Address</label>
                          <button class="form-control" id="locationAID" name = "locationAName" onclick="getLocation()">Auto Detect Current location</button>



      				</br><span style="color:red" id="autoLocationffErrID"></span>
                            </div>

			<div class="form-group">
                                <label for="email">Login ID</label>
                                <input type="text" class="form-control" id="usernameID" name="storeId" onkeyup="showUsernameAvailability(this.value)" required></input>

								<div id="usernameavailability"></div>

      				</br><span style="color:red" id="usernameErrID"></span>
                            </div>

				
			<div class="form-group">
                                <label for="email">Password</label>
                                <input type="password" class="form-control" name="storepassword" id="passwordID" required></input>
      				</br><span style="color:red" id="passwordErrID"></span>
                            </div>


			<div class="form-group">
                                <label for="email">Confirm Password</label>
                                <input type="password" class="form-control" name="confirmpassword" id="confirmpasswordID" required></input>
      				</br><span style="color:red" id="confirmPasswordErrID"></span>
                            </div>


			<div class="form-group">
                                <label for="email">Email Id</label>
                                <input type="email" class="form-control" name="emailid" id="emailID" required></input>
      				</br><span style="color:red" id="emailidErrID"></span>
                            </div>


			<div class="form-group">
                                <label for="email">Phone No 1</label>
                                <input type="telephone" class="form-control" name="telephoneNumber" id="telephoneNumberID" required></input>
      				</br><span style="color:red" id="telephoneErrID"></span>
                            </div>

<div class="form-group">
                                <label for="email">Phone No 2</label>
                                <input type="telephone" class="form-control" name="telephoneNumber2" id="telephoneNumberID2" required></input>
      				</br><span style="color:red" id="telephoneErrID"></span>
                            </div>

			<div class="form-group">
                                <label for="email">Store Name</label>
                                <input type="text" class="form-control" name = "storeName" id = "StoreNameID" required></input>
      				</br><span style="color:red" id="storeNameErrID"></span>
                            </div>


			<div class="form-group">
                                <label for="email">Store Image</label>
                                <input type="file" class="form-control" id = "file" name = "file" required></input>
      				</br><span style="color:red" id="orgImageErrID"></span>
                            </div>



<div class="form-group">
                                <label for="email">Established Date</label>
                                <input type="text" class="form-control" name="establishedDate"  id = "establishedDate" required></input>



 





</br><span style="color:red" id="storeStarttimeErrID"></span>
                            </div>



							
<div class="form-group">
                                <label for="email">Owner Name</label>
                                <input type="text" class="form-control" name="Owner"  id = "Owner" required></input>



 


</br><span style="color:red" id="storeStarttimeErrID"></span>
                            </div>



			<div class="form-group">
                                <label for="email">About store</label>
                                <textarea type="text" class="form-control" name="Aboutstore"  id = "Aboutstore" required></textarea>









</br><span style="color:red" id="storeStarttimeErrID"></span>
                            </div>



<div class="form-group">
                                <label for="email">Store Start Time</label>
                                <input type="text" class="form-control" name="StoreStartTime"  id = "StoreStartTime" required></input>


				 <script type="text/javascript">

$(document).ready(function(){
                  
                  // find the input fields and apply the time select to them.
                  
                  $('StoreStartTime').ptTimeSelect();
                  
                  });

</script>




      				</br><span style="color:red" id="storeEndtimeErrID"></span>
                            </div>


			<div class="form-group">
                                <label for="email">Store Close Time</label>
                                <input type="text" class="form-control" name="StoreEndTime"  id = "StoreEndTimeID" required></input>


				 <script type="text/javascript">

$(document).ready(function(){
                  
                  // find the input fields and apply the time select to them.
                  
                  $('#StoreEndTimeID').ptTimeSelect();
                  
                  });

</script>




      				</br><span style="color:red" id="storeEndtimeErrID"></span>
                            </div>







			<div class="form-group">
                                <label for="email">Category ID</label>
                                
<select name="categoryID" class="form-control" onchange="getSubCategoryList(this.value)">
<option value=''>Select category</option>
<?php


$select="SELECT * FROM category ORDER BY OrderNo";
$result=$conn->query($select);

while($row=$result->fetch_array()){

echo '<option value="'.$row['CategoryID'].'">'.$row['CategoryName'].'</option>';

}


?>


</select>
   			





      				</br><span style="color:red" id="categoryErrID"></span>
                            </div>


            
<div id="subcatID">

                           </div>


		
			<div class="form-group">
                                <label for="email">Week Off</label>
                                

			<select class="form-control" name="WeekOFF" id = "WeekOffID">
                                                    
<option value="All Day open">All Day open</option>
<option value="Sun">Sun</option>

<option value="Man">Man</option>

<option value="Tue">Tue</option>

<option value="Wed">Wed</option>

<option value="Thu">Thu</option>

<option value="Fri">Fri</option>

<option value="Sat">Sat</option>





          </select>

		</br><span style="color:red" id="weekoffErrID"></span>
                            </div>









                            <div class="form-group">
                                <label for="email">Store address</label>
                                <input type="text" class="form-control" id="autocomplete" name = "autocompleteName" laceholder="Enter your address" onFocus="geolocate()"></input>
      				</br><span style="color:red" id="autocompleteNameffErrID"></span>
                            </div>









			<div class="form-group">
                                <label for="email">Street name</label>
                                <input type="text" class="form-control" id="streetNameID" name = "streetName" required></input>
      				</br><span style="color:red" id="streetNameErrID"></span>
                            </div>

		<div class="form-group">
                                <label for="email">Area name</label>
                                <input type="text" class="form-control" id="areaNameID" name = "areaName" required></input>
      				</br><span style="color:red" id="areaNameErrID"></span>
                            </div>




			
			<div class="form-group">
                                <label for="email">City name</label>
                                <input type="text" class="form-control" name = "cityName" id="cityNameID" required></input>
      				</br><span style="color:red" id="cityNameErrID"></span>
                            </div>

			<div class="form-group">
                                <label for="email">State name</label>
                                <input type="text" class="form-control" id="stateNameID" name = "stateName" required></input>
      				</br><span style="color:red" id="stateNameErrID"></span>
                            </div>


			<div class="form-group">
                                <label for="email">Country name</label>
                                <input type="text" class="form-control" id="countryID" name = "countryName"  required>
      				</br><span style="color:red" id="countryNameErrID"></span>
                            </div>


			<div class="form-group">
                                <label for="email">Zip code</label>
                                <input type="text" class="form-control" name = "ZipCode" id="zipID"  required></input>
      				</br><span style="color:red" id="ZipCodeErrID"></span>
                            </div>


			<div class="form-group">
                                <label for="email">latitude</label>
                                <input type="text" class="form-control" id="latitude" name = "latitudeName"  ></input>
      				</br><span style="color:red" id="latitudeErrID"></span>
                            </div>

<div class="form-group">
                                <label for="email">longitude</label>
                                <input type="text" class="form-control" id="longitude" name = "longitudeName"  ></input>
      				</br><span style="color:red" id="latitudeErrID"></span>
                            </div>

			

<div class="form-group">
                                <label for="email">Registered By</label>
                                <input type="text" class="form-control" id="registerBy" name = "registerBy" ></input>
      				</br><span style="color:red" id="registerByErr"></span>
                            </div>

			
                            
  


			
			


                            <div class="text-center">
     				</br><span style="color:red" id="message"><?php echo $storeCreateMessage; ?></span></br>
                                <button type="submit" class="btn btn-primary" name = "StoreRegisterSubmit"><i class="fa fa-sign-in"></i>Add store</button>



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
  

        <?php include_once 'include/adminFooter.php'; ?>

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



<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBY8fQ8_cNw1CC-dMWztNXssLBGzSQJgP8&libraries=places&callback=initAutocomplete"
async defer></script>

<script>



function codeLatLng(lat, lng) {
    
    geocoder = new google.maps.Geocoder();
    
    var latlng = new google.maps.LatLng(lat, lng);
    geocoder.geocode({'latLng': latlng}, function(results, status) {
                     if (status == google.maps.GeocoderStatus.OK) {
                     //console.log(results)
                     //alert(results)
                     
                     
                     if (results[1]) {
                     //formatted address
                    // alert(results[0].formatted_address)
                     //find country name
                     for (var i=0; i<results[0].address_components.length; i++) {
                     for (var b=0;b<results[0].address_components[i].types.length;b++) {
                     
                     //there are different types that might hold a city admin_area_lvl_1 usually does in come cases looking for sublocality type will be more appropriate
                     if (results[0].address_components[i].types[b] == "locality") {
                     
                     var  city= results[0].address_components[i];
                     document.getElementById('cityNameID').value = city.long_name;
                     
                     
                     //console.log("City: " + address_component.address_components[0].long_name);
                     //itemLocality = address_component.address_components[0].long_name;
                     
                     
                     
                     
                     break;
                     }
                     
                     if (results[0].address_components[i].types[b] == "sublocality") {
                     
                     var area = results[0].address_components[i];
                     document.getElementById('areaNameID').value = area.long_name;
                     
                     
                     
                     break;
                     }
                     
                     if (results[0].address_components[i].types[b] == "country") {
                     
                     var country = results[0].address_components[i];
                     document.getElementById('countryID').value = country.long_name;
                     
                     
                     
                     break;
                     }
                     
                     if (results[0].address_components[i].types[b] == "administrative_area_level_1") {
                     
                     var state = results[0].address_components[i];
                     document.getElementById('stateNameID').value = state.long_name;
                     
                     
                     
                     break;
                     }
                     
                     if (results[0].address_components[i].types[b] == "postal_code") {
                     
                     var post = results[0].address_components[i];
                     document.getElementById('zipID').value = post.long_name;
                     
                     
                     
                     break;
                     }
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     }
                     }
                     //city data
                     
                     
                     //formatted_address
                     
                     document.getElementById('streetNameID').value = results[0].formatted_address;
                     
                     
                     
                     } else {
                     alert("No results found");
                     
                     
                     
                     }
                     } else {
                     alert("Geocoder failed due to: " + status);
                     
                     
                     
                     }
                     });
}



function getLocation()  {
    var startPos;
    var geoSuccess = function(position) {
        startPos = position;
        document.getElementById('latitude').value = startPos.coords.latitude;
        document.getElementById('longitude').value = startPos.coords.longitude;
        
        codeLatLng(startPos.coords.latitude,startPos.coords.longitude);
        
        
        
        
        
        
    };
    var geoError = function(error) {
        console.log('Error occurred. Error code: ' + error.code);
        //alert(error.code);
        // error.code can be:
        //   0: unknown error
        //   1: permission denied
        //   2: position unavailable (error response from location provider)
        //   3: timed out
    };
    
    //if (navigator.geolocation) {
    
    navigator.geolocation.getCurrentPosition(geoSuccess, geoError);
    //}else {
    
       // alert("Geolocation not supported");
   // }
};




/*

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 

        //x.innerHTML = "Geolocation is not supported by this browser.";
    }
}


function showPosition(position) {


    var lat = document.getElementById("latitude");
    var lng = document.getElementById("longitude");

    lat.value = position.coords.latitude;
    lng.value = position.coords.longitude;




}
*/
</script>





       <script>
            // This example displays an address form, using the autocomplete feature
            // of the Google Places API to help users fill in the information.
            
            // This example requires the Places library. Include the libraries=places
            // parameter when you first load the API. For example:
            // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
            
            var placeSearch, autocomplete;
            var componentForm = {
                street_number: 'long_name',
                route: 'long_name',
                locality: 'long_name',
                administrative_area_level_1: 'long_name',
                country: 'long_name',
                postal_code: 'long_name'
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
//alert(val);
                }
            }

	

		
	
	//document.getElementById('route').value = place.name;
	document.getElementById('latitude').value = place.geometry.location.lat();
	document.getElementById('longitude').value = place.geometry.location.lng();










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
	
function getSubCategoryList(catID) {

	if(catID!="0"){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
console.log(xhttp.responseText);	
document.getElementById("subcatID").innerHTML=xhttp.responseText;
	
    }
  };
  xhttp.open("GET", "subCategoryByID1.php?catID=" +catID, true);
  xhttp.send();

	}
  
}
</script>


<script>

function showUsernameAvailability(username)

      {



	  //alert(username);

	  if (username=="")

        {

        document.getElementById("usernameavailability").innerHTML="";

        return;

        }

      if (window.XMLHttpRequest)

        {// code for IE7+, Firefox, Chrome, Opera, Safari

        xmlhttp=new XMLHttpRequest();

        }

      else

        {// code for IE6, IE5

        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

        }

      xmlhttp.onreadystatechange=function()

        {

        if (xmlhttp.readyState==4 && xmlhttp.status==200)

          {

          document.getElementById("usernameavailability").innerHTML=xmlhttp.responseText;

          }

        }

      xmlhttp.open("GET","storeUserNameAvailability.php?StoreUserName="+username,true);

      xmlhttp.send();





      }











function StoreRegisterFormValidation() {

	var flag = true;                         

	var userName = document.forms["StoreRegisterForm"]["username"].value;
    var password = document.forms["StoreRegisterForm"]["password"].value;	
    var conformPassword = document.forms["StoreRegisterForm"]["confirmpassword"].value;
   	var emailid = document.forms["StoreRegisterForm"]["emailid"].value;
    var mobileno = document.forms["StoreRegisterForm"]["telephoneNumber"].value; 
	var storeName = document.forms["StoreRegisterForm"]["storeName"].value;
	var orgImage = document.forms["StoreRegisterForm"]["file"].value;
   	var starttime = document.forms["StoreRegisterForm"]["StoreStartTime"].value;
    var endtime = document.forms["StoreRegisterForm"]["StoreEndTime"].value;
	var weekoff = document.forms["StoreRegisterForm"]["WeekOFF"].value;
    var autocompletename = document.forms["StoreRegisterForm"]["autocompleteName"].value;
	var streetName = document.forms["StoreRegisterForm"]["streetName"].value;
	var areaName = document.forms["StoreRegisterForm"]["areaName"].value;
    var cityName = document.forms["StoreRegisterForm"]["cityName"].value;
   	var stateName = document.forms["StoreRegisterForm"]["stateName"].value;
   	var zipCode = document.forms["StoreRegisterForm"]["ZipCode"].value;
   	var countryName = document.forms["StoreRegisterForm"]["countryName"].value;	


	var errorUsername = document.getElementById("usernameErrID");
	var errorPassword = document.getElementById("passwordErrID");
	var errorConPassword = document.getElementById("confirmPasswordErrID");
	var errorEmailid = document.getElementById("emailidErrID");
	var errorMobNo = document.getElementById("telephoneErrID");
	var errorStoreName = document.getElementById("storeNameErrID");
	var errorStoreImage = document.getElementById("orgImageErrID");
	var errorStartTime = document.getElementById("storeStarttimeErrID");
	var errorEndTime = document.getElementById("storeEndtimeErrID");
	var errorCategory = document.getElementById("categoryErrID");
	var errorweekOff = document.getElementById("weekoffErrID");
	var errorAutoComplet = document.getElementById("autocompleteNameffErrID");
	var errorStreetAddress = document.getElementById("streetNameErrID");
	var errorAreatAddress = document.getElementById("areaNameErrID");
	var errorCityName = document.getElementById("cityNameErrID");
	var errorStateName = document.getElementById("stateNameID");
	var errorContryName = document.getElementById("countryNameErrID");
	var errorZipCode = document.getElementById("ZipCodeErrID");

	var unameErrorRet = validateUsername(userName);
	if(unameErrorRet != ""){

		flag =  false;
	}

	errorUsername.innerHTML = unameErrorRet;

	var passErrorRet = validatePassword(password);

	if(passErrorRet != ""){

		flag =  false;
	}

	errorPassword.innerHTML = passErrorRet;

	if (!conformPassword || conformPassword.length==0) {

        errorConPassword.innerHTML = "confirm Password must be filled out";
        flag =  false;

    } else {     



	if(password != conformPassword )

	{

        	errorConPassword.innerHTML = "Password miss match";

			flag =  false;

	}

	else {



		errorConPassword.innerHTML = "";

	}



    }





	var emailErrorRet = validateEmail(emailid);

	if(emailErrorRet != ""){

		flag =  false;
	}

	errorEmailid.innerHTML = emailErrorRet;

	var phoneErrorRet = validatePhone(mobileno);

	if(phoneErrorRet != ""){



		flag =  false;

	}

	errorMobNo.innerHTML = phoneErrorRet;

   if (!storeName || storeName.length==0) {

        	errorStoreName.innerHTML = "organization name must be filled out";

        	flag =  false;



    	} else {

        	errorStoreName.innerHTML = "";

    	}





		 if (!orgImage || orgImage.length==0) {

        	errorStoreImage.innerHTML = "organization image must be filled out";

        	flag =  false;



    	} else {

        	errorStoreImage.innerHTML = "";

    	}





		if (!starttime || starttime.length==0) {

        	errorStartTime.innerHTML = "store start time must be filled out";

        	flag =  false;



    	} else {

        	errorStartTime.innerHTML = "";

    	}





		if (!endtime || endtime.length==0) {

        	errorEndTime.innerHTML = "store end time must be filled out";

        	flag =  false;



    	} else {

        	errorEndTime.innerHTML = "";

    	}





		

		var jdt1=Date.parse('20/12/2014 '+starttime);

		var jdt2=Date.parse('20/12/2014 '+endtime);



		if (jdt1>jdt2)

		{

			//alert('start is greater');

			errorEndTime.innerHTML = "Invalid end time";

			flag =  false;

		}

		else

		{

			//alert('start is less equal');

			errorEndTime = "";

		}



 if (!weekoff || weekoff.length==0) {

        	errorweekOff.innerHTML = "week off must be filled out";

        	flag =  false;



    	} else {

        	errorweekOff.innerHTML = "";

    	}





//alert(autocompletename);
/*
		 if (!autocompletename || autocompletename.length==0) {

        	errorAutoComplet.innerHTML = "address must be filled out";

        	flag =  false;

//alert("zero");

    	} else {

        	errorAutoComplet.innerHTML = "";

    	}
		*/

    	
		
	

		 if (!streetName || streetName.length==0) {

        	errorStreetAddress.innerHTML = "street name must be filled out";

        	flag =  false;



    	} else {

        	errorStreetAddress.innerHTML = "";

    	}




		 if (!areaName || areaName.length==0) {

        	errorAreatAddress.innerHTML = "area name must be filled out";

        	flag =  false;



    	} else {

        	errorAreatAddress.innerHTML = "";

    	}

    	



		 if (!cityName || cityName.length==0) {

        	errorCityName.innerHTML = "city name must be filled out";

        	flag =  false;



    	} else {

        	errorCityName.innerHTML = "";

    	}



		 if (!stateName || stateName.length==0) {

        	errorStateName.innerHTML = "state name must be filled out";

        	flag =  false;



    	} else {

        	errorStateName.innerHTML = "";

    	}



		 if (!zipCode || zipCode.length==0) {

        	errorZipCode.innerHTML = "zip code must be filled out";

        	flag =  false;



    	} else {

        	errorZipCode.innerHTML = "";

    	}



		 if (!countryName || countryName.length==0) {

        	errorContryName.innerHTML = "country name must be filled out";

        	flag =  false;



    	} else {

        	errorContryName.innerHTML = "";

    	}

	

		return flag;



}









function validateUsername(fld) {

    var error = "";

    var illegalChars = /\W/; // allow letters, numbers, and underscores

 

    if (fld == "") {



        error = "You didn't enter a username.";

    } else if ((fld.length < 6) || (fld.length > 15)) {



        error = "The username is the wrong length.";

    } else if (illegalChars.test(fld)) {



        error = "The username contains illegal characters.";

    } else {

	error = "";

    }

    return error;

}







function validatePassword(fld) {

    var error = "";

    var illegalChars = /[\W_]/; // allow only letters and numbers 

 

    if (fld == "") {



        error = "You didn't enter a password.\n";

    } else if ((fld.length < 6) || (fld.length > 10)) {

        error = "The password is the wrong length. \n";



    } else if (illegalChars.test(fld)) {

        error = "The password contains illegal characters.\n";



    } else if (!((fld.search(/(a-z)+/)) && (fld.search(/(0-9)+/)))) {

        error = "The password must contain at least one numeral.\n";



    } else {



    }

   return error;

} 





function trim(s)

{

  return s.replace(/^\s+|\s+$/, '');

}



function validateEmail(fld) {

    var error="";

    var tfld = trim(fld);                        // value of field with whitespace trimmed off

    var emailFilter = /^[^@]+@[^@.]+\.[^@]*\w\w$/ ;

    var illegalChars= /[\(\)\<\>\,\;\:\\\"\[\]]/ ;

   

    if (fld == "") {



        error = "You didn't enter an email address.\n";

    } else if (!emailFilter.test(tfld)) {              //test email for illegal characters



        error = "Please enter a valid email address.\n";

    } else if (fld.match(illegalChars)) {



        error = "The email address contains illegal characters.\n";

    } else {



    }

    return error;

}





function validatePhone(fld) {

    var error = "";

    var stripped = fld.replace(/[\(\)\.\-\ ]/g, '');    



   if (fld == "") {

        error = "You didn't enter a phone number.\n";



    } else if (isNaN(parseInt(stripped))) {

        error = "The phone number contains illegal characters.\n";



    } else if (!(stripped.length == 10)) {

        error = "The phone number is the wrong length. Make sure you included an area code.\n";



    }

    return error;

}  



	</script>













</body>

</html>
