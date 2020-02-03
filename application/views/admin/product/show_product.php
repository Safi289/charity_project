      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Products Table</h3>
              <!-- for modal -->
             <!--  <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#add_product">
                Add Product
              </button> -->
              <!-- for another page -->
              <a href="<?= base_url();?>add-product" class="btn btn-primary btn-sm pull-right">Add Product</a>
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
                  <th>Product Brand</th>
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
                        <?php echo $row['brand_name'];?> 
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
                       <!--  <button  data-id="<?php echo $row['product_id']; ?>" type="button" class="btn btn-primary edit_product_btn" href="javascript:void(0)">
                         Edit
                        </button> -->
                        <a href="<?= base_url();?>edit-product/<?= $row['product_id']?>" class="btn btn-primary btn-sm">Edit</a>
                        <a href="<?= base_url();?>delete-product/<?= $row['product_id']?>" class="btn btn-danger btn-sm">Delete</a>


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
<!--  Add Product Modal End -->

<!-- Edit Product Modal Start  -->
 <div class="modal fade" id="edit_product_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        
 </div>
   <!-- Edit Product Modal End -->


<script type="text/javascript">
    
    $(document).ready(function()
     {
        $('.edit_product_btn').click(function()
        {
                var fsfdsf = $(this).attr('data-id');

                $.ajax({
                    url       : "<?php echo base_url(); ?>ajax-product-data",
                    data      : {
                      id : fsfdsf
                    },
                    method    : 'GET',
                    dataType  : 'json',
                    success   : function(response){
                       console.log(response);
                      $("#edit_product_modal").html(response.edit_product);
                      $('#edit_product_modal').modal('show');

                    }
                });
        });
     });

</script>




