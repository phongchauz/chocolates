<!DOCTYPE html>
<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.5
Version: 4.5.2
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<?php
//    print_r($this->webroot);die;
?>
<head>
	<meta charset="utf-8" />
	<title>Metronic | Dashboard</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />

	<?php
		echo $this->Html->css('bootstrap');
		echo $this->Html->css('animate');
		echo $this->Html->css('animate.min');
		echo $this->Html->css('font-awesome');
		echo $this->Html->css('fileinput');
		echo $this->Html->css($this->plugin.'.admin-portal');
		echo $this->Html->css('bootstrapselect/bootstrap.min');
		echo $this->Html->css('bootstrapselect/bootstrap-select');

		echo $this->Html->script('jquery');

		echo $this->Html->script('bootstrap.js');
		echo $this->Html->script($this->plugin.'.common.js');
		echo $this->Html->script('bootstrapselect/jquery.min');
		echo $this->Html->script('bootstrapselect/bootstrap.min');
//		echo $this->Html->script('bootstrapselect/bootstrap-select');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');

	?>

	<?= $this->Html->css('../assets/global/plugins/font-awesome/css/font-awesome.min.css') ?>
	<?= $this->Html->css('../assets/global/plugins/simple-line-icons/simple-line-icons.min.css') ?>
	<?= $this->Html->css('../assets/global/plugins/bootstrap/css/bootstrap.min.css') ?>
	<?= $this->Html->css('../assets/global/plugins/uniform/css/uniform.default.css') ?>
	<?= $this->Html->css('../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') ?>

	<!-- END GLOBAL MANDATORY STYLES -->
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<?= $this->Html->css('../assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css') ?>
	<?= $this->Html->css('../assets/global/plugins/morris/morris.css') ?>
	<?= $this->Html->css('../assets/global/plugins/fullcalendar/fullcalendar.min.css') ?>
	<?= $this->Html->css('../assets/global/plugins/jqvmap/jqvmap/jqvmap.css') ?>

	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN THEME GLOBAL STYLES -->
	<?= $this->Html->css('../assets/global/css/components.min.css') ?>
	<?= $this->Html->css('../assets/global/css/plugins.min.css') ?>

	<!-- END THEME GLOBAL STYLES -->
	<!-- BEGIN THEME LAYOUT STYLES -->
	<?= $this->Html->css('../assets/layouts/layout/css/layout.min.css') ?>
	<?= $this->Html->css('../assets/layouts/layout/css/themes/darkblue.min.css') ?>
	<?= $this->Html->css('../assets/layouts/layout/css/custom.min.css') ?>



	<!-- END THEME LAYOUT STYLES -->
<!--	<link rel="shortcut icon" href="favicon.ico" />-->

</head>
<!-- END HEAD -->
<?php ?>
<script type="text/javascript">
	AJAXURL.API_URL = '<?php echo Configure::read("AdminPortal.baseUrl"); ?>';
</script>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">


<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner ">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			<a href="index.html">
				<img src="http://keenthemes.com/preview/metronic/theme/assets/layouts/layout/img/logo.png" alt="logo" class="logo-default" /> </a>
			<div class="menu-toggler sidebar-toggler"> </div>
		</div>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<div class="top-menu">
			<ul class="nav navbar-nav pull-right">
				<!-- BEGIN NOTIFICATION DROPDOWN -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
				<!-- BEGIN USER LOGIN DROPDOWN -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
				<li class="dropdown dropdown-user">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<img alt="" class="img-circle" src="http://keenthemes.com/preview/metronic/theme/assets/layouts/layout/img/avatar3_small.jpg" />
						<span class="username username-hide-on-mobile"> Nick </span>
						<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-menu-default">
						<li>
							<a href="page_user_profile_1.html">
								<i class="icon-user"></i> My Profile </a>
						</li>
						<li>
							<a href="app_calendar.html">
								<i class="icon-calendar"></i> My Calendar </a>
						</li>
						<li>
							<a href="app_inbox.html">
								<i class="icon-envelope-open"></i> My Inbox
								<span class="badge badge-danger"> 3 </span>
							</a>
						</li>
						<li>
							<a href="app_todo.html">
								<i class="icon-rocket"></i> My Tasks
								<span class="badge badge-success"> 7 </span>
							</a>
						</li>
						<li class="divider"> </li>
						<li>
							<a href="page_user_lock_1.html">
								<i class="icon-lock"></i> Lock Screen </a>
						</li>
						<li>
							<a href="page_user_login_1.html">
								<i class="icon-key"></i> Log Out </a>
						</li>
					</ul>
				</li>
				<!-- END USER LOGIN DROPDOWN -->
				<!-- BEGIN QUICK SIDEBAR TOGGLER -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->

				<!-- END QUICK SIDEBAR TOGGLER -->
			</ul>
		</div>
	</div>
	<!-- END HEADER INNER -->
</div>
<!-- END HEADER -->

