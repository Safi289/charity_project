<div class="row">
    <div class="col-md-12">

        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Brand</h3>
              <p class="login-box-msg" style="color: red;font-weight: 600;">
                <?php 
                    $message = $this->session->flashdata('message');
                    echo $message; 
                ?> 
              </p>
            </div>

            <form role="form" method="post" action="<?php echo base_url();?>update-brand" enctype="multipart/form-data">

              <input type="hidden" name="brand_id" class="form-control" id="" value="<?php echo $brand_info['brand_id']; ?>">

              	<div class="box-body">
                  
                  
                  <div class="col-md-12">
  	                <div class="form-group">
  	                  	<label for="exampleInputEmail1">Brand Name</label>
  	                  	<input type="text" name="brand_name" class="form-control" id="exampleInputEmail1" value="<?php echo $brand_info['brand_name']; ?>">
                        <input type="hidden" class="form-control" name="prev_brand_image" value="<?php echo $brand_info['brand_image']?>">
  	                </div>
                  </div>

              

                  <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Brand Image</label>
                        <input type="file" class="form-control" name="brand_image">
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