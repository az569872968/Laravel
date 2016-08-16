<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LogViewer</title>
    <meta name="description" content="LogViewer">
    <meta name="author" content="ARCANEDEV">
    <link rel="stylesheet" href="/plugins/logViewer/css/bootstrap.min.css">
    <link rel="stylesheet" href="/plugins/logViewer/css/font-awesome.min.css">
    <link rel="stylesheet" href="/plugins/logViewer/css/bootstrap-datetimepicker.min.css">
    <?php echo $__env->make('log-viewer::_template.style', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <?php echo $__env->make('log-viewer::_template.navigation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="container-fluid">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <?php echo $__env->make('log-viewer::_template.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <script src="/plugins/logViewer/js/jquery.min.js"></script>
    <script src="/plugins/logViewer/js/bootstrap.min.js"></script>
    <script src="/plugins/logViewer/js/moment-with-locales.min.js"></script>
    <script src="/plugins/logViewer/js/Chart.min.js"></script>
    <script src="/plugins/logViewer/js/bootstrap-datetimepicker.min.js"></script>
    <script>
        Chart.defaults.global.responsive      = true;
        Chart.defaults.global.scaleFontFamily = "'Source Sans Pro'";
        Chart.defaults.global.animationEasing = "easeOutQuart";
    </script>
    <?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>
