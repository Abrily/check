<?php

// Inialize session

//session_start();

?>

<head>

 
    <!-- *** TOPBAR ***
 _________________________________________________________ -->
    







<div id="top">
        <div class="container">
            <div class="col-md-6 offer" data-animate="fadeInDown">
           <!--     <a href="#" class="btn btn-success btn-sm" data-animate-hover="shake">Offer of the day</a>  <a href="#">Get flat 35% off on orders over $50!</a> -->
            </div>
            <div class="col-md-6" data-animate="fadeInDown">
                <ul class="menu">
                    <li><a href="#"><?php echo $_SESSION['topBrandName']; ?></a>
                    </li>
                    <li><a href="topBrandLogin.php">Logout</a>
                    </li>
                   <!-- <li><a href="contact.html">Contact</a>
                    </li>
                    <li><a href="#">Recently viewed</a>
                    </li> -->
                </ul>
            </div>
        </div>
       

    </div>

    <!-- *** TOP BAR END *** -->

    <!-- *** NAVBAR ***
 _________________________________________________________ -->

    <div class="navbar navbar-default yamm" role="navigation" id="navbar">
        <div class="container">
            <div class="navbar-header">

                <a class="navbar-brand home" href="storeHome.php" data-animate-hover="bounce">
                    <img src="img/logo.png" alt="Obaju logo" class="hidden-xs">
                    <img src="img/logo-small.png" alt="Obaju logo" class="visible-xs"><span class="sr-only">Obaju - go to homepage</span>
                </a>
                
            </div>
            <!--/.navbar-header -->

<!--/.navbar-header -->

            <div class="navbar-collapse collapse" id="navigation">

                <ul class="nav navbar-nav navbar-left">
                    <li ><a href="storeHome.php" data-hover="dropdown">Home</a>
                    </li>

	

                    <li >
                        <a href="addStoreOffers.php"  data-hover="dropdown" >Add Offers</a>
                       
                    </li>

                    <li >
                        <a href="myOffersStores.php"  data-hover="dropdown" >My Offers</a>
                       
                    </li>

                    <li >
                        <a href="favouriteUserStore.php"  data-hover="dropdown" >Favourite user</a>
                       
                    </li>

                    
                </ul>

            </div>
            <!--/.nav-collapse -->

           

            

        </div>
        <!-- /.container -->
    </div>
    <!-- /#navbar -->

    <!-- *** NAVBAR END *** -->



            
</head>
