<div class="container">
            <div class="logo-carousel owl-carousel">
                <?php foreach($all_brand as $row)  { ?>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="<?=base_url();?>uploads/brand/<?php echo $row['brand_image'];?>" alt="">
                    </div>
                </div>
                <?php } ?>
                
                
               
                
            </div>
        </div>