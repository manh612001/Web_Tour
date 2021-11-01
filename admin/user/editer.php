<?php
    
    $title ='Quản lý người dùng';
    $Url = '../';
    require_once('../layouts/header.php');
    
?>

  <div class="container">
        <nav id="nav-main">
            <h2 class="justify-content-center">Quản lý người dùng</h2>
            <?php
              foreach ($data1 as $value) {
                if($value['role_id']==1){
                  echo'<button type="button" class="btn btn-primary dk" data-toggle="modal" data-target="#myModal">Đăng ký tài khoản</button>' ;
                }
              }
            
            ?>
<!-- The Modal -->
            <div class="modal" id="myModal">
              <div class="modal-dialog">
                <div class="modal-content">

      <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Modal Heading</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

      <!-- Modal body -->
              <div class="modal-body">
                Modal body..
              </div>

      <!-- Modal footer -->
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>

        </div>
  </div>
</div>
        </nav >
        <table class="table table-border table-hover table-responsive ">
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
                    foreach($data1 as $value){ // tài khoản admin
                      if($value['role_id']==1){
                        $sql = " select user.*,role.name as role_name from user left join role on user.role_id = role.id ";
                        $data = executeResult($sql);
                        $index =0;
                        foreach($data as $item){
                          echo'<tr>
                                <td>'.(++$index).'</td>
                                <td>'.$item['fullname'].'</td>
                                <td>'.$item['email'].'</td>
                                <td>'.$item['phone_number'].'</td>
                                <td>'.$item['role_name'].'</td>
                                <td style="width:50px"><button type="button" onclick ="Edit('.$item['id'].')" class="btn btn-warning">Sửa</button></td>
                                <td style="width:50px"><button type="button" onclick ="Delete('.$item['id'].')"class="btn btn-danger">Xóa</button></td>
                            
                              </tr>';
                        }
                      }
                      else{ // tài khoản user
                        $sql = " select user.*,role.name as role_name from user left join role on user.role_id = role.id where user.id='$rs'";
                        $data = executeResult($sql);
                        $index =0;
                        foreach($data as $item){
                          echo'<tr>
                                <td>'.(++$index).'</th>
                                <td>'.$item['fullname'].'</td>
                                <td>'.$item['email'].'</th>
                                <td>'.$item['phone_number'].'</td>
                                <td>'.$item['role_name'].'</td>
                                
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
   function Delete(id){
     $.post('')
   }
 </script>

<?php
    require_once('../layouts/footer.php');
    
?>