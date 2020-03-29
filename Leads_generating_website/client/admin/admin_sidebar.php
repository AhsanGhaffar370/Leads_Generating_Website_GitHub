<nav id="sidebar">
        <div class="sidebar-header">
                <img class="logo images" src="attorney_dashboard.png" alt="Affordable Attorney leads" />
        </div>
        
        <ul class="list-unstyled">
            <p class="text-white bg-secondary pt-3 pb-3 mb-3 mt-3" ><?php echo $_SESSION['user_name']; ?></p>
            
            <li class="active"><a href="index.php" class="pt-3 pb-3">Dashboard</a></li>
            <li><a href="../blog_index.php" class="pt-3 pb-3">Visit Site</a></li>
            <li>
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle pt-3 pb-3">
                	Post
                </a>
                <ul class="collapse list-unstyled" id="pageSubmenu">	
                    <li><a href="view_posts.php" class="pt-3 pb-3">View Posts</a></li>
                    <li><a href="insert_post.php" class="pt-3 pb-3">Inser New Post</a></li>
                </ul> 
            </li>
            <li><a href="logout.php" class="pt-3 pb-3" style="border-bottom: 1px solid #47748b;">Logout</a></li>
        </ul>
    </nav>
   	
   	<div class="container-fluid">
   		<nav class="navbar navbar-expand-lg navbar-light bg-white">
   		
            <button type="button" id="sidebarCollapse" class="btn btn-lg btn-outline-secondary">
                <i class="fa fa-align-justify"></i> <span></span>
            </button>
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                	<!--
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item"><a class="nav-link disabled" href="#">Disabled</a></li>
                    -->
                    <li class="nav-item"><a class="nav-link" href="../blog_index.php">Visit Site</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><?php echo $_SESSION['user_name']; ?></a></li>
                </ul>
            </div>
        
		</nav>