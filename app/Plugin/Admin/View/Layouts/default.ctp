<!DOCTYPE html>
<html>
<head>
    <?php echo $this->Html->charset(); ?>
    <title>
        <?php echo $this->fetch('title'); ?>        
    </title>    
	<meta name="viewport" content="height=device-height,width=device-width,initial-scale=1.0,maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="content-language" content="vi,en" />
   			
	<meta name="format-detection" content="telephone=no">
	<meta name="Robots" content="index, follow">
	
	<?php 
	
	echo $this->Html->meta('icon');
	
	echo $this->Html->css('bootstrap');
	echo $this->Html->css('animate');
	echo $this->Html->css('font-awesome');
	echo $this->Html->css($this->plugin.'.sb-admin-2');
	echo $this->Html->css($this->plugin.'.metisMenu');
	echo $this->Html->css('fileinput');
	echo $this->Html->css($this->plugin.'.admin');

	echo $this->Html->script('jquery');
	echo $this->Html->script('bootstrap');
	echo $this->Html->script($this->plugin.'.sb-admin-2');
	echo $this->Html->script($this->plugin.'.metisMenu');
	echo $this->Html->script('fileinput');
	echo $this->Html->script('bootstrap-notify');
	echo $this->Html->script('common');

	echo $this->fetch('meta');
	echo $this->fetch('css');
	echo $this->fetch('script');

	?>
	<script type="text/javascript">
            APP.API_URL = '<?php echo $this->webroot; ?>';
    </script>
	
</head>

<body>
	<div id="wrapper">
		<!-- Navigation -->
		<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
			<?php echo $this->element($this->plugin.'.header'); ?>
			<?php echo $this->element($this->plugin.'.menu'); ?>
		</nav>

		<div id="page-wrapper">
			<?php echo $this->Flash->render(); ?>
			<?php echo $this->fetch('content'); ?>
			<br>
			<br>
			<br>
			<br>
		</div>
		<!-- /#page-wrapper -->
	</div>
	<!-- /#wrapper -->
</body>
</html>