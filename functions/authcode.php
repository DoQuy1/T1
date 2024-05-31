<?php

session_start();
include('../config/dbcon.php');
include('functions.php');

if (isset($_POST['register_btn'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $confirmpassword = mysqli_real_escape_string($con, $_POST['confirmpassword']);

    //Kiểm tra gmail
    $check_email_query = "SELECT email FROM users WHERE email='$email'";
    $check_email_query_run = mysqli_query($con, $check_email_query);

    if (mysqli_num_rows($check_email_query_run) > 0) {
        $_SESSION['message'] = "Email đã được đăng ký";
        header('Location: ../register.php');
    } else {
        //Kiểm tra mật khẩu
        if ($password == $confirmpassword) {
            //Truyền dữ liệu vào dtb
            $insert_query = "INSERT INTO users (name, email, phone, password) VALUES ('$name', '$email', '$phone', '$password')";
            $insert_query_run = mysqli_query($con, $insert_query);

            if ($insert_query_run) {
                $_SESSION['message'] = "Đăng kí thành công";
                header('Location: ../login.php');
            } else {
                $_SESSION['message'] = "Có lỗi xảy ra";
                header('Location: ../register.php');
            }
        } else {
            $_SESSION['message'] = "Mật khẩu không khớp";
            header('Location: ../register.php');
        };
    }
}
else if(isset($_POST['login_btn']))
{
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $login_query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $login_query_run = mysqli_query($con, $login_query);

    if(mysqli_num_rows($login_query_run) > 0)
    {
        $userdata = mysqli_fetch_array($login_query_run);
        $user_id = $userdata['id'];
        $username = $userdata['name'];
        $usermail = $userdata['email'];
        $userphone = $userdata['phone'];
        $role_pq = $userdata['role_pq'];
        $user_status = $userdata['user_status'];

        if($user_status == 1)
        {
            redirect("../login.php", "Tài khoản của bạn đã bị hạn chế, vui lòng liên hệ quản trị viên." );
        }
        else
        {
            $_SESSION['auth'] = true;

            $_SESSION['auth_user'] = [
                'user_id' => $user_id,
                'name' => $username,
                'email' => $usermail,
                'phone' => $userphone
            ];

            $_SESSION['role_pq'] = $role_pq;

            if($role_pq == 1)
            {
                redirect("../admin/index.php", "Xin chào quản trị viên" );
            }
            elseif($role_pq == 2)
            {
                redirect("../admin/index.php", "Xin chào người quản lý" );
            }
            else
            {
                redirect("../index.php", "Đăng nhập thành công" );
            }
        }
    }
    else
    {
        redirect("../login.php", "Thông tin đăng nhập sai" );
    }
}
