
 <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Brand Table</h3>
             
              <p class="login-box-msg" style="color: red;font-weight: 600;">
                
              </p>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="datatable" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>SL</th>
                  <th>Order ID</th>
                  <th>User Name</th>
                  <th>Total</th>
                  <th>Order Date</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                 <?php $i = 1;foreach($all_order as $row)   {?> 
                   <!--  echo '<pre>';print_r($value);die; -->
                    <tr>
                      <td>
                         <?php echo $i;?> 

                      </td>
                      <td>
                         <?php echo $row['id'];?> 
                      
                      </td>
                      <td>
                        <?php echo $row['first_name']; echo $row['last_name']; ?> 
                      </td>
                    
                      <td>
                     
                        <?php echo $row['total'];?> 
                      </td>
                      <td>
                         <?php echo $row['created_at'];?> 
                      </td>
                      <td>
                         <a  href="<?= base_url();?>show-detail/<?= $row['id']?>" type="button" class="btn btn-primary btn-sm">
                         View Detail
                        </a>
                        
                      </td>
                    </tr>
                <!--   <?php $i++; }?> -->
                </tbody>
              </table>
            </div>      
          </div>         
        </div>        
      </div>      



      <!-- Add Slider Modal -->


<script type="text/javascript">
    

</script>