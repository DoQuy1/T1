<?php
include('functions/userfunction.php');
include('include/header.php');

if (isset($_GET['category'])) {
    $category_masp = $_GET['category'];
    $category_data = getmaspActive("categories", $category_masp);
    $category = mysqli_fetch_array($category_data);
}
if (isset($_GET['product'])) {
    $product_masp = $_GET['product'];
    $product_data = getmaspActive("products", $product_masp);
    $product = mysqli_fetch_array($product_data);

    if ($product) {
?>

        <div class="py-3 bg-primary">
            <div class="container">
                <h6 class="text-white">
                    <a class="text-white" style="text-decoration: none;" href="index.php">
                        Home /
                    </a>
                    <a class="text-white" style="text-decoration: none;" href="category.php">
                        Các loại hàng hóa /
                    </a>
                    <a class="text-white" style="text-decoration: none;" href="product.php?category=<?= $_GET['category']; ?>">
                        <?= $category['name'] ?> /
                    </a>
                    <?= $product['name']; ?>
                </h6>
            </div>
        </div>

        <div class="py-4 bg-light">
            <div class="container product-data mt-3">
                <div class="row">
                    <div class="col-md-4">
                        <div class="shadow">
                            <img src="uploads/<?= $product['image']; ?>" alt="Hình ảnh sản phẩm" class="w-100">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h4 class="fw-bold"><?= $product['name']; ?>
                            <span class="float-end text-danger"><?php if ($product['trending']) {
                                                                    echo "Mua nhiều";
                                                                } ?></span>
                        </h4>
                        <hr>
                        <p><?= $product['small_description']; ?></p>
                        <div class="row">
                            <div class="col-md-3">
                                <h4><span class=" fw-bold"><?= number_format($product['selling_price'], 0, ".", ".") ?> VND</span></h4>
                            </div>
                            <div class="col-md-2">
                                <h6><s class="text-danger"><?= number_format($product['original_price'], 0, ".", ".") ?> VND</s></h6>
                            </div>
                        </div>


                        <div class="row mt-3">
                            <div class="col-md-4">
                                <div class="input-group mb-3" style="width:120px">
                                    <button class="input-group-text decrement-btn">-</button>
                                    <input type="text" class="form-control text-center input-qty bg-white" value="1" disabled>
                                    <button class="input-group-text increment-btn">+</button>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <h6>Chọn Size:</h6>
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    <?php
                                    $default_sizes = array('S', 'M', 'L', 'XL', 'XXL');
                                    $product_sizes = explode(',', $product['size']);

                                    foreach ($default_sizes as $size) {
                                        if (in_array($size, $product_sizes)) {
                                            echo '<input type="radio" class="btn-check" id="size_' . $size . '" name="size" value="' . $size . '" autocomplete="off">';
                                            echo '<label class="btn btn-outline-dark" for="size_' . $size . '">' . $size . '</label>';
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6">
                                <button class="btn btn-primary px-4 addToCartBtn" value="<?= $product['id'] ?>"> <i class="fa fa-shopping-cart me-2"></i>Thêm vào giỏ hàng</button>
                            </div>
                        </div>

                        <hr>
                        <h6>Thông tin sản phẩm</h6>
                        <p><?= $product['description']; ?></p>
                    </div>
                </div>
            </div>
        </div>

<?php

    } else {
        echo "Không tìm thấy sản phẩm";
    }
} else {
    echo "Có lỗi xảy ra";
}


include('include/footer.php'); ?>