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