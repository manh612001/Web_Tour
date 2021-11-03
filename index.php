<?php
    session_start();
    
    require_once('./database/dbhelper.php');
    $sql = "select * from category ";
    $data =  executeResult($sql);
    $sql1= "select * from tour limit 4";
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
    </style>
  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-lg bg-info navbar-dark fixed-top" >
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
            <img src="./upload/hinh-anh-cute-de-thuong.jpg" alt="New York">
          </div>
        </div>
      
        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
          <span class="carousel-control-next-icon"></span>
        </a>
      <div style="position:relative;top:-150px;">
        <input type="text" style="padding:5px 15px;" placeholder="Bạn muốn đi đâu?">
        <a href="#" style="position:relative;right:40px;"><i class="fas fa-search"></i></a>
      </div>
      </div>
      <h3 style="text-align:center; margin-top:20px">Các tour du lịch mới nhất</h3>
      <div class="container">
        <div class="row">
          <?php
            foreach($data1 as $value){
              echo'
              
                <div class="col-md-3 col-sm-6 card">
                  <img src="'.Url($value['thumbnail']).'" style="width:100%"></img>
                  <p>'.$value['title'].'</p>
                  <p>'.$value['discount'].'</p>
                </div>
              ';
            }
          ?>
        </div>
      </div>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>
</html>
