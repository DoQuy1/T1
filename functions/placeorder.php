<?php

session_start();
include('../config/dbcon.php');

if (isset($_SESSION['auth'])) {
    if (isset($_POST['placeOrderBtn1'])) {
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $phone = mysqli_real_escape_string($con, $_POST['phone']);
        $zipcode = mysqli_real_escape_string($con, $_POST['zipcode']);
        $address = mysqli_real_escape_string($con, $_POST['address']);
        $payment_mode1 = mysqli_real_escape_string($con, $_POST['payment_mode1']);
        $payment_id = mysqli_real_escape_string($con, $_POST['payment_id']);

        if ($name == "" || $email == "" || $phone == "" || $zipcode == "" || $address == "") {
            $_SESSION['message'] = "Xin vui lòng điền tất cả thông tin";
            header('Location: ../checkout.php');
            exit(0);
        }

        // Lấy dữ liệu giỏ hàng
        $user_id = $_SESSION['auth_user']['user_id'];
        $query = "SELECT a.id as cid, a.prod_id, a.sizes, a.prod_qty, b.id as pid, b.name, b.image, b.selling_price 
            FROM carts a, products b WHERE a.prod_id = b.id AND a.user_id = '$user_id' ORDER BY a.id DESC ";
        $query_run = mysqli_query($con, $query);

        $total_price =  0;
        foreach ($query_run as $citem) {
            $total_price +=  $citem['selling_price'] * $citem['prod_qty'];
        }

        $order_code = "test" . rand(1000, 9999) . substr($phone, 2);

        $insert_query = "INSERT INTO orders (order_code, user_id, name, email,	phone, zipcode, address,
        total_price, payment_mode, payment_id) VALUES('$order_code', '$user_id', '$name', '$email', '$phone', '$zipcode',
        '$address', '$total_price', '$payment_mode1','$payment_id')";
        $insert_query_run = mysqli_query($con, $insert_query);

        if ($insert_query_run) {
            $order_id = mysqli_insert_id($con);

            foreach ($query_run as $citem) {

                $prod_id = $citem['prod_id'];
                $prod_qty = $citem['prod_qty'];
                $price = $citem['selling_price'];
                $size = $citem['sizes'];
                $insert_item_query = "INSERT INTO order_items (order_id, prod_id, qty, price, size)	
                                      VALUES('$order_id','$prod_id','$prod_qty','$price','$size')";
                $insert_item_query_run = mysqli_query($con, $insert_item_query);

                $product_query = "SELECT *  FROM products WHERE id='$prod_id' LIMIT 1";
                $product_query_run = mysqli_query($con, $product_query);

                $productData = mysqli_fetch_array($product_query_run);
                $current_qty = $productData['qty'];

                $new_qty = $current_qty - $prod_qty;

                $updateQty_query = "UPDATE products SET qty='$new_qty' WHERE id='$prod_id'";
                $updateQty_query_run = mysqli_query($con, $updateQty_query);
            }
            $deleteCartQuery = "DELETE FROM carts WHERE user_id = '$user_id'";
            $deleteCartQuery_run = mysqli_query($con, $deleteCartQuery);

            $_SESSION['message'] = "Đặt hàng thành công";
            header('Location: ../thanks.php');
            die();
        }
    
    }
    else if (isset($_POST['payUrl'])) {
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $phone = mysqli_real_escape_string($con, $_POST['phone']);
        $zipcode = mysqli_real_escape_string($con, $_POST['zipcode']);
        $address = mysqli_real_escape_string($con, $_POST['address']);
        $payment_mode2 = mysqli_real_escape_string($con, $_POST['payment_mode2']);
        $payment_id = mysqli_real_escape_string($con, $_POST['payment_id']);

        if ($name == "" || $email == "" || $phone == "" || $zipcode == "" || $address == "") {
            $_SESSION['message'] = "Xin vui lòng điền tất cả thông tin";
            header('Location: ../checkout.php');
            exit(0);
        }

        // Lấy dữ liệu giỏ hàng
        $user_id = $_SESSION['auth_user']['user_id'];
        $query = "SELECT a.id as cid, a.prod_id, a.sizes, a.prod_qty, b.id as pid, b.name, b.image, b.selling_price 
            FROM carts a, products b WHERE a.prod_id = b.id AND a.user_id = '$user_id' ORDER BY a.id DESC ";
        $query_run = mysqli_query($con, $query);

        $total_price =  0;
        foreach ($query_run as $citem) {
            $total_price +=  $citem['selling_price'] * $citem['prod_qty'];
        }

        $order_code = "test" . rand(1000, 9999) . substr($phone, 2);
        function execPostRequest($url, $data)
        {
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                    'Content-Length: ' . strlen($data))
            );
            curl_setopt($ch, CURLOPT_TIMEOUT, 5);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
            $result = curl_exec($ch);
            curl_close($ch);
            return $result;
        }

        $endpoint1 = "https://test-payment.momo.vn/v2/gateway/api/create";
        $partnerCode1 = 'MOMOBKUN20180529';
        $accessKey1 = 'klm05TvNBzhg7h7j';
        $secretKey1 = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo1 = "Thanh toán qua MoMo";
        $amount1 = "10000";
        $orderId1 = time() ."";
        $redirectUrl1 = "http://localhost/DoAnTotNghiep/thanks.php";
        $ipnUrl1 = "http://localhost/DoAnTotNghiep/thanks.php";
        $extraData1 = "";
 
        if (!empty($_POST)) {
            $partnerCode = $partnerCode1;
            $accessKey = $accessKey1;
            $serectkey = $secretKey1;
            $orderId = $orderId1; 
            $orderInfo = $orderInfo1;
            $amount = $total_price;
            $ipnUrl = $ipnUrl1;
            $redirectUrl = $redirectUrl1;
            $extraData = $extraData1;
        
            $requestId = time() . "";
            $requestType = "payWithATM";
            $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
            $signature = hash_hmac("sha256", $rawHash, $serectkey);
            $data = array('partnerCode' => $partnerCode,
                          'partnerName' => "Test",
                          "storeId" => "MomoTestStore",
                          'requestId' => $requestId,
                          'amount' => $amount,
                          'orderId' => $orderId,
                          'orderInfo' => $orderInfo,
                          'redirectUrl' => $redirectUrl,
                          'ipnUrl' => $ipnUrl,
                          'lang' => 'vi',
                          'extraData' => $extraData,
                          'requestType' => $requestType,
                          'signature' => $signature);
            $result = execPostRequest($endpoint1, json_encode($data));
            $jsonResult = json_decode($result, true); 
        
            if ($jsonResult && isset($jsonResult['payUrl'])) {
                // Save order details to the database
                $insert_query = "INSERT INTO orders (order_code, user_id, name, email,	phone, zipcode, address,
                total_price, payment_mode, payment_id) VALUES('$order_code', '$user_id', '$name', '$email', '$phone', '$zipcode',
                '$address', '$total_price', '$payment_mode2','$payment_id')";
                $insert_query_run = mysqli_query($con, $insert_query);

                if ($insert_query_run) {
                    $order_id = mysqli_insert_id($con);

                    foreach ($query_run as $citem) {
                        $prod_id = $citem['prod_id'];
                        $prod_qty = $citem['prod_qty'];
                        $price = $citem['selling_price'];
                        $size = $citem['sizes'];
                        $insert_item_query = "INSERT INTO order_items (order_id, prod_id, qty, price, size)	
                                              VALUES('$order_id','$prod_id','$prod_qty','$price','$size')";
                        $insert_item_query_run = mysqli_query($con, $insert_item_query);

                        $product_query = "SELECT *  FROM products WHERE id='$prod_id' LIMIT 1";
                        $product_query_run = mysqli_query($con, $product_query);

                        $productData = mysqli_fetch_array($product_query_run);
                        $current_qty = $productData['qty'];

                        $new_qty = $current_qty - $prod_qty;

                        $updateQty_query = "UPDATE products SET qty='$new_qty' WHERE id='$prod_id'";
                        $updateQty_query_run = mysqli_query($con, $updateQty_query);
                    }
                    $deleteCartQuery = "DELETE FROM carts WHERE user_id = '$user_id'";
                    $deleteCartQuery_run = mysqli_query($con , $deleteCartQuery);

                    // Redirect to MoMo payment URL
                    header('Location: ' . $jsonResult['payUrl']);
                    exit();
                }
            } else {
                // Handle MoMo payment initiation error
                $_SESSION['message'] = "Đã xảy ra lỗi khi khởi tạo thanh toán MoMo. Vui lòng thử lại sau.";
                header('Location: ../checkout.php');
                exit();
            }
        }
    }
}
 else {
    header('Location: ../index.php');
}

// test momo:
// NGUYEN VAN A
// 9704 0000 0000 0018
// 03/07
// OTP