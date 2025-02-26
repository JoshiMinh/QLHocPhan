<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $TenHocPhan = $_POST['TenHocPhan'];
    $SoTinChi = $_POST['SoTinChi'];
    $HinhAnh = $_POST['HinhAnh'] ?? null; // Image link is optional

    if (!empty($TenHocPhan) && !empty($SoTinChi)) {
        $stmt = $pdo->prepare("INSERT INTO HocPhan (TenHocPhan, SoTinChi, HinhAnh) VALUES (?, ?, ?)");
        $stmt->execute([$TenHocPhan, $SoTinChi, $HinhAnh]);

        header("Location: index.php");
        exit;
    } else {
        echo "Vui lòng nhập đầy đủ Tên Học Phần và Số Tín Chỉ.";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap.min.css" rel="stylesheet">
    <title>Thêm Học Phần</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Thêm Học Phần</h1>
        <form method="POST">
            <div class="form-group">
                <label for="TenHocPhan">Tên Học Phần:</label>
                <input type="text" name="TenHocPhan" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="SoTinChi">Số Tín Chỉ:</label>
                <input type="number" name="SoTinChi" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="HinhAnh">Link Hình Ảnh (không bắt buộc):</label>
                <input type="url" name="HinhAnh" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Thêm</button>
        </form>
        <a href="index.php" class="btn btn-secondary mt-3">Quay lại danh sách</a>
    </div>
</body>
</html>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>