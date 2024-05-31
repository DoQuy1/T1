<nav class="navbar navbar-expand-lg navbar-dark sticky-top bg-light shadow">
  <div class="container">
    <a class="navbar-brand text-dark" href="index.php">QUYQUY</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" title="Hàng hóa" href="category.php"><i class="fa fa-shopping-bag text-dark"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" title="Giỏ hàng" href="cart.php"><i class="fa fa-shopping-cart text-dark"></i></a>
        </li>
        <?php
        if (isset($_SESSION['auth'])) {
        ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-dark" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class=""></i> <?= $_SESSION['auth_user']['name']; ?>
            </a>
            <ul class="dropdown-menu">
              <!-- <li><a class="dropdown-item" href="#"><i class="fa fa-user-o text-dark"></i> Thông tin cá nhân</a></li> -->
              <li><a class="dropdown-item" href="my-order.php"><i class="fa fa-list-alt text-dark"></i> Đơn hàng của tôi</a></li>
              <li><a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out text-dark"></i> Đăng xuất</a></li>
            </ul>
          </li>
        <?php
        } else {
        ?>
          <li class="nav-item">
            <a class="nav-link text-dark" href="login.php"><i class="fa fa-sign-in"></i> Đăng nhập</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="register.php"><i class="fa fa-user-plus"></i> Đăng ký</a>
          </li>
        <?php
        }
        ?>
      </ul>
    </div>
  </div>
</nav>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
