<?php
    $showalert=false;
    $showerroe=false;
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
    include 'partials/_dbconnect.php';
    $username=$_POST['username'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    // $exists=false;

    // check wheather this username Exists
    $existsql="SELECT * FROM `users` WHERE username='$username'";
    $result=mysqli_query($conn,$existsql);
    $numExitrows = mysqli_num_rows($result);

    if($numExitrows  > 0)
    {
      // $exists=true; 
      $showerroe=" Username Already Exists";

    }
    else
    {
      // $exists=false;
      if(($password==$cpassword))
      {
        $hash=password_hash($password,PASSWORD_DEFAULT);
          $sql="INSERT INTO `users` (`username`, `password`, `date`) VALUES ('$username', '$hash', current_timestamp())";
          $result = mysqli_query($conn,$sql);
          if($result)
          {
              $showalert=true;
          }
      }
      else
      {
          $showerroe="Password Do Not Match ";
      }
    }

}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>SignUp</title>
  </head>
  <body>
  <?php require'partials/_nav.php'?>

  <!-- alert -->
<?php
if($showalert)
{
echo '
  <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> You Account now is created Now you are Login
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';

}
if($showerroe)
{
echo '
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> '.$showerroe.'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';

}
?>

  <div class="container my-4">

    <h1 class="text-center">SignUp to Our Website</h1>
    <form action="/loginsystem/signup.php"method="post">
  <div class="mb-3">
    <label for="username" class="form-label">UserName</label>
    <input type="text" maxlength="11" class="form-control" id="username" name="username"aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password"maxlength="11" class="form-control" id="password" name="password">
  </div>
  <div class="mb-3">
    <label for="cpassword" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" id="cpassword" name="cpassword">
    <div id="emailHelp" class="form-text">Make Sure To Type The Same Password</div>
  </div>
  <!-- <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Confirm Password</label>
  </div> -->
  <button type="submit" class="btn btn-primary">SignUp</button>
</form>

  </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
  </body>
</html>