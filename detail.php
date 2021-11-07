<?php
    require_once('layout/header.php');
    $id = getGet('id');
    $sql = "select tour.*,category.name as category_name from tour inner join category on tour.category_id = category.id where tour.id = $id";
    $data = executeResult($sql);
?>
<div class="container" style="margin-bottom:100px;">
    <div class="row" style="margin-top:100px;">
        <div class="col-md-8 card">
        <?php
                foreach($data as $value){
                    echo'
                        <div style="height:500px;">
                            <img src = "'.$value['thumbnail'].'" style="height:100%;width:100%">
                        </div>';
                }
            ?>
            
        </div>
        
        <div class="col-md-4">
        <?php   
                foreach($data as $value){
                    echo'
                        <div style="margin:auto 0;">
                        <p>Tour: '.$value['title'].'</p>
                        <p>Danh mục: '.$value['category_name'].'</p>
                        <p>Giá: '.number_format($value['discount']).' <span style="color:red;text-decoration:line-through;font-size:15px">'.number_format($value['price']).'</span></p>
                        <p>Thời gian: '.$value['day'].'</p>
                        <p>Mô tả:</br> '.$value['description'].'</p>
                        <a href="order.php?id='.$value['id'].'"><button class="btn btn-danger"><i class="far fa-shopping-cart" style="margin-right:15px;"></i>Đặt tour</button></a>
                        </div>';
                    }
            ?>
        </div>
    </div>
</div>
   

<?php
    require_once('layout/footer.php');
?>