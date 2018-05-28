<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <link rel="shortcut icon" href="<?php echo base_url('adminlte/logo/favicon.ico'); ?>" type="image/x-icon">
  <link rel="icon" href="<?php echo base_url('adminlte/logo/favicon.ico'); ?>" type="image/x-icon">
  <title><?php echo $myTile;?></title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <?php echo $headerScriptCss; ?>
  <?php echo $headerScriptJs; ?>
</head>
<body class="skin-blue">
  <div class="wrapper">
    <?php echo $mainHeader; ?>
    <?php echo $slideMenu; ?>
    <?php echo $bodyContent; ?>
    <?php echo $mainFooter; ?>
  </div><!-- ./wrapper -->
</body>
</html>