<?php
  $title = 'Sửa';
  $Url = '../';
  require_once ('../layouts/header.php');
  $id = getGet('id');
  $query = "select * from user where id = $id";
  $rs = executeResult($query);
  foreach($rs as $value){
    $name = $value['fullname'];
    $sdt = $value['phone_number'];
    $pw = $value['password'];
  }
?>
<div class="container" style = "margin-top:40px;">
<h2 style="text-align:center">Sửa thông tin</h2>
<form onsubmit="return validateForm()" method="post">
  <label>Họ Tên<span style="color: red">*</span></label>
  <input
    type="text"
    class="form-control"
    id="fullname"
    name="fullname"
    requice="true"
    value ="<?=$name?>"
  />
  
  <label>SĐT<span style="color: red">*</span></label>
  <input type="tel" class="form-control" id="sdt" name="sdt" requice="true" value = "<?=$sdt?>" />
  <label>Quyền<span style="color: red">*</span></label>
  <select name="role" id="role" class="custom-select" id="role" requice="true">
    <option value="1">Admin</option>
    <option value="2">User</option>
  </select>
  <label>Password<span style="color: red">*</span></label>
  <input type="password" class="form-control" id="pw" name="pw" requice="true"  value="<?=$pw?>"/>
  <label>Xác nhận lại mật khẩu<span style="color: red">*</span></label>
  <input
    type="password"
    class="form-control"
    id="conf_pw"
    name="pw"
    requice="true"
  />
  <div class="modal-footer justify-content-center">
    <button type="button" class="btn btn-success" data-dismiss="modal">
      <i class="fas fa-arrow-left" style="margin-right:5px;"></i><a href="<?=$Url?>user" style="color:white;text-decoration:none">Quay lại</a>
    </button>
      
    <button type="submit" class="btn btn-success"><i class="fas fa-user-edit"></i>
      <a style="color:white;text-decoration:none">Sửa</a>
    </button>
  </div>
</form>
</div>
<?php
$fullname =$email ='';
$id = getGet('id');
if(!empty($_POST)){
    
    $fullname = getPOST('fullname');
    $email = getPOST('email');
    $sdt=getPOST('sdt');
    $pw = getPOST('pw');
    $role = getPOST('role');

    if(empty($fullname)||empty($sdt)||empty($pw)||empty($role)){
        echo"<script>alert('Vui lòng điền đầy đủ thông tin')</script>";
    }
    else{
      $sql = "update user set fullname = '$fullname',phone_number ='$sdt',password ='$pw',role_id = '$role' where id = $id";
      execute($sql);
      echo"<script>alert('Sửa thành công')</script>";
         
      die();
      
    }
}
?>
<?php
  require_once ('../layouts/footer.php');
?>
