<?php


include('functions/userfunction.php');
include('include/header.php');
include('include/slider.php');


?>
<!-- Carousel sản phẩm-->
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="section-title text-uppercase fw-bold text-center mb-1 mb-md-3 pb-xl-2 mb-xl-4">Bán chạy</h4>
                    <div class="underline-1"></div>
                    <hr>
               
                <div class="owl-carousel">
                    <?php
                    $trendingPro = getTrendingProduct();
                    if (mysqli_num_rows($trendingPro) > 0) {
                        foreach ($trendingPro as $item) {
                    ?>
                            <div class="item">
                                <a href="product-view1.php?product=<?= $item['masp']; ?>" style="text-decoration: none;">
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <img src="uploads/<?= $item['image']; ?>" height="375px" alt="Hình ảnh sản phẩm" class="w-100">
                                            <h6 class="text-center"><?= $item['name']; ?></h6>
                                            <h6 class="text-center"><?= number_format($item['selling_price'], 0, ".", "."); ?> VND</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                    <?php

                        }
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Carousel hàng hóa-->
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <h4 class="section-title text-uppercase fw-bold text-center mb-1 mb-md-3 pb-xl-2 mb-xl-4">Hàng hóa </h4>
                <div class="underline-1"></div>
                <hr>    
           
                <div class="owl-carousel">
                    <?php
                    $categories = getAllActive("categories");

                    if (mysqli_num_rows($categories) > 0) {
                        foreach ($categories as $item) {
                    ?>
                            <div class="item">
                                    <a href="product.php?category=<?= $item['masp']; ?>" style="text-decoration: none;">
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <img src="uploads/<?= $item['image']; ?>" height="375px" alt="Hình ảnh sản phẩm" class="w-100">
                                            <h6 class="text-center"><?= $item['name']; ?></h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                    <?php

                        }
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="py-5 bgbg-1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="">Giới thiệu</h4>
                <div class="underline"></div>
                <hr>
                <p>Chúng tôi mang đến cho bạn trải nghiệm mua sắm trực tuyến tuyệt vời nhất, với sự đa dạng,
                   chất lượng và sự tin cậy. Chúng tôi tự hào là địa chỉ đáng tin cậy cho mọi nhu cầu mua sắm của bạn,
                   từ những món đồ thời trang mới nhất đến các sản phẩm công nghệ tiên tiến.
                </p>
                <p>Chúng tôi không chỉ muốn đáp ứng nhu cầu mua sắm của bạn, mà còn muốn tạo ra một trải nghiệm mua sắm
                     độc đáo và thú vị mà bạn sẽ không bao giờ quên.
                </p>
            </div>
        </div>
    </div>
</div>


<div class="py-5 bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h4 class="text-white">Thông tin</h4>
                <div class="underline mb-3"></div>
                <a href="index.php" class="text-white" style="text-decoration: none"> <i class="fa fa-angle-right mb-2"></i> Trang chủ</a> <br>
                <a href="index.php" class="text-white" style="text-decoration: none"> <i class="fa fa-angle-right mb-2"></i> Giới thiệu</a> <br>
                <a href="cart.php" class="text-white" style="text-decoration: none"> <i class="fa fa-angle-right mb-2"></i> Giỏ hàng</a> <br>
                <a href="categories.php" class="text-white" style="text-decoration: none"> <i class="fa fa-angle-right mb-2"></i> Khám phá</a> <br>
            </div>
            <div class="col-md-4">
                <h4 class="text-white">Địa chỉ</h4>
                <div class="underline mb-2"></div>
                <p class="text-white">
                    Ngõ 93 Hoàng Mai, 
                    Phường Hoàng Văn Thụ,<br>
                    Quận Hai Bà Trưng,
                    Hà Nội
                </p>
                <a style="text-decoration: none" href="tel:+84916438847" class="text-white"> <i class="fa fa-phone"></i>  +84916438847</a> <br>
                <a style="text-decoration: none" href="mailto:thanlong07@qa.team" class="text-white"> <i class="fa fa-envelope"></i>  thanlong07@qa.team</a>
            </div>
            <div class="col-md-4">
                <h4 class="text-white">Khu vực hoạt động</h4>
                <div class="underline mb-2"></div>
                <p class="text-white">
                    Nội thành Hà Nội<br>
                    Tỉnh Ninh Bình<br>
                    Tỉnh Nam Định<br>
                </p>
            </div>
        </div>
    </div>
</div>

<?php include('include/footer.php'); ?>
