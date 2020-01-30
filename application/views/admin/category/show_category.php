
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Category Table</h3>
              <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#add_category">
                Add Category
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
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>SL</th>
                  <th>Category Name</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  
                </tbody>
              </table>
            </div>      
          </div>         
        </div>        
      </div>      

      <!-- Button trigger modal -->


<!-- Add Category Modal -->
<div class="modal fade" id="add_category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <div class="box box-primary">
              <form role="form" method="post" action="<?php echo base_url();?>submit-category">
                      <div class="box-body">
                       <div class="form-group">
                         <label for="exampleInputEmail1" >Category Name</label>
                         <input type="text" name="cat_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Category" required>
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
<!-- Add Category modal End-->


<!-- Edit Category Modal Start -->
<div class="modal fade" id="edit_category_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        
</div>
 <!-- Edit Category Modal End -->

<script type="text/javascript">
    
    $(document).ready(function()
     {
        $('.edit_category_btn').click(function()
        {
                var id = $(this).attr('data-id');

                $.ajax({
                    url       : "<?php echo base_url(); ?>ajax-category-data", 
                    data      : {
                      id : id
                    },
                    method    : 'GET',
                    dataType  : 'json',
                    success   : function(response){
                      // console.log(response);
                      $("#edit_category_modal").html(response.edit_category);
                      $('#edit_category_modal').modal('show');

                    }
                });
        });

      var dataTable = $('#example2').DataTable({
        "processing" : true,
        "serverSide" : true,
        "order"      : [],
        "ajax"       :{
          url  : "<?php echo base_url(); ?>fetch-category",
          type : "POST"
        },
        "columnDefs"  : [{
          "target"    : [0,3,4],
          "orderable" : false,
        },],

      });


  });


</script>



