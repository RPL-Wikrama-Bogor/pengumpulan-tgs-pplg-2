<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/css/style.css">
    <title>MVC - Halaman </title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand font-weight-bold text-white" href="<?= BASE_URL ?>/home/index">INVENTARIS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link active text-white" aria-current="page" href="<?= BASE_URL ?>/home/index">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active text-white" href="<?= BASE_URL ?>/buku/index">Pinjaman Saya</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active text-white" href="<?= BASE_URL ?>/buku/tambah">Tambah Pinjaman</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>