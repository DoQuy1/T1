<?php

include('../functions/functions.php');

if(isset($_SESSION['auth']))
{
    if($_SESSION['role_pq'] == 0)
    {
        redirect("../index.php", "Bạn không có quyền truy câp" );
    }

}
else
{
    redirect("../login.php", "Đăng nhập để tiếp tục" );
    
}


?>