<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Keluhan Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <div id="form" class="card shadow p-4">
            <h2 class="card-title text-center text-primary mb-4">
                <b>
                    Keluhan Pengguna
                </b>
            </h2>
            <form action="Aksi.php" method="POST">

                <div class="mb-3">
                    <label for="Nama" class="form-label">
                        <b>
                            Nama:
                        </b>
                    </label>
                    <input type="text" class="form-control" id="Nama" name="Nama" required>
                </div>
                
                <div class="mb-3">
                    <label for="keluhan" class="form-label">
                        <b>
                            Keluhan Yang Dialami:
                        </b>
                    </label>
                    <textarea class="form-control" id="keluhan" name="Keluhan" rows="3" required></textarea>
                </div>
                
                <div class="mb-3">
                    <label for="kepuasan_rating" class="form-label">
                        <b>
                            Kepuasan Dalam Menggunakan Web (Skala 1-10):
                        </b>
                    </label>
                    <select class="form-select" id="kepuasan_rating" name="Rating">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10" selected>10</option>
                    </select>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">
                        <b>
                            Apakah Anda Puas? :
                        </b>
                    </label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="Puas" id="puas_ya" value="Ya" checked>
                        <label class="form-check-label" for="puas_ya">
                            Ya
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="Puas" id="puas_tidak" value="Tidak">
                        <label class="form-check-label" for="puas_tidak">
                            Tidak
                        </label>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="masukan" class="form-label">
                        <b>
                            Masukkan:
                        </b>
                    </label>
                    <textarea class="form-control" id="masukan" name="Masukan" rows="3"></textarea>
                </div>
                
                <button type="submit" class="btn btn-primary w-100">Dah Kelar</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>