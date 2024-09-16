<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="index.php">Hệ thống Quản lý Phòng học</a>
            <ul class="navbar-nav ml-auto">
                <?php if (isset($_SESSION['isLogin']) && $_SESSION['isLogin'] === true): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=logout">Đăng xuất</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=login">Đăng nhập</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
</header>