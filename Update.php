<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Tugas2";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Koneksi gagal: " . $conn->connect_error);

$id_to_edit = isset($_GET['id']) ? intval($_GET['id']) : 0;
$data_to_edit = null;
$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $nama = $_POST['Nama'];
    $keluhan = $_POST['Keluhan'];
    $rating = $_POST['Rating'];
    $puas = $_POST['Puas'];
    $masukan = $_POST['Masukan'];

    $conn->query("UPDATE keluhan_data SET nama='$nama', keluhan='$keluhan', masukan='$masukan' WHERE id=$id");
    $conn->query("UPDATE rating_feedback SET rating=$rating, puas='$puas' WHERE keluhan_id=$id");

    header("Location: Aksi.php?msg=Berhasil update data ID $id");
    exit();
}

$sql = "SELECT kd.id, kd.nama, kd.keluhan, kd.masukan, rf.rating, rf.puas
        FROM keluhan_data kd JOIN rating_feedback rf ON kd.id = rf.keluhan_id
        WHERE kd.id = $id_to_edit";

$result = $conn->query($sql);

if ($result->num_rows > 0) $data_to_edit = $result->fetch_assoc();
else $error_message = "Data tidak ditemukan.";

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Keluhan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <div class="card shadow p-4">
            <h2 class="card-title text-center text-warning mb-4">
                <b>Perbarui Data Keluhan Pengguna (ID: <?= htmlspecialchars($id_to_edit) ?>)</b>
            </h2>

            <?php if (!empty($error_message)): ?>
                <div class="alert alert-danger"><?= $error_message ?></div>
                <a href="Aksi.php" class="btn btn-secondary w-100 mt-2">Kembali ke Daftar</a>
            <?php elseif ($data_to_edit): ?>
                <form action="update.php" method="POST">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($data_to_edit['id']) ?>">

                    <div class="mb-3">
                        <label for="Nama" class="form-label"><b>Nama:</b></label>
                        <input type="text" class="form-control" id="Nama" name="Nama" value="<?= htmlspecialchars($data_to_edit['nama']) ?>" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="Keluhan" class="form-label"><b>Keluhan Yang Dialami:</b></label>
                        <textarea class="form-control" id="Keluhan" name="Keluhan" rows="3" required><?= htmlspecialchars($data_to_edit['keluhan']) ?></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label for="Rating" class="form-label"><b>Kepuasan Dalam Menggunakan Web (Skala 1-10):</b></label>
                        <select class="form-select" id="Rating" name="Rating">
                            <?php for ($i = 1; $i <= 10; $i++): ?>
                                <option value="<?= $i ?>" <?= (intval($data_to_edit['rating']) == $i) ? 'selected' : '' ?>><?= $i ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label"><b>Apakah Anda Puas? :</b></label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="Puas" id="puas_ya" value="Ya" <?= ($data_to_edit['puas'] == 'Ya') ? 'checked' : '' ?>>
                            <label class="form-check-label" for="puas_ya">Ya</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="Puas" id="puas_tidak" value="Tidak" <?= ($data_to_edit['puas'] == 'Tidak') ? 'checked' : '' ?>>
                            <label class="form-check-label" for="puas_tidak">Tidak</label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="Masukan" class="form-label"><b>Masukkan:</b></label>
                        <textarea class="form-control" id="Masukan" name="Masukan" rows="3"><?= htmlspecialchars($data_to_edit['masukan']) ?></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-warning w-100">Perbarui Data</button>
                    <a href="Aksi.php" class="btn btn-secondary w-100 mt-2">Batal</a>
                </form>
            <?php endif; ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>