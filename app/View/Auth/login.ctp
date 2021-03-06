<!DOCTYPE html>
<html>
<head>
    <?php echo $this->Html->charset(); ?>
    <title>
        Sign In
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
	echo $this->Html->css('common');
	echo $this->Html->css('login');
	
	echo $this->Html->script('jquery');
	echo $this->Html->script('bootstrap');
	echo $this->Html->script('common');
		
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
	<div class="container">
	<div class="login-container">            
            <h3 class="text-center">Please Sign In</h3>
            <hr>
            <?php echo $this->Session->flash();?>
            <div class="form-box">
                <?php echo $this->Form->create('User'); ?>
                    <?php echo $this->Form->input('email',
		                array('label' => false,
		                      'id'    => 'email',
		                      'placeholder' => 'mail@address.com')); ?>
                    <?php echo $this->Form->input('password',
		            array('label' => false,
		                  'id'    => 'password',
		                  'placeholder' => 'password')); ?>
                    <button type="submit" class="btn btn-info btn-block login">Sign In</button>
                <?php echo $this->Form->end(null); ?>
            </div>
     </div>      
</div>
</body>
</html>