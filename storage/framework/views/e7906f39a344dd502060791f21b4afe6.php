

<?php $__env->startSection('title'); ?>
    <title>Trang chủ</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset("admins/setting/index/index.css")); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <?php echo $__env->make('admin.partials.content-header', ['name' => 'Setting', 'key'=>'List'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="btn-group">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('setting-add')): ?>
                            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                Thêm
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?php echo e(route('settings.create') . '?type=Text'); ?>">Text</a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('settings.create') . '?type=Textarea'); ?>">Textarea</a>
                                </li>
                            </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Config Key</th>
                                    <th scope="col">Config Value</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th scope="row"><?php echo e($setting->id); ?></th>
                                    <td><?php echo e($setting->config_key); ?></td>
                                    <td><?php echo e($setting->config_value); ?></td>
                                    <td>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('setting-edit')): ?>
                                        <a href="<?php echo e(route('settings.edit', ['id'=>$setting->id]).'?type='.$setting->type); ?>" class="btn btn-default">Sửa</a>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('setting-delete')): ?>
                                        <a href="<?php echo e(route('settings.destroy', ['id'=>$setting->id])); ?>" class="btn btn-danger">Xoá</a>
                                        <?php endif; ?>
                                    </td>
                                </tr>                                  
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        <?php echo e($settings->links('pagination::bootstrap-4')); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\shop\resources\views/admin/setting/index.blade.php ENDPATH**/ ?>