<div class="row">
          <div class="col-md-12">
            <div class="box box-primary">
              <form role="form" method="post" action="<?php echo base_url();?>submit-color" enctype="multipart/form-data">
                      <div class="box-body">
                       <div class="form-group">
                         <label for="exampleInputEmail1" >Color Name</label>
                         <input type="text" name="color_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Color" required>
                       </div>
                       <div class="form-group">
                         <label for="exampleInputEmail1" >Color Image</label>
                         <input type="file" name="color_image" class="form-control" id="exampleInputEmail1" placeholder="Enter Color image" required>
                       </div>
                      </div>
                       <div class="box-footer">
                          <button type="submit" class="btn btn-primary">Submit</button>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                       </div> 
              </form>
            </div>
          </div>
        </div>