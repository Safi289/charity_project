<div class="row">
    <div class="col-md-12">

        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Product</h3>
              <p class="login-box-msg" style="color: red;font-weight: 600;">
                <?php 
                    $message = $this->session->flashdata('message');
                    echo $message; 
                ?> 
              </p>
            </div>

            <form role="form" method="post" action="<?php echo base_url();?>update-product" enctype="multipart/form-data">

              <input type="hidden" name="product_id" class="form-control" id="" value="<?php echo $product_info['product_id']; ?>">

              	<div class="box-body">
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="exampleInputEmail1">Select Category</label><br>
                        <select name="pro_category" class="form-control">
                             <option value="">Select</option>
                             <?php foreach($all_category as $row) {?>
                             <option value="<?=$row['cat_id'];?>" <?php if($row['cat_id'] == $product_info['product_category']) {echo 'selected';}?>>
                             <?php echo $row['cat_name']; ?> 
                             </option>
                             <?php }?>
                        </select>

                    </div>
                  </div>
                  
                  <div class="col-md-6">
  	                <div class="form-group">
  	                  	<label for="exampleInputEmail1">Product Name</label>
  	                  	<input type="text" name="pro_name" class="form-control" id="exampleInputEmail1" value="<?php echo $product_info['product_name']; ?>">
  	                </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Product Price</label>
                        <input type="text" name="pro_price" class="form-control" value="<?php echo $product_info['product_price']; ?>">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Upload Image</label>
                        <input type="file" class="form-control" name="pro_image">
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Product Description</label>
                        <textarea class="form-control" name="pro_description"><?php echo $product_info['product_description']; ?></textarea>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-check">
                      <input name="hot" type="checkbox" class="form-check-input" id="exampleCheck1" value="2" <?php if($product_info['product_type'] == 2 ){echo 'checked';};?>>
                      <label  class="form-check-label" for="exampleCheck1">
                        Hot Product
                      </label>
                    </div>

                    <div class="form-check">
                      <input name="featured" type="checkbox" class="form-check-input" id="exampleCheck" value="1" <?php if($product_info['product_type'] == 1 ){echo 'checked';};?>>
                      <label class="form-check-label" for="exampleCheck1">
                        Featured Product
                      </label>
                    </div>
                  </div>

              	</div>
              	<div class="box-footer">
                	<button type="submit" class="btn btn-primary">Submit</button>
              	</div>
            </form>

        </div>

    </div>
</div>