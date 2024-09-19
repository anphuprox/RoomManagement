$(document).ready(function () {
  function loadRooms(page) {
    var formData = $("#filterForm").serialize() + "&page=" + page + "&ajax=1";
    $.ajax({
      url: "index.php?action=index",
      type: "GET",
      data: formData,
      success: function (response) {
        $("#roomTableContainer").html(response);
      },
    });
  }

  $(document).on("click", ".pagination .page-link", function (e) {
    e.preventDefault();
    var page = $(this).text();

    loadRooms(page);
  });

  $("#filterForm").on("submit", function (e) {
    e.preventDefault();
    loadRooms(1);
  });
});
