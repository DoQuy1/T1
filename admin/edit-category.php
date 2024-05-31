<?php
include('../middleware/adminMiddleware.php');
include('includes/header.php');


?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php 
            if(isset($_GET['id']))
            {
                $id= $_GET['id'];
                $category = getByID("categories", $id);

                if(mysqli_num_rows($category) > 0)
                {
                    $data = mysqli_fetch_array($category);
                    ?>
                       <div class="card">
                <div class="card-header">
                    <h4>Cập nhật sản phẩm
                        <a href="category.php" class="btn btn-warning float-end">Quay lại</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="hidden" name="category_id" value="<?= $data['id'] ?>">
                                <label for="">Tên</label>
                                <input type="text" name="name" value="<?= $data['name'] ?>" placeholder="Nhập tên sản phẩm" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="">Số lượng</label>
                                <input type="text" name="masp" value="<?= $data['masp'] ?>" placeholder="Nhập đơn vị" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label for="">Mô tả</label>
                                <textarea rows="3" name="description" placeholder="Nhập mô tả sản phẩm" class="form-control"><?= $data['description'] ?></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="">Tải lên hình ảnh</label>
                                <input type="file" name="image" class="form-control">
                                <label for="">Hình ảnh hàng hóa </label>
                                <input type="hidden" name="old_image" value="<?= $data['image'] ?>">
                                <img src="../uploads/<?= $data['image'] ?>" height="50px" width="50px" alt="">
                            </div>
                            <div class="col-md-12">
                                <label for="">Tiêu đề</label>
                                <input type="text" name="meta_title" value="<?= $data['meta_title'] ?>"placeholder="Nhập tiêu đề" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label for="">Mô tả chung</label>
                                <textarea rows="3" name="meta_description" placeholder="Nhập mô tả chung" class="form-control"><?= $data['meta_description'] ?></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="">Từ khóa</label>
                                <textarea rows="3" name="meta_keywords" placeholder="Nhập từ khóa" class="form-control"><?= $data['meta_keywords'] ?></textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="">Trạng thái</label>
                                <input type="checkbox" <?= $data['status'] ? "checked":"" ?> name="status">
                            </div>
                            <div class="col-md-6">
                                <label for="">Phổ biến</label>
                                <input type="checkbox" <?= $data['popular'] ? "checked":"" ?> name="popular">
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-warning" name="update_category_btn">Cập nhật</button>

                            </div>
                        </div>
                    </form>
                </div>
                       </div>
                    <?php
                }
                else
                {
                    echo "Không tìm thấy sản phẩm";
                }
            }
            else
            {
                echo "Có lỗi xảy ra";
            }
            ?>
            
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>