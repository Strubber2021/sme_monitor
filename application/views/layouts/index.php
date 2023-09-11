<?php include 'css.php'; ?>
  <!--***** Preloader start  *****-->
    <div id="preloader">
      <div class="waviy">
				<span style="--i:1">กำ</span>
				<span style="--i:2">ลั</span>
				<span style="--i:3">ง</span>
				<span style="--i:4">โ</span>
				<span style="--i:5">ห</span>
				<span style="--i:6">ล</span>
				<span style="--i:7">ด</span>
				<span style="--i:8">.</span>
				<span style="--i:9">.</span>
				<span style="--i:10">.</span>
			</div>
    </div>
    <!--***** Preloader end *****-->

    <!--***** Main wrapper start *****-->
    <div id="main-wrapper">

	    <!--***** Nav header start *****-->
			<?php include 'nav.php'; ?> 
			<!--***** Header start*****-->
      <?php include 'header.php'; ?>
      <!--***** Sidebar start menu******-->
      <?php include 'menu.php'; ?>


		<!--***** Content body start *****-->
		<?php 
			$page = $page_type.'/'.$page_name.'.php';
			$this->load->view($page);
		?>
    	<!--***** Content body end*****-->


        <!--***** Footer start *****-->
        <?php include 'footer.php' ; ?>
		</div><!--***** Main wrapper end *****-->
<?php include 'js.php'; $this->load->view($chart); ?>