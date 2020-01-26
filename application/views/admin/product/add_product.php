<div class="row">
    <div class="col-md-12">

        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Product</h3>
            </div>

            <form role="form" method="post" action="<?php echo base_url();?>submit-product" enctype="multipart/form-data">
              	<div class="box-body">
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="exampleInputEmail1">Select Category</label><br>
                        <select name="pro_category" class="form-control">
                             <option value="">Select</option>
                             <?php foreach($all_category as $row) {?>
                             <option value="<?=$row['cat_id'];?>">
                             <?php echo $row['cat_name']; ?> 
                             </option>
                             <?php }?>
                        </select>

                    </div>
                  </div>
                  
                  <div class="col-md-6">
  	                <div class="form-group">
  	                  	<label for="exampleInputEmail1">Product Name</label>
  	                  	<input type="text" name="pro_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Product">
  	                </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Product Price</label>
                        <input type="text" name="pro_price" class="form-control">
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
                        <textarea class="form-control" name="pro_description"></textarea>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-check">
                      <input name="hot" type="checkbox" class="form-check-input" id="exampleCheck1" value="1">
                      <label  class="form-check-label" for="exampleCheck1">
                        Hot Product
                      </label>
                    </div>

                    <div class="form-check">
                      <input name="featured" type="checkbox" class="form-check-input" id="exampleCheck" value="2">
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