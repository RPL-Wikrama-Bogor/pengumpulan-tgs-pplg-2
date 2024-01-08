

<?php $__env->startSection('content'); ?>
    <form action="<?php echo e(route('medicine.store')); ?>" method="post" class="card bg-light mt-5 p-5">
        
        <?php echo csrf_field(); ?>
        <?php if($errors->any()): ?>
            <ul class="alert alert-danger p-5">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        <?php endif; ?>
        <?php if(Session::get('succes')): ?>
            <div class="alert alert-succes"><?php echo e(Session::get('succes')); ?></div>
        <?php endif; ?>
        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Nama Obat :</label>
            <div class="col-sm 10">
                <input type="text" class="form-control" id="name" name="name">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">type Obat :</label>
            <div class="col-sm 10">
                <select id="type" class="form-control" name="type">
                    <option disabled hidden selected>Pilih</option>
                    <option value="tablet">Tablet</option>
                    <option value="sirup">Sirup</option>
                    <option value="kapsul">Kapsul</option>
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="price" class="col-sm-2 col-form-label">Harga Obat :</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="price" name="price">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="stock" class="col-sm-2 col-form-label">Stock Awal :</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="stock" name="stock">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Data</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Belajar-php\XI\LARAVEL\apotek-app\resources\views/medicine/create.blade.php ENDPATH**/ ?>