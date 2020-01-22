
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Category Table</h3>
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
                      <a href="<?= base_url();?>edit-category/<?= $row['cat_id']?>" class="btn btn-primary btn-sm">Edit</a>
                      <a href="<?= base_url();?>delete-category/<?= $row['cat_id']?>" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                  </tr>
                  <?php $sl++;}?>
                </tbody>
              </table>
            </div>      
          </div>         
        </div>        
      </div>      
    

