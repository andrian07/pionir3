<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");

class Note extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('global_model');
		$this->load->helper(array('url', 'html'));
	}

	private function check_auth(){
		if(isset($_SESSION['user_name']) == null){
			redirect('Masterdata', 'refresh');
		}else{
			$user_role_id = $_SESSION['user_role_id'];
			$check_auth_nav = $this->global_model->check_auth_nav($user_role_id);
			$array = array(
				'check_auth_nav' => $check_auth_nav,
			);
			return($array);
		}
	}

	public function index()
	{
		$check_auth = $this->check_auth();
		$check_auth['check_auth'] = $check_auth;
		$get_note['get_note'] = $this->global_model->get_note()->result_array();
		$data['data'] = array_merge($get_note, $check_auth);
		$this->load->view('Pages/note', $data);
	}

	public function save_comment()
	{
		$comment = $this->input->post('comment');
		$insert = array(
			'ms_note_text'	=> $comment
		);
		$this->global_model->save_comment($insert);
		$msg = 'Success Tambah';
		echo json_encode(['code'=>200, 'result'=>$msg]);
	}

}

?>
