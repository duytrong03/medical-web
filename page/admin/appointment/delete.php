<?php
session_start();

// Kiểm tra xem người dùng có được phép truy cập vào trang admin không
if (!isset($_SESSION['role']) || $_SESSION['role'] != 1) {
    // Nếu người dùng không có Session hoặc không có vai trò admin, chuyển hướng về trang khác, hoặc hiển thị thông báo lỗi
    header('Location: ../../error.php'); // Chuyển hướng đến trang lỗi
    exit(); // Dừng kịch bản
}

define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '../../../connect.php');

$id = $_GET['id'];

$sql = "DELETE FROM appointments WHERE id_appointments=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: read.php");
} else {
    echo "Lỗi xóa bản ghi: " . $conn->error;
}

$conn->close();
?>
