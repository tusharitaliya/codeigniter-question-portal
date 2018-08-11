<?php
	if ( ! defined("BASEPATH")) exit("No direct script access allowed");
	class question extends CI_Controller
	{ 
		private $perPage = 1;
		function __construct()
		{
			parent::__construct();
			$this->load->model('question_model');
		}
		public function index()
		{
			$data["main_content"] = "question";
			$this->load->view("common_file/template",$data);
		}
		public function get_first_question(){
			$page_id = $_GET['page_id'];
			$this->session->sess_destroy();
			$get_total_question = $this->question_model->get_total_question();
			if($page_id == '1'){
				$get_question = $this->question_model->get_question($this->perPage,0);
			}else{
				$start = ($page_id-1)*$this->perPage;
				$get_question = $this->question_model->get_question($this->perPage,$start);
			}
			foreach($get_question as $gque){
			?>
				<div class="col-sm-12 questioncount">
					<span id="currentquestnnumber"></span> / <?php echo count($get_total_question); ?>
				</div>
				<h3><?php echo $gque['question']; ?></h3>
				<input type="hidden" name="question_ids" id="question_ids" value="<?php echo $gque['question_id']; ?>">
				<input type="hidden" name="total_question" id="total_question" value="<?php echo count($get_total_question); ?>">
				<?php
					$option_array = json_decode($gque['question_option']);
					foreach($option_array as $option){
				?>
					<?php echo "<label><input type='radio' name='optionquestion' value='".$option."'>".$option."</label><br/>"; ?>
				<?php
					} 
				?>
			<?php
			}
		}
		public function get_question(){
			$page_id = $_GET['page_id'];
			$question_ans = $this->input->post('question_ans');
			$question_ids = $this->input->post('question_ids');
			$uqesession = $this->session->userdata('questionsession');
			$get_total_question = $this->question_model->get_total_question();
			if($uqesession != ''){
				$sessiondata = 
				array(
					'question_id'=>$question_ids, 
					'question_ans'=>$question_ans
				);
				$new_session = array_push($_SESSION['questionsession'],$sessiondata);
			}else{
				$sessiondata = 
				array(
					array(
						'question_id'=>$question_ids, 
						'question_ans'=>$question_ans
					) 
				);
				$this->session->set_userdata('questionsession',$sessiondata);
			}
			if($page_id == '1'){
				$get_question = $this->question_model->get_question($this->perPage,0);
			}else{
				$start = ($page_id-1)*$this->perPage;
				$get_question = $this->question_model->get_question($this->perPage,$start);
			}
			foreach($get_question as $gque){
			?>
				<div class="col-sm-12 questioncount">
					<span id="currentquestnnumber"></span> / <?php echo count($get_total_question); ?>
				</div>
				<h3><?php echo $gque['question']; ?></h3>
				<input type="hidden" name="question_ids" id="question_ids" value="<?php echo $gque['question_id']; ?>">
				<input type="hidden" name="total_question" id="total_question" value="<?php echo count($get_total_question); ?>">
				<?php
					$option_array = json_decode($gque['question_option']);
					foreach($option_array as $option){
				?>
					<?php echo "<label><input type='radio' name='optionquestion' value='".$option."'>".$option."</label><br/>"; ?>
				<?php
					} 
				?>
			<?php
			}
		}
		
		function get_finish_button(){
			$question_ans = $this->input->post('question_ans');
			$question_ids = $this->input->post('question_ids');
			$uqesession = $this->session->userdata('questionsession');
			if($uqesession != ''){
				$sessiondata = 
				array(
					'question_id'=>$question_ids, 
					'question_ans'=>$question_ans
				);
				$new_session = array_push($_SESSION['questionsession'],$sessiondata);
			}else{
				$sessiondata = 
				array(
					array(
						'question_id'=>$question_ids, 
						'question_ans'=>$question_ans
					) 
				);
				$this->session->set_userdata('questionsession',$sessiondata);
			}
		?>
			<div class="form-group">
				<span class="applybutton" onclick="finishexam();">Finish Exam</span>
			</div>
		<?php
		}
		
		function finish_exam(){
			$uqesession = $this->session->userdata('questionsession');
			$get_total_question = $this->question_model->get_total_question();
			$right_answer = array();
			$wrong_answer = array();
			for($i=0; $i<count($uqesession); $i++){
				if($uqesession[$i]['question_id'] == $get_total_question[$i]['question_id']){
					if($uqesession[$i]['question_ans'] == $get_total_question[$i]['right_answer']){
						$right_answer[] = 'yes';
					}else{
						$wrong_answer[] = 'no';
					}
				}
			}
			?>
				<h3>Total Question : <?php echo count($get_total_question); ?></h3>
				<h3>Total Correct Answer : <?php echo count($right_answer); ?></h3>
				<h3>Total Wrong Answer : <?php echo count($wrong_answer); ?></h3>
			<?php
		}
	}
?>