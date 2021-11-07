<?php
    session_start();
    
    require_once('./database/dbhelper.php');
    require_once('./utils/utility.php');
    $sql = "select * from category ";
    $data =  executeResult($sql);
    if(!empty($_POST)){
      $sdt = getPOST('search');
      $query = "select * from order_tour where phone_number = $sdt";
      $rs = executeResult($query);
    }
    
    
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="index.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Document</title>
    <style>
      .carousel-inner img{
    width: 100%;
    z-index: -1;
    height: 550px;
}

.card{
  width: 98%;
}
.col-md-3 img{
    width: 200px;
    height: 200px;
    
}


nav{
  background:rgba(0,0,0,.2);
}

    </style>
  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-lg  navbar-dark fixed-top" >
        <!-- Brand -->
        <a class="navbar-brand" href="index.php"><h3>BlackWhite</h2></a>
      
        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <!-- Navbar links -->
        
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
          <ul class="navbar-nav">
            <?php
              foreach($data as $value){
                echo'
                  <li class="nav-item">
                    <a class="nav-link" href="category.php?id='.$value['id'].'">'.$value['name'].'</a>
                  </li>';
              }
            ?>
            <li class="nav-item">
              <a href="" class="nav-link">Khách sạn</a>
            </li>
            <li class="nav-item">
              <a data-toggle="collapse" data-target="#demo" class="nav-link">Tra cứu Booking</a>
            </li>
            <div id="demo" class="collapse">
              <form method="post">
                <input type="tel" id ="search" name = "search" pattern="[0-9]{9,12}" placeholder="nhập số điện thoại:"style="margin:10px 0 10px 10px;">
                <a type="button" data-toggle="modal" data-target="#myModal"><i class="fas fa-search" style="position:relative;left:-35px;"></i></a>
              </form>
            </div>
          </ul>
        </div>
        
      </nav>
      <?php
          $name ;
          if(!empty($_POST)){
            foreach($rs as $value){
              $name = $value['fullname'];
            }
          }
        ?>
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
      <?php
          $name ;
          if(!empty($_POST)){
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
          }
        ?>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
    </header>
    <main>
    


</script>