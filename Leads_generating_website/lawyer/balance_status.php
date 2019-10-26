<div class="text-right font-weight-bold" style="color:#0c5460;">
    <p class=" m-0">
        Pending Balance: <b class="text-danger font-weight-normal">$<?php echo $pending?></b> <br />
    </p>
    <p class=" m-0">
        Status:&nbsp; 
        <b class="font-weight-normal text-success"  id="color1">
            <?php 
                if ($active==0){echo "Pause";}
                else{echo "Active";}
            ?>
        </b>
    </p>
</div>