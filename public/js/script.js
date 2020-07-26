document.addEventListener("DOMContentLoaded", function () {
  loadPets();
  document.getElementById("test").addEventListener("keyup", function (e) {
    loadPets(`like=true&or=true&name[]=%25${e.target.value}&name[]=${e.target.value}%25&name[]=%25${e.target.value}%25&breed[]=%25${e.target.value}&breed[]=${e.target.value}%25&breed[]=%25${e.target.value}%25`);
  });
  if (document.getElementById("pet_modal_save")) {
    document.getElementById("pet_modal_save").addEventListener("click", function (event) {
      if (event.target.dataset.trigger == "insert") {
        postRequest = postFormData(document.getElementById("pet_form"), "ajax/insert_pet");
        console.log(postRequest.responseText)
        if (postRequest.success) {
          $("#pet_modal").modal("toggle");
          loadPets();
        }
      } else if (event.target.dataset.trigger == "update") {
        postRequest = postFormData(document.getElementById("pet_form"), "ajax/update_pet");
        console.log(postRequest.responseText)
        if (postRequest.success) {
          $("#pet_modal").modal("toggle");
          loadPets();
        }
      }
    });
    document.getElementById("image-remove").addEventListener("click", function () {
      document.getElementById("image_thumbnail").src = "";
      document.getElementById("image").value = "";
      document.getElementById("image_label").value = "";
      document.getElementById("image_thumbnail").parentElement.style.display = "none";
    });
    document.getElementById("image").addEventListener("change", function (event) {
      if (event.target.files.length == 1) {
        let file_reader = new FileReader();
        file_reader.onload = (function () {
          return function (e) {
            document.getElementById("image_thumbnail").src = e.target.result;
            document.getElementById("image_label").value = event.target.files[0].name;
          };
        })(event.target.files[0]);
        file_reader.readAsDataURL(event.target.files[0]);
        document.getElementById("image_thumbnail").parentElement.style.display = "block";
      } else {
        document.getElementById("image_thumbnail").src = "";
        document.getElementById("image").value = "";
        document.getElementById("image_label").value = "";
        document.getElementById("image_thumbnail").parentElement.style.display = "none";
      }
    });
  }
  if (document.getElementById("filter_reset")) {
    document.getElementById("filter_reset").addEventListener("click", function () {
      loadPets();
    });
  }
  if (document.getElementById("filter_senior")) {
    document.getElementById("filter_senior").addEventListener("click", function () {
      loadPets("age>=8");
    });
  }
  if (document.getElementById("filter_large")) {
    document.getElementById("filter_large").addEventListener("click", function () {
      loadPets("type=large");
    });
  }
  if (document.getElementById("filter_small")) {
    document.getElementById("filter_small").addEventListener("click", function () {
      loadPets("type=small");
    });
  }
  if (document.getElementById("pet_insert")) {
    document.getElementById("pet_insert").addEventListener("click", function () {
      document.getElementById("pet_modal_save").dataset.trigger = "insert";
      document.getElementById("pet_form").reset();
      document.getElementById("image_thumbnail").src = "";
      document.getElementById("image").value = "";
      document.getElementById("image_label").value = "";
      document.getElementById("image_thumbnail").parentElement.style.display = "none";
    });
  }
  if (document.getElementById("users_modal")) {
    loadUsers();
    let deleteButtons = document.getElementById("users_modal").getElementsByClassName("user-delete");
    for (deleteButton of deleteButtons) {
      deleteButton.addEventListener("click", function (event) {
        postRequest = postFormData(event.target.parentElement, "ajax/delete_user");
        if (postRequest.success) {
          loadUsers();
        }
      });
    }
  }
});
function loadPets(query) {
  document.getElementById("content").innerHTML = "";
  let pets = getJSON(`ajax/get_json?table=pets${query ? `&${query}` : ""}`);
  cardTemp = getTemplate("card");
  for (pet of pets) {
    currCardTemp = cardTemp.cloneNode(true);
    currCardTemp.id = pet.id;
    elements = currCardTemp.querySelectorAll("[data-id]");
    for (element of elements) {
      switch (element.tagName) {
        case "IMG":
          element.src = `img/${pet[element.dataset.id]}`;
          break;
        case "A":
          element.href = `adopt?${pet[element.dataset.id]}`
          break;
        case "BUTTON":
        case "INPUT":
          element.value = pet[element.dataset.id];
          break;
        default:
          element.innerHTML = pet[element.dataset.id];
      }
    }
    if (currCardTemp.getElementsByClassName("pet_update")[0]) {
      currCardTemp.getElementsByClassName("pet_update")[0].addEventListener("click", function (event) {
        document.getElementById("pet_modal_save").dataset.trigger = "update";
        document.getElementById("pet_form").reset();
        document.getElementById("image_thumbnail").parentElement.style.display = "none";
        document.getElementById("image_thumbnail").src = "";
        document.getElementById("image_label").value = "";
        let pet = getJSON(`ajax/get_json?table=pets&id=${event.target.value}`)[0];
        let inputs = document.getElementById("pet_modal").querySelectorAll("[name]");
        for (input of inputs) {
          if (input.getAttribute("type") == "file" && pet.image != "") {
            document.getElementById("image_thumbnail").parentElement.style.display = "block";
            document.getElementById("image_thumbnail").src = `img/${pet.image}`;
            document.getElementById("image_label").value = pet.image;
          } else if (input.getAttribute("name") != "image_label") {
            input.value = pet[input.getAttribute("name")];
          }
        }
      });
      currCardTemp.getElementsByClassName("pet_delete")[0].addEventListener("click", function (event) {
        postRequest = postFormData(event.target.parentElement, "ajax/delete_pet");
        console.log(postRequest.responseText)
        if (postRequest.success) {
          loadPets();
        }
      });
    }
    document.getElementById("content").appendChild(currCardTemp);
  }
}
function postFormData(form, request) {
  let obj = {};
  let xhr = new XMLHttpRequest();
  xhr.open("POST", `${location.protocol}//${location.host}/${request}`, false);
  xhr.onreadystatechange = function () {
    if (this.readyState == 4) {
      obj.success = this.status == 200 ? true : false;
      obj.responseText = this.responseText;
    }
  }
  xhr.send(new FormData(form));
  return obj;
}
function getJSON(request) {
  let obj = {};
  let xhr = new XMLHttpRequest();
  xhr.open("GET", `${location.protocol}//${location.host}/${request}`, false);
  xhr.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      obj = JSON.parse(this.responseText);
    }
  }
  xhr.send();
  return obj;
}
function getTemplate(template) {
  let obj = {};
  let xhr = new XMLHttpRequest();
  xhr.open("GET", `${location.protocol}//${location.host}/templates/${template}`, false);
  xhr.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      obj = new DOMParser().parseFromString(this.responseText, "text/html").body.firstChild;
    }
  }
  xhr.send();
  return obj;
}
function setDataValues() {
  let elements = document.querySelectorAll("[data-value^='@']");
  for (element of elements) {
    element.value = document.getElementById(element.dataset.value.substr(1)).value;
  }
}
function loadUsers() {
  let users = getJSON(`ajax/get_json?table=users`);
  let modalBody = document.getElementById("users_modal").getElementsByClassName("modal-body")[0];
  modalBody.innerHTML = "";
  for (user of users) {
    modalBody.innerHTML += `<div class="my-2"><form class="d-flex justify-content-between"><span><label class="col-form-label col-form-label-lg">${user.username}</label><input type="hidden" name="id" value="${user.id}"></span><button class="btn btn-outline-danger user-delete" type="button" data-id="${user.id}">Delete</button></form></div>`
  }
}