<div class="header">
	<div class="header-content">
		<nav class="navbar navbar-expand">
			<div class="collapse navbar-collapse justify-content-between">
				<div class="header-left"></div>
				<ul class="navbar-nav header-right">
					<li class="nav-item dropdown notification_dropdown">
						<div class="header-left">
						</div>
					</li>
					<li class="nav-item dropdown notification_dropdown">
						<a class="nav-link bell-link ai-icon" href="javascript:void(0);">
							<i class="flaticon-041-graph text-white"> Programs Monitor</i>	
						</a>
					</li>
					<li class="nav-item dropdown header-profile">
	            <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
	                <img src="<?php echo base_url('assets/images/profile/user.png') ?>" alt="">
					<div class="header-info ms-3">
						<span><?php echo $this->session->userdata['name']; ?></span>
					</div>
	            </a>
	            <div class="dropdown-menu dropdown-menu-end">
	                <a href="<?php echo base_url();?>login/logout" class="dropdown-item ai-icon">
	                    <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
	                    <span class="ms-2">ออกจากระบบ </span>
	                </a>
	            </div>
	        </li>


				</ul>
			</div>
		</nav>
	</div>
</div>