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
	<link rel="shortcut icon" href="favicon.ico" />
</head>
<!-- END HEAD -->

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
				<ul class="page-breadcrumb">
					<li>
						<a href="index.html">Home</a>
						<i class="fa fa-circle"></i>
					</li>
					<li>
						<span>Dashboard</span>
					</li>
				</ul>
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
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="javascript:;" data-target="#quick_sidebar_tab_1" data-toggle="tab"> Users
						<span class="badge badge-danger">2</span>
					</a>
				</li>
				<li>
					<a href="javascript:;" data-target="#quick_sidebar_tab_2" data-toggle="tab"> Alerts
						<span class="badge badge-success">7</span>
					</a>
				</li>
				<li class="dropdown">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> More
						<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu pull-right">
						<li>
							<a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
								<i class="icon-bell"></i> Alerts </a>
						</li>
						<li>
							<a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
								<i class="icon-info"></i> Notifications </a>
						</li>
						<li>
							<a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
								<i class="icon-speech"></i> Activities </a>
						</li>
						<li class="divider"></li>
						<li>
							<a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
								<i class="icon-settings"></i> Settings </a>
						</li>
					</ul>
				</li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active page-quick-sidebar-chat" id="quick_sidebar_tab_1">
					<div class="page-quick-sidebar-chat-users" data-rail-color="#ddd" data-wrapper-class="page-quick-sidebar-list">
						<h3 class="list-heading">Staff</h3>
						<ul class="media-list list-items">
							<li class="media">
								<div class="media-status">
									<span class="badge badge-success">8</span>
								</div>
								<?= $this->Html->image("../assets/layouts/layout/img/avatar3.jpg", ['fullBase' => true, 'class' => 'media-object', 'alt' => 'loading']); ?>
								<div class="media-body">
									<h4 class="media-heading">Bob Nilson</h4>
									<div class="media-heading-sub"> Project Manager </div>
								</div>
							</li>
							<li class="media">
								<?= $this->Html->image("../assets/layouts/layout/img/avatar1.jpg", ['fullBase' => true, 'class' => 'media-object', 'alt' => 'loading']); ?>
								<div class="media-body">
									<h4 class="media-heading">Nick Larson</h4>
									<div class="media-heading-sub"> Art Director </div>
								</div>
							</li>
							<li class="media">
								<div class="media-status">
									<span class="badge badge-danger">3</span>
								</div>
								<?= $this->Html->image("../assets/layouts/layout/img/avatar4.jpg", ['fullBase' => true, 'class' => 'media-object', 'alt' => 'loading']); ?>
								<div class="media-body">
									<h4 class="media-heading">Deon Hubert</h4>
									<div class="media-heading-sub"> CTO </div>
								</div>
							</li>
							<li class="media">
								<?= $this->Html->image("../assets/layouts/layout/img/avatar2.jpg", ['fullBase' => true, 'class' => 'media-object', 'alt' => 'loading']); ?>
								<div class="media-body">
									<h4 class="media-heading">Ella Wong</h4>
									<div class="media-heading-sub"> CEO </div>
								</div>
							</li>
						</ul>
						<h3 class="list-heading">Customers</h3>
						<ul class="media-list list-items">
							<li class="media">
								<div class="media-status">
									<span class="badge badge-warning">2</span>
								</div>
								<?= $this->Html->image("../assets/layouts/layout/img/avatar6.jpg", ['fullBase' => true, 'class' => 'media-object', 'alt' => 'loading']); ?>
								<div class="media-body">
									<h4 class="media-heading">Lara Kunis</h4>
									<div class="media-heading-sub"> CEO, Loop Inc </div>
									<div class="media-heading-small"> Last seen 03:10 AM </div>
								</div>
							</li>
							<li class="media">
								<div class="media-status">
									<span class="label label-sm label-success">new</span>
								</div>
								<?= $this->Html->image("../assets/layouts/layout/img/avatar7.jpg", ['fullBase' => true, 'class' => 'media-object', 'alt' => 'loading']); ?>
								<div class="media-body">
									<h4 class="media-heading">Ernie Kyllonen</h4>
									<div class="media-heading-sub"> Project Manager,
										<br> SmartBizz PTL </div>
								</div>
							</li>
							<li class="media">
								<?= $this->Html->image("../assets/layouts/layout/img/avatar8.jpg", ['fullBase' => true, 'class' => 'media-object', 'alt' => 'loading']); ?>
								<div class="media-body">
									<h4 class="media-heading">Lisa Stone</h4>
									<div class="media-heading-sub"> CTO, Keort Inc </div>
									<div class="media-heading-small"> Last seen 13:10 PM </div>
								</div>
							</li>
							<li class="media">
								<div class="media-status">
									<span class="badge badge-success">7</span>
								</div>
								<?= $this->Html->image("../assets/layouts/layout/img/avatar9.jpg", ['fullBase' => true, 'class' => 'media-object', 'alt' => 'loading']); ?>
								<div class="media-body">
									<h4 class="media-heading">Deon Portalatin</h4>
									<div class="media-heading-sub"> CFO, H&D LTD </div>
								</div>
							</li>
							<li class="media">
								<?= $this->Html->image("../assets/layouts/layout/img/avatar10.jpg", ['fullBase' => true, 'class' => 'media-object', 'alt' => 'loading']); ?>
								<div class="media-body">
									<h4 class="media-heading">Irina Savikova</h4>
									<div class="media-heading-sub"> CEO, Tizda Motors Inc </div>
								</div>
							</li>
							<li class="media">
								<div class="media-status">
									<span class="badge badge-danger">4</span>
								</div>
								<?= $this->Html->image("../assets/layouts/layout/img/avatar11.jpg", ['fullBase' => true, 'class' => 'media-object', 'alt' => 'loading']); ?>
								<div class="media-body">
									<h4 class="media-heading">Maria Gomez</h4>
									<div class="media-heading-sub"> Manager, Infomatic Inc </div>
									<div class="media-heading-small"> Last seen 03:10 AM </div>
								</div>
							</li>
						</ul>
					</div>
					<div class="page-quick-sidebar-item">
						<div class="page-quick-sidebar-chat-user">
							<div class="page-quick-sidebar-nav">
								<a href="javascript:;" class="page-quick-sidebar-back-to-list">
									<i class="icon-arrow-left"></i>Back</a>
							</div>
							<div class="page-quick-sidebar-chat-user-messages">
								<div class="post out">
									<?= $this->Html->image("../assets/layouts/layout/img/avatar3.jpg", ['fullBase' => true, 'class' => 'avatar', 'alt' => 'loading']); ?>
									<div class="message">
										<span class="arrow"></span>
										<a href="javascript:;" class="name">Bob Nilson</a>
										<span class="datetime">20:15</span>
										<span class="body"> When could you send me the report ? </span>
									</div>
								</div>
								<div class="post in">
									<?= $this->Html->image("../assets/layouts/layout/img/avatar2.jpg", ['fullBase' => true, 'class' => 'avatar', 'alt' => 'loading']); ?>
									<div class="message">
										<span class="arrow"></span>
										<a href="javascript:;" class="name">Ella Wong</a>
										<span class="datetime">20:15</span>
										<span class="body"> Its almost done. I will be sending it shortly </span>
									</div>
								</div>
								<div class="post out">
									<?= $this->Html->image("../assets/layouts/layout/img/avatar3.jpg", ['fullBase' => true, 'class' => 'avatar', 'alt' => 'loading']); ?>
									<div class="message">
										<span class="arrow"></span>
										<a href="javascript:;" class="name">Bob Nilson</a>
										<span class="datetime">20:15</span>
										<span class="body"> Alright. Thanks! :) </span>
									</div>
								</div>
								<div class="post in">
									<?= $this->Html->image("../assets/layouts/layout/img/avatar2.jpg", ['fullBase' => true, 'class' => 'avatar', 'alt' => 'loading']); ?>
									<div class="message">
										<span class="arrow"></span>
										<a href="javascript:;" class="name">Ella Wong</a>
										<span class="datetime">20:16</span>
										<span class="body"> You are most welcome. Sorry for the delay. </span>
									</div>
								</div>
								<div class="post out">
									<?= $this->Html->image("../assets/layouts/layout/img/avatar3.jpg", ['fullBase' => true, 'class' => 'avatar', 'alt' => 'loading']); ?>
									<div class="message">
										<span class="arrow"></span>
										<a href="javascript:;" class="name">Bob Nilson</a>
										<span class="datetime">20:17</span>
										<span class="body"> No probs. Just take your time :) </span>
									</div>
								</div>
								<div class="post in">
									<?= $this->Html->image("../assets/layouts/layout/img/avatar2.jpg", ['fullBase' => true, 'class' => 'avatar', 'alt' => 'loading']); ?>
									<div class="message">
										<span class="arrow"></span>
										<a href="javascript:;" class="name">Ella Wong</a>
										<span class="datetime">20:40</span>
										<span class="body"> Alright. I just emailed it to you. </span>
									</div>
								</div>
								<div class="post out">
									<?= $this->Html->image("../assets/layouts/layout/img/avatar3.jpg", ['fullBase' => true, 'class' => 'avatar', 'alt' => 'loading']); ?>
									<div class="message">
										<span class="arrow"></span>
										<a href="javascript:;" class="name">Bob Nilson</a>
										<span class="datetime">20:17</span>
										<span class="body"> Great! Thanks. Will check it right away. </span>
									</div>
								</div>
								<div class="post in">
									<?= $this->Html->image("../assets/layouts/layout/img/avatar2.jpg", ['fullBase' => true, 'class' => 'avatar', 'alt' => 'loading']); ?>
									<div class="message">
										<span class="arrow"></span>
										<a href="javascript:;" class="name">Ella Wong</a>
										<span class="datetime">20:40</span>
										<span class="body"> Please let me know if you have any comment. </span>
									</div>
								</div>
								<div class="post out">
									<?= $this->Html->image("../assets/layouts/layout/img/avatar3.jpg", ['fullBase' => true, 'class' => 'avatar', 'alt' => 'loading']); ?>
									<div class="message">
										<span class="arrow"></span>
										<a href="javascript:;" class="name">Bob Nilson</a>
										<span class="datetime">20:17</span>
										<span class="body"> Sure. I will check and buzz you if anything needs to be corrected. </span>
									</div>
								</div>
							</div>
							<div class="page-quick-sidebar-chat-user-form">
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Type a message here...">
									<div class="input-group-btn">
										<button type="button" class="btn green">
											<i class="icon-paper-clip"></i>
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="tab-pane page-quick-sidebar-alerts" id="quick_sidebar_tab_2">
					<div class="page-quick-sidebar-alerts-list">
						<h3 class="list-heading">General</h3>
						<ul class="feeds list-items">
							<li>
								<div class="col1">
									<div class="cont">
										<div class="cont-col1">
											<div class="label label-sm label-info">
												<i class="fa fa-check"></i>
											</div>
										</div>
										<div class="cont-col2">
											<div class="desc"> You have 4 pending tasks.
                                                        <span class="label label-sm label-warning "> Take action
                                                            <i class="fa fa-share"></i>
                                                        </span>
											</div>
										</div>
									</div>
								</div>
								<div class="col2">
									<div class="date"> Just now </div>
								</div>
							</li>
							<li>
								<a href="javascript:;">
									<div class="col1">
										<div class="cont">
											<div class="cont-col1">
												<div class="label label-sm label-success">
													<i class="fa fa-bar-chart-o"></i>
												</div>
											</div>
											<div class="cont-col2">
												<div class="desc"> Finance Report for year 2013 has been released. </div>
											</div>
										</div>
									</div>
									<div class="col2">
										<div class="date"> 20 mins </div>
									</div>
								</a>
							</li>
							<li>
								<div class="col1">
									<div class="cont">
										<div class="cont-col1">
											<div class="label label-sm label-danger">
												<i class="fa fa-user"></i>
											</div>
										</div>
										<div class="cont-col2">
											<div class="desc"> You have 5 pending membership that requires a quick review. </div>
										</div>
									</div>
								</div>
								<div class="col2">
									<div class="date"> 24 mins </div>
								</div>
							</li>
							<li>
								<div class="col1">
									<div class="cont">
										<div class="cont-col1">
											<div class="label label-sm label-info">
												<i class="fa fa-shopping-cart"></i>
											</div>
										</div>
										<div class="cont-col2">
											<div class="desc"> New order received with
												<span class="label label-sm label-success"> Reference Number: DR23923 </span>
											</div>
										</div>
									</div>
								</div>
								<div class="col2">
									<div class="date"> 30 mins </div>
								</div>
							</li>
							<li>
								<div class="col1">
									<div class="cont">
										<div class="cont-col1">
											<div class="label label-sm label-success">
												<i class="fa fa-user"></i>
											</div>
										</div>
										<div class="cont-col2">
											<div class="desc"> You have 5 pending membership that requires a quick review. </div>
										</div>
									</div>
								</div>
								<div class="col2">
									<div class="date"> 24 mins </div>
								</div>
							</li>
							<li>
								<div class="col1">
									<div class="cont">
										<div class="cont-col1">
											<div class="label label-sm label-info">
												<i class="fa fa-bell-o"></i>
											</div>
										</div>
										<div class="cont-col2">
											<div class="desc"> Web server hardware needs to be upgraded.
												<span class="label label-sm label-warning"> Overdue </span>
											</div>
										</div>
									</div>
								</div>
								<div class="col2">
									<div class="date"> 2 hours </div>
								</div>
							</li>
							<li>
								<a href="javascript:;">
									<div class="col1">
										<div class="cont">
											<div class="cont-col1">
												<div class="label label-sm label-default">
													<i class="fa fa-briefcase"></i>
												</div>
											</div>
											<div class="cont-col2">
												<div class="desc"> IPO Report for year 2013 has been released. </div>
											</div>
										</div>
									</div>
									<div class="col2">
										<div class="date"> 20 mins </div>
									</div>
								</a>
							</li>
						</ul>
						<h3 class="list-heading">System</h3>
						<ul class="feeds list-items">
							<li>
								<div class="col1">
									<div class="cont">
										<div class="cont-col1">
											<div class="label label-sm label-info">
												<i class="fa fa-check"></i>
											</div>
										</div>
										<div class="cont-col2">
											<div class="desc"> You have 4 pending tasks.
                                                        <span class="label label-sm label-warning "> Take action
                                                            <i class="fa fa-share"></i>
                                                        </span>
											</div>
										</div>
									</div>
								</div>
								<div class="col2">
									<div class="date"> Just now </div>
								</div>
							</li>
							<li>
								<a href="javascript:;">
									<div class="col1">
										<div class="cont">
											<div class="cont-col1">
												<div class="label label-sm label-danger">
													<i class="fa fa-bar-chart-o"></i>
												</div>
											</div>
											<div class="cont-col2">
												<div class="desc"> Finance Report for year 2013 has been released. </div>
											</div>
										</div>
									</div>
									<div class="col2">
										<div class="date"> 20 mins </div>
									</div>
								</a>
							</li>
							<li>
								<div class="col1">
									<div class="cont">
										<div class="cont-col1">
											<div class="label label-sm label-default">
												<i class="fa fa-user"></i>
											</div>
										</div>
										<div class="cont-col2">
											<div class="desc"> You have 5 pending membership that requires a quick review. </div>
										</div>
									</div>
								</div>
								<div class="col2">
									<div class="date"> 24 mins </div>
								</div>
							</li>
							<li>
								<div class="col1">
									<div class="cont">
										<div class="cont-col1">
											<div class="label label-sm label-info">
												<i class="fa fa-shopping-cart"></i>
											</div>
										</div>
										<div class="cont-col2">
											<div class="desc"> New order received with
												<span class="label label-sm label-success"> Reference Number: DR23923 </span>
											</div>
										</div>
									</div>
								</div>
								<div class="col2">
									<div class="date"> 30 mins </div>
								</div>
							</li>
							<li>
								<div class="col1">
									<div class="cont">
										<div class="cont-col1">
											<div class="label label-sm label-success">
												<i class="fa fa-user"></i>
											</div>
										</div>
										<div class="cont-col2">
											<div class="desc"> You have 5 pending membership that requires a quick review. </div>
										</div>
									</div>
								</div>
								<div class="col2">
									<div class="date"> 24 mins </div>
								</div>
							</li>
							<li>
								<div class="col1">
									<div class="cont">
										<div class="cont-col1">
											<div class="label label-sm label-warning">
												<i class="fa fa-bell-o"></i>
											</div>
										</div>
										<div class="cont-col2">
											<div class="desc"> Web server hardware needs to be upgraded.
												<span class="label label-sm label-default "> Overdue </span>
											</div>
										</div>
									</div>
								</div>
								<div class="col2">
									<div class="date"> 2 hours </div>
								</div>
							</li>
							<li>
								<a href="javascript:;">
									<div class="col1">
										<div class="cont">
											<div class="cont-col1">
												<div class="label label-sm label-info">
													<i class="fa fa-briefcase"></i>
												</div>
											</div>
											<div class="cont-col2">
												<div class="desc"> IPO Report for year 2013 has been released. </div>
											</div>
										</div>
									</div>
									<div class="col2">
										<div class="date"> 20 mins </div>
									</div>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="tab-pane page-quick-sidebar-settings" id="quick_sidebar_tab_3">
					<div class="page-quick-sidebar-settings-list">
						<h3 class="list-heading">General Settings</h3>
						<ul class="list-items borderless">
							<li> Enable Notifications
								<input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
							<li> Allow Tracking
								<input type="checkbox" class="make-switch" data-size="small" data-on-color="info" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
							<li> Log Errors
								<input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
							<li> Auto Sumbit Issues
								<input type="checkbox" class="make-switch" data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
							<li> Enable SMS Alerts
								<input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
						</ul>
						<h3 class="list-heading">System Settings</h3>
						<ul class="list-items borderless">
							<li> Security Level
								<select class="form-control input-inline input-sm input-small">
									<option value="1">Normal</option>
									<option value="2" selected>Medium</option>
									<option value="e">High</option>
								</select>
							</li>
							<li> Failed Email Attempts
								<input class="form-control input-inline input-sm input-small" value="5" /> </li>
							<li> Secondary SMTP Port
								<input class="form-control input-inline input-sm input-small" value="3560" /> </li>
							<li> Notify On System Error
								<input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
							<li> Notify On SMTP Error
								<input type="checkbox" class="make-switch" checked data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
						</ul>
						<div class="inner-content">
							<button class="btn btn-success">
								<i class="icon-settings"></i> Save Changes</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END QUICK SIDEBAR -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
	<div class="page-footer-inner"> 2014 &copy; Metronic by keenthemes.
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
<!-- END THEME LAYOUT SCRIPTS -->
</body>

<script>
	$(function() {
		/*$('.child-menu').on('click', function() {
			var id = $(this).attr('data-id');
			$('.child-menu').removeClass('open');
			$('.child-span-select').removeClass('selected');
			$('#child-menu-'+id).addClass('open');
			$('#child-span-select-'+id).addClass('selected');

		});

		$('.parent-menu').on('click', function() {
			var pid = $(this).attr('data-id');
			$('.parent-menu').removeClass('start active open');
//			$('.parent-menu').removeClass('open');
			$('.parent-span-select').removeClass('selected');
			$('.parent-span-arrow').removeClass('open');

			$('#parent-menu-'+pid).addClass('start active open');
//			$('#parent-menu-'+pid).addClass('open');
			$('#parent-span-select-'+pid).addClass('selected');
			$('#parent-span-arrow-'+pid).addClass('open');

		});*/



	});
</script>

</html>