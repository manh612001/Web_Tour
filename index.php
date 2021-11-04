<?php
    session_start();
    
    require_once('./database/dbhelper.php');
    $sql = "select * from category ";
    $data =  executeResult($sql);
    $sql1= "select * from tour limit 6";
    $data1 = executeResult($sql1);
    function Url($thumbnail, $Url = "./") { // thêm đường dẫn folder $Url

      return $Url.$thumbnail;
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

form{
    width: 400px;
    margin: 20px auto;
    position: relative;
    top: -150px;
    z-index: 1;
}
nav{
  background:#dfe6e9;
}
    </style>
  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-lg  navbar-dark fixed-top" >
        <!-- Brand -->
        <a class="navbar-brand" href="#"><h3>BlackWhite</h2></a>
      
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
                    <a class="nav-link" href="#">'.$value['name'].'</a>
                  </li>';
              }
            ?>
            <li class="nav-item">
              <a href="" class="nav-link">Khách sạn</a>
            </li>
          </ul>
        </div>
        
      </nav>
    </header>
    <main>
      <div id="demo" class="carousel slide" data-ride="carousel" style="margin-top:85px;">

        <!-- Indicators -->
        <ul class="carousel-indicators">
          <li data-target="#demo" data-slide-to="0" class="active"></li>
          <li data-target="#demo" data-slide-to="1"></li>
          <li data-target="#demo" data-slide-to="2"></li>
        </ul>
      
        <!-- The slideshow -->
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="./upload/Hai_Duong.jpg" alt="Los Angeles">
          </div>
          <div class="carousel-item">
            <img src="./upload/pexels-foc-foodoncam-58597.jpg" alt="Chicago">
          </div>
          <div class="carousel-item">
            <img src="./upload/pexels-quang-nguyen-vinh-2161449.jpg" alt="New York">
          </div>
        </div>
      
        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
          <span class="carousel-control-next-icon"></span>
        </a>
      <div style="margin:auto;position:relative;top:-150px;width:30%;">
        <input type="text" style="padding:5px 15px;"class="form-control" placeholder="Bạn muốn đi đâu?"><a href="#" style="position:absolute;right:15px;top:5px;"><i class="fas fa-search"></i></a></input>
        
      </div>
      </div>
      <h2 style="text-align:center; margin-bottom:20px;">Các tour du lịch mới nhất</h2>
      <div class="container">
        <div class="row">
          <?php
            foreach($data1 as $value){
              echo'
              
                <div class="col-md-4 col-sm-6 " style="margin-bottom:20px;">
                  <div class="card" style="margin: 0 auto;">
                  <img src="'.Url($value['thumbnail']).'" style="height:192px;"></img>
                  <p style="padding:0 15px;margin-top:20px;">Tên: '.$value['title'].'</p>
                  <p style="padding:0 15px;color:red"><span style="color:black;">Giá:</span> '.number_format($value['discount']).'đ</p>
                  <div class="bt">
                    <button class="btn btn-danger w-100" style="margin-bottom:5px;"><i class="far fa-shopping-cart" style="margin-right:15px;"></i>Đặt ngay</button>
                    <button type="button" class="btn btn-outline-primary w-100" >Xem chi tiết</button>
                  </div>
                  </div>
                </div>
              ';
            }
          ?>
        </div>
      </div>
    </main>
    <!-- Footer -->
    <footer class="text-center text-white" style="background-color: #caced1;">
  <!-- Grid container -->
  <div class="container p-4">
    <!-- Section: Images -->
    <section class="">
      <div class="row">
        <div class="col-lg-2 col-md-12 mb-4 mb-md-0">
          <div
            class="bg-image hover-overlay ripple shadow-1-strong rounded"
            data-ripple-color="light"
          >
            <img
              src="https://mdbootstrap.com/img/new/fluid/city/113.jpg"
              class="w-100"
            />
            <a href="#!">
              <div
                class="mask"
                style="background-color: rgba(251, 251, 251, 0.2);"
              ></div>
            </a>
          </div>
        </div>
        <div class="col-lg-2 col-md-12 mb-4 mb-md-0">
          <div
            class="bg-image hover-overlay ripple shadow-1-strong rounded"
            data-ripple-color="light"
          >
            <img
              src="https://mdbootstrap.com/img/new/fluid/city/111.jpg"
              class="w-100"
            />
            <a href="#!">
              <div
                class="mask"
                style="background-color: rgba(251, 251, 251, 0.2);"
              ></div>
            </a>
          </div>
        </div>
        <div class="col-lg-2 col-md-12 mb-4 mb-md-0">
          <div
            class="bg-image hover-overlay ripple shadow-1-strong rounded"
            data-ripple-color="light"
          >
            <img
              src="https://mdbootstrap.com/img/new/fluid/city/112.jpg"
              class="w-100"
            />
            <a href="#!">
              <div
                class="mask"
                style="background-color: rgba(251, 251, 251, 0.2);"
              ></div>
            </a>
          </div>
        </div>
        <div class="col-lg-2 col-md-12 mb-4 mb-md-0">
          <div
            class="bg-image hover-overlay ripple shadow-1-strong rounded"
            data-ripple-color="light"
          >
            <img
              src="https://mdbootstrap.com/img/new/fluid/city/114.jpg"
              class="w-100"
            />
            <a href="#!">
              <div
                class="mask"
                style="background-color: rgba(251, 251, 251, 0.2);"
              ></div>
            </a>
          </div>
        </div>
        <div class="col-lg-2 col-md-12 mb-4 mb-md-0">
          <div
            class="bg-image hover-overlay ripple shadow-1-strong rounded"
            data-ripple-color="light"
          >
            <img
              src="https://mdbootstrap.com/img/new/fluid/city/115.jpg"
              class="w-100"
            />
            <a href="#!">
              <div
                class="mask"
                style="background-color: rgba(251, 251, 251, 0.2);"
              ></div>
            </a>
          </div>
        </div>
        <div class="col-lg-2 col-md-12 mb-4 mb-md-0">
          <div
            class="bg-image hover-overlay ripple shadow-1-strong rounded"
            data-ripple-color="light"
          >
            <img
              src="https://mdbootstrap.com/img/new/fluid/city/116.jpg"
              class="w-100"
            />
            <a href="#!">
              <div
                class="mask"
                style="background-color: rgba(251, 251, 251, 0.2);"
              ></div>
            </a>
          </div>
        </div>
      </div>
    </section>
    <!-- Section: Images -->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, .8);">
    © 2020 Copyright:
    <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
  </div>
  <!-- Copyright -->
</footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>
</html>
