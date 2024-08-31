

<?php $__env->startSection('title'); ?>
    <title>Thêm danh mục</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <?php echo $__env->make('partials.content-header', ['name'=> 'Category', 'key'=>'Edit'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="<?php echo e(route('categories.update' , ['id'=>$category->id])); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label>Tên danh mục</label>
                                <input type="text"
                                    class="form-control"
                                    name="name"
                                    value="<?php echo e($category->name); ?>"
                                    placeholder="Nhập tên danh mục"
                                >
                            </div>
    
                            <div class="form-group">
                                <label>Chọn danh mục cha</label>
                                <select class="form-control" name="parent_id">
                                    <option value="0">Chọn danh mục cha</option>
                                    {<?php echo $htmlOption; ?>}
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\shop\resources\views/category/edit.blade.php ENDPATH**/ ?>