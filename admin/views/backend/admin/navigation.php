<div class="sidebar-menu">
    <header class="logo-env" >

        <!-- logo -->
        <div class="logo" style="">
            <a href="<?php echo base_url(); ?>">
                <img src="<?php echo base_url();?>uploads/logo.png"  class="" width="200"/>
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
            <a href="<?php echo base_url(); ?>admin.php/admin/dashboard">
                <i class="entypo-gauge"></i>
                <span><?php echo get_phrase('dashboard'); ?></span>
            </a>
        </li>
        
        <?php if($this->session->logged_user_level==='9'){?> 
         <!-- SETTINGS -->
        <li class="<?php
        if ($page_name == 'system_settings' ||
                $page_name == 'manage_language' ||
                    $page_name == 'sms_settings'||
					$page_name == 'admin_test')
                        echo 'opened active';
        ?> ">
            <a href="#">
                <i class="entypo-lifebuoy"></i>
                <span><?php echo get_phrase('display_settings'); ?></span>
            </a>
            <ul>
                <li class="<?php if ($page_name == 'system_settings') echo 'active'; ?> ">
                    <a href="<?php echo base_url("admin.php/admin/system_settings"); ?>">
                        <span><i class="entypo-cog"></i> <?php echo get_phrase('general_settings'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'sms_settings') echo 'active'; ?> ">
                    <a href="<?php echo base_url("admin.php/admin/sms_settings"); ?>">
                        <span><i class="entypo-mobile"></i> <?php echo get_phrase('sms_settings'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'manage_language') echo 'active'; ?> ">
                    <a href="<?php echo base_url("admin.php/admin/manage_language"); ?>">
                        <span><i class="entypo-language"></i> <?php echo get_phrase('language_settings'); ?></span>
                    </a>
                </li>
				               
            </ul>
        </li>
        
        <!-- Apps Settings -->
        <li class="<?php
        if ($page_name == 'application_settings' ||
                $page_name == 'config_settings' )
                        echo 'opened active';
        ?> ">
            <a href="#">
                <i class="entypo-cog"></i>
                <span><?php echo get_phrase('system_settings'); ?></span>
            </a>
            <ul>
		        <li class="<?php if ($page_name == 'application_settings') echo 'active'; ?> ">
		            <a href="<?php echo base_url(); ?>admin.php/admin/application_settings">
		                <!-- <i class="entypo-cog"></i> -->
		                <span><?php echo get_phrase('application_settings'); ?></span>
		            </a>
		        </li>
		         <li class="<?php if ($page_name == 'config_settings') echo 'active'; ?> ">
		            <a href="<?php echo base_url(); ?>admin.php/admin/config_settings">
		                <!-- <i class="entypo-cog"></i> -->
		                <span><?php echo get_phrase('config_settings'); ?></span>
		            </a>
		        </li>
        	</ul>
		<!-- DATA MANAGEMENT -->
        <li class="<?php if ($page_name == 'manage_data') echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>admin.php/admin/manage_data">
                <i class="entypo-info"></i>
                <span><?php echo get_phrase('manage_data'); ?></span>
            </a>
        </li> 
        
		<?php }?> 


        <!-- ACCOUNT -->
         <li class="<?php
        if ($page_name == 'manage_profile' ||
                $page_name == 'manage_regions' ||
                $page_name == 'manage_clusters' ||
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
		        
		         <li class="<?php if ($page_name == 'manage_regions') echo 'active'; ?> ">
		            <a href="<?php echo base_url(); ?>admin.php/admin/manage_regions">
		                <!-- <i class="entypo-lock"></i> -->
		                <span><?php echo get_phrase('manage_regions'); ?></span>
		            </a>
		        </li>
		        
		        <li class="<?php if ($page_name == 'manage_clusters') echo 'active'; ?> ">
		            <a href="<?php echo base_url(); ?>admin.php/admin/manage_clusters">
		                <!-- <i class="entypo-lock"></i> -->
		                <span><?php echo get_phrase('manage_clusters'); ?></span>
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