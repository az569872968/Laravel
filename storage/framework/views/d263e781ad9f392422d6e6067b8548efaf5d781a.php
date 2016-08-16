<?php $__env->startSection('title','控制面板'); ?>

<?php $__env->startSection('pageHeader','控制面板'); ?>

<?php $__env->startSection('pageDesc','DashBoard'); ?>

<?php $__env->startSection('content'); ?>

    <iframe src="/admin/log-viewer" frameborder="0" style="width: 100%;min-height: 650px;"></iframe>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>