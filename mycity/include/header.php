<head>

 
    <!-- *** TOPBAR ***
 _________________________________________________________ -->
    







<div id="top">
        <div class="container">
            <div class="col-md-6 offer" data-animate="fadeInDown">
               <!-- <a href="#" class="btn btn-success btn-sm" data-animate-hover="shake">Offer of the day</a>  <a href="#">Get flat 35% off on orders over $50!</a> -->
            </div>
            <div class="col-md-6" data-animate="fadeInDown">
                <ul class="menu">

                    <!--

                    <li><a href="#" data-toggle="modal" data-target="#login-modal">Login</a>
                    </li>

                    -->
                    <li><a href="storeLogin.php">Store Login</a>
                    </li>
		    <li><a href="topBrandLogin.php">Top Brand Login</a>
                    </li>

                    <li><a href="contact.html">Contact</a>
                    </li>
                  <!--  <li><a href="#">Recently viewed</a>
                    </li> -->



                </ul>
            </div>
        </div>
<!--
        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
            <div class="modal-dialog modal-sm">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="Login">Store Login</h4>
                    </div>
                    <div class="modal-body">
                        <form action="index.php" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" id="email-modal" placeholder="email">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="password-modal" placeholder="password">
                            </div>

                            <p class="text-center">
                                <button class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
                            </p>

                        </form>

                        <p class="text-center text-muted">Not registered yet?</p>
                        <p class="text-center text-muted"><a href="register.html"><strong>Register now</strong></a>! It is easy and done in 1&nbsp;minute and gives you access to special discounts and much more!</p>

                    </div>
                </div>
            </div>
        </div>

-->

    </div>

    <!-- *** TOP BAR END *** -->

    <!-- *** NAVBAR ***
 _________________________________________________________ -->

    <div class="navbar navbar-default yamm" role="navigation" id="navbar">
        <div class="container">
            <div class="navbar-header">

                <a class="navbar-brand home" href="index.php" data-animate-hover="bounce">
                    <img src="img/logo.png" alt="Obaju logo" class="hidden-xs">
                    <img src="img/logo-small.png" alt="Obaju logo" class="visible-xs"><span class="sr-only">homepage</span>
                </a>
                <div class="navbar-buttons">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="fa fa-align-justify"></i>
                    </button>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle search</span>
                        <i class="fa fa-search"></i>
                    </button>
                    
                </div>
            </div>
            <!--/.navbar-header -->

<!--/.navbar-header -->

            <div class="navbar-collapse collapse" id="navigation">

                <ul class="nav navbar-nav navbar-left">
                    <li ><a href="index.php" data-hover="dropdown">Home</a>
                    </li>

	


                    
                </ul>

            </div>
            <!--/.nav-collapse -->

            <div class="navbar-buttons">

                <div class="navbar-collapse collapse right" id="basket-overview">
                   
                </div>
                <!--/.nav-collapse -->

                <div class="navbar-collapse collapse right" id="search-not-mobile">
  <div class="col-sm-12 col-md-12 search-show">

                               <select name="cityName" id="cityNameID" class="form-control">

	<?php 


	$cityQuery  = "SELECT * FROM cityname ORDER BY cityname ASC";
 	$cityResult = $conn->query($cityQuery);


	while ($cityRow = $cityResult->fetch_array()) 
	{

		$cityName =  $cityRow['cityName'];
	
		echo '<option>'.$cityName.'</option>';

	}


?>
</select>


                            </div>
                    
                </div>

            </div>

            <div class="collapse clearfix" id="search">

                <form class="navbar-form" role="search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search">
                        <span class="input-group-btn">

			<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>

		    </span>
                    </div>
                </form>

            </div>
            <!--/.nav-collapse -->

        </div>
        <!-- /.container -->
    </div>
    <!-- /#navbar -->

    <!-- *** NAVBAR END *** -->



            
</head>
