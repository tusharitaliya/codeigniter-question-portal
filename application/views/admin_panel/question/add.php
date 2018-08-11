<div class="container-center">
	<h2>Add Question Form</h2>
	<form method="post" id="questionform" enctype="multipart/form-data" action="<?php echo base_url();?>admin_panle/add">
		<div class="col-sm-12">
			<div class="form-group">
				<input type="text" class="form-control"  id="question" name="question" value="" placeholder="Enter Your Question" >
				<span id="questionerror" class="error"></span>
			</div>
		</div>
		<div class="col-sm-12">
			<div id="addquestionoptions" style="width:100%">
							
			</div>
			<div class="form-group">
				<span class="applybutton" onclick="addquestionoption('0');"> GET OPTION INPUT FIELD </span>
			</div>
		</div>
		<div class="col-sm-12 error" id="correctanswererror"></div>
		<div class="col-sm-12">
			<div class="form-group">
				<button type="submit" value="Submit" class="applybutton" id="submitform">Submit</button>
			</div>
		</div>
	</form>
</div>