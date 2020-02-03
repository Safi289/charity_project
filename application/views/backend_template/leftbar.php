<section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url();?>assets/backend_asset/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>Alexander Pierce</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                  </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            
            <li class="active treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
                <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
              </ul>
            </li>

             <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Category</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                

                <li>
                  <a href="<?php echo base_url();?>show-category">
                    <i class="fa fa-circle-o"></i>
                     <span>All Categories</span>
                      <span class="pull-right-container">
                     </span>
                  </a>  
                </li>
          </ul>
        </li>



        <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Products</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
               
               <li>
                  <a href="<?php echo base_url();?>add-product">
                    <i class="fa fa-circle-o"></i>
                     <span>Add Products</span>
                      <span class="pull-right-container">
                     </span>
                  </a>  
                </li>

                <li>
                  <a href="<?php echo base_url();?>show-product">
                    <i class="fa fa-circle-o"></i>
                     <span>All Products</span>
                      <span class="pull-right-container">
                     </span>
                  </a>  
                </li>
          </ul>
        </li>

         <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Slider</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
               

                <li>
                  <a href="<?php echo base_url();?>show-slider">
                    <i class="fa fa-circle-o"></i>
                     <span>All Slider</span>
                      <span class="pull-right-container">
                     </span>
                  </a>  
                </li>
          </ul>
        </li>

         <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Brand</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
               
                <li>
                  <a href="<?php echo base_url();?>add-brand">
                    <i class="fa fa-circle-o"></i>
                     <span>Add Brand</span>
                      <span class="pull-right-container">
                     </span>
                  </a>  
                </li>

                <li>
                  <a href="<?php echo base_url();?>show-brand">
                    <i class="fa fa-circle-o"></i>
                     <span>All Brand</span>
                      <span class="pull-right-container">
                     </span>
                  </a>  
                </li>
          </ul>
        </li>

        <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Colors</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
               
                <li>
                  <a href="<?php echo base_url();?>add-color">
                    <i class="fa fa-circle-o"></i>
                     <span>Add Color</span>
                      <span class="pull-right-container">
                     </span>
                  </a>  
                </li>

                <li>
                  <a href="<?php echo base_url();?>show-color">
                    <i class="fa fa-circle-o"></i>
                     <span>All Colors</span>
                      <span class="pull-right-container">
                     </span>
                  </a>  
                </li>
          </ul>
        </li>

         <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Size</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
               
                <li>
                  <a href="<?php echo base_url();?>add-size">
                    <i class="fa fa-circle-o"></i>
                     <span>Add Size</span>
                      <span class="pull-right-container">
                     </span>
                  </a>  
                </li>

                <li>
                  <a href="<?php echo base_url();?>show-size">
                    <i class="fa fa-circle-o"></i>
                     <span>All Sizes</span>
                      <span class="pull-right-container">
                     </span>
                  </a>  
                </li>
          </ul>
        </li>

        <!-- <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Users</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">

                <li>
                  <a href="<?php echo base_url();?>show-user">
                    <i class="fa fa-circle-o"></i>
                     <span>All Users</span>
                      <span class="pull-right-container">
                     </span>
                  </a>  
                </li>
          </ul>
        </li> -->


      </ul>
        </section>