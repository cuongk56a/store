<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php echo $__env->yieldContent('title'); ?>
    <link href="<?php echo e(asset('eshopper/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('eshopper/css/font-awesome.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('eshopper/css/prettyPhoto.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('eshopper/css/price-range.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('eshopper/css/animate.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('eshopper/css/main.css')); ?>" rel="stylesheet">

    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
        href="<?php echo e(asset('eshopper/images/ico/apple-touch-icon-144-precomposed.png')); ?>">
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
        href="<?php echo e(asset('eshopper/images/ico/apple-touch-icon-114-precomposed.png')); ?>">
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
        href="<?php echo e(asset('eshopper/images/ico/apple-touch-icon-72-precomposed.png')); ?>">
    <link rel="apple-touch-icon-precomposed"
        href="<?php echo e(asset('eshopper/images/ico/apple-touch-icon-57-precomposed.png')); ?>">
</head>
<body>
    <?php echo $__env->make('components.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('content'); ?>
    <?php echo $__env->make('components.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script src="<?php echo e(asset('eshopper/js/jquery.js')); ?>"></script>
    <script src="<?php echo e(asset('eshopper/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('eshopper/js/jquery.scrollUp.min.js')); ?>"></script>
    <script src="<?php echo e(asset('eshopper/js/price-range.js')); ?>"></script>
    <script src="<?php echo e(asset('eshopper/js/jquery.prettyPhoto.js')); ?>"></script>
    <script src="<?php echo e(asset('eshopper/js/main.js')); ?>"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <?php echo $__env->yieldContent('js'); ?>
</body>
</html>
<?php /**PATH D:\shop\resources\views/layouts/master.blade.php ENDPATH**/ ?>