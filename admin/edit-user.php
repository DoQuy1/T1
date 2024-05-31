<?php
include('../middleware/adminMiddleware.php');
include('includes/header.php');


?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $user = getByID("users", $id);

                if (mysqli_num_rows($user) > 0) {
                    $data = mysqli_fetch_array($user);
            ?>
                    <div class="card">
                        <div class="card-header">
                            <h4>Cập nhật dữ liệu người dùng
                                <a href="manageuser.php" class="btn btn-warning float-end">Quay lại</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="code.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="hidden" name="user_id" value="<?= $data['id'] ?>">
                                        <label for="">Tên</label>
                                        <input type="text" name="name" value="<?= $data['name'] ?>" placeholder="Nhập tên sản phẩm" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Email</label>
                                        <input type="text" name="email" value="<?= $data['email'] ?>" placeholder="Nhập email" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Số điện thoại</label>
                                        <input type="text" name="phone" value="<?= $data['phone'] ?>" placeholder="Nhập số điên thoại" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Mật khẩu</label>
                                        <input type="text" name="password" value="<?= $data['password'] ?>" placeholder="Nhập mật khẩu" class="form-control">
                                    </div>
                                    <form action="code.php" method="POST">
                                        <div class="col-md-6">
                                            <label class="">Quyền</label>
                                            <select name="role_pq" id="" class="form-select">
                                                <option value="0" <?= $data['role_pq'] == 0 ? "selected" : "" ?>>Người dùng</option>
                                                <option value="1" <?= $data['role_pq'] == 1 ? "selected" : "" ?>>Quản trị viên</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="">Trạng thái</label>
                                            <select name="user_status" id="" class="form-select">
                                                <option value="0" <?= $data['user_status'] == 0 ? "selected" : "" ?>>Kích hoạt</option>
                                                <option value="1" <?= $data['user_status'] == 1 ? "selected" : "" ?>>Hạn chế</option>
                                            </select>
                                        </div>
                                        <div class="">
                                            <button type="submit" name="update_user_btn" class="btn btn-success mt-2">Cập nhật dữ liệu người dùng</button>
                                        </div>
                                    </form>
                                </div>
                            </form>
                        </div>
                    </div>
            <?php
                } else {
                    echo "Không tìm thấy người dùng";
                }
            } else {
                echo "Có lỗi xảy ra";
            }
            ?>

        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>