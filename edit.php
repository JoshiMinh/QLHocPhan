<?php
include 'db.php';

$id = $_GET['id'] ?? null;
$stmt = $pdo->prepare("SELECT * FROM HocPhan WHERE IDHocPhan = ?");
$stmt->execute([$id]);
$course = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $TenHocPhan = $_POST['TenHocPhan'];
    $SoTinChi = $_POST['SoTinChi'];
    $HinhAnh = $_POST['HinhAnh'] ?: $course['HinhAnh']; // Keep the old image URL if the new one isn't provided

    $stmt = $pdo->prepare("UPDATE HocPhan SET TenHocPhan = ?, SoTinChi = ?, HinhAnh = ? WHERE IDHocPhan = ?");
    $stmt->execute([$TenHocPhan, $SoTinChi, $HinhAnh, $id]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap.min.css" rel="stylesheet">
    <title>Sửa Học Phần</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Sửa Học Phần</h1>
        <form method="POST">
            <div class="form-group">
                <label for="TenHocPhan">Tên Học Phần:</label>
                <input type="text" name="TenHocPhan" class="form-control" value="<?= htmlspecialchars($course['TenHocPhan']) ?>" required>
            </div>

            <div class="form-group">
                <label for="SoTinChi">Số Tín Chỉ:</label>
                <input type="number" name="SoTinChi" class="form-control" value="<?= $course['SoTinChi'] ?>" required>
            </div>

            <div class="form-group">
                <label for="HinhAnh">Link Hình Ảnh:</label>
                <input type="url" name="HinhAnh" class="form-control" value="<?= htmlspecialchars($course['HinhAnh']) ?>">
            </div>

            <button type="submit" class="btn btn-primary">Cập Nhật</button>
        </form>
        <a href="index.php" class="btn btn-secondary mt-3">Quay lại danh sách</a>
    </div>
</body>
</html>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>