<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Apotok App</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Apotek App</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <?php if(Auth::check()): ?>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
              </li>
              <?php if(Auth::user()->role == "admin"): ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Obat
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="<?php echo e(route('medicine.data')); ?>">Data Obat</a></li>
                  <li><a class="dropdown-item" href=" <?php echo e(route('medicine.create')); ?>">Tambah Data</a></li>
                  <li><a class="dropdown-item" href="<?php echo e(route('medicine.data.stock')); ?>">Stock</a></li>
                </ul>
              </li>
              <?php endif; ?>
              <?php if(Auth::user()->role == "admin"): ?>
              <li class="nav-item">
                <a class="nav-link" href="#">Data Pembelian</a>
              </li>
              <?php endif; ?>
              <?php if(Auth::user()->role == "cashier"): ?>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('order.index')); ?>">Pembelian</a>
              </li>
              <?php endif; ?>
              <?php if(Auth::user()->role == "admin"): ?>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('user.home')); ?>">Kelola akun</a>
              </li>
              <?php endif; ?>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route ('auth-logout')); ?>">logout</a>
              </li>
              <?php endif; ?>

            </ul>
          </div>
        </div>
      </nav>

    <div class="container">
        
        
        <?php echo $__env->yieldContent('content'); ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
  


<?php echo $__env->yieldPushContent('script'); ?>
</body>
</html><?php /**PATH D:\Belajar-php\XI\LARAVEL\apotek-app\resources\views/layouts/template.blade.php ENDPATH**/ ?>