<?php

include('../middleware/adminMiddleware.php');
include('includes/header.php');

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Quản lý người dùng</h4>
                </div>
                <div class="card-body" id="user_table">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Quyền</th>
                                <th>Trạng thái</th>
                                <th>Cập nhật</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $phanquyen = array(
                                0 => "Người dùng",
                                1 => "Quản trị viên",
                                2 => "Người quản lý"
                            );
                            if ($_SESSION['role_pq'] == 2) 
                            {
                                $muser = getAll("users");

                                if (mysqli_num_rows($muser) > 0) 
                                {
                                    foreach ($muser as $item) {

                            ?>
                                        <tr>
                                            <td> <?= $item['id']; ?></td>
                                            <td> <?= $item['name']; ?></td>
                                            <td> <?= $phanquyen[$item['role_pq']]; ?></td>
                                            <td> <?= $item['user_status'] == '0' ? "Hoạt động" : "Hạn chế";  ?></td>
                                            <td>
                                                <a href="edit-user.php?id=<?= $item['id']; ?>" class="btn btn-primary">Sửa</a>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-danger delete_userss_btn" value="<?= $item['id']; ?>" name="delete_userss_btn">Xóa</button>
                                            </td>

                                        </tr>
                            <?php

                                    }
                                } 
                                else
                                {
                                    echo "Chưa có người dùng nào ";
                                }
                            }
                            else
                            {
                                $muser = getRole1();

                                if (mysqli_num_rows($muser) > 0) 
                                {
                                    foreach ($muser as $item) {

                            ?>
                                        <tr>
                                            <td> <?= $item['id']; ?></td>
                                            <td> <?= $item['name']; ?></td>
                                            <td> <?= $phanquyen[$item['role_pq']]; ?></td>
                                            <td> <?= $item['user_status'] == '0' ? "Hoạt động" : "Hạn chế";  ?></td>
                                            <td>
                                                <a href="edit-user.php?id=<?= $item['id']; ?>" class="btn btn-primary">Sửa</a>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-danger delete_userss_btn" value="<?= $item['id']; ?>" name="delete_userss_btn">Xóa</button>
                                            </td>

                                        </tr>
                            <?php

                                    }
                                } 
                                else
                                {
                                    echo "Chưa có người dùng nào ";
                                }


                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>