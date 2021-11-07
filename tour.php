<?php
    require_once('layout/header.php');
    $sdt = getGet('search');
    echo"$sdt";
    $query = "select order_tour.* from order_tour where phone_number = $sdt";
    $rs = executeResult($query);
?>
<div class="container">
    <div class="jumbotron">
    <?php
        foreach($rs as $value){
            echo'
              <p>Tên: '.$value['fullname'].'</p>
              <p>Email: '.$value['email'].'</p>
              <p>Note: '.$value['note'].'</p>
              <p>Ngày đi: '.$value['date'].'</p>
              <p>Tổng tiền: '.number_format($value['total_money']).'đ</p>';
              if($value['status']==0){
                echo'<p>Trạng thái:<span class="text-warning"> Đang chờ xử lý</span><p>';
              }
              else{
                echo'<p>Trạng thái:<span class="text-success"> Thành công</span><p>';
              }
        }
    ?>
    </div>
</div>