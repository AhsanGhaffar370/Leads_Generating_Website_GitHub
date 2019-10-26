<nav class="headnav navbar navbar-expand-sm navbar-expand-xl navbar-dark fixed-top animated slideInDown" style="background-color:#234f6c !important;">
    <div class="container">
    	
        <div class=" col-lg-3 col-md-4 col-sm-3 col-6 ">
        	<a href="home"><img class="logo images" src="Image/alh - Copy.png" alt="Affordable Legal Help" /></a>
        </div>	
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navid">
        	<span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse mr-5" id="navid">
            <ul class="navh navbar-nav text-center ml-auto">
            <li class="nav-item"><a class="nav-link text-white mr-2"  href="dashboard">DashBoard</a></li>&nbsp
                <li class="nav-item"><a class="nav-link text-white mr-2"  href="display-leads">Leads</a></li>&nbsp
                <li class="nav-item dropdown">
                	<a class="nav-link dropdown-toggle text-white" data-toggle="dropdown"  href="#">
                   	 	<div class="fa fa-user-circle-o ">&nbsp </div>
                            <?php
                        $LawyerID=$_SESSION['id'];
						$Email = $_SESSION['Lawyerlogin'];
                        echo "$Email";
						 ?>
                    </a>
                	<ul class="dropdown-menu">
                    	<li> <a class="dropdown-item text-info" href="update-profile">Profile</a></li>
                        <li> <a class="dropdown-item text-info" href="dashboard">Dashboard</a></li>
                        <li> <a class="dropdown-item text-info" href="logout">Logout&nbsp <div class="fa fa-sign-out"></div></a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>	
</nav>