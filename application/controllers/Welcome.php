<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
    {
        parent::__construct();
        // $this->load->library('migration');
		$this->load->model('Welcome_model');
    }

	public function index()
	{
		$this->load->view('welcome_message');
	}

    public function run()
    {
        // if ($this->migration->current() === FALSE) {
        if ($this->migration->latest() === FALSE) {
            show_error($this->migration->error_string());
        } else {
            echo 'Migration completed successfully!';
        }
    }

	public function open_add_form()
	{
		$data['input_types'] = $this->Welcome_model->get_all_input_types();
		$this->load->view('admin/add_form', $data);
	}

	public function add_forms()
	{
		$heading = $this->input->post('form_head');
		$description = $this->input->post('form_desc');
		$datas = json_decode($this->input->post('data'));

		$form_insert_id = $this->Welcome_model->insert_form(array(
			'title' => $heading,
			'description' => $description
		));

		if ($form_insert_id) {
			$questions = array();  
			
			foreach ($datas as $key => $data) {
				$question = array();
				$question[$key] =
					array(
						'type'      => $data->type,       
						'question'  => $data->question,   
						'options'   => (array)$data->options, 
						'required'  => $data->required    
					);
				$questions[] = array('question' => json_encode($question), 'form_id' => $form_insert_id);

			}

			$this->Welcome_model->insert_questions($questions);
			echo 'true';
		} else {
			echo "Failed to insert form.";
		}

	}

	public function user_fill_forms()
	{
		$datas = json_decode($this->input->post('data'));
		$mobile = $this->input->post('mobile');
		$form_id = $this->input->post('form_id');
		// $datas = json_decode('[{"question_id":"15","answer":"ganesh"},{"question_id":"16","answer":"male"},{"question_id":"17","answer":["python","php"]},{"question_id":"18","answer":"msc"}]');
		// $mobile = '8999779536';
		// $form_id = 37;

		$user_id = $this->Welcome_model->get_user_data($mobile, $form_id);

		// print_r($user_id);
		// exit;

		if ($user_id == 'already Exist') {
			echo 'already Exist';
		}
		else if($user_id == 'false'){
			echo 'False';
		} else {

			$answers = array();  
			
			foreach ($datas as $data) {
				$answer = array();
				$answer =
					array(
						'question_id'      => $data->question_id,       
						'answer'  => json_encode($data->answer),   
						'user_id'   => $user_id, 
						'form_id'  => $form_id    
					);
				$answers[] = $answer;

			}

			if($this->Welcome_model->user_fill_forms($answers))
			{
				echo 'True';
			}
			else
			{
				echo 'False';
			}
		}

	}

	public function all_forms()
	{
		$data['all_forms'] = $this->Welcome_model->get_all_forms();
		$this->load->view('admin/all_forms', $data);
	}

	public function all_submissions()
	{
		$data['all_submissions'] = $this->Welcome_model->get_all_submissions();
		$this->load->view('admin/all_submissions', $data);

		// print_r($data);
		// exit;
	}

	public function get_submission($id, $user_id)
	{
		$data['submissions'] = $this->Welcome_model->get_submission($id, $user_id);
		$data['form_data'] = $this->Welcome_model->get_form_data($id);
		$this->load->view('admin/get_submission', $data);
		// $que = json_decode($data['submissions'][0]->question); 
		// foreach(json_decode($data['submissions'][0]->question) as $q) print_r($q->question);
		// print_r($data['submissions']);
		// exit;
	}

	public function user_form($id)
	{
		$data['form_data'] = $this->Welcome_model->get_form_data($id);
		$d= $this->Welcome_model->get_form_details($id);
		$data['form_details'] = $d;
		$data['data_count'] = count($d);

		$this->load->view('user_form', $data);
	}
}
