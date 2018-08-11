<?php 
$this->load->view('common_file/header');  
?> 
<main class="mdl-layout__content ">
	<div class="mdl-cell--12-col page-content">
		<div class="dashboard_box">
			<div>
				<?php $this->load->view($main_content); ?>
			</div>
	</div>
<?php $this->load->view('common_file/footer'); ?>