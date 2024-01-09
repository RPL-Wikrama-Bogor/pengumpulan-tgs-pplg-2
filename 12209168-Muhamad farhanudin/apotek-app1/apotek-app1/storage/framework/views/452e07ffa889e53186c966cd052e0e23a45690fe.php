

<?php $__env->startSection('content'); ?>
<form action="<?php echo e(route('user.update', $user['id'])); ?>" method="post" class="card p-5 mt-5 bg-light">
    
    <?php echo csrf_field(); ?>
    <?php echo method_field('PATCH'); ?>
    
    <?php if($errors->any()): ?>
        <ul class="alert alert-danger p-5">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    <?php endif; ?>

    <div class="mb-3 row">
      <label for="name" class="col-sm-2 col-form-label">Nama :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="name" name="name" value="<?php echo e($user['name']); ?>">
      </div>
    </div>
    <div class="mb-3 row">
        <label for="price" class="col-sm-2 col-form-label"> Email: </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="email" name="email" value="<?php echo e($user['email']); ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="role" class="col-sm-2 col-form-label">Tipe Pengguna :</label>
        <div class="col-sm-10">
            <select id="role" class="form-control" name="role">
                <option disabled hidden selected> Pilih </option>
                <option value="kasir" <?php echo e($user['role'] == 'kasir' ? 'selected' : ''); ?> > kasir </option>
                <option value="admin" <?php echo e($user['role'] == 'admin' ? 'selected' : ''); ?> > Admin </option>
            </select>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="price" class="col-sm-2 col-form-label">Password :</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="password" name="password" value="<?php echo e($user['password']); ?>">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Kirim</button>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Belajar-php\XI\LARAVEL\apotek-app\resources\views/user/editUser.blade.php ENDPATH**/ ?>