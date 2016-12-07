<div class="page-sidebar navbar-collapse collapse">
    <!-- BEGIN SIDEBAR MENU -->
    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
        <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
        <li class="sidebar-toggler-wrapper hide">
            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            <div class="sidebar-toggler"> </div>
            <!-- END SIDEBAR TOGGLER BUTTON -->
        </li>
        <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
        <?php
            $activeGroup    = !isset($arrActiveMenu) ? 'active open' : '';
            $spanSelected   = !isset($arrActiveMenu) ? 'selected' : '';
            $spanArrow      = !isset($arrActiveMenu) ? 'open' : '';
        ?>
        <li class="nav-item <?php echo $activeGroup;?> group-function" data-id="0" id = 'group-function-0'>
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-home"></i>
                <span class="title">Dashboard</span>
                <span class="<?php echo $spanSelected;?> span-select" id="span-select-0"></span>
                <span class="arrow <?php echo $spanArrow;?> span-arrow" id="span-arrow-0"></span>
            </a>
        </li>

        <?php foreach($arrMenu as $menu){
//                pr($arrActiveMenu); die;
                $activeGroup    = isset($arrActiveMenu) && $this->AdminPortal->compareString($arrActiveMenu['group_menu'], $menu['code']) ? 'active open' : '';
                $spanSelected   = isset($arrActiveMenu) && $this->AdminPortal->compareString($arrActiveMenu['group_menu'], $menu['code']) ? 'selected' : '';
                $spanArrow      = isset($arrActiveMenu) && $this->AdminPortal->compareString($arrActiveMenu['group_menu'], $menu['code']) ? 'open' : '';
            ?>
            <li class="nav-item <?php echo $activeGroup;?> group-function" data-id="<?php echo $menu['id'];?>" id = 'group-function-<?php echo $menu['id'];?>'>
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="<?php echo $menu['ico_class'];?>"></i>
                    <span class="title"><?php echo $menu['name'];?></span>
                    <span class="span-select <?php echo $spanSelected;?>" id="span-select-<?php echo $menu['id'];?>"></span>
                    <span class="arrow span-arrow <?php echo $spanArrow;?>" id="span-arrow-<?php echo $menu['id'];?>"></span>
                </a>

                <?php if(!count($menu['arrFunc'])){continue;}?>

                <ul class="sub-menu">
                    <?php foreach($menu['arrFunc'] as $subMenu){

                        $plug       = $subMenu['arrLink'][0];
                        $controller = $subMenu['arrLink'][1];
                        $action     = $subMenu['arrLink'][2];
                        $activeChild= isset($arrActiveMenu) && $this->AdminPortal->compareString($arrActiveMenu['child_menu'], $subMenu['code']) ? 'active open' : '';
                        ?>
                        <li class="nav-item <?php echo $activeChild;?> child-function" data-id="<?php echo $subMenu['id'];?>" id = 'child-function-<?php echo $subMenu['id'];?>'>
                            <a href="<?php echo $this->Html->url(array('plugin' => $plug, 'controller' => $controller, 'action' => $action));  ?>" class="nav-link ">
                                <span class="title"><?php echo $subMenu['name'];?></span>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </li>

        <?php }?>
    </ul>
    <!-- END SIDEBAR MENU -->
    <!-- END SIDEBAR MENU -->
</div>
<script>
    $(document).on('click', 'li.group-function', function(e) {
        var idMenu = $(this).attr('data-id');
        $('span.span-select').removeClass('selected');
        $('span.span-arrow').removeClass('open');
        $('#span-select-'+idMenu).addClass('selected');
        $('#span-arrow-'+idMenu).addClass('open');
        $('li.group-function').removeClass('start active open');
        $('#group-function-'+idMenu).addClass('active open');

    });

    $(document).on('click', 'li.child-function', function(e) {
        var idChildMenu = $(this).attr('data-id');
        $('li.child-function').removeClass('active open');
    });

</script>