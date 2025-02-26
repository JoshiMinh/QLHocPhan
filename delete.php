<?php
include 'db.php';

$id = $_GET['id'] ?? null;

if ($id) {
    $stmt = $pdo->prepare("DELETE FROM HocPhan WHERE IDHocPhan = ?");
    $stmt->execute([$id]);
}

header("Location: index.php");
exit;
?>