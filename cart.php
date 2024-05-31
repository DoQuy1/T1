<?php

include('functions/userfunction.php');
include('include/header.php');

include('authenticate.php');


?>

<div class="py-3 bg-primary">
    <div class="container">
        <h6 class="text-white">
            <a class="text-white" style="text-decoration: none;" href="index.php">
                Home /
            </a>
            <a class="text-white" style="text-decoration: none;" href="cart.php">
                Giỏ hàng
            </a>
        </h6>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="">
            <div class="row">
                <div class="col-md-12">
                    <div id="qcart">
                <?php
                        $item = getCartItem();

                        if (mysqli_num_rows($item) > 0)
                        {

                            ?>
                          <div class="row align-items-center">
                              <div class="col-md-2">
                                  <h4>Sản phẩm</h4>
                              </div>
                              <div class="col-md-2">
                                  <h4>Tên</h4>
                              </div>
                              <div class="col-md-2">
                                  <h4>Giá</h4>
                              </div>
                              <div class="col-md-2">
                                  <h4>Số lượng</h4>
                              </div>
                              <div class="col-md-2">
                                  <h4>Size</h4>
                              </div>
                              <div class="col-md-2">
                                  <h4>Cập nhật</h4>
                              </div>
                          </div>
      
      
                          <div id="">
                              <?php
                                  foreach ($item as $citem) {
                              ?>
                                      <div class="card product-data shadow-sm mb-3">
                                          <div class="row align-items-center">
                                              <div class="col-md-2">
                                                  <img src="uploads/<?= $citem['image'] ?>" alt="Hình ảnh sản phẩm" width="75px">
                                              </div>
                                              <div class="col-md-2">
                                                  <h5><?= $citem['name'] ?></h5>
                                              </div>
                                              <div class="col-md-2">
                                              <h5><?= number_format($citem['selling_price'], 0, ".", ".") ?> VND</h5>
                                              </div>
                                              <div class="col-md-2">
                                                  <input type="hidden" class="prodId" value="<?= $citem['prod_id'] ?>">
                                                  <div class="input-group mb-3" style="width:120px">
                                                      <button class="input-group-text decrement-btn updateQty">-</button>
                                                      <input type="text" class="form-control text-center input-qty bg-white" value="<?= $citem['prod_qty'] ?>" disabled>
                                                      <button class="input-group-text increment-btn updateQty">+</button>
                                                  </div>
                                              </div>
                                              <div class="col-md-2 size" data-size="<?= $citem['sizes'] ?>">
                                                  <h5><?= $citem['sizes'] ?></h5>
                                              </div>
                                              <div class="col-md-2">
                                                  <button class="btn btn-danger btn-sm deleteItem" value="<?= $citem['cid'] ?>">Xóa</button>
                                              </div>
                                          </div>
      
                                      </div>
      
      
                              <?php
                                  }
                              
                              ?>
      
                          </div>
                          <div class="float-end">
                              <a href="checkout.php" class="btn btn-primary">Thanh toán ngay</a>
                          </div>
                    <?php
                        }
                        else
                        {
                            ?>
                            <div class="card card-body shadow text-center">
                                <div class="py-3">GIỏ hàng của bạn trống</div>
                            </div>
                            <?php
                        }
                    ?>
                    </div>

                </div>
            </div>

        </div>

    </div>
</div>

<?php include('include/footer.php'); ?>