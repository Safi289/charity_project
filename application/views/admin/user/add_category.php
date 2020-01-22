<div class="row">
    <div class="col-md-12">

        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Category</h3>
            </div>

            <form role="form" method="post" action="<?php echo base_url();?>submit-category">
              	<div class="box-body">
	                <div class="form-group">
	                  	<label for="exampleInputEmail1">Category Name</label>
	                  	<input type="text" name="cat_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Category">
	                </div>
              	</div>
              	<div class="box-footer">
                	<button type="submit" class="btn btn-primary">Submit</button>
              	</div>
            </form>

        </div>

    </div>
</div>