<?php
include('../middleware/adminMiddleware.php');
include('includes/header.php');


?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Sản phẩm</h4>
                </div>
                <div class="card-body" id="products_table">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Hình ảnh</th>
                                <th>Size</th>
                                <th>Trạng thái</th>
                                <th>Cập nhật</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $products = getAll("products");

                            if (mysqli_num_rows($products) > 0) {
                                foreach ($products as $item) {
                                    $product_id = $item['id'];
                                    // Chuyển chuỗi size thành mảng các size
                                    $sizes = explode(',', $item['size']);
                            ?>
                                    <tr>
                                        <td> <?= $item['id']; ?></td>
                                        <td> <?= $item['name']; ?></td>
                                        <td> <img src="../uploads/<?= $item['image']; ?>" width="50px" height="50px" alt="<?= $item['name']; ?>">
                                        </td>
                                        <td><?= implode(', ', $sizes); ?></td>
                                        <td> <?= $item['status'] == '0' ? "Ẩn" : "Hiển thị"; ?></td>
                                        <td>
                                            <a href="edit-product.php?id=<?= $item['id']; ?>" class="btn btn-primary">Sửa</a>
                                        </td>
                                        <td>

                                            <button type="button" class="btn btn-sm btn-danger delete_product_btn" value="<?= $item['id']; ?>" name="delete_product_btn">Xóa</button>

                                        </td>
                                    </tr>
                            <?php

                                }
                            } else {
                                echo "Không tìm thấy hàng hóa nào ";
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