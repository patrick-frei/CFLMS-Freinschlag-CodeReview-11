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
    <h1 class="display-4 text-center my-5">Login and adopt your pet today!</h1>
    <form action="ajax/login" method="POST">
      <div class="form-group">
        <label for="username">Email</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="Enter username or email">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
      </div>
      <button type="submit" class="btn btn-secondary" name="login" value="true">Submit</button>
    </form>
  </div>
</body>

</html>