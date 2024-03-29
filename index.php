<?php session_start();
include_once 'connect.php';
include_once 'models/rooms/function.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                        Dropdown
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>                                                               
                    <li class="nav-item">
                        <a class="nav-link disabled">Disabled</a>
                    </li>
                </ul>
                <?php if(isset($_SESSION['user'])){?>
                    <a class="text-light">Hello <?= $_SESSION['user']['username'] ?></a>&emsp;
                    <a href="views/user/order/index.php" class="text-light">Order</a>&emsp;
                    <a class="text-info" href="views/auth/logout.php">Logout</a>
                   
                    <?php }else{ ?>
                <a class="btn btn-info my-2 my-sm-0" href="views/auth/register.php">Dang ky</a>&emsp;
                <a class="btn btn-success my-2 my-sm-0" href="views/auth/login.php">Dang nhap</a>
                <?php } ?>
            </div>
        </nav>
        <section>
            <div class="container mt-4">
                
                <h1 class="text-secondary text-center">All rooms</h1><br>
                <div class="row">
                    <?php foreach(show_all_rooms($conn) as $value) { ?>
                    <div class="col-md-4 mb-4">
                        <div class="card" style="width: 18rem;">
                            <img src="http://xuonggooccho.com/wp-content/uploads/2019/07/Hinh-anh-phong-ngu-dep-1.jpg" class="card-img-top" alt="...">
                            <div class="card-body text-center">
                                <h5 class="card-title">Name: <?= $value['name'] ?></h5>
                                <p class="card-text">Price: <?= $value['price'] ?></p>
                                <p class="card-text <?= ($value['status'] == 1 ? 'text-success' : 'text-danger') ?>">Status: <?= ($value['status'] == 1 ? 'Empty room' : 'Room booked') ?></p>
                                <?php if($value['status'] == 1){ ?>
                                    <?php if(isset($_SESSION['user']) && !empty($_SESSION['user']['email_verified_at'])){ ?>
                                    <a href="booking.php?room_id=<?= $value['id'] ?>&user_id=<?= $_SESSION['user']['id'] ?>" class="btn btn-primary">Book room</a>
                                    <?php }else{ ?>
                                        <a onclick="alert('Vui lòng đăng nhập hoặc xác thực tài khoản')" class='btn btn-primary'>Book room</a>
                                        <?php } ?>
                                    <?php }else{ ?>
                                    <button type='button' class="btn btn-danger">Room booked</button> 
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </section>
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
  </body>
</html>

<?php 
// unset($_SESSION);

// var_dump($_COOKIE['data']['verification_code']);
// foreach ($_COOKIE['data'] as $name => $value) {
//     echo "$name : $value <br />\n";
// }
?>
 <?php 
//  if($_SESSION['user']['email_verified_at'] == null)echo "<script>alert('Email của bạn chưa xác thực, vui lòng xác thực tai email để book phòng')</script></a>";
 ?>