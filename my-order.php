<?php

include('functions/userfunction.php');
include('include/header.php');
include('authenticate.php');

$statuses = array(
    0 => "Đang chờ xác nhận",
    1 => "Đặt hàng thành công",
    2 => "Đơn hàng bị hủy"
);
?>

<div class="py-3 bg-primary">
    <div class="container">
        <h6 class="text-white">
            <a class="text-white" style="text-decoration: none;" href="index.php">
                Home /
            </a>
            <a class="text-white" style="text-decoration: none;" href="my-order.php">
                Đơn hàng của tôi
            </a>
        </h6>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Mã dơn hàng</th>
                                <th>Giá</th>
                                <th>Ngày mua</th>
                                <th>Trạng thái</th>
                                <th>Xem</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $orders = getOrder();

                            if (mysqli_num_rows($orders) > 0) {
                                foreach ($orders as $item) {
                            ?>
                                    <tr>
                                        <td> <?= $item['id']; ?></td>
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

<?php include('include/footer.php'); ?>