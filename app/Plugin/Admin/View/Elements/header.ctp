<div class="navbar-header">
	<button type="button" class="navbar-toggle" data-toggle="collapse"
		data-target=".navbar-collapse">
		<span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span>
		<span class="icon-bar"></span> <span class="icon-bar"></span>
	</button>
	<a class="navbar-brand"
		href="<?php echo $this->Html->url(array('plugin' => 'admin', 'controller' => 'admin', 'action' => 'index')); ?>">Admin</a>
</div>
<!-- /.navbar-header -->

<ul class="nav navbar-top-links navbar-right">
	<!-- /.dropdown -->
	<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown"
		href="#"> <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
	</a>
		<ul class="dropdown-menu dropdown-user">
			<li><a
				href="<?php echo $this->Html->url(array('plugin' => null, 'controller' => 'auth', 'action' => 'logout')); ?>"><i
					class="fa fa-sign-out fa-fw"></i> Logout</a></li>
		</ul> <!-- /.dropdown-user --></li>
	<!-- /.dropdown -->
</ul>
<!-- /.navbar-top-links -->