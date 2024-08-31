
<?php $__env->startSection('title'); ?>
    <title>Trang chủ</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('admins/product/index/list.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <?php echo $__env->make('admin.partials.content-header', ['name' => 'Products', 'key'=>'List'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product-add')): ?>
                        <a href="<?php echo e(route('products.create')); ?>" class="btn btn-success float-right m-2">Thêm</a>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Giá</th>
                                    <th scope="col">Hình ảnh</th>
                                    <th scope="col">Danh mục</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th scope="row"><?php echo e($productItem->id); ?></th>
                                    <td><?php echo e($productItem->name); ?></td>
                                    <td><?php echo e(number_format($productItem->price)); ?></td>
                                    <td>
                                        <img class="product_image" src="<?php echo e($productItem->feature_image_path); ?>" alt="">
                                    </td>
                                    <td><?php echo e(optional($productItem->category)->name); ?></td>
                                    <td>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product-edit', $productItem->id)): ?>
                                        <a href="<?php echo e(route('products.edit', ['id'=>$productItem->id])); ?>" class="btn btn-default">Sửa</a>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product-delete', $productItem->id)): ?>
                                        <a href="" data-url="<?php echo e(route('products.destroy', ['id'=>$productItem->id])); ?>" class="btn btn-danger action_delete">Xoá</a>
                                        <?php endif; ?>
                                    </td>
                                </tr>                                  
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        <?php echo e($products->links('pagination::bootstrap-4')); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset('vendors/sweetAlert2/sweetAlert2.js')); ?>"></script>
    <script src="<?php echo e(asset('admins/product/index/list.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\shop\resources\views/admin/product/index.blade.php ENDPATH**/ ?>