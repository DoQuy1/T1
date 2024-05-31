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
                        <h4>Đăng nhập</h4>
                        <div class="card-body">
                            <form action="functions/authcode.php" method="POST">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Email</label>
                                    <input type="email" required name="email" class="form-control" placeholder="Nhập vào Email của bạn" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Mật khẩu</label>
                                    <input type="password" required name="password" class="form-control" placeholder="Nhập vào mật khẩu của bạn">
                                </div>
                                <button type="submit" name="login_btn" class="btn btn-primary">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include('include/footer.php'); ?>