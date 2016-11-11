<?php 
include_once 'function.php';
$latitudeID=$_GET['lat'];
$longitudeID=$_GET['longitudeID'];

$cityNameID=$_GET['cityNameID'];

$categoryNameID=$_GET['categoryNameID'];

$subCategoryNameID=$_GET['subCategoryNameID'];


 if((int)$categoryNameID==0){
	 $storeQuery="SELECT
  *, (
    3959 * acos (
      cos ( radians(".$latitudeID.") )
      * cos( radians( Latitude ) )
      * cos( radians( Longitude ) - radians(".$longitudeID.") )
      + sin ( radians(".$latitudeID.") )
      * sin( radians( Latitude ) )
    )
  ) AS distance
FROM store
HAVING distance < 10 AND CityName LIKE '".$cityNameID."'
ORDER BY distance";
}elseif((int)$subCategoryNameID==0){
$storeQuery="SELECT
  *, (
    3959 * acos (
      cos ( radians(".$latitudeID.") )
      * cos( radians( Latitude ) )
      * cos( radians( Longitude ) - radians(".$longitudeID.") )
      + sin ( radians(".$latitudeID.") )
      * sin( radians( Latitude ) )
    )
  ) AS distance
FROM store
HAVING distance < 10 AND CityName LIKE '".$cityNameID."' AND Category ='".$categoryNameID."'
ORDER BY distance";

}else{


$storeQuery="SELECT
  *, (
    3959 * acos (
      cos ( radians(".$latitudeID.") )
      * cos( radians( Latitude ) )
      * cos( radians( Longitude ) - radians(".$longitudeID.") )
      + sin ( radians(".$latitudeID.") )
      * sin( radians( Latitude ) )
    )
  ) AS distance
FROM store
HAVING distance < 10 AND CityName LIKE '".$cityNameID."' AND Category ='".$categoryNameID."' AND SubCategory='".$subCategoryNameID."'
ORDER BY distance";

}
//echo $storeQuery;

 	$storeResult = $conn->query($storeQuery);

$i = 0;
echo '<div class="row products" id="storesID">';
if($storeResult->num_rows>0){
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
			   echo ' </div>
                    <!-- /.products -->

                    <div class="pages" onclick="getMoreSearchOffers()">

                        <p class="loadMore">
                            <div class="btn btn-primary btn-lg" id="noLoad"><i class="fa fa-chevron-down" ></i> Load more Stores</div>
                        </p>

                                            </div>';
			   
			   }else{

echo "<div class='alert alert-danger'>No results found...</div>";

			   }
               ?>