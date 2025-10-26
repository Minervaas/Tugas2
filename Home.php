<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tolong Jangan Dihapus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        #header-custom {
            background: #3498db;
            color: yellow;
        }
        #nav-custom {
            background: #2c3e50;
        }
    </style>
</head>

<body>
    <header id="header-custom" class="p-3 text-center">
        <h1 class="display-4">BUAT WEBSITE</h1>
    </header>

    <nav id="nav-custom" class="navbar navbar-expand-lg">
        <div class="container-fluid justify-content-center">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white" href="Home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="Form.php">Form Keluhan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="Aksi.php">Data Kepuasan</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container my-4">
        <div id="Konten" class="card shadow">
            <div class="card-body">
                <h2 class="card-title text-danger">Judul Artikel</h2>

                <div class="d-flex gap-3 align-items-start">
                    <img src="Gambar.png" alt="Gambar Au" class="img-fluid rounded border border-secondary" style="max-width: 350px;">
                    <div>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam iusto asperiores fuga similique
                            eligendi cupiditate ducimus magni maiores beatae vitae.
                        </p>
                        <p>
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Suscipit consectetur quibusdam laborum
                            aut quis eum asperiores molestias omnis ab veritatis.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer mt-auto py-3 bg-dark text-white text-center">
        <div class="container">
            <p class="mb-0">
                Copyright &copy; 2025
            </p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>