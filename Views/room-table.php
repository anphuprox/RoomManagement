<table class="table table-striped" >
    <thead>
        <tr>
            <th>Tên phòng</th>
            <th>Vị trí</th>
            <th>Sức chứa</th>
            <th>Trạng thái</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($rooms as $room): ?>
        <tr>
            <td><?php echo htmlspecialchars($room['room_name']); ?></td>
            <td><?php echo htmlspecialchars($room['block']); ?></td>
            <td><?php echo htmlspecialchars($room['capacity']); ?></td>
            <td>
                <?php if ($room['status'] == 'Trống'): ?>
                    <span class="badge bg-success">Trống</span>
                <?php else: ?>
                    <span class="badge bg-danger">Đang mượn</span>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<nav aria-label="Page navigation" >
    <ul class="pagination" >
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <li class="page-item <?php echo $i == $page ? 'active' : ''; ?>">
                <a class="page-link" href="#" data-page="<?php echo $i; ?>"><?php echo $i; ?></a>
            </li>
        <?php endfor; ?>
    </ul>
</nav>
<script >
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
</script>