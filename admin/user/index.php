<?php
    
    $title ='Quản lý người dùng';
    $Url = '../';
    require_once('../layouts/header.php');
    $sql = " select user.*,role.name as role_name from user left join role on user.role_id = role.id ";
    $data = executeResult($sql);
    
?>
<div class="row">
    <div class="col-md-12">
        <h2 class="justify-content-center">Quản lý người dùng</h2>
        
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
                    $index =0;
                    foreach($data as $value){
                        echo'<tr>
                        <th>'.(++$index).'</th>
                        <th>'.$value['fullname'].'</th>
                        <th>'.$value['email'].'</th>
                        <th>'.$value['phone_number'].'</th>
                        <th>'.$value['role_name'].'</th>
                        
                        <th style="width:50px"><button type="button" class="btn btn-warning">Sửa</button></th>
                        <th style="width:50px"><button type="button" class="btn btn-danger">Xóa</button></th>
                    </tr>';
                    }
                ?>
            </tbody>
        </table>
        
    </div>
</div>

<?php
    require_once('../layouts/footer.php');
    
?>