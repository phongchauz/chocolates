<div class="page-sidebar navbar-collapse collapse">
    <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
        <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
        <li class="sidebar-toggler-wrapper hide">
            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            <div class="sidebar-toggler"> </div>
            <!-- END SIDEBAR TOGGLER BUTTON -->
        </li>
        <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
        <?php
            $actCls = $actParentF == 'HO' ? 'active open' : '';
        ?>
        <li class="nav-item start  parent-menu <?php echo $actCls;?>" >
            <a href="javascript:;" class="nav-link nav-toggle" >
                <i class="icon-home"></i>
                <span class="title">Dashboard</span>
                <?php if($actParentF == 'HO'){?>
                    <span class="selected " ></span>
                    <span class="arrow open " ></span>
                <?php }?>

            </a>
            <ul class="sub-menu">
                <li class="nav-item start active open child-menu" >
                    <a href="index.html" class="nav-link " >
                        <i class="icon-bar-chart"></i>
                        <span class="title">Dashboard 1</span>
                        <span class="selected child-span-select" id="child-span-select-0"></span>
                    </a>
                </li>

            </ul>
        </li>

        <?php foreach($arrMenu as $menu){

            $groupId    = $menu['id'];
            $groupName  = $menu['name'];
            $arrFunc    = $menu['arrFunc'];

            ?>

            <li class="heading">
                <h3 class="uppercase"><?php echo $groupName;?></h3>
            </li>

            <?php
            foreach($arrFunc as $func){
                $funcId   = $func['id'];
                $funcCode = $func['code'];
                $funcName = $func['name'];
                $icoClass = $func['ico_class'];
                $arrChild = $func['arrChild'];
                $actCls = $actParentF == $funcCode ? 'active open' : '';
            ?>
                <li class="nav-item  parent-menu <?php echo $actCls;?>" data-id="<?php echo $funcId;?>" id="parent-menu-<?php echo $funcId;?>">
                    <a href="javascript:;" class="nav-link nav-toggle" id="nav-toggle-<?php echo $funcId;?>">
                        <i class="<?php echo $icoClass;?>"></i>
                        <span class="title"><?php echo $funcName;?></span>
                        <?php if($actParentF == $funcCode){?>
                            <span class="selected " ></span>
                            <span class="arrow open " ></span>
                        <?php }?>
                    </a>

                    <ul class="sub-menu">
                        <?php foreach($arrChild as $child){

                            $childId   = $child['id'];
                            $childName = $child['name'];
                            $childLink = $child['link'];

                            ?>
                            <li class="nav-item  child-menu" data-id="<?php echo $childId;?>">
                                <a href="<?php echo $childLink;  ?>" class="nav-link " >
                                    <span class="title"><i class="fa fa-angle-right"></i> <?php echo $childName;?></span>
                                    <span class="child-span-select" id="child-span-select-<?php echo $childId;?>"></span>
                                </a>
                            </li>
                        <?php }?>



                    </ul>
                </li>

            <?php }?>
        <?php }?>
    </ul>
    <!-- END SIDEBAR MENU -->
    <!-- END SIDEBAR MENU -->
</div>