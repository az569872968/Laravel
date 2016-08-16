<?php $__env->startSection('title','控制面板'); ?>

<?php $__env->startSection('pageHeader','控制面板'); ?>

<?php $__env->startSection('pageDesc','DashBoard'); ?>

<?php $__env->startSection('content'); ?>
    <div class="main animsition">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">添加权限</h3>
                        </div>
                        <div class="panel-body">

                            <?php echo $__env->make('admin.partials.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            <?php echo $__env->make('admin.partials.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                            <form class="form-horizontal" role="form" method="POST" action="/admin/permission">
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                <input type="hidden" name="cove_image"/>
                                <?php echo $__env->make('admin.Permission._form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                <div class="form-group">
                                    <div class="col-md-7 col-md-offset-3">
                                        <button type="submit" class="btn btn-primary btn-md">
                                            <i class="fa fa-plus-circle"></i>
                                            添加
                                        </button>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>