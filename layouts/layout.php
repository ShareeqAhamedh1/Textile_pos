<div class="sidebar" id="sidebar">
  <div class="sidebar-inner slimscroll">
    <div id="sidebar-menu" class="sidebar-menu">
      <ul>
        <?php $pg_name = basename($_SERVER['PHP_SELF']); ?>
        <li class="<?php if($pg_name=='index.php'){echo('active');} ?>" >
          <a href="index.php" ><img src="assets/img/icons/dashboard.svg" alt="img"><span> Dashboard</span> </a>
        </li>
        <li class="submenu">
          <a href="javascript:void(0);"><img src="assets/img/icons/product.svg" alt="img"><span> Product</span> <span class="menu-arrow"></span></a>
          <ul>
            <li><a class="<?php if($pg_name=='productlist.php'){echo('active');} ?>" href="productlist.php">Product List</a></li>

            <li><a class="<?php if($pg_name=='addproduct.php'){echo('active');} ?>" href="addproduct.php">Add Product</a></li>
            <li><a class="<?php if($pg_name=='categorylist.php'){echo('active');} ?>" href="categorylist.php">Category List</a></li>
            <li><a class="<?php if($pg_name=='addcategory.php'){echo('active');} ?>" href="addcategory.php">Add Category</a></li>
            <li><a class="<?php if($pg_name=='subcategorylist.php'){echo('active');} ?>" href="subcategorylist.php">Sub Category List</a></li>
            <li><a class="<?php if($pg_name=='subaddcategory.php'){echo('active');} ?>" href="subaddcategory.php">Add Sub Category</a></li>
            <li><a class="<?php if($pg_name=='brandlist.php'){echo('active');} ?>" href="brandlist.php">Brand List</a></li>
            <li><a class="<?php if($pg_name=='addbrand.php'){echo('active');} ?>" href="addbrand.php">Add Brand</a></li>
            <li><a class="<?php if($pg_name=='importproduct.php'){echo('active');} ?>" href="importproduct.php">Import Products</a></li>

          </ul>
        </li>
        <li class="submenu">
          <a href="javascript:void(0);"><img src="assets/img/icons/sales1.svg" alt="img"><span> Sales</span> <span class="menu-arrow"></span></a>
          <ul>
            <li><a class="<?php if($pg_name=='saleslist.php'){echo('active');} ?>" href="saleslist.php">Sales List</a></li>
            <li><a class="<?php if($pg_name=='pos.php'){echo('active');} ?>" href="pos.php">POS</a></li>
            <li><a class="<?php if($pg_name=='pos.php'){echo('active');} ?>" href="pos.php">New Sales</a></li>
            <li><a class="<?php if($pg_name=='salesreturnlists.php'){echo('active');} ?>" href="salesreturnlists.php">Sales Return List</a></li>
            <li><a class="<?php if($pg_name=='createsalesreturns.php'){echo('active');} ?>" href="createsalesreturns.php">New Sales Return</a></li>
          </ul>
        </li>

        <li class="submenu">
          <a href="javascript:void(0);"><img src="assets/img/icons/expense1.svg" alt="img"><span> Expense</span> <span class="menu-arrow"></span></a>
          <ul>
            <li><a class="<?php if($pg_name=='expenselist.php'){echo('active');} ?>" href="expenselist.php">Expense List</a></li>
            <li><a class="<?php if($pg_name=='createexpense.php'){echo('active');} ?>" href="createexpense.php">Add Expense</a></li>
            <li><a class="<?php if($pg_name=='expensecategory.php'){echo('active');} ?>" href="expensecategory.php">Expense Category</a></li>
          </ul>
        </li>

        <li class="submenu">
          <a href="javascript:void(0);"><img src="assets/img/icons/transfer1.svg" alt="img"><span> Transfer</span> <span class="menu-arrow"></span></a>
          <ul>
            <li><a class="<?php if($pg_name=='transferlist.php'){echo('active');} ?>" href="transferlist.php">Transfer  List</a></li>
            <li><a class="<?php if($pg_name=='addtransfer.php'){echo('active');} ?>" href="addtransfer.php">Add Transfer </a></li>
            <li><a class="<?php if($pg_name=='importtransfer.php'){echo('active');} ?>" href="importtransfer.php">Import Transfer </a></li>
          </ul>
        </li>
        <li class="submenu">
          <a href="javascript:void(0);"><img src="assets/img/icons/return1.svg" alt="img"><span> Return</span> <span class="menu-arrow"></span></a>
          <ul>
            <li><a class="<?php if($pg_name=='salesreturnlist.php'){echo('active');} ?>" href="salesreturnlist.php">Sales Return List</a></li>
            <li><a class="<?php if($pg_name=='createsalesreturn.php'){echo('active');} ?>" href="createsalesreturn.php">Add Sales Return </a></li>
            <li><a class="<?php if($pg_name=='purchasereturnlist.php'){echo('active');} ?>" href="purchasereturnlist.php">Purchase Return List</a></li>
            <li><a class="<?php if($pg_name=='createpurchasereturn.php'){echo('active');} ?>" href="createpurchasereturn.php">Add Purchase Return </a></li>
          </ul>
        </li>

      </ul>
    </div>
  </div>
</div>
