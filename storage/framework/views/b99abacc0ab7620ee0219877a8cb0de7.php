

<?php $__env->startSection('title'); ?>
    <title>Thêm permission</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <?php echo $__env->make('partials.content-header', ['name' => 'Permission', 'key' => 'Add'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form action="<?php echo e(route('permissions.store')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label>Chọn phân quyền cha</label>
                                <select class="form-control" name="module_parent">
                                    <option value="0">Phân quyền</option>
                                    <?php $__currentLoopData = config('permission.table_module'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($item); ?>"><?php echo e($item); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <?php $__currentLoopData = config('permission.module_childrent'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemChildrent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>    
                                    <div class="col-md-3">
                                        <label>
                                            <input type="checkbox" value="<?php echo e($itemChildrent); ?>"  name="module_childrent[]">
                                            <?php echo e($itemChildrent); ?>

                                        </label>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\shop\resources\views/admin/permission/add.blade.php ENDPATH**/ ?>