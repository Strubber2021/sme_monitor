<div class="deznav">
	<div class="deznav-scroll">

		<ul class="metismenu" id="menu">
			<li <?php if($page_name == 'ninechang' || $page_name == 'user' || $page_name == 'job' || $page_name == 'parts' 
			|| $page_name == 'equipment' || $page_name == 'evaluate' || $page_name == 'ninechang_company') echo 'class="mm-active"';?>>
				<a href="<?php echo base_url('ninechang/') ?>" class="ai-icon" aria-expanded="false">
					<i class="flaticon-381-settings-7"></i>
					<span class="nav-text">โปรแกรมซ่อมบำรุง</span>
				</a>
			</li>

			<li <?php if($page_name == 'bookkon' || $page_name == 'bookkon_user' || $page_name == 'bookkon_review' || $page_name == 'bookkon_company') echo 'class="mm-active"';?>>
				<a href="<?php echo base_url('bookkon/') ?>" class="ai-icon" aria-expanded="false">
					<i class="flaticon-381-user-2"></i>
					<span class="nav-text">บุคคล.com</span>
				</a>
			</li>

			<li <?php if($page_name == 'jobth' || $page_name == 'jobth_user'
				|| $page_name == 'jobth_job' || $page_name == 'jobth_review') echo 'class="mm-active"';?>>
				<a href="<?php echo base_url('jobth/') ?>" class="ai-icon" aria-expanded="false">
					<i class="flaticon-381-search-3"></i>
					<span class="nav-text">งานไทย.net</span>
				</a>
			</li>

<!-- 			<li <?php if($page_name == 'horpak' || $page_name == 'horpak_user'|| $page_name == 'horpak_job' || $page_name == 'horpak_review' 
				|| $page_name == 'horpak_parts' || $page_name == 'horpak_company') echo 'class="mm-active"';?>>
				<a href="<?php echo base_url('horpak/') ?>" class="ai-icon" aria-expanded="false">
					<i class="flaticon-381-home-1"></i>
					<span class="nav-text">โปรแกรมหอพัก</span>
				</a>
			</li>

			<li <?php if($page_name == 'dashboard_board' || $page_name == 'dashboard_user' 
			|| $page_name == 'board_job' || $page_name == 'board_review') echo 'class="mm-active"';?>>
				<a href="<?php echo base_url('board/') ?>" class="ai-icon" aria-expanded="false">
					<i class="flaticon-381-id-card-1 "></i>
					<span class="nav-text">หาช่าง หางาน</span>
				</a>
			</li> -->

			<li <?php if($page_name == 'sme') echo 'class="mm-active"';?>>
				<a href="<?php echo base_url('sme/') ?>" class="ai-icon" aria-expanded="false">
					<i class="flaticon-381-internet"></i>
					<span class="nav-text">SME</span>
				</a>
			</li>

			<li <?php if($page_name == 'request') echo 'class="mm-active"';?>>
				<a href="<?php echo base_url('request/') ?>" class="ai-icon" aria-expanded="false">
					<i class="flaticon-381-ring"></i>
					<span class="nav-text">แจ้งเตือน</span>
				</a>
			</li>

			<li>
				<a href="https://spnmonitor.smethaidata.com/ninechang" class="ai-icon" aria-expanded="false">
					<i class="flaticon-381-settings-6"></i>
					<span class="nav-text">จัดการเว็บไซต์</span>
				</a>
			</li>

		</ul>

		<div class="copyright">
			<p><strong>Program monitor</strong> © 2021 All Rights Reserved</p>
			<p class="fs-12">Made with <span class="heart"></span> by ST</p>
		</div>
		
	</div>
</div>