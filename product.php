<?php
include('functions/userfunction.php');
include('include/header.php');

if (isset($_GET['category'])) {
    $category_masp = $_GET['category'];
    $category_data = getmaspActive("categories", $category_masp);
    $category = mysqli_fetch_array($category_data);
    if ($category) {


        $cid = $category['id'];

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
                    <?= $category['name']; ?>
                </h6>
            </div>
        </div>
        <div class="py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2><?= $category['name']; ?></h2>
                        <hr>
                        <div class="row">
                            <?php
                            $products = getProductByCategory($cid);

                            if (mysqli_num_rows($products) > 0) {
                                foreach ($products as $item) {
                            ?>
                                    <div class="col-md-3">
                                    <a href="product-view.php?product=<?= $item['masp']; ?>&category=<?= $_GET['category']; ?>" style="text-decoration: none;">
                                            <div class="card shadow">
                                                <div class="card-body">
                                                    <img src="uploads/<?= $item['image']; ?>" alt="Hình ảnh sản phẩm" height="325px" class="w-100">
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

<?php
    } else {
        echo "Có lỗi xảy ra";
    }
} else {
    echo "Có lỗi xảy ra";
}
include('include/footer.php'); ?>