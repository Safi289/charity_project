<div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                          <div class="modal-body"> 
                             <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-primary">
                                        <div class="box-header with-border">
                                          <h3 class="box-title">Edit Product</h3>
                                          <p class="login-box-msg" style="color: red;font-weight: 600;">
                                            <?php 
                                                $message = $this->session->flashdata('message');
                                                echo $message; 
                                            ?> 
                                          </p>
                                        </div>

                                        <form role="form" method="post" action="<?php echo base_url();?>update-product" enctype="multipart/form-data">

                                          <input type="hidden" name="product_id" class="form-control" id="" value="<?php echo $get_product['product_id']; ?>">

                                            <div class="box-body">
                                              <div class="col-md-6">
                                                 <div class="form-group">
                                                    <label for="exampleInputEmail1">Select Category</label><br>
                                                    <select name="pro_category" class="form-control">
                                                         <option value="">Select</option>
                                                         <?php foreach($all_category as $row1) {?>
                                                         <option value="<?=$row1['cat_id'];?>" <?php if($row1['cat_id'] == $get_product['product_category']) {echo 'selected';}?>>
                                                           <?php echo $row1['cat_name']; ?> 
                                                         </option>
                                                         <?php }?>
                                                    </select>

                                                </div>
                                              </div>
                                              
                                              <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Product Name</label>
                                                    <input type="text" name="pro_name" class="form-control" id="exampleInputEmail1" value="<?php echo $get_product['product_name']; ?>">
                                                </div>
                                              </div>

                                              <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Product Price</label>
                                                    <input type="text" name="pro_price" class="form-control" value="<?php echo $get_product['product_price']; ?>">
                                                </div>
                                              </div>

                                              <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Upload Image</label>
                                                    <input type="file" class="form-control" name="pro_image">
                                                    <input type="hidden" class="form-control" name="prev_product_image" value="<?php echo $get_product['product_image']?>">
                                                </div>
                                              </div>

                                              <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Product Description</label>
                                                    <textarea class="form-control" name="pro_description"><?php echo $get_product['product_description']; ?></textarea>
                                                </div>
                                              </div>

                                              <div class="col-md-6">
                                                <div class="form-check">
                                                  <input name="hot" type="checkbox" class="form-check-input" id="exampleCheck1" value="2" <?php if($get_product['product_type'] == 2 ){echo 'checked';};?>>
                                                  <label  class="form-check-label" for="exampleCheck1">
                                                    Hot Product
                                                  </label>
                                                </div>

                                                <div class="form-check">
                                                  <input name="featured" type="checkbox" class="form-check-input" id="exampleCheck" value="1" <?php if($get_product['product_type'] == 1 ){echo 'checked';};?>>
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
                          </div> 
                        </div>
                      </div>