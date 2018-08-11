function checkremmeberme(){
	var value = $('#rememberme').val();
	if(value == 'no'){
		$('#rememberme').val('yes');
	}else{
		$('#rememberme').val('no');
	}
}

function submitloginform(){
	var email = $('#exampleInputEmail1').val();
	var password = $('#exampleInputPassword1').val();
	var remember = $('#rememberme').val();
	var base_url = $('#base_url').val();
	
	$.ajax({
		type: "POST",
		url: base_url+"admin_panel/login/check_login/",
		data: {email:email,password:password,remember:remember},
		dataType: "html",
		success: function (response) {
			if($.trim(response) == '2'){
				$('#loginerror').show().html('<div class="loginerror" >Please enter a correct email and password....</div>');
				return false;
			}else{
				window.location.href = "http://localhost/question_portal/admin_panel/dashboard";
				return false;
			}
		}
	});
}

function logout(){
	var base_url = $('#base_url').val();
	$.ajax({
		type: "POST",
		url: base_url+"admin_panel/logout/",
		data: '',
		dataType: "html",
		success: function (response) {
			if(response == "TRUE"){
				window.location.href = base_url+"admin_panel";
			}else{
				window.location.href = base_url;
			}
		}
	});
}