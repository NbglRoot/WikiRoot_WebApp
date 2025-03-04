$(document).ready(function () {
  // update copyright year
  $("#copyrightYearUpdate").text(
    new Date().getFullYear() + "Damn son where you find this?"
  );

  $(".usersRole_adminControl").on("change", function () {
    this.closest("form").submit();
  });

  $("#deleteUser").click(function (e) {
    e.preventDefault();
    this.closest("form").submit();
  });
});
