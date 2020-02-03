<div class="row">
    <div class="col-md-12">

        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Color</h3>
              <p class="login-box-msg" style="color: red;font-weight: 600;">
                <?php 
                    $message = $this->session->flashdata('message');
                    echo $message; 
                ?> 
              </p>
            </div>

            <form role="form" method="post" action="<?php echo base_url();?>update-color" enctype="multipart/form-data">

              <input type="hidden" name="color_id" class="form-control" id="" value="<?php echo $color_info['color_id']; ?>">

              	<div class="box-body">
                  
                  
                  <div class="col-md-12">
  	                <div class="form-group">
  	                  	<label for="exampleInputEmail1">Color Name</label>
  	                  	<input type="text" name="color_name" class="form-control" id="exampleInputEmail1" value="<?php echo $color_info['color_name']; ?>">
                        <input type="hidden" class="form-control" name="prev_color_image" value="<?php echo $color_info['color_image']?>">
  	                </div>
                  </div>

              

                  <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Color Image</label>
                        <input type="file" class="form-control" name="color_image">
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