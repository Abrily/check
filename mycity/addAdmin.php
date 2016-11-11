

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

if(isset($_POST['AddAdmin']))
{

$adminID = sanitizeString($_POST['adminIDName']);
$password =sha1(sanitizeString($_POST['passwordName']));
$adminName = sanitizeString($_POST['adminName']);
$phoneNo =sanitizeString($_POST['phoneNoName']);
$emailID =sanitizeString($_POST['emailIDName']);



	$time = time();

	//$timestamp = $categoryName .date("Ymd", $time).$time;
	$timestamp = date("Ymd", $time).$time;

	$uploaddir      = "adminProfileImages/"; //location to store image

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

      		if (file_exists("adminProfileImages/" . $_FILES["file"]["name"]))

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
$sqlCheck="SELECT * FROM `administrator` "

        ."WHERE `AdminID`='$adminID' AND `AdminPassword`='$password' "

        ."LIMIT 1";

$resultCheck=$conn->query($sqlCheck);
if($resultCheck->num_rows > 0)
	{

	$message="<div class='alert alert-warning'><p>Oops.. Admin username already existed</p></div>";

	}
	else
	{

	$dateTime = new DateTime("now", new DateTimeZone('Asia/Calcutta'));
	$mysqldate = $dateTime->format("Y-m-d H:i:s");

	$sqlAdd="INSERT INTO administrator(AdminID,AdminPassword,AdminName,AdminEmailID,AdminPhone,ProfileImage,DateTime) values('$adminID','$password','$adminName', '$emailID','$phoneNo','$categoryImageName','$mysqldate')";

$resultAdd=$conn->query($sqlAdd);
	
	if($resultAdd)
	{
		$message="<div class='alert alert-info'><p>Admin added successfully!</p></div>";
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
                        <li><a href="#">Add Admin</a>
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

				<li class="active">
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
                        <h3>Add Admin </h3> 
                          <hr>
     				<span style="color:red" id="message"><?php echo $message; ?></span>

                        <form action="addAdmin.php" name="AddAdminForm"   onsubmit="return RegisterAdminFormValidation()"  method="post" enctype="multipart/form-data">

 	
			<div class="form-group">
                                <label for="adminID">Admin ID</label>
                                

			
<input type="text" class="form-control" id="adminID" name="adminIDName" required>
      				</br><span style="color:red" id="adminIDErrID"></span>




      				</br><span style="color:red" id="categoryErrID"></span>
                            </div>


                            <div class="form-group">
                                <label for="email">Password</label>
                                <input type="password" class="form-control" id="passwordName" name="passwordName" required>
      				</br><span style="color:red" id="passwordErrID"></span>
                            </div>
							 <div class="form-group">
                                <label for="email">Confirm Password</label>
                                <input type="password" class="form-control" id="confirmPasswordName" name="confirmPasswordName" required>
      				</br><span style="color:red" id="confirmPasswordErrID"></span>
                            </div>
							<div class="form-group">
                                <label for="password">Admin Name</label>
                                <input type="text" class="form-control" id="adminName" name="adminName">
     				</br><span style="color:red" id="adminNameErrID"></span>
                            </div>
                            <div class="form-group">
                                <label for="password">Admin Profile</label>
                                <input type="file" class="form-control" id="file" name="file">
     				</br><span style="color:red" id="profileImageErrID"></span>
                            </div>

 

	
			
			<div class="form-group">
                                <label for="password">Phone No</label>
                                <input type="number" class="form-control" id="phoneNoName" name="phoneNoName" >
     				</br><span style="color:red" id="phoneNoErrID"></span>
                            </div>

<div class="form-group">
                                <label for="password">Email ID</label>
                                <input type="text" class="form-control" id="emailIDName" name="emailIDName" required >
     				</br><span style="color:red" id="emailIDErrID"></span>
                            </div>


                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" name = "AddAdmin"><i class="fa fa-sign-in"></i>Add Admin</button>



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





function RegisterAdminFormValidation() {

	var flag = true;

	var adminID = document.forms["AddAdminForm"]["adminIDName"].value;
    	var password = document.forms["AddAdminForm"]["passwordName"].value;
    	var confirmPassword = document.forms["AddAdminForm"]["confirmPasswordName"].value;
   	var adminName = document.forms["AddAdminForm"]["adminName"].value;
 	var phoneNoName = document.forms["AddAdminForm"]["phoneNoName"].value;    	
	var emailIDName = document.forms["AddAdminForm"]["emailIDName"].value;

	var adminIDErrID = document.getElementById("adminIDErrID");
	var passwordErrID = document.getElementById("passwordErrID");
	var confirmPasswordErrID = document.getElementById("confirmPasswordErrID");
	var adminNameErrID = document.getElementById("adminNameErrID");
	var phoneNoErrID = document.getElementById("phoneNoErrID");
	var emailIDErrID = document.getElementById("emailIDErrID");
	
	var unameErrorRet = validateUsername(adminID);

	if(unameErrorRet != ""){

		flag =  false;
	}
	adminIDErrID.innerHTML = unameErrorRet;

	var passErrorRet = validatePassword(password);

	if(passErrorRet != ""){

		flag =  false;
	}
	passwordErrID.innerHTML = passErrorRet;

	if (!confirmPassword || confirmPassword.length==0) {
	        confirmPasswordErrID.innerHTML = "confirm Password must be filled out";
	        flag =  false;

	} else {
        
		if(password != confirmPassword )
		{
        		
			confirmPasswordErrID.innerHTML = "Password miss match";
		}
		else {

		confirmPasswordErrID.innerHTML = "";
		}

    	}


	if (!adminName || adminName.length==0) {
        
		adminNameErrID.innerHTML = "admin name must be filled out";
        	flag =  false;

    	} else {
        	adminNameErrID.innerHTML = "";
    	}



	var phoneErrorRet = validatePhone(phoneNoName);

	if(phoneErrorRet != ""){

		flag =  false;
	}
	phoneNoErrID.innerHTML = phoneErrorRet;


	var emailErrorRet = validateEmail(emailIDName);

	if(emailErrorRet != ""){

		flag =  false;
	}
	emailIDErrID.innerHTML = emailErrorRet;


    	if(flag == true)    {
     		return true;
	}
	else	{
		return false;
	}

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


</script>








</body>

</html>
<?php   }  ?>
