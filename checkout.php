<?php

include('functions/userfunction.php');
include('include/header.php');


?>

<div class="py-3 bg-primary">
    <div class="container">
        <h6 class="text-white">
            <a class="text-white" style="text-decoration: none;" href="index.php">
                Home /
            </a>
            <a class="text-white" style="text-decoration: none;" href="cart.php">
                Thanh toán
            </a>
        </h6>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="card">
            <div class="card-body shadow">
                <form action="functions/placeorder.php" method="POSt">
                    <div class="row">
                        <div class="col-md-7">
                            <h5>Thông tin cá nhân</h5>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Tên</label>
                                    <input type="text"  name="name" placeholder="Nhập vào tên của bạn" class="form-control" value="<?php echo isset($_SESSION['auth_user']['name']) ? htmlspecialchars($_SESSION['auth_user']['name']) : ''; ?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Email</label>
                                    <input type="email"  name="email" placeholder="Nhập vào email của bạn" class="form-control" value="<?php echo isset($_SESSION['auth_user']['email']) ? htmlspecialchars($_SESSION['auth_user']['email']) : ''; ?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Số điện thoại</label>
                                    <input type="text"  name="phone" placeholder="Nhập vào số điện thoại của bạn" class="form-control" value="<?php echo isset($_SESSION['auth_user']['phone']) ? htmlspecialchars($_SESSION['auth_user']['phone']) : ''; ?>">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Mã khu vực</label>
                                    <input type="text"  name="zipcode"  placeholder="Nhập vào mã kh khu vực của bạn" class="form-control">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="fw-bold">Địa chỉ</label>
                                    <textarea name="address"  class="form-control" rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <h5>Thông tin đơn hàng</h5>
                            <hr>
                            <?php
                            $item = getCartItem();
                            $total_price =  0;

                            foreach ($item as $citem) {
                            ?>
                                <div class="mb-1 border">
                                    <div class="row align-items-center">
                                        <div class="col-md-2">
                                            <img src="uploads/<?= $citem['image'] ?>" alt="Hình ảnh sản phẩm" width="75px">
                                        </div>
                                        <div class="col-md-3">
                                            <h5><?= $citem['name'] ?></h5>
                                        </div>
                                        <div class="col-md-3">
                                            <h5><?= $citem['selling_price'] ?>VND</h5>
                                        </div>
                                        <div class="col-md-2">
                                            <h5>x <?= $citem['prod_qty'] ?></h5>
                                        </div>
                                        <div class="col-md-2 size" data-size="<?= $citem['sizes'] ?>">
                                            <h5><?= $citem['sizes'] ?></h5>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                $total_price +=  $citem['selling_price'] * $citem['prod_qty'];
                            }
                            ?>
                            <hr>
                            <h5>Tổng: <span class="float-end fw-bold"><?= number_format($total_price, 0, ".", ".") ?> VND</span></h5>
                            <div class="">
                                <input type="hidden" name="payment_mode1" , value="Thanh toán trực tiếp">
                                <button type="submit" name="placeOrderBtn1" class="btn btn-primary w-100">Thanh toán trực tiếp</button>
                            </div>
                            <br>
                            <div class="">
                                <input type="hidden" name="payment_mode2" , value="Thanh toán MOMO">
                                <button type="submit" name="payUrl" class="btn btn-primary w-100">Thanh toán MOMO</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>

<?php include('include/footer.php'); ?>