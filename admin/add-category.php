<?php

include('../middleware/adminMiddleware.php');
include('includes/header.php');


?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Thêm hàng hóa</h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Tên</label>
                                <input required type="text" name="name" placeholder="Nhập tên sản phẩm" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="">Mã số</label>
                                <input required type="text" name="masp" placeholder="Nhập mã số" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label for="">Mô tả</label>
                                <textarea required rows="3" name="description" placeholder="Nhập mô tả sản phẩm" class="form-control"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="">Hình ảnh</label>
                                <input required type="file" name="image" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label for="">Tiêu đề</label>
                                <input required type="text" name="meta_title" placeholder="Nhập tiêu đề" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label for="">Mô tả chung</label>
                                <textarea required rows="3" name="meta_description" placeholder="Nhập mô tả chung" class="form-control"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="">Từ khóa</label>
                                <textarea required rows="3" name="meta_keywords" placeholder="Nhập từ khóa" class="form-control"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="">Trạng thái</label>
                                <input type="checkbox" name="status">
                            </div>
                            <div class="col-md-6">
                                <label for="">Phổ biến</label>
                                <input type="checkbox" name="popular">
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success" name="add_category_btn">Thêm hàng hóa</button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>