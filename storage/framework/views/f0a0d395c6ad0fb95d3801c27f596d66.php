

<?php $__env->startSection('title'); ?>
    <title>Thêm danh mục</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <?php echo $__env->make('admin.partials.content-header', ['name'=> 'Menu', 'key'=>'Edit'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="<?php echo e(route('menus.update' , ['id'=>$menu->id])); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label>Tên menu</label>
                                <input type="text"
                                    class="form-control"
                                    name="name"
                                    value="<?php echo e($menu->name); ?>"
                                    placeholder="Nhập tên menu"
                                >
                            </div>
                            <div class="form-group">
                                <label>Chọn menu cha</label>
                                <select class="form-control" name="parent_id">
                                    <option value="0">Chọn menu cha</option>
                                    {<?php echo $optionSelect; ?>}
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\shop\resources\views/admin/menu/edit.blade.php ENDPATH**/ ?>