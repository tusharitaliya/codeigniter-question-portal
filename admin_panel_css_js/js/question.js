var options = 0;
function addquestionoption(id) 
{
	var base_url = $('#base_url').val();
	$('#addquestionoption').val('0');
	options ++;	
	var numItems = $('.up-option1').length;
	$.ajax({
		type: 'POST',
		data:{options:options},
		url: base_url+"admin_panel/question/addquestionoption",
		success: function(data)
		{
		$('#addquestionoptions').append(data);	
		}
	});
}
function removeoption(id)
{
	$('#options'+id).remove('');	
}
$('#questionform').submit(function(e){
	e.preventDefault();
	var question = $('#question').val();
	var base_url = $('#base_url').val();
	if(question.length == 0){
		$('#questionerror').html('Please enter a question....');
	}else{
		$.ajax({
		type: 'POST',
		url: base_url+"admin_panel/question/insert_data",
		data:new FormData(this),
		processData: false,
		contentType: false,
		success: function(data)
		{	
			if(data == 2){
				$('#correctanswererror').html('Please Select a any one correct anaswer....');
			}else if($.trim(data) == 1){
				alert('Question Successfully added...');
				location.reload();
			}else{
				alert('Question Not added...');
				location.reload();
			}
		}
	});
	}
	
});
function addoptionvalue(value,id){
	$('#optionid_'+id).val(value);	
	$('#aoptionid_'+id).val(value);	
}