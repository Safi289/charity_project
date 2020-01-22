
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Products Table</h3>
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
                  <th>Product Category</th>
                  <th>Product Name</th>
                  <th>Product Price</th>
                  <th>Product Image</th>
                  <th>Product Type</th>
                </tr>
                </thead>
                <tbody>
                  <?php $sl = 1;foreach($all_product as $row) {?> 
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
                          echo 'Hot';
                        } else {
                          echo 'Featured';
                        }?> 
                      </td>
                      <td>
                        <a href="<?= base_url();?>edit-product/<?= $row['product_id']?>" class="btn btn-primary btn-sm">Edit</a>
                        <a href="<?= base_url();?>delete-product/<?= $row['product_id']?>" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                  </tr>
                   <?php $sl++;}?>   
                </tbody>
              </table>
            </div>      
          </div>         
        </div>        
      </div>      
    

