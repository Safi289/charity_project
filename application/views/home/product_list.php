
<div class="row">
                         <?php foreach($product_info as $row) { ?>
                            <div class="col-lg-4 col-sm-6">
                                <div class="product-item">
                                    <div class="pi-pic">
                                        <img src="<?php echo base_url();?>uploads/<?php echo $row['product_image'];?>" alt="">
                                        <div class="sale pp-sale">Sale</div>
                                        <div class="icon">
                                            <i class="icon_heart_alt"></i>
                                        </div>
                                        <ul>
                                            <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                            <li class="quick-view"><a href="<?= base_url();?>add-cart/<?= $row['product_id']?>">+ Quick View</a></li>
                                            <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="pi-text">
                                        <div class="catagory-name"><?php echo $row['brand_name']; ?></div> 
                                         <div class="catagory-name"><?php echo $row['cat_name']; ?></div> 
                                        <a href="#">
                                            <h5><?php echo $row['product_name']; ?></h5>
                                        </a>
                                        <div class="product-price">
                                            <?php echo $row['product_price']; ?>
                                            <!-- <span>$35.00</span> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
   
                        </div>