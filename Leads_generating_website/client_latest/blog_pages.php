<html lang="en">
	<head>
	    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<base href="https://affordablelegalhelp.com/blog_pages.php">
		<title>Blog |Affordable legal Help</title>
		<?php include"libs.php"; ?>

<!-- <link rel="stylesheet" href="style.css" media="all"> -->
	</head>

<body>
<div id="fb-root"></div>
<!--<script -->
<!--async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v6.0">-->
<!--</script>-->


<?php include"header.php"; ?>

<section class="container text-left text-dark mt-5">
    <div class="row">
    		
        <div class="col-lg-8 col-md-12 col-sm-12 col-12 d-block">

			<div id="main_content" class="mb-5 mt-3">
				<?php 
				include("config/connect.php");

				if(isset($_GET['id'])){

				$page_id = $_GET['id'];

					$select_query = "select * from posts where post_id='$page_id'";

				$run_query = mysqli_query($con,$select_query);

				while($row=mysqli_fetch_array($run_query)){

					$post_id = $row['post_id']; 
					$post_title = $row['post_title'];
					$post_date = $row['post_date'];
					$post_author = $row['post_author'];
					$post_image = $row['post_image'];
					$post_content =$row['post_content'];
				?>

				<a href="view-blog/<?php echo $post_id; ?>" class="nav-link text-dark ml-0 pl-0">
                    <h2 onmouseover="this.style.color='#959595';" onmouseout="this.style.color='black';">
                    <?php echo $post_title; ?>
                    </h2>
				</a>

				<p align="left">&nbsp;&nbsp;<b><?php
				// echo $post_date; 
				?></b></p>

				<!-- <p align="left">Posted by:&nbsp;&nbsp;<b><?php echo $post_author; ?></b></p> -->

				<img src="images/<?php echo $post_image; ?>" class="img-fluid display-block"  width="650" height="500"  />

				<p align="justify"><?php echo $post_content; ?></p>

				<?php } }?>
				
				<!--<h3 class="mt-5">Comments:</h3>-->
				<!--<hr style="border-top: 3px solid rgb(84, 84, 86);">-->
				<!--<div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-width="" data-numposts="5">-->
				<!--</div>-->
			</div>
		</div>

		<div class="col-lg-4 col-md-12 col-sm-12 col-12 d-block text-left mb-5">
			<div id="sidebar">
                <!-- <div id="searchbox" class="border-light border-top border-bottom border-right border-left mt-4 p-3" style="box-shadow:0px 0px 8px -4px #CCCCCC;">
                
                    <form action="search.php" method="get" enctype="multipart/form-data">
                    <p class="font-weight-bold text-left" style="font-size:18px;">Search Post</p>
                    <div class="row">
                    
                    <input type="text" class="form-control col-8 mt-0 pt-0 mr-1 ml-2" name="value" placeholder="Search this site" size="25">
                    <input type="submit" name="search" class="btn btn-primary col-3" value="Search">
                    </div>
                    </form>
                </div> -->
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
                            <a href="view-blog/<?php echo $post_id; ?>" class="col-5 d-block mr-0 pr-0">
                            <img src='images/<?php echo $image; ?>' width='100' height='100'></a>
                            
                            <a href="view-blog/<?php echo $post_id; ?>" class="col-7 d-block ml-0 pl-0 pr-0 text-dark nav-link" >
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

<?php include"footer.php"; ?>


</body>
</html>
