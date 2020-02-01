 <?php echo validation_errors(); ?>
 <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Brand Table</h3>
             
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
                  <th>Brand Name</th>
                  <th>Brand Image</th>
                </tr>
                </thead>
                <tbody>
                  <?php $i = 1;foreach($all_brand as $row)   {?>
                   <!--  echo '<pre>';print_r($value);die; -->
                    <tr>
                      <td>
                        <?php echo $i;?>
                      </td>
                      <td>
                        <?php echo $row['brand_name'];?>
                      </td>
                    
                      <td>
                       <img src="<?=base_url();?>uploads/brand/<?php echo $row['brand_image'];?>" alt="" style="width: 80px;height: 50px;"> 
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