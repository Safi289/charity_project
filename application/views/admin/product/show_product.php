      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Products Table</h3>
              <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#add_product">
                Add Product
              </button>
               <p class="login-box-msg" style="color: green;font-weight: 600;">
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
                  <th>Product Category</th>
                  <th>Product Name</th>
                  <th>Product Price</th>
                  <th>Product Image</th>
                  <th>Product Type</th>
                </tr>
                </thead>
                <tbody>
                  <?php $sl = 1;foreach($product_info as $row) {?> 
                    <tr>
                      <td>
                         <?php echo $sl;?> 
                      </td>
                      <td>
                        <?php echo $row['cat_name'];?> 
                      </td>
                      <td>
                        <?php echo $row['product_name'];?> 
                      </td>
                      <td>
                        <?php echo $row['product_price'];?> 
                      </td>
                      <td>
                        <img src="<?=base_url();?>uploads/<?php echo $row['product_image'];?>" alt="" style="width: 80px;height: 50px;"> 
                      </td>
                      <td>
                        <?php if($row['product_type'] == '1') {
                          echo 'Featured';
                        } else {
                          echo 'Hot';
                        }?> 
                      </td>
                      <td>
                        <button onclick="setEventId(<?= $row['product_id'] ?>)" type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit_product_<?= $row['product_id']?>" href="javascript:void(0)">
                         Edit
                        </button>
                        <a href="<?= base_url();?>delete-product/<?= $row['product_id']?>" class="btn btn-danger btn-sm">Delete</a>

                        <!-- Edit Product Modal -->
                        <div class="modal fade" id="edit_product_<?= $row['product_id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                                          <input type="hidden" name="product_id" class="form-control" id="" value="<?php echo $row['product_id']; ?>">

                                            <div class="box-body">
                                              <div class="col-md-6">
                                                 <div class="form-group">
                                                    <label for="exampleInputEmail1">Select Category</label><br>
                                                    <select name="pro_category" class="form-control">
                                                         <option value="">Select</option>
                                                         <?php foreach($all_category as $row1) {?>
                                                         <option value="<?=$row1['cat_id'];?>" <?php if($row1['cat_id'] == $row['product_category']) {echo 'selected';}?>>
                                                           <?php echo $row1['cat_name']; ?> 
                                                         </option>
                                                         <?php }?>
                                                    </select>

                                                </div>
                                              </div>
                                              
                                              <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Product Name</label>
                                                    <input type="text" name="pro_name" class="form-control" id="exampleInputEmail1" value="<?php echo $row['product_name']; ?>">
                                                </div>
                                              </div>

                                              <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Product Price</label>
                                                    <input type="text" name="pro_price" class="form-control" value="<?php echo $row['product_price']; ?>">
                                                </div>
                                              </div>

                                              <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Upload Image</label>
                                                    <input type="file" class="form-control" name="pro_image">
                                                    <input type="hidden" class="form-control" name="prev_product_image" value="<?php echo $row['product_image']?>">
                                                </div>
                                              </div>

                                              <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Product Description</label>
                                                    <textarea class="form-control" name="pro_description"><?php echo $row['product_description']; ?></textarea>
                                                </div>
                                              </div>

                                              <div class="col-md-6">
                                                <div class="form-check">
                                                  <input name="hot" type="checkbox" class="form-check-input" id="exampleCheck1" value="2" <?php if($row['product_type'] == 2 ){echo 'checked';};?>>
                                                  <label  class="form-check-label" for="exampleCheck1">
                                                    Hot Product
                                                  </label>
                                                </div>

                                                <div class="form-check">
                                                  <input name="featured" type="checkbox" class="form-check-input" id="exampleCheck" value="1" <?php if($row['product_type'] == 1 ){echo 'checked';};?>>
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
                          </div> <!-- edit product modal end -->
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
    
   <!--add product modal -->
  <div class="modal fade" id="add_product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
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
      </div>
      </div>
  </div>
</div>




