<html lang="en">
	<head>
	    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>College Network</title>
		<?php include"libs.php"; ?>
	</head>
    
<body>
<?php include"header.php"; ?>

<div class="blog_bg">
	<h1 class="jl_heading font-weight-bold text-white text-center" style="padding-top:120px;">BLOGS</h1>
    <h5 class="heading text-white text-center" style="padding-bottom:120px">We are dedicated to provide the highest <br />level of legal services in the US</h5>
</div>

<div id="searchbox" class="container border-light border-top border-bottom border-right border-left mt-4 p-3" style="box-shadow:0px 0px 11px 0px #CCCCCC;">
    
    <form action="blog-search-result" method="get" enctype="multipart/form-data">
        <p class="font-weight-bold text-left" style="font-size:18px;">Search Post</p>
        <div class="row">
            <input type="text" class="form-control col-9 mt-0 pt-0 mr-1 ml-2" name="value" placeholder="Search this site" size="25">
            <input type="submit" name="search" class="btn btn-primary col-2" value="Search">
        </div>
    </form>
</div>


<section class="container text-left text-dark mt-2">
    <div class="row">
    		
        <div class="col-lg-8 col-md-12 col-sm-12 col-12 d-block">

            <div id="main_content" class="mb-5" >
                <?php 
                
                include("config/connect.php");
                
                $select_posts = "select * from posts order by rand() LIMIT 0,4";
                
                $run_posts = mysqli_query($con,$select_posts);
                
                while($row=mysqli_fetch_array($run_posts)){
                
                    $post_id = $row['post_id']; 
                    $post_title = $row['post_title'];
                    $post_date = $row['post_date'];
                    $post_author = $row['post_author'];
                    $post_image = $row['post_image'];
                    $post_content = substr($row['post_content'],0,200);
                
                
                
                ?>
                <div class="border-light border-top border-bottom border-right border-left mt-4 p-4" style="border-radius:20px; box-shadow:0px 0px 8px -4px #CCCCCC;">
                    
                    <a href="pages.php?id=<?php echo $post_id; ?>" class="nav-link text-dark pl-0 ml-0">
                    <h2 onmouseover="this.style.color='#959595';" onmouseout="this.style.color='black';">
                    <?php echo $post_title; ?>
                    </h2>
                    </a>
                    
                    
                    
                    <p class="text-black-50 text-left" style="font-size:15px; font-weight:500;"><?php
                    // echo $post_date;
                    ?></p>
                    
                    <!--<p align="right">Posted by:&nbsp;&nbsp;<b><?php
                     //echo $post_author; 
                     ?></b></p>-->
                    
                    <img src="images/<?php echo $post_image; ?>" class="img-fluid display-block"  width="650" height="500" />
                    
                    <!--<p  class="text-dark text-justify text-left pt-4 pr-4" style="font-size:17px; font-weight:400; font-style:normal">-->
                    <!--<?php// echo $post_content; ?>-->
                    <!--</p>-->
                    
                    <p align="left"><a href="view-blog?id=<?php echo $post_id; ?>" class="btn btn-md btn-outline-info mt-4" style="font-weight:600">
                        Continue Reading <i class="fas fa-chevron-right "></i>
                    </a></p>
                </div>
                <?php } ?>
            </div>
		</div>


		<div class="col-lg-4 col-md-12 col-sm-12 col-12 d-block text-left mb-5">

            <div id="sidebar">
                
                
                <div class="border-light border-top border-bottom border-right border-left mt-4 p-3" style="box-shadow:0px 0px 20px 0px #CCCCCC;">
                    <h2 align="left">Recently Uploaded</h2><hr>
                    <?php 
                    include("config/connect.php");
                    
                    $query = "select * from posts order by 1 DESC LIMIT 0,6";
                    
                        $run = mysqli_query($con,$query); 
                        
                        while ($row=mysqli_fetch_array($run)){
                        
                        $post_id = $row['post_id'];
                        $title = $row['post_title'];
                        $image = $row['post_image'];
                        $post_date = $row['post_date'];
                    
                    ?>
                        <div class="row mt-2 p-2">
                            <a href="view-blog?id=<?php echo $post_id; ?>" class="col-5 d-block mr-0 pr-0">
                            <img src='images/<?php echo $image; ?>' width='100' height='100'></a>
                            
                            <a href="view-blog?id=<?php echo $post_id; ?>" class="col-7 d-block ml-0 pl-0 pr-0 text-dark nav-link" >
                            <h5 class="font-weight-normal" onmouseover="this.style.color='#959595';" onmouseout="this.style.color='black';">
                            <?php echo $title; ?></h5>
                            <p class="text-left text-black-50">&nbsp;&nbsp;<b><?php 
                            // echo $post_date;
                            ?></b></p>
                            </a>
                        
                        </div>
                        
                        
                    <?php } ?>
                
                </div>
            
            </div>
    	</div>
        
        
    </div>
</section>

<?php include("footer.php"); ?>


</body>
</html>