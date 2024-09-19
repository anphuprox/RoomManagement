<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js  "></script>
    <title>Dashboard</title>
</head>
<body>
<?php include('./Template/Layout/DashBoardheader.php') ?>

<div class="container mt-4">
        <h2><?php echo htmlspecialchars($welcomeMessage); ?></h2>
        
        <?php if (isset($_SESSION['username'])): ?>
            <div class="alert alert-success">
                Xin chào, <?php echo htmlspecialchars($_SESSION['username']); ?>!
            </div>
        <?php else: ?>
            <div class="alert alert-info">
                Bạn chưa đăng nhập. <a href="index.php?action=login" class="btn btn-primary">Đăng nhập</a>
            </div>
        <?php endif; ?>
        
        <div class="alert alert-info">
            <p>Thời điểm hiện tại: <?php echo $currentTime; ?></p>
            <p>Tổng số phòng: <?php echo $RoomStat[0]['total_rooms']; ?></p>
            <p>Số phòng đang trống: <?php echo $RoomStat[0]['available_rooms']; ?></p>
        </div>

        <h3>Danh sách phòng học</h3>
        
        <form id="filterForm" class="mb-3">
            <div class="row">
                <div class="col-md-4 mb-2">
                    <select name="block" class="form-select">
                        <option value="">Tất cả dãy</option>
                        <?php foreach ($blocks as $block): ?>
                            <option value="<?php echo htmlspecialchars($block['block']); ?>" <?php echo $selectedBlock === $block['block'] ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($block['block']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-4 mb-2">
                    <select name="capacity" class="form-select">
                        <option value="">Tất cả sức chứa</option>
                        <option value="0-50" <?php echo $selectedCapacity === '0-50' ? 'selected' : ''; ?>>0-50</option>
                        <option value="50-100" <?php echo $selectedCapacity === '50-100' ? 'selected' : ''; ?>>50-100</option>
                        <option value="100+" <?php echo $selectedCapacity === '100+' ? 'selected' : ''; ?>>Trên 100</option>
                    </select>
                </div>
                <div class="col-md-4 mb-2">
                    <button type="submit" class="btn btn-primary">Lọc</button>
                </div>
            </div>
        </form>
        <div id="roomTableContainer">
            <?php include PATH_VIEW.'room-table.php'; ?>
        </div>
        <h3>Phòng đang được mượn</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Tên phòng</th>
                    <th>Vị trí</th>
                    <th>Sức chứa</th>
                    <th>Thời gian bắt đầu</th>
                    <th>Thời gian kết thúc</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($bookedRooms as $room): ?>
                <tr>
                    <td><?php echo htmlspecialchars($room['room_name']); ?></td>
                    <td><?php echo htmlspecialchars($room['block']); ?></td>
                    <td><?php echo htmlspecialchars($room['capacity']); ?></td>
                    <td><?php echo htmlspecialchars($room['start_time']); ?></td>
                    <td><?php echo htmlspecialchars($room['end_time']); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>


    <?php include('./Template/Layout/footer.php')?>

 
</body>
</html>