<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<span>All Question<span>
	</li>
	<li class="page_item_button">
		<a href="<?php echo base_url();?>admin_panel/question/add">Add New Question</a>
	</li>
</ol>
<?php if(!empty($page_content)){ ?>
	<div class="card mb-3">
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>	
							<th style="display:none;"></th>
							<th>Question</th>
							<th>Option</th>
							<th>Correct Answer</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($page_content as $data){ ?>
							<tr id="itemdata_<?php echo $data['question_id']; ?>">
								<td style="display:none;"></td>
								<td><?php echo $data['question']; ?></td>
								<td><?php 
									$option_array = json_decode($data['question_option']);
									foreach($option_array as $option){
										echo $option.'<br/>';
									}
								?></td>
								<td><?php echo $data['right_answer']; ?></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
<?php }else{ ?>
	<div class="no_data_found"><h1>Question Not Found....</h1></div>
<?php } ?>
