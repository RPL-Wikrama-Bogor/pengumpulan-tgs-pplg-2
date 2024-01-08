

<?php $__env->startSection('content'); ?>
<?php if(Session::get('succes')): ?>
    <div class="alert alert-succes">
        <?php echo e(Session::get('succes')); ?>

    </div>
<?php endif; ?>
<?php if(Session::get('deleted')): ?>
    <div class="alert alert-warning">
        <?php echo e(Session::get('deleted')); ?>

    </div>
<?php endif; ?>
<p></p>
<a href="<?php echo e(route('user.create')); ?>" class="btn btn-secondary" style="float: right; margin-bottom: 10px;">Tambah Pengguna</a>
    <table class="table mt-5 table-striped table-bordered table-hovered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($no++); ?></td>
                    <td><?php echo e($item['name']); ?></td>
                    <td><?php echo e($item['email']); ?></td>
                    <td><?php echo e($item['role']); ?></td>
                    <td  class="d-flex">
                        <a href="<?php echo e(route('user.edit', $item['id'])); ?>" class="btn btn-success">Edit</a>
                        
                        <form action="<?php echo e(route('user.delete', $item['id'])); ?>"  method="POST" class="ms-3">
                            <?php echo csrf_field(); ?>
                            
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
        </tbody>
    </table>

    <div class="d-flex justify-content-end">
        <?php if($user->count()): ?>
            <?php echo e($user->links()); ?>

        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Belajar-php\XI\LARAVEL\apotek-app\resources\views/user/userIndex.blade.php ENDPATH**/ ?>