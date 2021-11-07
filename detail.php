<?php
    require_once('layout/header.php');
    $id = getGet('id');
    $sql = "select * from tour where id = $id";
    $data = executeResult($sql);
?>
<?php
    foreach($data as $value){
        echo'
            <div style="height:500px;">
                <img src = "'.$value['thumbnail'].'" style="height:100%;width:100%">
            </div>';
    }
?>

<div class="container" style="margin-bottom:100px;">
    <div style="margin-top:20px;">
    <?php   
        foreach($data as $value){
            echo'
                <p>Tour: '.$value['title'].'</p>
                <p>Gía: '.number_format($value['discount']).' <span style="color:red;text-decoration:line-through;font-size:15px">'.number_format($value['price']).'</span></p>
                <a href="order.php?id='.$value['id'].'"><button class="btn btn-danger"><i class="far fa-shopping-cart" style="margin-right:15px;"></i>Đặt tour</button></a>
                ';
        }
    ?>
    </div>
</div>
<?php
    require_once('layout/footer.php');
?>