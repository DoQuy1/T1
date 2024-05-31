<?php

include('../middleware/adminMiddleware.php');
include('includes/header.php');



?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Thêm sản phẩm</h4>
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
                                            <option value="<?= $item['id']; ?>"><?= $item['name']; ?></option>

                                    <?php
                                        }
                                    } else {
                                        echo "Không có hàng hóa nào";
                                    }
                                    ?>

                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0">Tên</label>
                                <input type="text" required name="name" placeholder="Nhập tên sản phẩm" class="form-control mb-2">
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0">Mã số</label>
                                <input type="text" required name="masp" placeholder="Nhập mã số" class="form-control mb-2">
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">Mô tả ngắn</label>
                                <textarea rows="3" required name="small_description" placeholder="Nhập mô tả ngắn về sản phẩm" class="form-control mb-2"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">Mô tả</label>
                                <textarea rows="3" required name="description" placeholder="Nhập mô tả sản phẩm" class="form-control mb-2"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0">Giá ban đầu</label>
                                <input type="text" required name="original_price" placeholder="Nhập giá ban đầu" class="form-control mb-2">
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0">Giá bán</label>
                                <input type="text" required name="selling_price" placeholder="Nhập giá bán" class="form-control mb-2">
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">Ảnh sản phẩm</label>
                                <input type="file" required name="image" class="form-control mb-2">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="mb-0">Số lượng</label>
                                    <input type="text" required name="qty" placeholder="Nhập số lượng" class="form-control mb-2">
                                </div>
                                <div class="col-md-3">
                                    <label class="mb-0">Trạng thái</label>
                                    <input type="checkbox" name="status">
                                </div>
                                <div class="col-md-3">
                                    <label class="mb-0">Xu hướng</label>
                                    <input type="checkbox" name="trending">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">Chọn Size</label><br>
                                <div class="row">
                                    <div class="col-md-2">
                                        <input type="checkbox" id="size_S" name="size[]" value="S">
                                        <label class="size_S"> S </label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="checkbox" id="size_M" name="size[]" value="M">
                                        <label class="size_M"> M </label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="checkbox" id="size_L" name="size[]" value="L">
                                        <label class="size_L"> L </label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="checkbox" id="size_XL" name="size[]" value="XL">
                                        <label class="size_XL"> XL </label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="checkbox" id="size_XXL" name="size[]" value="XXL">
                                        <label class="size_XXL"> XXL </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label class="mb-0">Tiêu đề</label>
                                <input type="text" required name="meta_title" placeholder="Nhập tiêu đề" class="form-control mb-2">
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">Mô tả chung</label>
                                <textarea rows="3" required name="meta_description" placeholder="Nhập mô tả chung" class="form-control mb-2"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">Từ khóa</label>
                                <textarea rows="3" required name="meta_keywords" placeholder="Nhập từ khóa" class="form-control mb-2"></textarea>
                            </div>


                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success" name="add_product_btn">Thêm sản phẩm</button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>