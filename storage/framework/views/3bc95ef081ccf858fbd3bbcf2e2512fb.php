

<?php $__env->startSection('title'); ?>
    <title>Trang chủ</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('admins/slider/index/list.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <?php echo $__env->make('admin.partials.content-header', ['name' => 'Slider', 'key'=>'List'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('slider-add')): ?>
                        <a href="<?php echo e(route('sliders.create')); ?>" class="btn btn-success float-right m-2">Thêm</a>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên slider</th>
                                    <th scope="col">Mô tả</th>
                                    <th scope="col">Hình ảnh</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th scope="row"><?php echo e($slider->id); ?></th>
                                    <td><?php echo e($slider->name); ?></td>
                                    <td><?php echo e($slider->description); ?></td>
                                    <td>
                                        <img class="slider_image" src="<?php echo e($slider->image_path); ?>" alt="">
                                    </td>
                                    <td>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('slider-edit')): ?>
                                        <a href="<?php echo e(route('sliders.edit', ['id'=>$slider->id])); ?>" class="btn btn-default">Sửa</a>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('slider-delete')): ?>
                                        <a href="<?php echo e(route('sliders.destroy', ['id'=>$slider->id])); ?>" class="btn btn-danger">Xoá</a>
                                        <?php endif; ?>
                                    </td>
                                </tr>                                  
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        <?php echo e($sliders->links('pagination::bootstrap-4')); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\shop\resources\views/admin/slider/index.blade.php ENDPATH**/ ?>