<?php
    $title = 'Thông tin chi tiết tour';
    $Url = '../';
    require_once('../layouts/header.php');
    $id = getGet('id');
    $query = "select * from tour where id = $id";
    $rs = executeResult($query);
?>
<div class="container">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Tên</th>
                <th>Hình ảnh</th>
                <th>Giá</th>
                <th>Giảm giá</th>
                <th>Thời gian</th>
                <th>Mô tả</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($rs as $value){
                    echo'
                        <tr>
                            <td>'.$value['title'].'</td>
                            <td>'.Url($value['thumbnail']).'</td>
                            <td>'.$value['price'].'</td>
                            <td>'.$value['discount'].'</td>
                            <td>'.$value['day'].'</td>
                            <td>'.$value['description'].'</td>
                        </tr>
                    ';
                }
            ?>
        </tbody>
    </table>
</div>