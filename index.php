<?php
include 'db.php';

$stmt = $pdo->query("SELECT * FROM HocPhan");
$courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap.min.css" rel="stylesheet">
    <title>Danh Sách Học Phần</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Danh Sách Học Phần</h1>
        <a href="create.php" class="btn btn-secondary mb-3">Thêm Học Phần Mới</a>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên Học Phần</th>
                    <th>Số Tín Chỉ</th>
                    <th>Hình Ảnh</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($courses as $course): ?>
                    <tr>
                        <td><?= $course['IDHocPhan'] ?></td>
                        <td><?= htmlspecialchars($course['TenHocPhan']) ?></td>
                        <td><?= $course['SoTinChi'] ?></td>
                        <td><img src="<?= htmlspecialchars($course['HinhAnh']) ?>" alt="Học Phần" class="img-thumbnail" width="100"></td>
                        <td>
                            <a href="edit.php?id=<?= $course['IDHocPhan'] ?>" class="btn btn-warning btn-sm">Sửa</a>
                            <a href="delete.php?id=<?= $course['IDHocPhan'] ?>" class="btn btn-danger btn-sm">Xóa</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>