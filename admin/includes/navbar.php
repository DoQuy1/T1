<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
    
    <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
        <div class="input-group input-group-outline">
            <!-- <label class="form-label">Type here...</label>
            <input type="text" class="form-control"> -->
            
            <span class="me-2">
                    <!-- Icon người dùng (sử dụng Font Awesome) -->
                    <i class="fas fa-user"></i>
                </span>
                <!-- Tên người dùng -->
                <h6><?= $_SESSION['auth_user']['name']; ?></h6>
        </div>
        </div>
        

    </div>
    </div>
</nav>