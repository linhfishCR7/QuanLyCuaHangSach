<?php
// Truy vấn database
// 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
include_once(__DIR__.'/../../dbconnect.php');
if (!isset($_SESSION['user_logged'])) {
    header("location:/quanlycuahangsach/backend/error/hack.php");
}
// 2. Chuẩn bị câu truy vấn $sql
// Lấy giá trị khóa chính được truyền theo dạng QueryString Parameter key1=value1&key2=value2...
$ma = $_GET['hd_mhd'];
$sql = "DELETE FROM `hoadon` WHERE MAHOADON=  '$ma'";

// 3. Thực thi câu lệnh DELETE
$result = mysqli_query($conn, $sql);

// 4. Đóng kết nối
mysqli_close($conn);
include_once('../flash/flash-delete.php');

// Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
header('location:index.php');