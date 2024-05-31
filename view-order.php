<?php

include('functions/userfunction.php');
include('include/header.php');
include('authenticate.php');
if (isset($_GET['q'])) {
    $order_code = $_GET['q'];
    $orderData = getOrderCodeNoValid($order_code);
    if (mysqli_num_rows($orderData) < 0) {
?>
        <h4>Có lỗi xảy ra</h4>
    <?php
        die();
    }
} else {
    ?>
    <h4>Có lỗi xảy ra</h4>
<?php
    die();
}
$data = mysqli_fetch_array($orderData);
?>

<div class="py-3 bg-primary">
    <div class="container">
        <h6 class="text-white">
            <a class="text-white" style="text-decoration: none;" href="index.php">
                Home /
            </a>
            <a class="text-white" style="text-decoration: none;" href="my-order.php">
                Đơn hàng của tôi/
            </a>
            <a class="text-white" style="text-decoration: none;" href="my-order.php">
                Xem đơn hàng
            </a>
        </h6>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Xem thông tin đơn hàng
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>Địa chỉ giao hàng</h5>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Tên</label>
                                            <div class="border p-1">
                                                <?= $data['name']; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Email</label>
                                            <div class="border p-1">
                                                <?= $data['email']; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Số điện thoại</label>
                                            <div class="border p-1">
                                                <?= $data['phone']; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Mã đơn hàng</label>
                                            <div class="border p-1">
                                                <?= $data['order_code']; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Địa chỉ</label>
                                            <div class="border p-1">
                                                <?= $data['address']; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Zipcode</label>
                                            <div class="border p-1">
                                                <?= $data['zipcode']; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h5>Đơn hàng</h5>
                                    <hr>

                                    <table class="table">
                                        <thead>
                                            <th>Sản phẩm</th>
                                            <th>Size</th>
                                            <th>Giá</th>
                                            <th>Số lượng</th>
                                        </thead>
                                        
                                        <tbody>
                                            
                                            <?php
                                            $userId = $_SESSION['auth_user']['user_id'];

                                            $order_query = "SELECT a.id as order_id, a.order_code, a.user_id, b.size as bsize, b.qty as bqty, b.*, p.* FROM orders a, order_items b, products p
                                                        WHERE a.user_id='$userId' AND b.order_id=a.id AND p.id=b.prod_id AND a.order_code='$order_code'";
                                            $order_query_run = mysqli_query($con, $order_query);

                                            if (mysqli_num_rows($order_query_run) > 0) {
                                                foreach ($order_query_run as $item) {
                                                    ?>
                                                        <tr>
                                                            <td>
                                                                <img src="uploads/<?= $item['image']; ?>" width="50px" height="50px" alt="Hình ảnh sản phẩm">
                                                                <?= $item['name']; ?>
                                                            </td>
                                                            <td>
                                                                <?= $item['bsize']; ?>
                                                            </td>
                                                            <td>
                                                                <?= $item['price']; ?>VND
                                                            </td>
                                                            <td>
                                                                <?= $item['bqty']; ?>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>

                                    <hr>
                                    <h5>Tổng: <span class="float-end fw-bold"><?= $data['total_price']; ?>VND</span></h5>
                                    <hr>

                                    <label class="fw-bold">Phương thức thanh toán:</label>
                                    <div class="border p-1 mb-3">
                                        <?= $data['payment_mode']; ?>
                                    </div>
                                    <label class="fw-bold">Trạng thái:</label>
                                    <div class="border p-1 mb-3">                                        
                                        <?php
                                            if($data['status']==0)
                                            {
                                                echo "Đang xác nhận";
                                            }
                                            else if($data['status']==1)
                                            {
                                                echo "Đặt hàng thành công";
                                            }
                                            else if($data['status']==2)
                                            {
                                                echo "Bị hủy";
                                            }
                                         
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

        </div>

    </div>
</div>

<?php include('include/footer.php'); ?>