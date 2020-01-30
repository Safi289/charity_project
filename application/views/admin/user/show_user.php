
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Users Table</h3>
              <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#add_user">
                Add User
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
              <table id="userview" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>SL</th>
                  <th>User Name</th>
                  <th>User Email</th>
                  <th>User Mobile</th>
                  <th>User Address</th>
                  <th>User Type</th>
                  <th>User Image</th>

                </tr>
                </thead>
                <tbody>
                  
                </tbody>
              </table>
            </div>      
          </div>         
        </div>        
      </div>      
    
    <!-- Add Modal -->
<div class="modal fade" id="add_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Add User -->
      <div class="row">
    <div class="col-md-12">

        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add User</h3>
            </div>

            <form role="form" method="post" action="<?php echo base_url();?>submit-user" enctype="multipart/form-data">
                <div class="box-body">
                  
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">User Name</label>
                        <input type="text" name="user_name" class="form-control" id="exampleInputEmail1" placeholder="Enter User">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">User Email</label>
                        <input type="text" name="user_email" class="form-control">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">User Mobile</label>
                        <input type="text" name="user_mobile" class="form-control">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">User Addess</label>
                        <input type="text" name="user_address" class="form-control">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">User Password</label>
                        <input type="Password" name="user_password" class="form-control">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">User Image</label>
                        <input type="file" class="form-control" name="user_image">
                    </div>
                  </div>

                   <div class="col-md-6">
                    <div class="form-check">
                      <input name="editor" type="checkbox" class="form-check-input" id="exampleCheck1" value="2">
                      <label  class="form-check-label" for="exampleCheck1">
                        Editor
                      </label>
                    </div>

                    <div class="form-check">
                      <input name="motivator" type="checkbox" class="form-check-input" id="exampleCheck" value="3">
                       <label class="form-check-label" for="exampleCheck1">
                        Motivator
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
       </div>  <!-- Add User -->
      </div>
      </div>
  </div>
</div>

<!-- Start Edit Modal -->

<div class="modal fade" id="edit_user_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

</div>

<!-- End Edit Modal -->


<script type="text/javascript">
    
     $(document).ready(function()
     {
        $('.edit_user_btn').click(function()
        {
                var id = $(this).attr('data-id');

                $.ajax({
                    url       : "<?php echo base_url(); ?>ajax-user-data", 
                    data      : {
                      id : id
                    },
                    method    : 'GET',
                    dataType  : 'json',
                    success   : function(response){
                      // console.log(response.edit_user);
                      $("#edit_user_modal").html(response.edit_user);
                      $('#edit_user_modal').modal('show');
                    }

                });
        });


        var dataTable = $('#userview').DataTable({

        "processing" : true,
        "serverSide" : true,
        "order"      : [],
        "ajax"       :{
          url  : "<?php echo base_url(); ?>fetch-user",
          type : "POST"
        },
        "columnDefs"  : [{
          "target"    : [0,3,4],
          "orderable" : false,
        },],

      });

     });
</script>



