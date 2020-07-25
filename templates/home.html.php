<?php require_once "../php/database.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "../templates/head.html.php"; ?>
</head>

<body class="min-vh-100">
  <header>
    <?php include "../templates/header.html.php"; ?>
  </header>
  <div class="container">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4" id="content">
    </div>
  </div>
  <?php if (isset($_SESSION["type"]) == "administrator") include "../templates/pet_modal.html.php" ?>
  <?php if (isset($_SESSION["type"]) == "administrator") include "../templates/users_modal.html.php" ?>
  <footer>
    <?php include "../templates/footer.html.php"; ?>
  </footer>
</body>

</html>
<?php $connect->close(); ?>