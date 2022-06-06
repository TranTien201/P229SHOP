<!doctype html>
<html lang="en">

<head>
  <title>Đăng ký</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="<?php echo BASE_URL ?>public/css/style.css">
  <link rel="stylesheet" href="<?php echo BASE_URL ?>public/fontawesome-free-5.15.3-web/css/all.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400&display=swap" rel="stylesheet">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
  <div class="box">
    <div class="main">
      <div class="form-login">
        <h2>Đăng ký</h2>
        <form action="<?php echo BASE_URL ?>login/res_user" method="post">
          <div class="form-group">
            <input type="email" name="email" required="1" placeholder="Email">
          </div>
          <div class="form-group">
            <input type="text" name="username" required="1" placeholder="Tên người dùng">
          </div>
          <div class="form-group">
            <input type="password" name="password" required="1" placeholder="Mật khẩu">
          </div>
          <div class="form-group">
            <input type="password" name="re_password" required="1" placeholder="Nhập lại mật khẩu">
          </div>
          <?php
          if (isset($_GET['msg'])) {
            $msg = unserialize(urldecode($_GET['msg']));
            foreach ($msg as $key => $value) {
              echo '<div style="color:red; font-size: 15px">' . $value . '</div>';
            }
          }
          ?>
          <div class="form-group">
            <input class="text-light" type="submit" value="Submit">
          </div>
        </form>
        <p class="forgot">
          Lấy mật khẩu ? <a href="<?php echo BASE_URL ?>login/getpassform">Lấy tại đây</a>
        </p>
        <p class="forgot">
          Tôi đã có tài khoản <a href="dangnhap.html">Log in</a>
        </p>
      </div>
    </div>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>