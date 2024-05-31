<?php
include('functions/userfunction.php');
include('include/header.php');

?>
<div class="py-3 bg-primary">
    <div class="container">
        <h6 class="text-white">Home/ Các loại hàng hóa</h6>
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Các loại hàng hóa</h1>
                <hr>
                <div class="row">
                    <?php
                    $categories = getAllActive("categories");

                    if (mysqli_num_rows($categories) > 0) {
                        foreach ($categories as $item) {
                    ?>
                            <div class="col-md-3">
                                <a href="product.php?category=<?= $item['masp']; ?>" style="text-decoration: none;">
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <img src="uploads/<?= $item['image']; ?>" height="325px" alt="Hình ảnh sản phẩm" class="w-100">
                                            <h4 class="text-center"><?= $item['name']; ?></h4>
                                        </div>
                                    </div>
                                </a>
                            </div>


                    <?php
                        }
                    } else {
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>

<?php include('include/footer.php'); ?>