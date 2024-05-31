$(document).ready(function(){


    //Nút tăng số lượng
    $(document).on('click','.increment-btn',function(e) {
    e.preventDefault();

    var qty = $(this).closest('.product-data').find('.input-qty').val();

    var value = parseInt(qty, 10);
    value = isNaN(value) ? 0 : value;

    if(value <10)
    {
        value++;
        $(this).closest('.product-data').find('.input-qty').val(value);
    }
   });

   //Nút giảm số lượng
   $(document).on('click','.decrement-btn',function(e) {
    e.preventDefault();

    var qty = $(this).closest('.product-data').find('.input-qty').val();

    var value = parseInt(qty, 10);
    value = isNaN(value) ? 0 : value;

    if(value > 1)
    {
        value--;
        $(this).closest('.product-data').find('.input-qty').val(value);
    }
   });

   //Nút thêm vào giỏ hàng
   $(document).on('click','.addToCartBtn',function(e) {
    e.preventDefault();

    var qty = $(this).closest('.product-data').find('.input-qty').val();
    var prod_id = $(this).val();
    var size = $('input[name="size"]:checked').val(); // Lấy giá trị kích thước từ nút radio được chọn
    if (size == undefined) {
        alertify.error("Vui lòng chọn size trước khi thêm vào giỏ hàng");
        return; // Dừng việc thực thi nếu không có size được chọn
    }

    $.ajax(
        {
            method: "POST",
            url: "functions/codecart.php",
            data: {
                "prod_id": prod_id,
                "prod_qty": qty,
                "prod_size": size,
                "scope": "add"
            },
            
            success: function (response)
            {
                if(response == 201)
                {
                    alertify.success("Đã thêm vào giỏ hàng của bạn");
                }
                else if(response == 401)
                {
                    alertify.success("Đăng nhập để tiếp tục");
                }
                else if(response == 700)
                {
                    alertify.success("Sản phẩm đã có trong giỏ hàng. Số lượng đã được cập nhật");
                }
                else if(response == 500)
                {
                    alertify.success("Có lỗi xảy ra");
                }


            }
        }

        )  
   });

   //Chỉnh sửa số lượng sản phẩm trong giỏ hàng
   $(document).on('click','.updateQty',function() {
        var qty = $(this).closest('.product-data').find('.input-qty').val();
        var prod_id = $(this).closest('.product-data').find('.prodId').val();
        
        var size = $(this).closest('.product-data').find('.size').data('size'); // Lấy giá trị của size
        $.ajax(
            {
                method: "POST",
                url: "functions/codecart.php",
                data: {
                    "prod_id": prod_id,
                    "prod_qty": qty,
                    "prod_size": size,
                    "scope": "update"
                },
                
                success: function (response)
                {
    
    
                }
            }
    
            )  

   });
 //Xóa sản phẩm trong giỏ hàng
   $(document).on('click','.deleteItem',function() {
     var cart_id = $(this).val();

     $.ajax(
        {
            method: "POST",
            url: "functions/codecart.php",
            data: {
                "cart_id": cart_id,
                "scope": "delete"
            },
            
            success: function (response)
            {
                if(response == 666)
                {

                    alertify.success("Đã xóa sản phẩm khỏi giỏ hàng");
                    $('#qcart').load(location.href + " #qcart");
                }
                else if(response == 500)
                {
                    alertify.success("Có lỗi xảy ra");
                }
            }
        }

        )  


   });



});

