<?php
include('../middleware/adminMiddleware.php');
include('includes/header.php');


?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $product = getByID("products", $id);

                if (mysqli_num_rows($product) > 0) {
                    $data = mysqli_fetch_array($product);
            ?>
                    <div class="card">
                        <div class="card-header">
                            <h4>Sửa sản phẩm
                                <a href="product.php" class="btn btn-warning float-end">Quay lại</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="code.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="mb-0">Loại hàng hóa</label>
                                        <select name="category_id" class="form-select mb-2">
                                            <option selected>Chọn hàng hóa</option>
                                            <?php
                                            $categories = getAll("categories");
                                            if (mysqli_num_rows($categories) > 0) {
                                                foreach ($categories as $item) {
                                            ?>
                                                    <option value="<?= $item['id']; ?>" <?= $data['category_id'] == $item['id'] ? 'selected' : ''  ?>><?= $item['name']; ?></option>

                                            <?php
                                                }
                                            } else {
                                                echo "Không có hàng hóa nào";
                                            }
                                            ?>

                                        </select>
                                    </div>
                                    <input type="hidden" name="product_id" value="<?= $data['id']; ?>">
                                    <div class="col-md-6">
                                        <label class="mb-0">Tên</label>
                                        <input type="text" required value="<?= $data['name']; ?>" name="name" placeholder="Nhập tên sản phẩm" class="form-control mb-2">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="mb-0">Đơn vị</label>
                                        <input type="text" required value="<?= $data['masp']; ?>" name="masp" placeholder="Nhập đơn vị" class="form-control mb-2">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0">Mô tả ngắn</label>
                                        <textarea rows="3" required name="small_description" placeholder="Nhập mô tả ngắn về sản phẩm" class="form-control mb-2"><?= $data['small_description']; ?></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0">Mô tả</label>
                                        <textarea rows="3" required name="description" placeholder="Nhập mô tả sản phẩm" class="form-control mb-2"><?= $data['description']; ?></textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="mb-0">Giá ban đầu</label>
                                        <input type="text" required value="<?= $data['original_price']; ?>" name="original_price" placeholder="Nhập giá ban đầu" class="form-control mb-2">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="mb-0">Giá bán</label>
                                        <input type="text" required value="<?= $data['selling_price']; ?>" name="selling_price" placeholder="Nhập giá bán" class="form-control mb-2">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0">Ảnh sản phẩm</label>
                                        <input type="file" name="image" class="form-control mb-2">
                                        <label class="mb-0">Ảnh sản phẩm </label>
                                        <input type="hidden" name="old_image" value="<?= $data['image'] ?>">
                                        <img src="../uploads/<?= $data['image'] ?>" height="50px" width="50px" alt="Ảnh sản phẩm">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="mb-0">Số lượng</label>
                                            <input type="text" required value="<?= $data['qty']; ?>" name="qty" placeholder="Nhập số lượng" class="form-control mb-2">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="mb-0">Hiển thị</label>
                                            <input type="checkbox" <?= $data['status'] == '0' ? '' : 'checked' ?> name="status">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="mb-0">Xu hướng</label>
                                            <input type="checkbox" <?= $data['trending'] == '0' ? '' : 'checked' ?> name="trending">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0">Chọn Size</label><br>
                                        <div class="row">
                                            <?php
                                            $available_sizes = ['S', 'M', 'L', 'XL', 'XXL']; // Các size có sẵn
                                            $product_sizes = explode(',', $data['size']); // Các size của sản phẩm

                                            // Duyệt qua mỗi size để hiển thị checkbox
                                            foreach ($available_sizes as $size) {
                                                // Kiểm tra xem size này có trong danh sách size của sản phẩm không
                                                $checked = in_array($size, $product_sizes) ? 'checked' : '';
                                            ?>
                                                <div class="col-md-2">
                                                    <input type="checkbox" id="size_<?= $size; ?>" name="size[]" value="<?= $size; ?>" <?= $checked; ?>>
                                                    <label class="size_<?= $size; ?>"> <?= $size; ?> </label>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <label class="mb-0">Tiêu đề</label>
                                        <input type="text" required value="<?= $data['meta_title']; ?>" name="meta_title" placeholder="Nhập tiêu đề" class="form-control mb-2">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0">Mô tả chung</label>
                                        <textarea rows="3" required name="meta_description" placeholder="Nhập mô tả chung" class="form-control mb-2"><?= $data['meta_description']; ?></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0">Từ khóa</label>
                                        <textarea rows="3" required name="meta_keywords" placeholder="Nhập từ khóa" class="form-control mb-2"><?= $data['meta_keywords']; ?></textarea>
                                    </div>


                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-success" name="update_product_btn">Cập nhật</button>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

            <?php

                } else {
                    echo "Không tìm được sản phẩm ";
                }
            } else {
                echo "Không tìm được id";
            }

            ?>





        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>