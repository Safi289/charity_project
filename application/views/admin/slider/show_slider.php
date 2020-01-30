 <?php echo validation_errors(); ?>
 <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Slider Table</h3>
              <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#add_slider">
                Add Slider
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
              <table id="datatable" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>SL</th>
                  <th>Slider Title</th>
                  <th>Slider Text</th>
                  <th>Slider Image</th>
                </tr>
                </thead>
                <tbody>
                  <?php $i = 1;foreach($all_slider as $key => $value)   {?>
                   <!--  echo '<pre>';print_r($value);die; -->
                    <tr>
                      <td>
                        <?php echo $i;?>
                      </td>
                      <td>
                        <?php echo $value['slider_title'];?>
                      </td>
                      <td>
                        <?php echo $value['slider_text'];?>
                      </td>
                      <td>
                       <img src="<?=base_url();?>uploads/slider/<?php echo $value['slider_image'];?>" alt="" style="width: 80px;height: 50px;"> 
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
<div class="modal fade" id="add_slider" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Slider</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <div class="box box-primary">
              <form role="form" method="post" action="<?php echo base_url();?>submit-slider" enctype="multipart/form-data">
                      <div class="box-body">
                       <div class="form-group">
                         <label for="exampleInputEmail1" >Slider Title</label>
                         <input type="text" name="slider_title" class="form-control" id="exampleInputEmail1" placeholder="Enter Slider Title" required>
                       </div>

                       <div class="form-group">
                         <label for="exampleInputEmail1" >Slider Text</label>
                         <input type="text" name="slider_text" class="form-control" id="exampleInputEmail1" placeholder="Enter Slider Text" required>
                       </div>

                       <div class="form-group">
                         <label for="exampleInputEmail1" >Slider Image</label>
                         <input type="file" name="slider_image" class="form-control" id="exampleInputEmail1">
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
<!-- Add Slider modal End-->

<script type="text/javascript">
    

</script>