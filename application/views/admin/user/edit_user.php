<div class="row">
    <div class="col-md-12">

        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit User</h3>
            </div>

            <form role="form" method="post" action="<?php echo base_url();?>update-user" enctype="multipart/form-data">

               <input type="hidden" name="id" class="form-control" id="" value="<?php echo $user_info['id']; ?>">

                <div class="box-body">
                  
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">User Name</label>
                        <input type="text" name="user_name" class="form-control" id="exampleInputEmail1" value="<?php echo $user_info['name']; ?>">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">User Email</label>
                        <input type="text" name="user_email" class="form-control" value="<?php echo $user_info['email']; ?>">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">User Mobile</label>
                        <input type="text" name="user_mobile" class="form-control" value="<?php echo $user_info['user_mobile']; ?>">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">User Addess</label>
                        <input type="text" name="user_address" class="form-control" value="<?php echo $user_info['user_address']; ?>">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">User Password</label>
                        <input type="Password" name="user_password" class="form-control" value="">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">User Image</label>
                        <input type="file" class="form-control" name="user_image">
                        <input type="hidden" class="form-control" name="prev_user_image" value="<?php echo $user_info['user_image']?>">
                    </div>
                  </div>

                   <div class="col-md-6">
                    <div class="form-check">
                      <input name="editor" type="checkbox" class="form-check-input" id="exampleCheck1" value="1" <?php if($user_info['user_type'] == 2 ){echo 'checked';};?>>
                      <label  class="form-check-label" for="exampleCheck1">
                        Editor
                      </label>
                    </div>

                    <div class="form-check">
                      <input name="motivator" type="checkbox" class="form-check-input" id="exampleCheck" value="2" <?php if($user_info['user_type'] == 3 ){echo 'checked';};?>>
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
</div>