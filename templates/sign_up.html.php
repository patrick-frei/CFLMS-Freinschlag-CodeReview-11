<?php
if (isset($_SESSION["user"])) {
  header("Location: /");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include "../templates/head.html.php"; ?>
</head>

<body>
  <header>
    <?php include "../templates/header.html.php"; ?>
  </header>
  <div class="container">
    <h1 class="display-4 text-center my-5">Sign up and adopt your pet today!</h1>
    <form action="ajax/sign_up" method="POST">
    <div class="form-group">
        <label for="exampleInputEmail1">Username</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
      </div>
      <button type="submit" class="btn btn-secondary" name="sign_up" value="true">Submit</button>
    </form>
  </div>
</body>

</html>