

<?php $__env->startSection('title'); ?>
    <title>Sửa sản phẩm</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(asset('vendors/seclect2/select2.min.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('admins/product/edit/edit.css')); ?>" rel="stylesheet" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <?php echo $__env->make('admin.partials.content-header', ['name'=> 'Products', 'key'=>'Edit'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <form action="<?php echo e(route('products.update', ['id'=>$product->id])); ?>" method="POST" enctype="multipart/form-data">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input type="text"
                                    class="form-control"
                                    name="name"
                                    placeholder="Nhập tên menu"
                                    value="<?php echo e($product->name); ?>"
                                >
                            </div>
                            <div class="form-group">
                                <label>Giá</label>
                                <input type="text"
                                    class="form-control"
                                    name="price"
                                    placeholder="Nhập tên giá sản phẩm"
                                    value="<?php echo e($product->price); ?>"
                                >
                            </div>
                            <div class="form-group">
                                <label>Ảnh sản phẩm</label>
                                <input type="file"
                                    class="form-control-file"
                                    name="feature_image_path"
                                >
                                <div class="col-md-4 feature_image_container">
                                    <div class="row">
                                        <img class="feature_image" src="<?php echo e($product->feature_image_path); ?>" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Ảnh chi tiết sản phẩm</label>
                                <input type="file"
                                    multiple
                                    class="form-control-file"
                                    name="image_path[]"
                                >
                                <div class="col-md-12 container_image_detail">
                                    <div class="row">
                                        <?php $__currentLoopData = $product->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productImageItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-md-3">
                                                <img class="image_detail_product" src="<?php echo e($productImageItem->image_path); ?>" alt="">
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Chọn danh mục</label>
                                <select class="form-control select2_init" name="category_id">
                                    <option value="">Chọn danh mục</option>
                                    {<?php echo $htmlOption; ?>}
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nhập tags cho sản phẩm</label>
                                <select class="form-control tags_select_choose" name="tags[]" multiple="multiple">
                                    <?php $__currentLoopData = $product->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tagItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($tagItem->name); ?>" selected><?php echo e($tagItem->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Nội dung</label>
                                <textarea class="form-control tinymce_editor_init" name="contents" rows="8"><?php echo e($product->content); ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset('vendors/seclect2/select2.min.js')); ?>"></script>
    <script src="https://cdn.tiny.cloud/1/171pgu980eccqyy1qmkwn5tipnrxdzh5uh2bnpqtf5imfnh7/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="<?php echo e(asset('admins/product/add/tinymce.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admins/product/add/add.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\shop\resources\views/admin/product/edit.blade.php ENDPATH**/ ?>