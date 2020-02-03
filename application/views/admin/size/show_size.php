 <?php echo validation_errors(); ?>
 <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Size Table</h3>
             
              <p class="login-box-msg" style="color: red;font-weight: 600;">
                <?php 
                    $message = $this->session->flashdata('message');
                    echo $message; 
                ?> 
              </p>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="datatable" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>SL</th>
                  <th>Size Name</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php $i = 1;foreach($all_size as $row)   {?>
                   <!--  echo '<pre>';print_r($value);die; -->
                    <tr>
                      <td>
                        <?php echo $i;?>
                      </td>
                      <td>
                        <?php echo $row['size_name'];?>
                      </td>
                  
                      <td>
                         <a  href="<?= base_url();?>edit-size/<?= $row['size_id']?>" type="button" class="btn btn-primary btn-sm">
                         Edit
                        </a>
                        <a href="<?= base_url();?>delete-size/<?= $row['size_id']?>" class="btn btn-danger btn-sm">Delete</a>
                      </td>
                    </tr>
                  <?php $i++; }?>
                </tbody>
              </table>
            </div>      
          </div>         
        </div>        
      </div>      



      <!-- Add Slider Modal -->


<script type="text/javascript">
    

</script>