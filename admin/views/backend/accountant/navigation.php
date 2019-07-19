<div class="sidebar-menu">
    <header class="logo-env" >

        <!-- logo -->
        <div class="logo" style="">
            <a href="<?php echo base_url(); ?>">
                <img src="<?php echo base_url();?>uploads/logo.png"  class="img-circle" width="80"/>
            </a>
        </div>

        <!-- logo collapse icon -->
        <div class="sidebar-collapse" style="">
            <a href="#" class="sidebar-collapse-icon with-animation">

                <i class="entypo-menu"></i>
            </a>
        </div>

        <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
        <div class="sidebar-mobile-menu visible-xs">
            <a href="#" class="with-animation">
                <i class="entypo-menu"></i>
            </a>
        </div>
    </header>

    <div style=""></div>	
    <ul id="main-menu" class="">
        <!-- add class "multiple-expanded" to allow multiple submenus to open -->
        <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->


        <!-- DASHBOARD -->
        <li class="<?php if ($page_name == 'dashboard') echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>admin.php/facilitator/dashboard">
                <i class="entypo-gauge"></i>
                <span><?php echo get_phrase('dashboard'); ?></span>
            </a>
        </li>
        
        


        <!-- ACCOUNT -->
        <!-- <li class="<?php if ($page_name == 'manage_profile') echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>admin.php/facilitator/manage_profile">
                <i class="entypo-lock"></i>
                <span><?php echo get_phrase('account'); ?></span>
            </a>
        </li> -->
        
        <li class="<?php
        if ($page_name == 'manage_profile' ||
                $page_name == 'manage_projects' ||
                $page_name == 'manage_banks' )
                        echo 'opened active';
        ?> ">
            <a href="#">
                <i class="entypo-cog"></i>
                <span><?php echo get_phrase('profile_management'); ?></span>
            </a>
            <ul>
		        <li class="<?php if ($page_name == 'manage_profile') echo 'active'; ?> ">
		            <a href="<?php echo base_url(); ?>admin.php/admin/manage_profile">
		                <!-- <i class="entypo-lock"></i> -->
		                <span><?php echo get_phrase('manage_password'); ?></span>
		            </a>
		        </li>
		        
		        
		        <li class="<?php if ($page_name == 'manage_projects') echo 'active'; ?> ">
		            <a href="<?php echo base_url(); ?>admin.php/admin/manage_projects">
		                <!-- <i class="entypo-lock"></i> -->
		                <span><?php echo get_phrase('manage_projects'); ?></span>
		            </a>
		        </li>
		        
		        <li class="<?php if ($page_name == 'manage_banks') echo 'active'; ?> ">
		            <a href="<?php echo base_url(); ?>admin.php/admin/manage_banks">
		                <!-- <i class="entypo-lock"></i> -->
		                <span><?php echo get_phrase('manage_banks'); ?></span>
		            </a>
		        </li>
		        
		    </ul>    
          <li/>
               

    </ul>

</div>