<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"> </div>
<!-- END HEADER & CONTENT DIVIDER -->
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<!-- BEGIN SIDEBAR -->
		<?php echo $this->element($this->plugin.'.menu'); ?>
		<!-- END SIDEBAR -->
	</div>
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">

		<!-- BEGIN CONTENT BODY -->
		<div class="page-content">

			<div class="page-bar">

				<?php echo $this->element($this->plugin.'.page_breadcrumb');?>

				<div class="page-toolbar">
					<div id="dashboard-report-range" class="pull-right tooltips btn btn-sm" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
						<i class="icon-calendar"></i>&nbsp;
						<span class="thin uppercase hidden-xs"></span>&nbsp;
						<i class="fa fa-angle-down"></i>
					</div>
				</div>
			</div>

			<?php echo $this->Flash->render(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
		<!-- END CONTENT BODY -->
	</div>
	<!-- END CONTENT -->
	<!-- BEGIN QUICK SIDEBAR -->
	<a href="javascript:;" class="page-quick-sidebar-toggler">
		<i class="icon-login"></i>
	</a>
	<div class="page-quick-sidebar-wrapper" data-close-on-body-click="false">
		<div class="page-quick-sidebar">

		</div>
	</div>
	<!-- END QUICK SIDEBAR -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
	<div class="page-footer-inner"> <?php echo ' '.$this->AdminPortal->__('Copyright');?> &copy; <?php echo date('Y');?> CLC.<?php echo ' '.$this->AdminPortal->__('All Rights Reserved');?>
	</div>
	<div class="scroll-to-top">
		<i class="icon-arrow-up"></i>
	</div>
</div>
<!-- END FOOTER -->
<!--[if lt IE 9]> -->
<?= $this->Html->script('../assets/global/plugins/respond.min.js') ?>
<?= $this->Html->script('../assets/global/plugins/excanvas.min.js') ?>
<!--<![endif]-->
<!-- BEGIN CORE PLUGINS -->

<?= $this->Html->script('../assets/global/plugins/jquery.min.js') ?>
<?= $this->Html->script('../assets/global/plugins/bootstrap/js/bootstrap.min.js') ?>
<?= $this->Html->script('../assets/global/plugins/js.cookie.min.js') ?>
<?= $this->Html->script('../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') ?>
<?= $this->Html->script('../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') ?>
<?= $this->Html->script('../assets/global/plugins/jquery.blockui.min.js') ?>
<?= $this->Html->script('../assets/global/plugins/uniform/jquery.uniform.min.js') ?>
<?= $this->Html->script('../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') ?>

<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->

<?= $this->Html->script('../assets/global/plugins/moment.min.js') ?>
<?= $this->Html->script('../assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js') ?>
<?= $this->Html->script('../assets/global/plugins/morris/morris.min.js') ?>
<?= $this->Html->script('../assets/global/plugins/morris/raphael-min.js') ?>
<?= $this->Html->script('../assets/global/plugins/counterup/jquery.waypoints.min.js') ?>
<?= $this->Html->script('../assets/global/plugins/counterup/jquery.counterup.min.js') ?>
<?= $this->Html->script('../assets/global/plugins/amcharts/amcharts/amcharts.js') ?>
<?= $this->Html->script('../assets/global/plugins/amcharts/amcharts/serial.js') ?>
<?= $this->Html->script('../assets/global/plugins/amcharts/amcharts/pie.js') ?>
<?= $this->Html->script('../assets/global/plugins/amcharts/amcharts/radar.js') ?>
<?= $this->Html->script('../assets/global/plugins/amcharts/amcharts/themes/light.js') ?>
<?= $this->Html->script('../assets/global/plugins/amcharts/amcharts/themes/patterns.js') ?>
<?= $this->Html->script('../assets/global/plugins/amcharts/amcharts/themes/chalk.js') ?>
<?= $this->Html->script('../assets/global/plugins/amcharts/ammap/ammap.js') ?>
<?= $this->Html->script('../assets/global/plugins/amcharts/ammap/maps/js/worldLow.js') ?>
<?= $this->Html->script('../assets/global/plugins/amcharts/amstockcharts/amstock.js') ?>
<?= $this->Html->script('../assets/global/plugins/fullcalendar/fullcalendar.min.js') ?>
<?= $this->Html->script('../assets/global/plugins/flot/jquery.flot.min.js') ?>
<?= $this->Html->script('../assets/global/plugins/flot/jquery.flot.resize.min.js') ?>
<?= $this->Html->script('../assets/global/plugins/flot/jquery.flot.categories.min.js') ?>
<?= $this->Html->script('../assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js') ?>
<?= $this->Html->script('../assets/global/plugins/jquery.sparkline.min.js') ?>

<?php echo $this->Html->script($this->plugin.'.tooltip.js');?>
<?php echo $this->Html->script($this->plugin.'.jquery.slimscroll.js');?>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<?= $this->Html->script('../assets/global/scripts/app.min.js') ?>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<?= $this->Html->script('../assets/pages/scripts/dashboard.min.js') ?>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<?= $this->Html->script('../assets/layouts/layout/scripts/layout.min.js') ?>
<?= $this->Html->script('../assets/layouts/layout/scripts/demo.min.js') ?>
<?= $this->Html->script('../assets/layouts/global/scripts/quick-sidebar.min.js') ?>

<?php echo $this->element($this->plugin.'.variable'); ?>
<?php
	echo $this->Html->script('bootstrap-select');
	echo $this->Html->script('bootstrap-notify.js');
	echo $this->Html->script('slide-message.js');
	echo $this->Html->script('fileinput');
	echo $this->fetch('meta');
	echo $this->fetch('css');
	echo $this->fetch('script');
?>
<!-- END THEME LAYOUT SCRIPTS -->
</body>



</html>