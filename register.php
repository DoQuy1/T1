<?php 

session_start();
if(isset($_SESSION['auth']))
{
    $_SESSION['message'] = "Bạn đã có phiên đăng nhập";
    header('Location: index.php');
    exit();
}
include('include/header.php');
?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php
                if(isset($_SESSION['message'])) {
                ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <?= $_SESSION['message']; ?>.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                }
                unset($_SESSION['message']);
                ?>

                <div class="card">
                    <div class="card-header">
                        <h4>Đăng ký</h4>
                        <div class="card-body">
                            <form action="functions/authcode.php" method="POST">
                                <div class="mb-3">
                                    <label class="form-label">Tên</label>
                                    <input type="text" name="name" class="form-control" placeholder="Nhập vào tên của bạn">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Số điện thoại</label>
                                    <input type="number" name="phone" class="form-control" placeholder="Nhập vào số điện thoại của bạn">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Nhập vào Email của bạn" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Mật khẩu</label>
                                    <input type="password" name="password" class="form-control" placeholder="Nhập vào mật khẩu của bạn">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Nhập lại mật khẩu</label>
                                    <input type="password" name="confirmpassword" class="form-control" placeholder="Nhập lại mật khẩu của bạn">
                                </div>
                                <button type="submit" name="register_btn" class="btn btn-primary">Register</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('include/footer.php'); ?>