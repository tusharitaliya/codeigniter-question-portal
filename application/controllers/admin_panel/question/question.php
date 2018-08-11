<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class question extends CI_Controller
{ 
    function __construct()
    {
		parent::__construct();
		$this->load->model('question_model');
		$this->admin_session = $this->session->userdata('admin_session');
    }

    public function index()
    {
		$blog_data = $this->question_model->get_all_question();
		$data['page_content'] = $blog_data;
		$data['main_content'] = "admin_panel/question/question_list";
		$this->load->view('admin_panel/common_file/template',$data);
    }
	
	public function add()
    {
		$data['main_content'] = "admin_panel/question/add";
		$this->load->view('admin_panel/common_file/template',$data);
    }
	
	public function addquestionoption()
	{	
	?>
		<div class="optionval" id="options<?php echo $_POST['options']?>">
			<div class="form-group">
				<input type="text" class="form-control"  id="option_values<?php echo $_POST['options']?>" name="option_values[]" value="" placeholder="Enter Option" required onchange="addoptionvalue(this.value,'<?php echo $_POST['options']?>');">
				<input type="hidden" id="optionid_<?php echo $_POST['options']?>" name="optionids[]" value="<?php echo $_POST['options']?>">
				<label><input type="radio" name="option_answer" id="aoptionid_<?php echo $_POST['options']?>" value="">Select a correct answer</label>
				<a class="removeclass" onclick="removeoption('<?php echo $_POST['options']?>')">Remove</a>
			</div>
		</div>
	<?php 	  
	}
	
	public function insert_data(){
		$question = $this->input->post('question');
		$option_values = $this->input->post('option_values');
		$optionids = $this->input->post('optionids');
		$option_answer = $this->input->post('option_answer');
		if($option_answer == ''){
			echo "2";
		}else{
			$data['question'] = $question;
			$data['question_option'] = json_encode($option_values);
			$data['right_answer'] = $option_answer;
			$data['created_date'] = date('Y-m-d');
			$insert_id = $this->question_model->insert_question($data);
			if($insert_id != ''){
				echo '1';
			}else{
				echo '0';
			}
		}
	}
}