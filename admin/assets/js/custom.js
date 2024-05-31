$(document).ready(function ()
{
    $(document).on('click', '.delete_product_btn', function(e) {
        e.preventDefault();

        var id = $(this).val();
        

        //alert(id);
        swal({
            title: "Bạn muốn xóa sản phẩm này?",
            text: "Khi xóa bạn sẽ không thể khôi phục lại dữ liệu này",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              $.ajax({
                method :"POST",
                url: "code.php",
                data: {
                    'product_id': id,
                    'delete_product_btn': true
                },
                success: function (response){
                    if(response  == 200)
                    {
                        
                        swal("Thành công", "Xóa sản phẩm thành công", "success");
                        $("#products_table").load(location.href + " #products_table");
                    }
                    else if(response == 500)
                    {
                        swal("Lỗi", "Có lỗi xảy ra", "error");

                    }

                }

              });
            } else {
             
            }
          });

    });

    $(document).on('click', '.delete_category_btn', function(e)
    {
        e.preventDefault();

        var id = $(this).val();
        

        //alert(id);
        swal({
            title: "Bạn muốn xóa hàng hóa này?",
            text: "Khi xóa bạn sẽ không thể khôi phục lại dữ liệu này",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              $.ajax({
                method :"POST",
                url: "code.php",
                data: {
                    'category_id': id,
                    'delete_category_btn': true
                },
                success: function (response){
                    if(response  == 200)
                    {
                        
                        swal("Thành công", "Xóa hàng hóa thành công", "success");
                        $("#category_table").load(location.href + " #category_table");
                    }
                    else if(response == 500)
                    {
                        swal("Lỗi", "Có lỗi xảy ra", "error");

                    }

                }

              });
            } else {
             
            }
          });

    });
    $(document).on('click', '.delete_userss_btn', function(e)
    {
        e.preventDefault();

        var id = $(this).val();
        

        // alert(id);
        swal({
            title: "Bạn muốn xóa người dùng này?",
            text: "Khi xóa bạn sẽ không thể khôi phục lại dữ liệu này",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              $.ajax({
                method :"POST",
                url: "code.php",
                data: {
                    'user_id': id,
                    'delete_userss_btn': true
                },
                success: function (response){
                    if(response  == 200)
                    {
                        
                        swal("Thành công", "Xóa người dùng thành công", "success");
                        $("#user_table").load(location.href + " #user_table");
                    }
                    else if(response == 500)
                    {
                        swal("Lỗi", "Có lỗi xảy ra", "error");

                    }

                }

              });
            } else {
             
            }
          });

    });


});