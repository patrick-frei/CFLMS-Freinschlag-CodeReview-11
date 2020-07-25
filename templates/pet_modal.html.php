<div class="modal fade" id="pet_modal" tabindex="-1" role="dialog" aria-labelledby="modal_label" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal_label">Update pet information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="pet_form">
          <input type="hidden" name="id" id="id">
          <div class="form-group">
            <label>image:</label>
            <div>
              <div class="input-group">
                <input name="image_label" id="image_label" type="text" readonly class="form-control">
                <div class="input-group-append">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="image" id="image">
                    <label for="image" class="btn btn-secondary">Browse</label>
                  </div>
                  <button class="btn btn-danger" type="button" id="image-remove">Remove</button>
                </div>
              </div>
            </div>
            <div class="form-group mt-3">
              <img src="" id="image_thumbnail" class="img-thumbnail">
            </div>
          </div>
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name">
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col">
                <label for="age">Age</label>
                <input type="number" class="form-control" id="age" name="age">
              </div>
              <div class="col">
                <label for="age_unit">Unit</label>
                <select class="custom-select" id="age_unit" name="age_unit">
                  <option value="months">Months</option>
                  <option value="years">Years</option>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description"></textarea>
          </div>
          <div class="form-group">
            <label for="breed">Breed</label>
            <input type="text" class="form-control" id="breed" name="breed">
          </div>
          <div class="form-group">
            <label for="type">Type</label>
            <select class="custom-select" id="type" name="type">
              <option value="small">Small</option>
              <option value="large">Large</option>
            </select>
          </div>
          <div class="form-group">
            <label for="hobbies">Hobbies</label>
            <textarea class="form-control" id="hobbies" name="hobbies"></textarea>
          </div>
          <div class="form-group">
            <label for="street">Street</label>
            <input type="text" class="form-control" id="street" name="street">
          </div>
          <div class="form-group">
            <label for="ZIP_code">ZIP code</label>
            <input type="text" class="form-control" id="ZIP_code" name="ZIP_code">
          </div>
          <div class="form-group">
            <label for="city">City</label>
            <input type="text" class="form-control" id="city" name="city">
          </div>
          <div class="form-group">
            <label for="country">Country</label>
            <input type="text" class="form-control" id="country" name="country">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-secondary" id="pet_modal_save">Save changes</button>
      </div>
    </div>
  </div>
</div>