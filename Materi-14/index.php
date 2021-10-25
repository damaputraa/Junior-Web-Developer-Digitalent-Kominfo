<?php
if (isset($_POST['submit'])) {
  include 'crud/koneksi.php';

  $username =  $_POST['username'];
  $pass = $_POST['password'];

  $query = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username = '" . $username . "' AND password = '" . $pass . "' ");

  // Cek apakah data null atau tidak dengan Isset
  $data = mysqli_fetch_array($query);
  $user_login = isset($data['username']) ? $data['username'] : '';
  $user_role = isset($data['user_role']) ? $data['user_role'] : '';


  if (mysqli_num_rows($query) > 0) {
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['user_role'] = $user_role;

    echo "berhasil login";
    if ($user_role == 'admin') {
      header('location: crud/crud.php');
    }
  } else {
    $error = true;
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="css/style.css" rel="style/css">
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body p-4 p-sm-5">
            <h3 class="card-title text-center mb-5 fw-light fw-bold ">Login Admin Pasien</h3><br>
            <?php if (isset($error)) { ?>
              <p style="font-style: italic; color: red;">Username / Password anda salah</p>
            <?php } ?>
            <form name="login_form" method="post">
              <div class="form-floating mb-3">
                <input class="form-control" require name="username" id="username" type="text" placeholder="Username" autocomplete="off">
                <label for="floatingInput">Username</label>
              </div>
              <div class="form-floating mb-3">
                <input require name="password" id="password" class="form-control" type="password" id="floatingPassword" placeholder="Password" autocomplete="off">
                <label for="floatingPassword">Password</label>

                <div class="d-grid my-3">
                  <button class="btn btn-primary btn-login text-uppercase fw-bold" name="submit" type="submit" value="Login">Masuk</button>
                </div>
                <hr class="my-4">
                <div class="d-grid">
                  <p class="text-red" target="">
                    <i class="me-2"></i> *Username dan Password : admin
                  </p>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>
