<div class="col">
  <div class="card my-4">
    <img class="card-img-top" data-id="image">
    <div class="card-body">
      <h5 class="card-title text-center"><span data-id="name"></span></h5>
      <p class="card-text">
        <ul class="list-group list-group-flush">
          <li class="list-group-item d-flex justify-content-between"><span>Age:</span><span><span data-id="age"></span> years</span></li>
          <li class="list-group-item d-flex justify-content-between"><span>Breed:</span><span data-id="breed"></span></li>
        </ul>
      </p>
      <a data-id="id" class="btn btn-outline-secondary w-100">Adopt now!</a>
    </div>
    <?php 
    if(isset($_SESSION["type"]) == "administrator") {
      echo "<div class=\"card-footer text-muted\">";
      echo "<button type=\"button\" data-id=\"id\" class=\"pet_update btn btn-sm btn-outline-secondary w-100 mt-2\" data-toggle=\"modal\" data-target=\"#pet_modal\">Update</button>";
      echo "<form>";
      echo "<input type=\"hidden\" name=\"id\" data-id=\"id\">";
      echo "<button type=\"button\" class=\"pet_delete btn btn-sm btn-outline-danger w-100 mt-2\">Delete</button>";
      echo "</form>";
      echo "</div>";
    }
    ?>
  </div>
</div>