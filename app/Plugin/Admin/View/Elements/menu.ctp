<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="<?php echo $this->Html->url(array('plugin' => 'admin', 'controller' => 'admin', 'action' => 'index'));  ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-gear fa-fw"></i> Home Page<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?php echo $this->Html->url(array('plugin' => 'admin', 'controller' => 'banner', 'action' => 'index'));  ?>"><i class="fa fa-fw"></i> Main Banner</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-gear fa-fw"></i> System<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?php echo $this->Html->url(array('plugin' => 'admin', 'controller' => 'setting', 'action' => 'option'));  ?>"><i class="fa fa-fw"></i> Setting</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->