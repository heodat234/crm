<aside class="app-sidebar">
      <div class="app-sidebar__user"><img src="<?=base_url('images/icons/agi-logo.png')?>">
        <div>
          <p class="app-sidebar__user-name">John Doe</p>
          <p class="app-sidebar__user-designation">Frontend Developer</p>
        </div>
      </div>
      <ul class="app-menu">
        <li>
        	<a class="app-menu__item click_navtab" target="myiframetext" href="<?= base_url('search') ?>" title="Search">
	        	<!-- <i class="app-menu__icon fa fa-search"></i> -->
	        	<img src="<?=base_url('images/icons/timkiem.png')?>">
	        	<span class="app-menu__label">Tìm kiếm</span>
	        </a>
	    </li>
	     <?php $var = $this->session->userdata;
                    $roleid = $var['roleid'];
                    if($roleid == '1')
                    {
                        $title_first = 'Settings';
                        $icon_first = 'fas fa-user-circle';
                        $link = 'setting';
                    }
                    else{
                        $title_first = 'Ticket';
                        $icon_first = 'fas fa-file-alt'; 
                        $link = 'ticket';  
                    }

                     ?>
        <li>
        	<a class="app-menu__item click_navtab" target="myiframetext" href="<?= base_url($link) ?>" title="<?php echo $title_first ?>">
	        	<!-- <i class="app-menu__icon fa fa-home"></i> -->
	        	<img src="<?=base_url('images/icons/home.png')?>">
	        	<span class="app-menu__label">Trang chủ</span>
	        </a>
	    </li>
	    <?php $var = $this->session->userdata;
                    $roleid = $var['roleid'];
                    if($roleid != '1'){?> 
	    <li>
        	<a class="app-menu__item click_navtab" target="myiframetext" href="#">
        		<img src="<?=base_url('images/icons/list.png')?>">
	        	<!-- <i class="app-menu__icon fa fa-clipboard-list"></i> -->
	        	<span class="app-menu__label">Ticket</span>
	        </a>
	    </li>
	    <?php } ?>
	    <li>
        	<a class="app-menu__item click_navtab" target="myiframetext" href="<?= base_url('knowledge') ?>" title="Knowledge">
        		<img src="<?=base_url('images/icons/6.png')?>">
	        	<!-- <i class="app-menu__icon fa fa-comments"></i> -->
	        	<span class="app-menu__label">Thư viện kiến thức</span>
	        </a>
	    </li>
	    <li>
        	<a class="app-menu__item click_navtab" target="myiframetext" href="#">
        		<img src="<?=base_url('images/icons/7.png')?>">
	        	<!-- <i class="app-menu__icon fa fa-chart-bar"></i> -->
	        	<span class="app-menu__label">aaa</span>
	        </a>
	    </li>
	    <li>
        	<a class="app-menu__item active click_navtab" target="myiframetext" href="#" title="User">
        		<img src="<?=base_url('images/icons/8.png')?>">
	        	<!-- <i class="app-menu__icon fa fa-cog"></i> -->
	        	<span class="app-menu__label">Cài Đặt</span>
	        </a>
	    </li>
	    <!-- <li>
        	<a class="app-menu__item active" href="#" data-toggle="sidebar">
	        	<i class="app-menu__icon fa fa-cog"></i>
	        	<span class="app-menu__label">aaa</span>
	        </a>
	    </li> -->
      </ul>
    </aside>
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>