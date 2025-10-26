<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Tugas2";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['Nama'];
    $keluhan = $_POST['Keluhan'];
    $rating = $_POST['Rating'];
    $puas = $_POST['Puas'];
    $masukan = $_POST['Masukan'];

    $sql1 = "INSERT INTO keluhan_data (nama, keluhan, masukan) VALUES (?, ?, ?)";
    $stmt1 = $conn->prepare($sql1);
    $stmt1->bind_param("sss", $nama, $keluhan, $masukan);

    if ($stmt1->execute()) {
        $keluhan_id = $stmt1->insert_id;
        $sql2 = "INSERT INTO rating_feedback (keluhan_id, rating, puas) VALUES (?, ?, ?)";
        $stmt2 = $conn->prepare($sql2);
        $stmt2->bind_param("iis", $keluhan_id, $rating, $puas);
        $stmt2->execute();
        $stmt2->close();
        $message = "Terima Kasih! Data Anda sudah Disimpan.";
    }
    $stmt1->close();
}

if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id_to_delete = intval($_GET['id']);
    $conn->query("DELETE FROM keluhan_data WHERE id = $id_to_delete");
    header("Location: Aksi.php?msg=Data berhasil dihapus!");
    exit();
}

$sql = "SELECT kd.id, kd.nama, kd.keluhan, kd.masukan, rf.rating, rf.puas
        FROM keluhan_data kd
        JOIN rating_feedback rf ON kd.id = rf.keluhan_id
        ORDER BY kd.id DESC";

$result = $conn->query($sql);
$keluhan_data = $result->fetch_all(MYSQLI_ASSOC);

$result->close();
$conn->close();
?>
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Keluhan dan Kepuasan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <?php if (!empty($message)): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Pesan:</strong> <?= $message ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div id="Aksi" class="mb-5">
            <h1 class="text-center text-success mb-4">Data Feedback Pengguna (CRUD)</h1>
            <p class="lead text-center">Berikut adalah data keluhan konsumen yang tersimpan dalam database **Tugas2**.</p>
        </div>

        <h2 class="text-primary mb-3">Tabel Data Keluhan Pengguna</h2>
        <div class="table-responsive">
            <table class="table table-striped table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Keluhan</th>
                        <th>Rating</th>
                        <th>Puas?</th>
                        <th>Masukkan Tambahan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($keluhan_data)): ?>
                        <?php foreach ($keluhan_data as $data): ?>
                        <tr>
                            <td><?= htmlspecialchars($data['id']) ?></td>
                            <td><?= htmlspecialchars($data['nama']) ?></td>
                            <td><?= htmlspecialchars($data['keluhan']) ?></td>
                            <td><?= htmlspecialchars($data['rating']) ?></td>
                            <td><?= htmlspecialchars($data['puas']) ?></td>
                            <td><?= htmlspecialchars($data['masukan']) ?></td>
                            <td>
                                <a href="update.php?id=<?= htmlspecialchars($data['id']) ?>" class="btn btn-warning btn-sm me-2">Edit</a>
                                <a href="Aksi.php?action=delete&id=<?= htmlspecialchars($data['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Delete</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="text-center">Belum ada data keluhan dalam database.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="text-center mt-4">
</body>