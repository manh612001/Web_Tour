<?php
  session_start();
  require_once($Url.'../utils/utility.php');
  require_once($Url.'../database/dbhelper.php');
  $user = getToken();
  if($user== null){
    header('Location:'.$Url.'authen/login.php');
    die();
  }
  $rs = $user['id'];
  $sql = "select user.* from user where id = '$rs'";
  $data = executeResult($sql);
  
  
  
  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    />
    <link
      rel="stylesheet"
      href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css"
    />
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title><?=$title?></title>
    
    <style>
      .nav {
        position: relative;
        top: 60px;
      }
      .fas {
        margin: 0 10px 0 0;
      }
      .row{
        margin: 50px 0 0 0;
      }
      .row h2{
        text-align:center;
      }
      table{
        position: relative;
        left:18%
      }
      
    </style>
  </head>
  <body>
    <nav class="navbar navbar-dark fixed-top bg-success flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#"><span style="color:white">Black</span><span style="color:black">White</span></a>
      <input
        class="form-control form-control-dark w-100 "
        type="text"
        placeholder="Tìm kiếm"
        aria-label="Search"
      />
      <?php
        foreach ($data as $value) {
          echo '<span class="text-gray">'.$value['fullname'].'</span>';
        }
      ?>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap btn btn-secondary">
          <a class="nav-link" href="<?=$Url?>authen/logout.php"><i class="fas fa-sign-out-alt"></i>Đăng xuất</a>
        </li>
      </ul>
    </nav>
    <ul class="nav justify-content-center">
  <li class="nav-item">
    <a class="nav-link" href="<?=$Url?>"><i class="fas fa-home"></i>Dashboard</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?=$Url?>tour"><i class="fas fa-plane-departure"></i>Tour</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?=$Url?>category"><i class="fas fa-list-alt"></i>Danh mục sản phẩm</a>
  </li>
  
  <li class="nav-item" id ="user">
    <a class="nav-link " href="<?=$Url?>order"><i class="fas fa-calendar-check"></i>Quản lý tour</a>
  </li>
  
  <?php
  $bool = 0;
    foreach ($data as $value) {
      if($value['role_id']==1)
        echo'<li class="nav-item user">
        <a class="nav-link"  href=""><i class="fas fa-user"></i>Quản lý người dùng</a>
      </li>';
    }
  ?>
  
</ul>
<main>