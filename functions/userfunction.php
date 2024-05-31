<?php

session_start();
include('config/dbcon.php');

function getAllActive($table)
{
    global $con;
    $query = "SELECT * FROM $table WHERE status='1' ";
    $query_run = mysqli_query($con, $query);
    return $query_run;
}

function getTrendingProduct()
{
    global $con;
    $query = "SELECT * FROM products WHERE trending='1' ";
    $query_run = mysqli_query($con, $query);
    return $query_run;
}


function getProductByCategory($category_id)
{
    global $con;
    $query = "SELECT * FROM products WHERE category_id='$category_id' AND status='1' ";
    $query_run = mysqli_query($con, $query);
    return $query_run;

}

function getCartItem()
{
    global $con;
    $userId = $_SESSION['auth_user']['user_id'];
    $query = "SELECT a.id as cid, a.prod_id, a.sizes, a.prod_qty, b.id as pid, b.name, b.image, b.selling_price 
            FROM carts a, products b WHERE a.prod_id = b.id AND a.user_id = '$userId' ORDER BY a.id DESC ";
    $query_run = mysqli_query($con, $query);
    return $query_run;

}
function getOrder()
{
    global $con;
    $userId = $_SESSION['auth_user']['user_id'];
    $query = "SELECT * FROM orders WHERE user_id = '$userId' ORDER BY id ASC ";
    $query_run = mysqli_query($con, $query);
    return $query_run;

}
function getMaSPActive($table, $masp)
{
    global $con;
    $query = "SELECT * FROM $table WHERE masp='$masp' AND status='1' LIMIT 1";
    $query_run = mysqli_query($con, $query);
    return $query_run;
}

function getOrderCodeNoValid($order_code)
{
    global $con;
    $userId = $_SESSION['auth_user']['user_id'];
    $query = "SELECT * FROM orders WHERE order_code='$order_code' AND user_id = '$userId'";
    $query_run = mysqli_query($con, $query);
    return $query_run;
}


function redirect($url, $message)
{
    $_SESSION['message'] = $message;
    header('Location: '.$url);
    exit();
}

?>