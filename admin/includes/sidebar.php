<?php
ob_start();
$page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/") + 1);
?>


<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0" href="index.php" >
      <span class="ms-1 font-weight-bold text-white">Trang chủ</span>
    </a>
  </div>
  <hr class="horizontal light mt-0 mb-2">
  <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
    <ul class="navbar-nav">

      <li class="nav-item">
        <a class="nav-link text-white <?= $page == "category.php" ? 'active bg-gradient-secondary' : '' ?>" href="category.php">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">table_view</i>
          </div>
          <span class="nav-link-text ms-1">Quản lý hàng hóa</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white <?= $page == "add-category.php" ? 'active bg-gradient-secondary' : '' ?>" href="add-category.php">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">add</i>
          </div>
          <span class="nav-link-text ms-1">Thêm hàng hóa</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-white <?= $page == "product.php" ? 'active bg-gradient-secondary' : '' ?>" href="product.php">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">table_view</i>
          </div>
          <span class="nav-link-text ms-1">Quản lý sản phẩm</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white <?= $page == "add-product.php" ? 'active bg-gradient-secondary' : '' ?>" href="add-product.php">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">add</i>
          </div>
          <span class="nav-link-text ms-1">Thêm sản phẩm</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white <?= $page == "order.php" ? 'active bg-gradient-secondary' : '' ?>" href="order.php">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">table_view</i>
          </div>
          <span class="nav-link-text ms-1">Quản lý đơn hàng</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white <?= $page == "manageuser.php" ? 'active bg-gradient-secondary' : '' ?>" href="manageuser.php">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">table_view</i>
          </div>
          <span class="nav-link-text ms-1">Quản lý người dùng</span>
        </a>
      </li>

    </ul>
  </div>
  <div class="sidenav-footer position-absolute w-100 bottom-0 ">
    <div class="mx-3">
      <a class="btn btn-secondary mt-4 w-100" href="../logout.php" type="button"><i class="fa fa-sign-out"></i> Đăng xuất</a>
    </div>
  </div>
</aside>