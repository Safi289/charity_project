 <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Product Shop Section Begin -->
    <section class="product-shop spad" id="pagination">
        <div class="container" id="product_list">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter">
                    <div class="filter-widget">
                        <h4 class="fw-title">Categories</h4>
                        <ul class="filter-catagories">
                            <?php foreach($get_all_categories as $row) { ?>
                            <li><a href="#"><?php echo $row['cat_name']; ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Brand</h4>
                        <div class="fw-brand-check">
                            <?php foreach($all_brand as $row){ ?>
                            <div class="bc-item">
                                <label for="bc-calvin">
                                    <?php echo $row['brand_name']; ?>
                                    <input type="checkbox" id="bc-calvin">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <?php } ?>
                           
                          
                            
                        </div>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Price</h4>
                        <div class="filter-range-wrap">
                            <div class="range-slider">
                                <div class="price-input">
                                    <input type="text" id="minamount">
                                    <input type="text" id="maxamount">
                                </div>
                            </div>
                            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                data-min="33" data-max="98">
                                <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                            </div>
                        </div>
                        <a href="#" class="filter-btn">Filter</a>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Color</h4>
                        <div class="fw-color-choose">
                            <?php foreach($all_color as $row) { ?>
                            <div class="cs-item">
                               <!--  <input type="radio" id="cs-black"> -->
                                <img src="">
                                <label class="" for=""><?php echo $row['color_name']; ?></label>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Size</h4>
                        <div class="fw-size-choose">
                            <?php foreach($all_size as $row) { ?>
                            <div class="sc-item">
                                <input type="radio" id="s-size">
                                <label for="s-size"><?php echo $row['size_name']?></label>
                            </div>
                            <?php } ?>

                        </div>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Tags</h4>
                        <div class="fw-tags">
                            <a href="#">Towel</a>
                            <a href="#">Shoes</a>
                            <a href="#">Coat</a>
                            <a href="#">Dresses</a>
                            <a href="#">Trousers</a>
                            <a href="#">Men's hats</a>
                            <a href="#">Backpack</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="product-show-option">
                        <div class="row">
                            <div class="col-lg-7 col-md-7">
                                <div class="select-option">
                                    <select class="sorting">
                                        <option value="">Default Sorting</option>
                                    </select>
                                    <select class="p-show">
                                        <option value="">Show:</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 text-right">
                                <p>Show 01- 09 Of 36 Product</p>
                            </div>
                        </div>
                    </div>
                    <div class="product-list">
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
                    </div>
                    <div class="loading-more">
                        <i class=""></i><?php echo $this->ajax_pagination->create_links();  ?>
                        <a href="#">
                            
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

<script type='text/javascript'>

    function getData(page_num){
        $.ajax({
            url: '<?=base_url()?>home/load_data/'+page_num,
            type: 'get',
            success: function(response_data){
                var obj = (JSON.parse(response_data));
                $('.product-list').html(obj.productDiv);
            }
        });
    }

</script>