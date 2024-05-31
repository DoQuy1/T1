<?php


include('../config/dbcon.php');
include('../functions/functions.php');

if(isset($_POST['add_category_btn']))
{
    $name = $_POST['name'];
    $masp = $_POST['masp'];
    $description = $_POST['description'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset($_POST['status']) ? '1':'0';
    $popular = isset($_POST['popular']) ? '1':'0';

    $image = $_FILES['image']['name'];
    
    $path = "../uploads";

    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_ext; 

    $cate_query = "INSERT INTO categories 
    (name,masp,description,meta_title,meta_description,meta_keywords,status,popular,image)
    VALUES ('$name','$masp','$description','$meta_title','$meta_description','$meta_keywords','$status','$popular','$filename')";
    
    $cate_query_run = mysqli_query($con, $cate_query);

    if($cate_query_run)
    {
        move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);
        redirect("add-category.php", "Thêm hàng thành công");

    }
    else 
    {
        redirect("add-category.php", "Có lỗi khi thêm hàng hóa");

    }
} 
else if(isset($_POST['update_category_btn']) )
{

    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $masp = $_POST['masp'];
    $description = $_POST['description'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset($_POST['status']) ? '1':'0';
    $popular = isset($_POST['popular']) ? '1':'0';
    $path = "../uploads";
    $new_image = $_FILES['image']['name'];
    $old_image= $_POST['old_image'];

    if($new_image != "")
    {
         
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
        $update_filename = time().'.'.$image_ext; 
    }
    else
    {
        $update_filename =  $old_image;
    }

    $update_query = "UPDATE categories SET name='$name', masp='$masp', description='$description',
    meta_title='$meta_title',meta_description='$meta_description',meta_keywords='$meta_keywords',
    status='$status', popular='$popular', image='$update_filename' WHERE id='$category_id' ";

    $update_query_run = mysqli_query($con, $update_query);

    if($update_query_run)
    {
        if($_FILES['image']['name'] != "")
        {
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$update_filename);
            if(file_exists("../uploads/".$old_image))
            {
                unlink("../uploads/".$old_image);
            }
            
        }
        redirect("edit-category.php?id=$category_id","Cập nhật hàng hóa thành công");

    }
    else
    {
        redirect("edit-category.php?id=$category_id","Có lỗi xảy ra");
    }
}
else if(isset($_POST['delete_category_btn']) )
{
    $category_id = mysqli_real_escape_string($con, $_POST['category_id']);
    $category_query = "SELECT * FROM  categories WHERE id='$category_id' ";
    $category_query_run = mysqli_query($con, $category_query);
    $category_data = mysqli_fetch_array($category_query_run);
    $image = $category_data['image'];

    $delete_query = "DELETE FROM categories WHERE id='$category_id' ";
    $delete_query_run = mysqli_query($con, $delete_query);

    if($delete_query_run)
    {
        if(file_exists("../uploads/".$image))
        {
            unlink("../uploads/".$image);
        }
        //custom.js
        echo 200;

    }
    else
    {
        //custom.js
        echo 500;


    }
}
else if(isset($_POST['add_product_btn']) )
{
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $masp = $_POST['masp'];
    $small_description = $_POST['small_description'];
    $description = $_POST['description'];
    $original_price = $_POST['original_price'];
    $selling_price = $_POST['selling_price'];
    $qty = $_POST['qty'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset($_POST['status']) ? '1':'0';
    $trending = isset($_POST['trending']) ? '1':'0';
    

    $image = $_FILES['image']['name'];
    
    $path = "../uploads";

    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_ext; 

    if($name != "" && $masp !="" && $description !="")
    {
        //Chọn size
        $selected_sizes = isset($_POST['size']) ? $_POST['size'] : array();
        $sizes_string = implode(",", $selected_sizes);

        $product_query = "INSERT INTO products (category_id, name, masp, small_description, description, original_price, selling_price,
        qty, meta_title, meta_description, meta_keywords, status, trending, size, image) VALUES
        ('$category_id', '$name', '$masp', '$small_description', '$description', '$original_price', '$selling_price',
        '$qty', '$meta_title', '$meta_description', '$meta_keywords', '$status', '$trending', '$sizes_string', '$filename')";

    
        $product_query_run = mysqli_query($con, $product_query);
        if($product_query_run)
        {
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);
            redirect("add-product.php", "Thêm sản phẩm thành công");
    
        }
        else 
        {
            redirect("add-product.php", "Có lỗi khi thêm sản phẩm");
    
        }

    }
    else 
        {
            redirect("add-product.php", "Vui long nhập đủ thông tin");
    
        }

   
}
else if(isset($_POST['update_product_btn']) )
{
    $product_id = $_POST['product_id'];
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $masp = $_POST['masp'];
    $small_description = $_POST['small_description'];
    $description = $_POST['description'];
    $original_price = $_POST['original_price'];
    $selling_price = $_POST['selling_price'];
    $qty = $_POST['qty'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset($_POST['status']) ? '1' : '0';
    $trending = isset($_POST['trending']) ? '1' : '0';

    $image = $_FILES['image']['name'];
    $path = "../uploads";
    $new_image = $_FILES['image']['name'];
    $old_image= $_POST['old_image'];

    if($new_image != "") {      
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
        $update_filename = time().'.'.$image_ext; 
    } else {
        $update_filename =  $old_image;
    }

    $selected_sizes = isset($_POST['size']) ? $_POST['size'] : array();
    $sizes_string = implode(",", $selected_sizes);

    $update_product_query = "UPDATE products SET category_id='$category_id', name='$name', masp='$masp', small_description='$small_description', description='$description',
    original_price='$original_price', selling_price='$selling_price', qty='$qty', meta_title='$meta_title', meta_description='$meta_description', meta_keywords='$meta_keywords',
    status='$status', trending='$trending', size='$sizes_string', image='$update_filename' WHERE id='$product_id' ";

    $update_product_query_run = mysqli_query($con, $update_product_query);

    if($update_product_query_run) {
        if($_FILES['image']['name'] != "") {
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$update_filename);
            if(file_exists("../uploads/".$old_image)) {
                unlink("../uploads/".$old_image);
            }
        }
        redirect("edit-product.php?id=$product_id","Cập nhật sản phẩm thành công");
    } else {
        redirect("edit-category.php?id=$product_id","Có lỗi xảy ra");
    }
}
else if(isset($_POST['delete_product_btn']) )
{
    $product_id = mysqli_real_escape_string($con, $_POST['product_id']);
    $product_query = "SELECT * FROM  products WHERE id='$product_id' ";
    $product_query_run = mysqli_query($con, $product_query);
    $product_data = mysqli_fetch_array($product_query_run);
    $image = $product_data['image'];

    $delete_query = "DELETE FROM products WHERE id='$product_id' ";
    $delete_query_run = mysqli_query($con, $delete_query);

      if($delete_query_run)
    {
        if(file_exists("../uploads/".$image))
        {
            unlink("../uploads/".$image);
        }
       //custom.js
        echo 200;
    }
    else
    {
        //custom.js
        echo 500;

    }

}
else if(isset($_POST['update_order_btn']) )
{
    $order_code = $_POST['order_code'];
    $order_status = $_POST['order_status'];

    $updateOrder_query = "UPDATE orders SET status='$order_status' WHERE order_code='$order_code' ";
    $updateOrder_query_run = mysqli_query($con, $updateOrder_query);

    redirect("view-order.php?q=$order_code", "Cập nhật đơn hàng thành công");

}
else if(isset($_POST['update_user_btn']) )
{
    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $role_pq = $_POST['role_pq'];
    $user_status = $_POST['user_status'];

    $updateUser_query = "UPDATE users SET user_status='$user_status', role_pq='$role_pq', name='$name', email='$email', 
                         phone='$phone', password ='$password'  WHERE id='$user_id' ";
    $updateUser_query_run = mysqli_query($con, $updateUser_query);

    redirect("edit-user.php?id= $user_id", "Cập nhật dữ liệu người dùng thành công");

}
else if(isset($_POST['delete_userss_btn']) )
{
    $user_id = mysqli_real_escape_string($con, $_POST['user_id']);

    $delete_query = "DELETE FROM users WHERE id='$user_id' ";
    $delete_query_run = mysqli_query($con, $delete_query);

    if($delete_query_run)
    {
        //custom.js
        echo 200;

    }
    else
    {
        //custom.js
        echo 500;
    }

}
else 
{
        header('Location: ../index.php');
}

?>