<div class="row">
    <div class="col-md-12">

        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Size</h3>
              <p class="login-box-msg" style="color: red;font-weight: 600;">
                <?php 
                    $message = $this->session->flashdata('message');
                    echo $message; 
                ?> 
              </p>
            </div>

            <form role="form" method="post" action="<?php echo base_url();?>update-size">

              <input type="hidden" name="size_id" class="form-control" id="" value="<?php echo $size_info['size_id']; ?>">

              	<div class="box-body">
                  
                  
                  <div class="col-md-12">
  	                <div class="form-group">
  	                  	<label for="exampleInputEmail1">Size Name</label>
  	                  	<input type="text" name="size_name" class="form-control" id="exampleInputEmail1" value="<?php echo $size_info['size_name']; ?>">
                       
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