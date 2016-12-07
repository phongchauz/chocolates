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
	echo $this->Html->css('fileinput');
	echo $this->Html->css('common');
	
	echo $this->Html->script('jquery');
	echo $this->Html->script('bootstrap');
	echo $this->Html->script('common');
	echo $this->Html->script($this->plugin.'.bootstrap-notify.js');
	echo $this->Html->script('fileinput');

	echo $this->fetch('meta');
	echo $this->fetch('css');
	echo $this->fetch('script');
	
	?>
	
	<link href="//db.onlinewebfonts.com/c/cde2477139adf504d0391f104cdf3cb7?family=HelveticaNeueW01-Thin" rel="stylesheet" type="text/css"/>
	
	<script type="text/javascript">
            APP.API_URL = '<?php echo $this->webroot; ?>';
    </script>
	
</head>

<body>

	<?php echo $this->element('top_menu'); ?>
	<?php echo $this->Flash->render(); ?>
    <?php echo $this->fetch('content'); ?>
	<?php echo $this->element('bottom_menu'); ?>	
	
</body>
</html>