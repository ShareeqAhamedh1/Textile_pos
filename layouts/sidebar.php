<div class="sidebar" id="sidebar">
  <div class="sidebar-inner slimscroll">
    <div id="sidebar-menu" class="sidebar-menu">
      <ul>
        <?php $pg_name = basename($_SERVER['PHP_SELF']); ?>
        <li class="<?php if($pg_name=='index.php'){echo('active');} ?>" >
          <a href="index.php" ><img src="assets/img/icons/dashboard.svg" alt="img"><span> Dashboard</span> </a>
        </li>

        <li class="submenu">
          <a href="javascript:void(0);"><img src="assets/img/icons/sale.svg" alt="img"> <span> Sales </span> <span class="menu-arrow"></span></a>
          <ul>
            <li class="<?php if($pg_name=='sales_report.php'){echo('active');} ?>" >
              <a href="sales_report.php" ><span>Sales Report</span> </a>
            </li>
            <li class="<?php if($pg_name=='sales_report_filter.php'){echo('active');} ?>" >
              <a href="sales_report_filter.php" ><span>Sales Item Tracking</span> </a>
            </li>
          </ul>
        </li>
        
        <li class="<?php if($pg_name=='pos.php'){echo('active');} ?>" >
          <a href="pos.php" ><i class="fa fa-desktop"></i><span> POS</span> </a>
        </li>
        
        <li class="submenu">
          <a href="javascript:void(0);"><i class="fa fa-bars"></i> <span> Manage Stock </span> <span class="menu-arrow"></span></a>
          <ul>
            <li><a class="<?php if($pg_name=='view_stock.php' || $pg_name=='view_stock.php' ){echo('active');} ?>" href="view_stock.php">View Stock</a></li>
            <li><a class="<?php if($pg_name=='update_stock_grm.php' || $pg_name=='update_stock.php' ){echo('active');} ?>" href="update_stock_grm.php">Update Stock</a></li>
            
          </ul>
        </li>
       

        <li class="submenu">
          <a href="javascript:void(0);"><img src="assets/img/icons/product.svg" alt="img"><span> Product</span> <span class="menu-arrow"></span></a>
          <ul>
            <li><a class="<?php if($pg_name=='productlist.php'){echo('active');} ?>" href="productlist.php">Product List</a></li>
            <li><a class="<?php if($pg_name=='price_table.php'){echo('active');} ?>" href="price_table.php">Price Table</a></li>
            <li><a class="<?php if($pg_name=='productlist_02.php'){echo('active');} ?>" href="productlist_02.php">Product List Preview</a></li>
            <li><a class="<?php if($pg_name=='productlist_box.php'){echo('active');} ?>" href="productlist_box.php">Product List by Box Number</a></li>
            <li><a class="<?php if($pg_name=='product_bulk_edit.php'){echo('active');} ?>" href="product_bulk_edit.php">Product Bulk Edit</a></li>
            <li><a class="<?php if($pg_name=='addproduct.php'){echo('active');} ?>" href="addproduct.php">Add Product</a></li>
            <li><a class="<?php if($pg_name=='categorylist.php'){echo('active');} ?>" href="categorylist.php">Category List</a></li>
            <li><a class="<?php if($pg_name=='addcategory.php'){echo('active');} ?>" href="addcategory.php">Add Category</a></li>
            <li><a class="<?php if($pg_name=='subcategorylist.php'){echo('active');} ?>" href="subcategorylist.php">Sub Category List</a></li>
            <li><a class="<?php if($pg_name=='subaddcategory.php'){echo('active');} ?>" href="subaddcategory.php">Add Sub Category</a></li>
            <li><a class="<?php if($pg_name=='brandlist.php'){echo('active');} ?>" href="brandlist.php">Brand List</a></li>
            <li><a class="<?php if($pg_name=='addbrand.php'){echo('active');} ?>" href="addbrand.php">Add Brand</a></li>

          </ul>
        </li>

      

       
        <li class="submenu">
          <a href="javascript:void(0);"><i class="fa fa-user" data-bs-toggle="tooltip" title="" data-bs-original-title="fa fa-anchor" aria-label="fa fa-anchor"></i>
            <span> User Management</span> <span class="menu-arrow"></span></a>
          <ul>
            <li><a class="<?php if($pg_name=='add_user.php'){echo('active');} ?>" href="add_user.php">User List</a></li>
            <li><a class="<?php if($pg_name=='user_access.php'){echo('active');} ?>" href="user_access.php">Manage Users</a></li>
          </ul>
        </li>

      </ul>
    </div>
  </div>
</div>
