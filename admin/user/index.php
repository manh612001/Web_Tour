<?php

$title = 'Quản lý người dùng';
$Url = '../';
require_once '../layouts/header.php';

require_once 'register.php';
$sql = " select user.*,role.name as role_name from user left join role on user.role_id = role.id ";
$data = executeResult($sql);
$rs = $user['id'];
$sql1 = "select user.* from user where id = '$rs'";
$data1 = executeResult($sql1);
?>

  <div class="container">
        <nav id="nav-main">
            <h2 class="justify-content-center">Quản lý người dùng</h2>
            <?php
foreach ($data1 as $value) {
    if ($value['role_id'] == 1) {
        echo '<button type="button" class="btn btn-primary dk" data-toggle="modal" data-target="#myModal">Đăng ký tài khoản</button>';
    }
}

?>
<!-- The Modal -->
            <div class="modal" id="myModal">
              <div class="modal-dialog">
                <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Đăng kí tài khoản</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

              <!-- Modal body -->
              <div class="modal-body">

                <form onsubmit="return validateForm()" method="post">
                  <label >Họ Tên<span style="color:red">*</span></label>
                  <input type="text" class="form-control" id="fullname" name="fullname" requice="true">
                  <label for="email">Email<span style="color:red">*</span></label>
                  <input type="email" class="form-control" id="email" name="email" requice="true" >
                  <label >SĐT<span style="color:red">*</span></label>
                  <input type="text" class="form-control" id="sdt" name="sdt" requice="true">
                  <label >Quyền<span style="color:red">*</span></label>
                  <select name="role" id="role" class="custom-select" id="role"  requice="true">
                    <option value="1">Admin</option>
                    <option value="2">User</option>
                  </select>
                  <label >Password<span style="color:red">*</span></label>
                  <input type="text" class="form-control" id="pw"name="pw" requice="true">
                  <label >Xác nhận lại mật khẩu<span style="color:red">*</span></label>
                  <input type="text" class="form-control" id="conf_pw"name="pw" requice="true">
                  <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-success" >Đăng ký</button>
                  </div>
                </form>
              </div>


      <!-- Modal footer -->

            </div>





  </div>
</div>
        </nav >
        <table class="table table-border table-hover ">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Họ tên</th>
                    <th>Email</th>
                    <th>SĐT</th>
                    <th>Quyền</th>
                    <th style="width:50px"></th>
                    <th style="width:50px"></th>
                </tr>
            </thead>
            <tbody>
                <?php
$sql1 = "select user.* from user where id = '$rs'";
$data1 = executeResult($sql1);
foreach ($data1 as $value) { // tài khoản admin
    if ($value['role_id'] == 1) {
        $sql = " select user.*,role.name as role_name from user left join role on user.role_id = role.id order by user.role_id ASC";
        $data = executeResult($sql);
        $index = 0;
        foreach ($data as $item) {
            echo '<tr>
                                <td>' . (++$index) . '</td>
                                <td>' . $item['fullname'] . '</td>
                                <td>' . $item['email'] . '</td>
                                <td>' . $item['phone_number'] . '</td>
                                <td>' . $item['role_name'] . '</td>
                                <td style="width:50px"><button type="button" data-toggle="modal" data-target="#FormRes" onclick ="Edit(' . $item['id'] . ')" class="btn btn-warning">Sửa</button></td>

                                <td style="width:50px"><button type="button" onclick ="Delete(' . $item['id'] . ')"class="btn btn-danger">Xóa</button></td>

                              </tr>
                              ';
        }

    } else { // tài khoản user
        $sql = " select user.*,role.name as role_name from user left join role on user.role_id = role.id where user.id='$rs'";
        $data = executeResult($sql);
        $index = 0;
        foreach ($data as $item) {
            echo '<tr>
                                <td>' . (++$index) . '</th>
                                <td>' . $item['fullname'] . '</td>
                                <td>' . $item['email'] . '</th>
                                <td>' . $item['phone_number'] . '</td>
                                <td>' . $item['role_name'] . '</td>

                                <td style="width:50px"><button type="button" class="btn btn-warning">Sửa</button></td>

                              </tr>';

        }
    }
}

?>

            </tbody>
        </table>
        </div>

<script>
  function validateForm(){
    $pw = $('#pw').val();
    $confirmPwd = $('#conf_pw').val();
    if($pw!=$confirmPwd){
      alert("Mật khẩu không khớp, vui lòng kiểm tra lại");
      return false;
    }
    return true;
  }

</script>

<?php
require_once '../layouts/footer.php';

?>