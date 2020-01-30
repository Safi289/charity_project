<div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <!-- body -->
                              <div class="row">
                                <div class="col-md-12">
                                  <div class="box box-primary">
                                    <form role="form" method="post" action="<?php echo base_url();?>update-category">

                                      <input type="hidden" name="cat_id" class="form-control" id="" value="<?php echo $get_category['cat_id']; ?>">

                                      <div class="box-body">
                                        <div class="form-group">
                                          <label for="exampleInputEmail1">Category Name</label>
                                          <input type="text" name="cat_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Category" value="<?php echo $get_category['cat_name'];?>">
                                        </div>
                                      </div>
                                      <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      </div> 
                                    </form>
                                  </div>
                                </div>
                              </div> <!-- body -->

                            </div>
                          </div>
                        </div>