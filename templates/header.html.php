<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <a class="navbar-brand" href="/">
    <img src="img/logo.svg" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
    GetPet
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav">
      <form class="form-inline my-2 my-lg-0">
        <input id="test" class="form-control mx-2" type="search" placeholder="Search" aria-label="Search">
        <div class="btn-group">
          <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Filter
          </button>
          <div class="dropdown-menu">
            <button class="dropdown-item" id="filter_reset" type="button">Reset</button>
            <div class="dropdown-divider"></div>
            <button class="dropdown-item" id="filter_senior" type="button">Senior</button>
            <button class="dropdown-item" id="filter_large" type="button">Large</button>
            <button class="dropdown-item" id="filter_small" type="button">Small</button>
          </div>
        </div>
        <?php
        if ($_SESSION["type"] == "administrator") {
          echo "<button class=\"btn btn-outline-secondary ml-2\" type=\"button\" data-toggle=\"modal\" data-target=\"#pet_modal\" id=\"pet_insert\">Add a pet</button>";
        }
        ?>
        <?php
        if ($_SESSION["type"] == "administrator") {
          echo "<button class=\"btn btn-outline-secondary ml-2\" type=\"button\" data-toggle=\"modal\" data-target=\"#users_modal\" id=\"manage_user\">Manage users</button>";
        }
        ?>
      </form>
    </ul>
    <ul class="navbar-nav ml-auto">
      <?php
      if (!isset($_SESSION["user"])) {
        echo "<li class=\"nav-item" . ($_SERVER["REQUEST_URI"] == "/sign_up" ? " active" : "") . "\">";
        echo "<a class=\"nav-link\" href=\"/sign_up\">Sign Up</a>";
        echo "</li>";
      }
      if (!isset($_SESSION["user"])) {
        echo "<li class=\"nav-item\">";
        echo "<a class=\"btn btn-secondary mx-2\" href=\"/login\">Login</a>";
        echo "</li>";
      }
      if (isset($_SESSION["user"])) {
        echo "<li class=\"nav-item\">";
        echo "<a class=\"btn btn-secondary mx-2\" href=\"/ajax/logout?logout=true\">Logout</a>";
        echo "</li>";
      }
      ?>
    </ul>
  </div>
</nav>