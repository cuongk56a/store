

<?php $__env->startSection('title'); ?>
    <title>Sửa vai trò</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <?php echo $__env->make('admin.partials.content-header', ['name' => 'Role', 'key' => 'Edit'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <form action="<?php echo e(route('roles.update',['id'=>$role->id])); ?>" method="POST" style="width: 100%">
                        <?php echo csrf_field(); ?>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Tên vai trò</label>
                                <input type="text" class="form-control" name="name" placeholder="Nhập tên vai trò"
                                    value="<?php echo e(old('name') ?? $role->name); ?>">
                            </div>
                            <div class="form-group">
                                <label>Mô tả vai trò</label>
                                <textarea class="form-control" name="display_name" placeholder="Nhập mô tả vai trò">
                                    <?php echo e(old('display_name') ?? $role->display_name); ?>

                                </textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permissionItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="card border-primary mb-3 col-md-12">
                                    <div class="card-header" style="background-color: aquamarine">
                                        <label>
                                            <input type="checkbox" class="checkbox_wapper">
                                        </label>
                                        Module: <?php echo e($permissionItem->name); ?>

                                    </div>
                                    <div class="row">
                                        <?php $__currentLoopData = $permissionItem->permissionsChildrent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permissionChildrentItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="card-body text-primary col-md-3">
                                            <label>
                                                <input 
                                                    type="checkbox"
                                                    <?php echo e($permissionRole->contains('id', $permissionChildrentItem->id) ? 'checked':''); ?>

                                                    name="permission_id[]"
                                                    value="<?php echo e($permissionChildrentItem->id); ?>"
                                                    class="checkbox_childrent"
                                                >
                                            </label>
                                            <?php echo e($permissionChildrentItem->name); ?>

                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset("admins/role/add/add.js")); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\shop\resources\views/admin/role/edit.blade.php ENDPATH**/ ?>