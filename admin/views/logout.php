<?php
session_start();
// Xóa tất cả các biến session
session_unset();

// Hủy phiên làm việc
session_destroy();

// Chuyển hướng người dùng đến trang đăng nhập
header("Location: ../index.php");
exit();
?>