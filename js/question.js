function startexam(){
	var options = 0;
	var base_url = $('#base_url').val();
	options ++;
	$.ajax({
		type:"POST",
		url:base_url+"question/get_first_question?page_id="+options,
		data:'',
		success:function(response){
			$("#myModal").modal();
			$("#questiondata").html(response);
			$("#questionoption").val(options);
			$("#enterfieldname").html('Question '+options);
			$('#currentquestnnumber').html(options);
		}
	})
}
function nextquestion(){
	var questionoption = $('#questionoption').val();
	var total_question = $('#total_question').val();
	var options = questionoption;
	var base_url = $('#base_url').val();
	options ++;
	var question_ans = $('input[name="optionquestion"]:checked').val();
	var question_ids = $('#question_ids').val();
	if(total_question == (options-1)){
		if($('input[name="optionquestion"]:checked').length === 0) {
			alert('Please select any one option...');
		}else{
			$('.modal-footer').remove();
			$.ajax({
				type:"POST",
				url:base_url+"question/get_finish_button?page_id="+options,
				data:{question_ans:question_ans,question_ids:question_ids},
				success:function(response){
					$("#questiondata").html(response);
					$("#questionoption").val(options);
					$("#enterfieldname").html('Submit Your Exam ');
				}
			})
		}
	}else{
		if($('input[name="optionquestion"]:checked').length === 0) {
			alert('Please select any one option...');
		}else{
			$.ajax({
				type:"POST",
				url:base_url+"question/get_question?page_id="+options,
				data:{question_ans:question_ans,question_ids:question_ids},
				success:function(response){
					$("#questiondata").html(response);
					$("#questionoption").val(options);
					$("#enterfieldname").html('Question '+options);
					$('#currentquestnnumber').html(options);
				}
			})
		}
	}
}
function finishexam(){
	var base_url = $('#base_url').val();
	$.ajax({
		type:"POST",
		url:base_url+"question/finish_exam",
		data:'',
		success:function(response){
			$("#questiondata").html(response);
		}
	})
}
function closepopup(){
		$("#myModal").modal('hide');
		$("#questionoption").val('');
		location.reload();
}