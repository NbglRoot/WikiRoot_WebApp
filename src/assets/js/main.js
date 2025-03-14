$(document).ready(function () {
  // update copyright year
  $("#copyrightYearUpdate").text(new Date().getFullYear());

  // users config panel
  // general info user edit
  if (document.querySelector(".confirmUserEdit")) {
    const confirmButton = document.querySelector(".confirmUserEdit");
    confirmButton.addEventListener("click", (e) => {
      const allInputs = e.target.closest("form").querySelectorAll("input");
      allInputs.forEach((input) => {
        input.disabled = false;
      });
      confirmButton.classList.remove("d-block");
      confirmButton.classList.add("d-none");
      const editButton = document.querySelector(".applyUserEdit");
      editButton.classList.remove("d-none");
      editButton.classList.add("d-block");
      editButton.addEventListener("click", (e) => {
        e.preventDefault();
        if (confirm("Estas seguro de seguir con estos cambios?.")) {
          editButton.closest("form").submit();
        }
      });
    });
  }
  // private info user edit
  if (document.querySelector(".confirmUserEditPrivateInfo")) {
    const confirmButtonEditPrivate = document.querySelector(
      ".confirmUserEditPrivateInfo"
    );
    confirmButtonEditPrivate.addEventListener("click", (e) => {
      e.preventDefault();
      const allInputs = e.target.closest("form").querySelectorAll("input");
      allInputs.forEach((input) => {
        input.disabled = false;
      });
      confirmButtonEditPrivate.classList.remove("d-block");
      confirmButtonEditPrivate.classList.add("d-none");
      const editButton = document.querySelector(".applyUserEditPrivateInfo");
      editButton.classList.remove("d-none");
      editButton.classList.add("d-block");
      editButton.addEventListener("click", (e) => {
        e.preventDefault();
        if (confirm("Seguro de seguir con estos cambios?")) {
          editButton.closest("form").submit();
        }
      });
    });
  }

  // user delete option
  if ($("#deleteMyAccount")) {
    $("#deleteMyAccount").click(function (e) {
      e.preventDefault();
      if (confirm("Seguro de eliminar tu cuenta?")) {
        this.closest("form").submit();
      }
    });
  }

  // admin control: change role from user
  $(".usersRole_adminControl").on("change", function () {
    this.closest("form").submit();
  });

  // admin control: delete user
  $(".deleteUser").click(function (e) {
    e.preventDefault();
    const adminResponse = prompt(
      "Escribe ELIMINAR para confirmar la eliminacion de este usuario."
    );
    if (adminResponse === "ELIMINAR") this.closest("form").submit();
  });

  // admin control: delete article
  $(".deleteArticle").click(function (e) {
    e.preventDefault();
    const adminResponse = prompt(
      "Escribe ELIMINAR para confirmar la eliminacion de este articulo."
    );
    if (adminResponse === "ELIMINAR") this.closest("form").submit();
  });

  // admin control: ban user
  $(".userBanButton").click(function (e) {
    this.closest("form").submit();
  });

  // admin control: filter searcheable table
  $(".usersTextInputFilter").keyup(function (e) {
    console.log(e.target.value);
    const filter = e.target.value.toLowerCase();
    const allRows = $("#adminTableBody tr");
    if (filter.length !== 0) {
      $(allRows).each(function (i, row) {
        const rowText = row.textContent.toLowerCase();
        if (rowText.includes(filter)) {
          row.style.display = "table-row";
          row.style.color = "lightblue";
        } else {
          row.style.display = "none";
        }
      });
    } else {
      $(allRows).each(function (i, row) {
        row.style.display = "table-row";
        row.style.color = "white";
      });
    }
  });

  if (
    document.querySelector("#newArticleThumbnail") &&
    document.querySelector("#newArticleImagesGallery")
  ) {
    document
      .querySelector("#newArticleThumbnail")
      .addEventListener("change", (e) => {
        const [file] = e.target.files;
        const type = file.type.toLowerCase();
        if (
          type !== "image/jpg" &&
          type !== "image/jpeg" &&
          type !== "image/png"
        ) {
          alert("Solo se permiten imagenes con formato jpg, jpeg o png");
          e.target.value = "";
        }
      });
    document
      .querySelector("#newArticleImagesGallery")
      .addEventListener("change", (e) => {
        const [file] = e.target.files;
        const type = file.type.toLowerCase();
        if (
          type !== "image/jpg" &&
          type !== "image/jpeg" &&
          type !== "image/png"
        ) {
          alert("Solo se permiten imagenes con formato jpg, jpeg o png");
          e.target.value = "";
        }
      });
  }

  if (document.querySelector("#carousel_gallery")) {
    // bootstrap carrousel
    document
      .querySelector(".carousel-indicators")
      .firstElementChild.setAttribute("aria-current", "true");
    document
      .querySelector(".carousel-inner")
      .firstElementChild.classList.add("active");

    $("#carousel_gallery").carousel({
      interval: 3000,
    });
  }
});
