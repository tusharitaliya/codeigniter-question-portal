<div class="col-sm-12 buutondiv">
	<div class="form-group">
		<button class="startexambutton" onclick="startexam();">Start Exam</button>
		<input type="hidden" value="" id="questionoption">
	</div>
</div>
<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" onclick="closepopup();">&times;</button>
				<h4 class="modal-title" id="enterfieldname"></h4>
			</div>
			<div class="modal-body" id="questiondata">
				
			</div>
			<div class="modal-footer">
				<span onclick="nextquestion();" class="applybutton">Next</span>
			</div>
		</div>
	</div>
</div>