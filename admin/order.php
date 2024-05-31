<?php

include('../middleware/adminMiddleware.php');
include('includes/header.php');


$statuses = array(
    0 => "Đang chờ xác nhận",
    1 => "Đặt hàng thành công",
    2 => "Đơn hàng bị hủy"
);

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                   <h4>Đơn hàng</h4>
                </div>
                <div class="card-body" id="">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Người mua</th>
                                <th>Mã dơn hàng</th>
                                <th>Giá</th>
                                <th>Ngày mua</th>
                                <th>Trạng thái</th>
                                <th>Xem</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $orders = getAllOrder();

                            if (mysqli_num_rows($orders) > 0) {
                                foreach ($orders as $item) {
                            ?>
                                    <tr>
                                        <td> <?= $item['id']; ?></td>
                                        <td> <?= $item['name']; ?></td>
                                        <td> <?= $item['order_code']; ?></td>
                                        <td> <?= $item['total_price']; ?></td>
                                        <td> <?= $item['created_at']; ?></td>
                                        <td><?= $statuses[$item['status']]; ?></td>
                                        <td>
                                            <a href="view-order.php?q=<?= $item['order_code']; ?>" class="btn btn-primary">Xem thông tin</a>
                                        </td>
                                    </tr>

                            <?php

                                }
                            } else {
                                ?>
                                   <tr>
                                       <td colspan="5"> Không có đơn hàng nào</td>
                                   </tr>
                                <?php
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