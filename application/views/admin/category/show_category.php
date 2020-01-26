
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Category Table</h3>
              <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#add_category">
                Add Category
              </button>
              <p class="login-box-msg" style="color: red;font-weight: 600;">
                <?php 
                    $message = $this->session->flashdata('message');
                    echo $message; 
                ?> 
              </p>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>SL</th>
                  <th>Category Name</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php $sl = 1;foreach($all_category as $row) {?>
                  <tr>
                    <td>
                      <?php echo $sl;?>
                    </td>
                    <td>
                      <?php echo $row['cat_name'];?>
                    </td>
                    <td>
                      <!-- <a href="<?= base_url();?>edit-category/<?= $row['cat_id']?>" class="btn btn-primary btn-sm" data-toggle="modal">Edit</a>  -->
                       <button onclick="setEventId(<?= $row['cat_id'] ?>)" type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit_category_<?= $row['cat_id']?>" href="javascript:void(0)">
                         Edit
                      </button> 

                      <a href="<?= base_url();?>delete-category/<?= $row['cat_id']?>" class="btn btn-danger btn-sm">Delete</a>

                      <!-- Edit Modal -->
                      <div class="modal fade" id="edit_category_<?= $row['cat_id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <div class="row">
                                <div class="col-md-12">
                                  <div class="box box-primary">
                                    <form role="form" method="post" action="<?php echo base_url();?>update-category">

                                      <input type="hidden" name="cat_id" class="form-control" id="" value="<?php echo $row['cat_id']; ?>">

                                      <div class="box-body">
                                        <div class="form-group">
                                          <label for="exampleInputEmail1">Category Name</label>
                                          <input type="text" name="cat_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Category" value="<?php echo $row['cat_name'];?>">
                                        </div>
                                      </div>
                                      <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      </div> 
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                    </td>
                  </tr>
                  <?php $sl++;}?>
                </tbody>
              </table>
            </div>      
          </div>         
        </div>        
      </div>      

      <!-- Button trigger modal -->


<!-- Category Modal -->
<div class="modal fade" id="add_category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <div class="box box-primary">
              <form role="form" method="post" action="<?php echo base_url();?>submit-category">
                      <div class="box-body">
                       <div class="form-group">
                         <label for="exampleInputEmail1">Category Name</label>
                         <input type="text" name="cat_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Category">
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
      </div>
    </div>
  </div>
</div>


<!-- Button trigger modal -->

<!-- Modal -->



