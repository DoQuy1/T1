
<?php
include('functions/userfunction.php');
include('include/header.php');

?>



<div class="container mt-4" style="background: #f9f9f9;">
    <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Information User</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.asp">Home</a></li>
                            <li class="breadcrumb-item active">Information User</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
</div>
<div class="container rounded bg-white mt-5 mb-5" >
  <div class="row ">
      <div class="col-md-3 border-right card">
          <div class="d-flex flex-column align-items-center text-center p-3 py-5"><span class="font-weight-bold"><%=Result("Name")%></span><span class="text-black-50"><%=Result("Email")%></span><span> </span></div>
      </div>
      <div class="col-md-7 border-right card">
          <div class="p-3 py-5">
              <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4 class="text-right">Profile Settings</h4>
              </div>
              <form action="" id="edituser" method="post">
                <div class="row mt-2">
                    <div class="col-md-12"><label class="labels">Name</label><input type="text" class="form-control" name="name" id="name" placeholder="name" value="<%=Result("Name")%>" disabled></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12 mb-2"><label class="labels">Mobile Number</label><input type="text" name="phone_number" id="phone_number"class="form-control" placeholder="enter phone number" value="<%=Result("Phone")%>" disabled></div>
                    <div class="col-md-12 mb-2"><label class="labels">Address </label><input type="text" name="address" id="address" class="form-control" placeholder="enter address" value="<%=Result("Address")%>"disabled></div>
                    <div class="col-md-12 mb-2"><label class="labels">Email ID</label><input type="text" name="email" id="email" class="form-control" placeholder="enter email id" value="<%=Result("Email")%>"disabled></div>
                    <div class="col-md-12 mb-2"><label class="labels">Username</label><input type="text" name="username" id="username" class="form-control" placeholder="enter username" value="<%=Result("Username")%>"disabled></div>
                    <div hidden id="pass_div" class="col-md-12 mb-2"><label class="labels">Password</label><input type="password" name="password" id="password" class="form-control" placeholder="enter password" value="<%=Result("Password")%>"disabled></div>
                </div>
              </form>
              <div class="mt-5 text-center"><button id="saveButton" class="btn border px-3 p-1 add-experience" type="submit" form="edituser" hidden>Save Profile</button></div>
          </div>
      </div>
      <div class="col-md-1">
          <div class="p-3 py-5">
              <div class="d-flex justify-content-center align-items-center experience"><button id="editButton"class="btn border px-3 p-1 add-experience" type="button">Edit</button></div><br>
          </div>
      </div>
  </div>
</div>

<?php include('include/footer.php'); ?>