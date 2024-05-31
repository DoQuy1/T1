<?php

session_start();
include('../config/dbcon.php');
function getAll($table)
{
    global $con;
    $query = "SELECT * FROM $table";
    $query_run = mysqli_query($con, $query);
    return $query_run;
}

function getRole1()
{
    global $con;
    $query = "SELECT * FROM users WHERE role_pq IN ('0', '1')";
    $query_run = mysqli_query($con, $query);
    return $query_run;
}

function getAllActive($table)
{
    global $con;
    $query = "SELECT * FROM $table WHERE status='1' ";
    $query_run = mysqli_query($con, $query);
    return $query_run;
}
function getAllOrder()
{
    global $con;
    $query = "SELECT * FROM orders ";
    $query_run = mysqli_query($con, $query);
    return $query_run;
}
    
function getOrderCodeNoValid($order_code)
{
    global $con;
    $query = "SELECT * FROM orders WHERE order_code='$order_code' ";
    $query_run = mysqli_query($con, $query);
    return $query_run;
}

function getByID($table, $id)
{
    global $con;
    $query = "SELECT * FROM $table WHERE id='$id' ";
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