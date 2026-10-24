<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");

class Masterdata extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('masterdata_model');
		$this->load->model('global_model');
		$this->load->helper(array('url', 'html'));
	}

	public function index(){
		if(isset($_SESSION['user_name']) != null){
			redirect('Dashboard/Admin', 'refresh');
		}else{
			$this->load->view('Pages/login');
		}
	}


	private function check_auth($modul){
		if(isset($_SESSION['user_name']) == null){
			redirect('Masterdata', 'refresh');
		}else{
			$user_role_id = $_SESSION['user_role_id'];
			$check_auth_nav = $this->global_model->check_auth_nav($user_role_id);
			$check_access = $this->global_model->check_access($user_role_id, $modul);
			$array = array(
				'check_auth_nav' => $check_auth_nav,
				'check_access' => $check_access
			);
			return($array);
		}
	}

	private function build_master_stats($rows){
		$total = 0;
		$active = 0;
		$inactive = 0;
		foreach ($rows as $row) {
			$total++;
			if ($row->is_active == 'Y') {
				$active++;
			} else {
				$inactive++;
			}
		}
		return array(
			'total'    => $total,
			'active'   => $active,
			'inactive' => $inactive,
		);
	}


	// brand //
	public function brand()
	{
		$modul = 'Brand';
		$check_auth = $this->check_auth($modul);
		if($check_auth['check_access'][0]->view == 'Y'){
			$brand_list['brand_list'] = $this->masterdata_model->brand_list_all();
			$check_auth['check_auth'] = $check_auth;

			$total_brand = 0;
			$active_brand = 0;
			$inactive_brand = 0;
			$new_this_month = 0;
			$month_start = date('Y-m-01');
			foreach ($brand_list['brand_list'] as $row) {
				$total_brand++;
				if ($row->is_active == 'Y') {
					$active_brand++;
				} else {
					$inactive_brand++;
				}
				if (substr($row->created_at, 0, 10) >= $month_start) {
					$new_this_month++;
				}
			}
			$brand_stats['brand_stats'] = array(
				'total'          => $total_brand,
				'active'         => $active_brand,
				'inactive'       => $inactive_brand,
				'new_this_month' => $new_this_month,
			);

			$data['data'] = array_merge($check_auth, $brand_list, $brand_stats);
			$this->load->view('Pages/Masterdata/brand', $data);
		}else{
			print_r('Tidak Ada Akses');die();
		}
	}

	public function save_brand()
	{
		$modul = 'Brand';
		$check_auth = $this->check_auth($modul);
		if($check_auth['check_access'][0]->add == 'Y'){
			$brand_name = $this->input->post('brand_name');
			$brand_desc = $this->input->post('brand_desc');
			$user_id 	= $_SESSION['user_id'];
			if($brand_name == null){
				$msg = "Nama Brand Harus Di isi";
				echo json_encode(['code'=>0, 'result'=>$msg]);die();
			}
			$insert = array(
				'brand_name'	       => $brand_name,
				'brand_desc'	       => $brand_desc,
			);
			$this->masterdata_model->save_brand($insert);

			$data_insert_act = array(
				'activity_table_desc'	       => 'Tambah Master Brand Baru',
				'activity_table_user'	       => $user_id,
			);
			$this->global_model->save($data_insert_act);
			$msg = "Succes Input";
			echo json_encode(['code'=>200, 'result'=>$msg]);
			die();
		}else{
			$msg = "No Access";
			echo json_encode(['code'=>0, 'result'=>$msg]);
		}
	}

	public function delete_brand()
	{
		$modul = 'Brand';
		$check_auth = $this->check_auth($modul);
		if($check_auth['check_access'][0]->delete == 'Y'){
			$brand_id  	= $this->input->post('id');
			$user_id 	= $_SESSION['user_id'];
			$this->masterdata_model->delete_brand($brand_id);
			$data_insert_act = array(
				'activity_table_desc'	       => 'Hapus Master Brand',
				'activity_table_user'	       => $user_id,
			);
			$this->global_model->save($data_insert_act);
			$msg = "Succes Delete";
			echo json_encode(['code'=>200, 'result'=>$msg]);
			die();
		}else{
			$msg = "No Access";
			echo json_encode(['code'=>0, 'result'=>$msg]);
		}	
	}

	public function edit_brand()
	{
		$modul = 'Brand';
		$check_auth = $this->check_auth($modul);
		if($check_auth['check_access'][0]->edit == 'Y'){
			$brand_id   	   = $this->input->post('brand_id');
			$brand_name   	   = $this->input->post('brand_name_edit');
			$brand_desc        = $this->input->post('brand_desc_edit');
			$user_id 		   = $_SESSION['user_id'];

			if($brand_name == null){
				$msg = "Nama Brand Harus Di isi";
				echo json_encode(['code'=>0, 'result'=>$msg]);die();
			}

			$update = array(
				'brand_name'	       => $brand_name,
				'brand_desc'	       => $brand_desc,
			);

			$this->masterdata_model->update_brand($update, $brand_id);
			$data_insert_act = array(
				'activity_table_desc'	       => 'Ubah Master Brand',
				'activity_table_user'	       => $user_id,
			);
			$this->global_model->save($data_insert_act);
			$msg = "Succes Update";
			echo json_encode(['code'=>200, 'result'=>$msg]);
			die();
		}else{
			$msg = "No Access";
			echo json_encode(['code'=>0, 'result'=>$msg]);
		}	
	}

	/*public function brand_server()
	{
		$draw['draw'] = 1;
		$recordsTotal['recordsTotal'] = 2;
		$recordsFiltered['recordsFiltered'] = 2;
		$data['data'] = $this->masterdata_model->brand_list();
		$data = array_merge($draw, $recordsTotal, $recordsFiltered, $data);
		echo json_encode($data);
	}*/	

	// end brand //

	// customer //

	public function save_customer()
	{	

		$modul = 'Customer';
		$check_auth = $this->check_auth($modul);
		if($check_auth['check_access'][0]->add == 'Y'){
			$customer_name 				= $this->input->post('customer_name');
			$customer_dob 				= $this->input->post('customer_dob');
			$customer_gender	 		= $this->input->post('customer_gender');
			$customer_address 			= $this->input->post('customer_address');
			$customer_address_blok 		= $this->input->post('customer_address_blok');
			$customer_address_no 		= $this->input->post('customer_address_no');
			$customer_address_rt 		= $this->input->post('customer_address_rt');
			$customer_address_rw 		= $this->input->post('customer_address_rw');
			$customer_address_phone 	= $this->input->post('customer_address_phone');
			$customer_address_email 	= $this->input->post('customer_address_email');
			$customer_send_address 		= $this->input->post('customer_send_address');
			$customer_expedisi 			= $this->input->post('customer_expedisi');
			$customer_npwp 				= $this->input->post('customer_npwp');
			$customer_nik 				= $this->input->post('customer_nik');
			$customer_rate 				= $this->input->post('customer_rate');
			$customer_expedisi_text     = $this->input->post('customer_expedisi_text');
			$user_id 		   			= $_SESSION['user_id'];
			$customer_expedisi_tag_id 	= implode(",",$customer_expedisi);

			if($customer_name == null){
				$msg = "Nama Customer Harus Di isi";
				echo json_encode(['code'=>0, 'result'=>$msg]);die();
			}

			if($customer_address_phone == null){
				$msg = "No Hp Harus Di isi";
				echo json_encode(['code'=>0, 'result'=>$msg]);die();
			}

			$customer_code = strtoupper(substr($customer_name, 0, 3));
			$maxCode = $this->masterdata_model->last_customer_code($customer_code);
			if ($maxCode == NULL) {
				$last_code = $customer_code.'001';
			} else {
				$maxCode = $maxCode[0]->customer_code;
				$last_code = substr($maxCode, -3);
				$last_code = $customer_code.substr('000' . strval(floatval($last_code) + 1), -3);
			}

			$data_insert = array(
				'customer_code'	       		=> $last_code,
				'customer_name'	       		=> $customer_name,
				'customer_dob'	       		=> $customer_dob,
				'customer_gender'	    	=> $customer_gender,
				'customer_address'	    	=> $customer_address,
				'customer_address_blok'		=> $customer_address_blok,
				'customer_address_no'		=> $customer_address_no,
				'customer_rt'	       		=> $customer_address_rt,
				'customer_rw'	       		=> $customer_address_rw,
				'customer_phone'	   		=> $customer_address_phone,
				'customer_email'	    	=> $customer_address_email,
				'customer_send_address'		=> $customer_send_address,
				'customer_npwp'	       		=> $customer_npwp,
				'customer_nik'	       		=> $customer_nik,
				'customer_rate'	       		=> $customer_rate,
				'customer_expedisi_tag' 	=> $customer_expedisi_text,
				'customer_expedisi_tag_id' 	=> $customer_expedisi_tag_id

			);
			$this->masterdata_model->save_customer($data_insert);

			foreach($customer_expedisi as $row){
				$insert_exp = array(
					'customer_code'	       	=> $last_code,
					'expedisi_id'	       	=> $row,
				);
				$this->masterdata_model->save_customer_ekspedisi($insert_exp);
			}

			$data_insert_act = array(
				'activity_table_desc'	       => 'Tambah Master Customer',
				'activity_table_user'	       => $user_id,
			);
			$this->global_model->save($data_insert_act);

			$msg = "Succes Input";
			echo json_encode(['code'=>200, 'result'=>$msg]);
			die();
		}else{
			$msg = "No Access";
			echo json_encode(['code'=>0, 'result'=>$msg]);
		}	
	}

	public function edit_customer()
	{
		$modul = 'Customer';
		$check_auth = $this->check_auth($modul);
		if($check_auth['check_access'][0]->edit == 'Y'){
			$customer_id   				= $this->input->post('customer_id');
			$customer_code 				= $this->input->post('customer_code');
			$customer_name 				= $this->input->post('customer_name');
			$customer_dob 				= $this->input->post('customer_dob');
			$customer_gender	 		= $this->input->post('customer_gender');
			$customer_address 			= $this->input->post('customer_address');
			$customer_address_blok 		= $this->input->post('customer_address_blok');
			$customer_address_no 		= $this->input->post('customer_address_no');
			$customer_address_rt 		= $this->input->post('customer_address_rt');
			$customer_address_rw 		= $this->input->post('customer_address_rw');
			$customer_address_phone 	= $this->input->post('customer_address_phone');
			$customer_address_email 	= $this->input->post('customer_address_email');
			$customer_send_address 		= $this->input->post('customer_send_address');
			$customer_expedisi 			= $this->input->post('customer_expedisi');
			$customer_npwp 				= $this->input->post('customer_npwp');
			$customer_nik 				= $this->input->post('customer_nik');
			$customer_rate 				= $this->input->post('customer_rate');
			$customer_expedisi_text     = $this->input->post('customer_expedisi_text');
			$user_id 		   			= $_SESSION['user_id'];
			$customer_expedisi_tag_id 	= implode(",",$customer_expedisi);

			if($customer_name == null){
				$msg = "Nama Customer Harus Di isi";
				echo json_encode(['code'=>0, 'result'=>$msg]);die();
			}

			if($customer_address_phone == null){
				$msg = "No Hp Harus Di isi";
				echo json_encode(['code'=>0, 'result'=>$msg]);die();
			}

			$data_edit = array(
				'customer_name'	       		=> $customer_name,
				'customer_dob'	       		=> $customer_dob,
				'customer_gender'	    	=> $customer_gender,
				'customer_address'	    	=> $customer_address,
				'customer_address_blok'		=> $customer_address_blok,
				'customer_address_no'		=> $customer_address_no,
				'customer_rt'	       		=> $customer_address_rt,
				'customer_rw'	       		=> $customer_address_rw,
				'customer_phone'	   		=> $customer_address_phone,
				'customer_email'	    	=> $customer_address_email,
				'customer_send_address'		=> $customer_send_address,
				'customer_npwp'	       		=> $customer_npwp,
				'customer_nik'	       		=> $customer_nik,
				'customer_rate'	       		=> $customer_rate,
				'customer_expedisi_tag' 	=> $customer_expedisi_text,
				'customer_expedisi_tag_id' 	=> $customer_expedisi_tag_id
			);


			$this->masterdata_model->edit_customer($data_edit, $customer_code);


			$this->masterdata_model->delete_customer_expedisi($customer_code);

			foreach($customer_expedisi as $row){
				$insert_exp = array(
					'customer_code'	       	=> $customer_code,
					'expedisi_id'	       	=> $row,
				);
				$this->masterdata_model->save_customer_ekspedisi($insert_exp);
			}

			$data_insert_act = array(
				'activity_table_desc'	       => 'Ubah Master Customer',
				'activity_table_user'	       => $user_id,
			);
			$this->global_model->save($data_insert_act);

			$msg = "Succes Input";
			echo json_encode(['code'=>200, 'result'=>$msg]);
			die();
		}else{
			$msg = "No Access";
			echo json_encode(['code'=>0, 'result'=>$msg]);
		}	
	}

	public function customer(){
		$modul = 'Customer';
		$check_auth = $this->check_auth($modul);
		if($check_auth['check_access'][0]->view == 'Y'){
			$customer_list['customer_list'] = $this->masterdata_model->customer_list_all();
			$ekspedisi_list['ekspedisi_list'] = $this->masterdata_model->ekspedisi_list();
			$check_auth['check_auth'] = $check_auth;

			$total_customer = 0;
			$active_customer = 0;
			$inactive_customer = 0;
			$new_this_month = 0;
			$month_start = date('Y-m-01');
			foreach ($customer_list['customer_list'] as $row) {
				$total_customer++;
				if ($row->is_active == 'Y') {
					$active_customer++;
				} else {
					$inactive_customer++;
				}
				if (substr($row->created_at, 0, 10) >= $month_start) {
					$new_this_month++;
				}
			}
			$stats['stats'] = array(
				'total'          => $total_customer,
				'active'         => $active_customer,
				'inactive'       => $inactive_customer,
				'new_this_month' => $new_this_month,
			);

			$data['data'] = array_merge($customer_list, $ekspedisi_list, $check_auth, $stats);
			$this->load->view('Pages/Masterdata/customer', $data);
		}else{
			$msg = "No Access";
			echo json_encode(['code'=>0, 'result'=>$msg]);
		}
	}

	public function detailcustomer(){
		$modul = 'Customer';
		$check_auth = $this->check_auth($modul);
		if(($check_auth['check_access'][0]->view == 'Y')){
			$id = $this->input->get('id');
			$get_customer_by_id['get_customer_by_id'] = $this->masterdata_model->get_customer_by_id($id);
			$this->load->view('Pages/Masterdata/customer_detail', $get_customer_by_id);
		}else{
			$msg = "No Access";
			echo json_encode(['code'=>0, 'result'=>$msg]);
		}
	}


	public function get_customer_id(){
		$id = $this->input->post('id');
		$get_customer_by_id['get_customer_by_id'] = $this->masterdata_model->get_customer_by_id($id);
		echo json_encode(['code'=>200, 'result'=>$get_customer_by_id]);
	}

	public function delete_customer()
	{
		$modul = 'Customer';
		$check_auth = $this->check_auth($modul);
		if($check_auth['check_access'][0]->delete == 'Y'){
			$customer_id  	= $this->input->post('id');
			$user_id 		= $_SESSION['user_id'];
			$this->masterdata_model->delete_customer($customer_id);
			$data_insert_act = array(
				'activity_table_desc'	       => 'Hapus Master Customer',
				'activity_table_user'	       => $user_id,
			);
			$this->global_model->save($data_insert_act);
			$msg = "Succes Delete";
			echo json_encode(['code'=>200, 'result'=>$msg]);
			die();
		}else{
			$msg = "No Access";
			echo json_encode(['code'=>0, 'result'=>$msg]);
		}	
	}
	// end customer //

	// ekspedisi //
	public function ekspedisi(){
		$modul = 'Ekspedisi';
		$check_auth = $this->check_auth($modul);
		if($check_auth['check_access'][0]->view == 'Y'){
			$ekspedisi_list['ekspedisi_list'] = $this->masterdata_model->ekspedisi_list_all();
			$check_auth['check_auth'] = $check_auth;
			$stats['stats'] = $this->build_master_stats($ekspedisi_list['ekspedisi_list']);
			$data['data'] = array_merge($check_auth, $ekspedisi_list, $stats);
			$this->load->view('Pages/Masterdata/expedisi', $data);
		}else{
			$msg = "No Access";
			echo json_encode(['code'=>0, 'result'=>$msg]);
		}
	}

	public function save_ekspedisi()
	{
		$modul = 'Ekspedisi';
		$check_auth = $this->check_auth($modul);
		if($check_auth['check_access'][0]->add == 'Y'){
			$expedisi_name 		= $this->input->post('expedisi_name');
			$expedisi_address 	= $this->input->post('expedisi_address');
			$expedisi_phone 	= $this->input->post('expedisi_phone');
			$expedisi_desc 		= $this->input->post('expedisi_desc');
			$user_id 			= $_SESSION['user_id'];

			if($expedisi_name == null){
				$msg = "Nama Ekspedisi Harus Di isi";
				echo json_encode(['code'=>0, 'result'=>$msg]);die();
			}
			$insert = array(
				'ekspedisi_name'	=> $expedisi_name,
				'ekspedisi_phone'	=> $expedisi_address,
				'ekspedisi_address'	=> $expedisi_phone,
				'ekspedisi_desc'	=> $expedisi_desc
			);
			$this->masterdata_model->save_ekspedisi($insert);

			$data_insert_act = array(
				'activity_table_desc'	       => 'Tambah Master Ekspedisi Baru',
				'activity_table_user'	       => $user_id,
			);
			$this->global_model->save($data_insert_act);
			$msg = "Succes Input";
			echo json_encode(['code'=>200, 'result'=>$msg]);
			die();
		}else{
			$msg = "No Access";
			echo json_encode(['code'=>0, 'result'=>$msg]);
		}
	}


	public function edit_ekspedisi()
	{
		$modul = 'Ekspedisi';
		$check_auth = $this->check_auth($modul);
		if($check_auth['check_access'][0]->edit == 'Y'){
			$expedisi_id 		= $this->input->post('expedisi_id');
			$expedisi_name 		= $this->input->post('expedisi_name');
			$expedisi_address 	= $this->input->post('expedisi_address');
			$expedisi_phone 	= $this->input->post('expedisi_phone');
			$expedisi_desc 		= $this->input->post('expedisi_desc');
			$user_id 			= $_SESSION['user_id'];

			if($expedisi_name == null){
				$msg = "Nama Ekspedisi Harus Di isi";
				echo json_encode(['code'=>0, 'result'=>$msg]);die();
			}

			$data_edit = array(
				'ekspedisi_name'	=> $expedisi_name,
				'ekspedisi_phone'	=> $expedisi_address,
				'ekspedisi_address'	=> $expedisi_phone,
				'ekspedisi_desc'	=> $expedisi_desc
			);
			$this->masterdata_model->edit_ekspedisi($data_edit, $expedisi_id);

			$data_insert_act = array(
				'activity_table_desc'	       => 'Ubah Master Ekspedisi Baru',
				'activity_table_user'	       => $user_id,
			);
			$this->global_model->save($data_insert_act);
			$msg = "Succes Input";
			echo json_encode(['code'=>200, 'result'=>$msg]);
			die();
		}else{
			$msg = "No Access";
			echo json_encode(['code'=>0, 'result'=>$msg]);
		}
	}


	public function delete_ekspedisi()
	{
		$modul = 'Ekspedisi';
		$check_auth = $this->check_auth($modul);
		if($check_auth['check_access'][0]->delete == 'Y'){
			$expedisi_id  	= $this->input->post('id');
			$user_id 		= $_SESSION['user_id'];
			$this->masterdata_model->delete_ekspedisi($expedisi_id);
			$data_insert_act = array(
				'activity_table_desc'	       => 'Hapus Master Ekspedisi',
				'activity_table_user'	       => $user_id,
			);
			$this->global_model->save($data_insert_act);
			$msg = "Succes Delete";
			echo json_encode(['code'=>200, 'result'=>$msg]);
			die();
		}else{
			$msg = "No Access";
			echo json_encode(['code'=>0, 'result'=>$msg]);
		}	
	}

	// end ekspedisi //

	// warehouse
	public function warehouse(){
		$modul = 'Warehouse';
		$check_auth = $this->check_auth($modul);
		if($check_auth['check_access'][0]->view == 'Y'){
			$warehouse_list['warehouse_list'] = $this->masterdata_model->warehouse_list_all();
			$check_auth['check_auth'] = $check_auth;
			$stats['stats'] = $this->build_master_stats($warehouse_list['warehouse_list']);
			$data['data'] = array_merge($check_auth, $warehouse_list, $stats);
			$this->load->view('Pages/Masterdata/warehouse', $data);
		}else{
			$msg = "No Access";
			echo json_encode(['code'=>0, 'result'=>$msg]);
		}
	}

	public function save_warehouse()
	{
		$modul = 'Warehouse';
		$check_auth = $this->check_auth($modul);
		if($check_auth['check_access'][0]->add == 'Y'){
			$warehouse_code 	= $this->input->post('warehouse_code');
			$warehouse_name 	= $this->input->post('warehouse_name');
			$warehouse_address 	= $this->input->post('warehouse_address');
			$user_id 			= $_SESSION['user_id'];

			if($warehouse_code == null){
				$msg = "Kode Gudang Harus Di isi";
				echo json_encode(['code'=>0, 'result'=>$msg]);die();
			}

			if($warehouse_name == null){
				$msg = "Nama Gudang Harus Di isi";
				echo json_encode(['code'=>0, 'result'=>$msg]);die();
			}
			$insert = array(
				'warehouse_code'	=> $warehouse_code,
				'warehouse_name'	=> $warehouse_name,
				'warehouse_address'	=> $warehouse_address
			);
			$this->masterdata_model->save_warehouse($insert);

			$data_insert_act = array(
				'activity_table_desc'	       => 'Tambah Master Gudang Baru',
				'activity_table_user'	       => $user_id,
			);
			$this->global_model->save($data_insert_act);
			$msg = "Succes Input";
			echo json_encode(['code'=>200, 'result'=>$msg]);
			die();
		}else{
			$msg = "No Access";
			echo json_encode(['code'=>0, 'result'=>$msg]);
		}
	}

	public function edit_warehouse()
	{
		$modul = 'Warehouse';
		$check_auth = $this->check_auth($modul);
		if($check_auth['check_access'][0]->edit == 'Y'){
			$warehouse_id 	 	= $this->input->post('warehouse_id');
			$warehouse_code 	= $this->input->post('warehouse_code');
			$warehouse_name 	= $this->input->post('warehouse_name');
			$warehouse_address 	= $this->input->post('warehouse_address');
			$user_id 			= $_SESSION['user_id'];

			if($warehouse_code == null){
				$msg = "Kode Gudang Harus Di isi";
				echo json_encode(['code'=>0, 'result'=>$msg]);die();
			}

			if($warehouse_name == null){
				$msg = "Nama Gudang Harus Di isi";
				echo json_encode(['code'=>0, 'result'=>$msg]);die();
			}

			$data_edit = array(
				'warehouse_code'	=> $warehouse_code,
				'warehouse_name'	=> $warehouse_name,
				'warehouse_address'	=> $warehouse_address
			);
			$this->masterdata_model->edit_warehouse($data_edit, $warehouse_id);

			$data_insert_act = array(
				'activity_table_desc'	       => 'Ubah Master Gudang',
				'activity_table_user'	       => $user_id,
			);
			$this->global_model->save($data_insert_act);
			$msg = "Succes Input";
			echo json_encode(['code'=>200, 'result'=>$msg]);
			die();
		}else{
			$msg = "No Access";
			echo json_encode(['code'=>0, 'result'=>$msg]);
		}
	}
	public function delete_warehouse()
	{
		$modul = 'Warehouse';
		$check_auth = $this->check_auth($modul);
		if($check_auth['check_access'][0]->delete == 'Y'){
			$warehouse_id  	= $this->input->post('id');
			$user_id 		= $_SESSION['user_id'];
			$this->masterdata_model->delete_warehouse($warehouse_id);
			$data_insert_act = array(
				'activity_table_desc'	       => 'Hapus Master Gudang',
				'activity_table_user'	       => $user_id,
			);
			$this->global_model->save($data_insert_act);
			$msg = "Succes Delete";
			echo json_encode(['code'=>200, 'result'=>$msg]);
			die();
		}else{
			$msg = "No Access";
			echo json_encode(['code'=>0, 'result'=>$msg]);
		}
	}

	
	// end warehouse


	// category
	public function category(){
		$modul = 'Category';
		$check_auth = $this->check_auth($modul);
		if($check_auth['check_access'][0]->view == 'Y'){
			$category_list['category_list'] = $this->masterdata_model->category_list_all();
			$check_auth['check_auth'] = $check_auth;
			$stats['stats'] = $this->build_master_stats($category_list['category_list']);
			$data['data'] = array_merge($check_auth, $category_list, $stats);
			$this->load->view('Pages/Masterdata/category', $data);
		}else{
			$msg = "No Access";
			echo json_encode(['code'=>0, 'result'=>$msg]);
		}
	}

	public function save_category()
	{
		$modul = 'Category';
		$check_auth = $this->check_auth($modul);
		if($check_auth['check_access'][0]->add == 'Y'){
			$category_name 	= $this->input->post('category_name');
			$category_desc 	= $this->input->post('category_desc');
			$user_id 			= $_SESSION['user_id'];

			if($category_name == null){
				$msg = "Nama Kategori Harus Di isi";
				echo json_encode(['code'=>0, 'result'=>$msg]);die();
			}
			$insert = array(
				'category_name'	=> $category_name,
				'category_desc'	=> $category_desc
			);
			$this->masterdata_model->save_category($insert);

			$data_insert_act = array(
				'activity_table_desc'	       => 'Tambah Kategori Baru',
				'activity_table_user'	       => $user_id,
			);
			$this->global_model->save($data_insert_act);
			$msg = "Succes Input";
			echo json_encode(['code'=>200, 'result'=>$msg]);
			die();
		}else{
			$msg = "No Access";
			echo json_encode(['code'=>0, 'result'=>$msg]);
		}
	}

	public function edit_category()
	{
		$modul = 'Category';
		$check_auth = $this->check_auth($modul);
		if($check_auth['check_access'][0]->edit == 'Y'){
			$category_id 	= $this->input->post('category_id');
			$category_name 	= $this->input->post('category_name');
			$category_desc 	= $this->input->post('category_desc');
			$user_id 			= $_SESSION['user_id'];

			if($category_name == null){
				$msg = "Nama Kategori Harus Di isi";
				echo json_encode(['code'=>0, 'result'=>$msg]);die();
			}

			$data_edit = array(
				'category_name'	=> $category_name,
				'category_desc'	=> $category_desc
			);
			$this->masterdata_model->edit_category($data_edit, $category_id);

			$data_insert_act = array(
				'activity_table_desc'	       => 'Ubah Master Kategori',
				'activity_table_user'	       => $user_id,
			);
			$this->global_model->save($data_insert_act);
			$msg = "Succes Input";
			echo json_encode(['code'=>200, 'result'=>$msg]);
			die();
		}else{
			$msg = "No Access";
			echo json_encode(['code'=>0, 'result'=>$msg]);
		}
	}

	public function delete_category()
	{
		$modul = 'Category';
		$check_auth = $this->check_auth($modul);
		if($check_auth['check_access'][0]->delete == 'Y'){
			$category_id  	= $this->input->post('id');
			$user_id 		= $_SESSION['user_id'];
			$this->masterdata_model->delete_category($category_id);
			$data_insert_act = array(
				'activity_table_desc'	       => 'Hapus Master Kategori',
				'activity_table_user'	       => $user_id,
			);
			$this->global_model->save($data_insert_act);
			$msg = "Succes Delete";
			echo json_encode(['code'=>200, 'result'=>$msg]);
			die();
		}else{
			$msg = "No Access";
			echo json_encode(['code'=>0, 'result'=>$msg]);
		}
	}
	// end category

	// salesman
	public function salesman(){
		$modul = 'Salesman';
		$check_auth = $this->check_auth($modul);
		if($check_auth['check_access'][0]->view == 'Y'){
			$salesman_list['salesman_list'] = $this->masterdata_model->salesman_list_all();
			$warehouse_list['warehouse_list'] = $this->masterdata_model->warehouse_list();
			$check_auth['check_auth'] = $check_auth;
			$stats['stats'] = $this->build_master_stats($salesman_list['salesman_list']);
			$data['data'] = array_merge($check_auth, $salesman_list, $warehouse_list, $stats);
			$this->load->view('Pages/Masterdata/salesman', $data);
		}else{
			$msg = "No Access";
			echo json_encode(['code'=>0, 'result'=>$msg]);
		}
	}

	public function save_salesman()
	{
		$modul = 'Salesman';
		$check_auth = $this->check_auth($modul);
		if($check_auth['check_access'][0]->add == 'Y'){
			$salesman_name 		= $this->input->post('salesman_name');
			$salesman_phone 	= $this->input->post('salesman_phone');
			$salesman_address 	= $this->input->post('salesman_address');
			$salesman_branch 	= $this->input->post('salesman_branch');
			$user_id 			= $_SESSION['user_id'];

			if($salesman_name == null){
				$msg = "Nama Salesman Harus Di isi";
				echo json_encode(['code'=>0, 'result'=>$msg]);die();
			}
			$insert = array(
				'salesman_name'		=> $salesman_name,
				'salesman_address'	=> $salesman_address,
				'salesman_phone'	=> $salesman_phone,
				'salesman_branch'	=> $salesman_branch
			);
			$this->masterdata_model->save_salesman($insert);

			$data_insert_act = array(
				'activity_table_desc'	       => 'Tambah Salesman Baru',
				'activity_table_user'	       => $user_id,
			);
			$this->global_model->save($data_insert_act);
			$msg = "Succes Input";
			echo json_encode(['code'=>200, 'result'=>$msg]);
			die();
		}else{
			$msg = "No Access";
			echo json_encode(['code'=>0, 'result'=>$msg]);
		}
	}

	public function edit_salesman()
	{

		$modul = 'Salesman';
		$check_auth = $this->check_auth($modul);
		if($check_auth['check_access'][0]->edit == 'Y'){
			$salesman_id	 	= $this->input->post('salesman_id');
			$salesman_name 		= $this->input->post('salesman_name');
			$salesman_phone 	= $this->input->post('salesman_phone');
			$salesman_address 	= $this->input->post('salesman_address');
			$salesman_branch 	= $this->input->post('salesman_branch');
			$user_id 			= $_SESSION['user_id'];

			if($salesman_name == null){
				$msg = "Nama Salesman Harus Di isi";
				echo json_encode(['code'=>0, 'result'=>$msg]);die();
			}

			$data_edit = array(
				'salesman_name'		=> $salesman_name,
				'salesman_address'	=> $salesman_address,
				'salesman_phone'	=> $salesman_phone,
				'salesman_branch'	=> $salesman_branch
			);
			$this->masterdata_model->edit_salesman($data_edit, $salesman_id);

			$data_insert_act = array(
				'activity_table_desc'	       => 'Ubah Master Salesman',
				'activity_table_user'	       => $user_id,
			);
			$this->global_model->save($data_insert_act);
			$msg = "Succes Input";
			echo json_encode(['code'=>200, 'result'=>$msg]);
			die();
		}else{
			$msg = "No Access";
			echo json_encode(['code'=>0, 'result'=>$msg]);
		}
	}

	public function delete_salesman()
	{
		$modul = 'Salesman';
		$check_auth = $this->check_auth($modul);
		if($check_auth['check_access'][0]->delete == 'Y'){
			$salesman_id  	= $this->input->post('id');
			$user_id 		= $_SESSION['user_id'];
			$this->masterdata_model->delete_salesman($salesman_id);
			$data_insert_act = array(
				'activity_table_desc'	       => 'Hapus Master Salesman',
				'activity_table_user'	       => $user_id,
			);
			$this->global_model->save($data_insert_act);
			$msg = "Succes Delete";
			echo json_encode(['code'=>200, 'result'=>$msg]);
			die();
		}else{
			$msg = "No Access";
			echo json_encode(['code'=>0, 'result'=>$msg]);
		}
	}


	public function detailsalesman(){
		$modul = 'Salesman';
		$check_auth = $this->check_auth($modul);
		if($check_auth['check_access'][0]->view == 'Y'){
			$id = $this->input->get('id');
			$salesman_detail['salesman_detail'] = $this->masterdata_model->salesman_detail($id);
			$this->load->view('Pages/Masterdata/salesman_detail', $salesman_detail);
		}
	}

	// end salesman

	//unit
	public function unit(){
		$modul = 'Unit';
		$check_auth = $this->check_auth($modul);
		if($check_auth['check_access'][0]->view == 'Y'){
			$unit_list['unit_list'] = $this->masterdata_model->unit_list_all();
			$check_auth['check_auth'] = $check_auth;
			$stats['stats'] = $this->build_master_stats($unit_list['unit_list']);
			$data['data'] = array_merge($check_auth, $unit_list, $stats);
			$this->load->view('Pages/Masterdata/unit', $data);
		}else{
			$msg = "No Access";
			echo json_encode(['code'=>0, 'result'=>$msg]);
		}
	}

	public function save_unit()
	{
		$modul = 'Unit';
		$check_auth = $this->check_auth($modul);
		if($check_auth['check_access'][0]->add == 'Y'){
			$unit_name 	= $this->input->post('unit_name');
			$unit_desc 	= $this->input->post('unit_desc');
			$user_id 	= $_SESSION['user_id'];

			if($unit_name == null){
				$msg = "Nama Unit Harus Di isi";
				echo json_encode(['code'=>0, 'result'=>$msg]);die();
			}
			$insert = array(
				'unit_name'		=> $unit_name,
				'unit_desc'		=> $unit_desc
			);
			$this->masterdata_model->save_unit($insert);

			$data_insert_act = array(
				'activity_table_desc'	       => 'Tambah Satuan Baru',
				'activity_table_user'	       => $user_id,
			);
			$this->global_model->save($data_insert_act);
			$msg = "Succes Input";
			echo json_encode(['code'=>200, 'result'=>$msg]);
			die();
		}else{
			$msg = "No Access";
			echo json_encode(['code'=>0, 'result'=>$msg]);
		}
	}

	public function edit_unit()
	{
		
		$modul = 'Unit';
		$check_auth = $this->check_auth($modul);
		if($check_auth['check_access'][0]->edit == 'Y'){
			$unit_id 	= $this->input->post('unit_id');
			$unit_name 	= $this->input->post('unit_name');
			$unit_desc 	= $this->input->post('unit_desc');
			$user_id 	= $_SESSION['user_id'];

			if($unit_name == null){
				$msg = "Nama Unit Harus Di isi";
				echo json_encode(['code'=>0, 'result'=>$msg]);die();
			}
			$data_edit = array(
				'unit_name'		=> $unit_name,
				'unit_desc'		=> $unit_desc
			);

			$this->masterdata_model->edit_unit($data_edit, $unit_id);

			$data_insert_act = array(
				'activity_table_desc'	       => 'Ubah Master Satuan',
				'activity_table_user'	       => $user_id,
			);
			$this->global_model->save($data_insert_act);
			$msg = "Succes Input";
			echo json_encode(['code'=>200, 'result'=>$msg]);
			die();
		}else{
			$msg = "No Access";
			echo json_encode(['code'=>0, 'result'=>$msg]);
		}
	}

	public function delete_unit()
	{
		$modul = 'Unit';
		$check_auth = $this->check_auth($modul);
		if($check_auth['check_access'][0]->delete == 'Y'){
			$unit_id  		= $this->input->post('id');
			$user_id 		= $_SESSION['user_id'];
			$this->masterdata_model->delete_unit($unit_id);
			$data_insert_act = array(
				'activity_table_desc'	       => 'Hapus Master Satuan',
				'activity_table_user'	       => $user_id,
			);
			$this->global_model->save($data_insert_act);
			$msg = "Succes Delete";
			echo json_encode(['code'=>200, 'result'=>$msg]);
			die();
		}else{
			$msg = "No Access";
			echo json_encode(['code'=>0, 'result'=>$msg]);
		}
	}
	// end unit

	//supplier
	public function supplier(){
		$modul = 'Supplier';
		$check_auth = $this->check_auth($modul);
		if($check_auth['check_access'][0]->view == 'Y'){
			$supplier_list['supplier_list'] = $this->masterdata_model->supplier_list_all();
			$check_auth['check_auth'] = $check_auth;
			$stats['stats'] = $this->build_master_stats($supplier_list['supplier_list']);
			$data['data'] = array_merge($check_auth, $supplier_list, $stats);
			$this->load->view('Pages/Masterdata/supplier', $data);
		}else{
			$msg = "No Access";
			echo json_encode(['code'=>0, 'result'=>$msg]);
		}
	}

	public function save_supplier()
	{
		$modul = 'Supplier';
		$check_auth = $this->check_auth($modul);
		if($check_auth['check_access'][0]->add == 'Y'){
			$supplier_name 		= $this->input->post('supplier_name');
			$supplier_telp 		= $this->input->post('supplier_telp');
			$supplier_address 	= $this->input->post('supplier_address');
			$user_id 			= $_SESSION['user_id'];

			if($supplier_name == null){
				$msg = "Nama Supplier Harus Di isi";
				echo json_encode(['code'=>0, 'result'=>$msg]);die();
			}

			$supplier_code = strtoupper(substr($supplier_name, 0, 2));
			$maxCode = $this->masterdata_model->get_last_supplier();
			if ($maxCode == NULL) {
				$last_code = $supplier_code.'-'.'001';
			} else {
				$maxCode = $maxCode[0]->supplier_code;
				$last_code = substr($maxCode, -3);
				$last_code = $supplier_code.'-'.substr('000' . strval(floatval($last_code) + 1), -3);
			}

			$insert = array(
				'supplier_code'		=> $last_code,
				'supplier_name'		=> $supplier_name,
				'supplier_address'	=> $supplier_address,
				'supplier_phone'	=> $supplier_telp
			);
			$this->masterdata_model->save_supplier($insert);

			$data_insert_act = array(
				'activity_table_desc'	       => 'Tambah Supplier Baru',
				'activity_table_user'	       => $user_id,
			);
			$this->global_model->save($data_insert_act);
			$msg = "Succes Input";
			echo json_encode(['code'=>200, 'result'=>$msg]);
			die();
		}else{
			$msg = "No Access";
			echo json_encode(['code'=>0, 'result'=>$msg]);
		}
	}

	public function edit_supplier()
	{
		
		$modul = 'Supplier';
		$check_auth = $this->check_auth($modul);
		if($check_auth['check_access'][0]->edit == 'Y'){
			$supplier_id 		= $this->input->post('supplier_id');
			$supplier_name 		= $this->input->post('supplier_name');
			$supplier_telp 		= $this->input->post('supplier_telp');
			$supplier_address 	= $this->input->post('supplier_address');
			$user_id 			= $_SESSION['user_id'];

			if($supplier_name == null){
				$msg = "Nama Supplier Harus Di isi";
				echo json_encode(['code'=>0, 'result'=>$msg]);die();
			}

			$data_edit = array(
				'supplier_name'		=> $supplier_name,
				'supplier_address'	=> $supplier_address,
				'supplier_phone'	=> $supplier_telp
			);

			$this->masterdata_model->edit_supplier($data_edit, $supplier_id);

			$data_insert_act = array(
				'activity_table_desc'	       => 'Ubah Master Supplier',
				'activity_table_user'	       => $user_id,
			);
			$this->global_model->save($data_insert_act);
			$msg = "Succes Input";
			echo json_encode(['code'=>200, 'result'=>$msg]);
			die();
		}else{
			$msg = "No Access";
			echo json_encode(['code'=>0, 'result'=>$msg]);
		}
	}

	public function delete_supplier()
	{
		$modul = 'Supplier';
		$check_auth = $this->check_auth($modul);
		if($check_auth['check_access'][0]->delete == 'Y'){
			$supplier_id  		= $this->input->post('id');
			$user_id 			= $_SESSION['user_id'];
			$this->masterdata_model->delete_supplier($supplier_id);
			$data_insert_act = array(
				'activity_table_desc'	       => 'Hapus Master Supplier',
				'activity_table_user'	       => $user_id,
			);
			$this->global_model->save($data_insert_act);
			$msg = "Succes Delete";
			echo json_encode(['code'=>200, 'result'=>$msg]);
			die();
		}else{
			$msg = "No Access";
			echo json_encode(['code'=>0, 'result'=>$msg]);
		}
	}
	//end supplier


	//product
	public function product(){
		$modul = 'Product';
		$check_auth = $this->check_auth($modul);
		if($check_auth['check_access'][0]->view == 'Y'){
			$category_list['category_list'] = $this->masterdata_model->category_list();
			$brand_list['brand_list'] 		= $this->masterdata_model->brand_list();
			$supplier_list['supplier_list'] = $this->masterdata_model->supplier_list();
			$unit_list['unit_list'] 		= $this->masterdata_model->unit_list();
			$check_auth['check_auth'] 		= $check_auth;

			$product_status_counts = $this->masterdata_model->product_stats();
			$total_product = 0;
			$active_product = 0;
			$inactive_product = 0;
			foreach ($product_status_counts as $row) {
				$total_product += (int) $row->total;
				if ($row->product_status == 'Aktif') {
					$active_product += (int) $row->total;
				} else {
					$inactive_product += (int) $row->total;
				}
			}
			$stats['stats'] = array(
				'total'    => $total_product,
				'active'   => $active_product,
				'inactive' => $inactive_product,
			);

			$data['data'] = array_merge($check_auth, $category_list, $brand_list, $supplier_list, $unit_list, $stats);
			$this->load->view('Pages/Masterdata/product', $data);
		}else{
			$msg = "No Access";
			echo json_encode(['code'=>0, 'result'=>$msg]);
		}
	}	

	public function product_list()
	{
		
		$modul = 'Product';
		$check_auth = $this->check_auth($modul);
		if($check_auth['check_access'][0]->view == 'Y'){
			$search 			= $this->input->post('search');
			$length 			= $this->input->post('length');
			$start 			  	= $this->input->post('start');
			$supplier_filter = $this->input->post('filter_supplier');
			$category_filter = $this->input->post('filter_category');
			$brand_filter = $this->input->post('filter_brand');
			$product_status_filter = $this->input->post('filter_product_status');
			$in_transit_filter = $this->input->post('filter_in_transit');
			$user_id = $_SESSION['user_id'];

			if($search != null){
				$search = $search['value'];
			}
			$user_id = $_SESSION['user_id'];
			$check_role_product = $this->global_model->check_role_product($user_id)->result_array();
			$list = $this->masterdata_model->product_list($search, $length, $start, $supplier_filter, $category_filter, $brand_filter,$product_status_filter, $in_transit_filter)->result_array();
			$count_list = $this->masterdata_model->product_list_count($search, $supplier_filter, $category_filter, $brand_filter,$product_status_filter, $in_transit_filter)->result_array();
			$total_row = $count_list[0]['total_row'];
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $field) {

				if($field['is_ppn'] == 'PPN'){
					$prodcut_ppn = '<span class="badge badge-success"><i class="fas fa-check-circle"></i></span>';
				}else{
					$prodcut_ppn = '<span class="badge badge-danger multi-badge"><i class="fas fa-times-circle"></i></span>';
				}

				if($field['is_package'] == 'Y'){
					$product_package = '<span class="badge badge-success"><i class="fas fa-check-circle"></i></span>';
				}else{
					$product_package = '<span class="badge badge-danger multi-badge"><i class="fas fa-times-circle"></i></span>';
				}

				if($check_auth['check_access'][0]->edit == 'Y'){
					$edit = '<button type="button" class="btn btn-icon btn-warning btn-sm mb-2-btn" data-bs-toggle="modal" data-bs-target="#exampleModaledit" data-id="'.$field['product_id'].'" data-name="'.$field['product_name'].'"><i class="fas fa-edit sizing-fa"></i></button> <button type="button" class="btn btn-icon btn-info btn-sm mb-2-btn btnprice" onclick="setprice('.$field['product_id'].')""><i class="fas fa-cog sizing-fa"></i></button> ';
				}else{
					$edit = '<button type="button" class="btn btn-icon btn-warning btn-sm mb-2-btn" disabled="disabled"><i class="fas fa-edit sizing-fa"></i></button> <button type="button" class="btn btn-icon btn-info btn-sm mb-2-btn" disabled="disabled"><i class="fas fa-cog sizing-fa"></i></button> ';
				}

				if($check_auth['check_access'][0]->delete == 'Y'){
					$delete = '<button type="button" class="btn btn-icon btn-danger delete btn-sm mb-2-btn" onclick="deletes('.$field['product_id'].')"><i class="fas fa-trash-alt sizing-fa"></i></button> ';
				}else{
					$delete = '<button type="button" class="btn btn-icon btn-danger delete btn-sm mb-2-btn"  disabled="disabled"><i class="fas fa-trash-alt sizing-fa"></i></button> ';
				}

				$product_sell_price_1 = '<span class="badge badge-primary">'.number_format($field['product_sell_price_1']).'</span>';

				if($field['product_po_status'] > 0){
					$intransit   = 'Intransit';
				}else{
					$intransit   = 'None';
				}


				if($field['product_status'] == 'Aktif'){
					$product_status = '<span class="badge badge-success">Aktif</span>';
				}else if($field['product_status'] == 'Tidak Aktif'){
					$product_status = '<span class="badge badge-danger">Tidak Aktif</span>';
				}else{
					$product_status = '<span class="badge badge-warning">Discontinue</span>';
				}
				
				if($check_role_product[0]['access_supplier'] == 'Y'){
					$product_tag = $field['product_supplier_tag'];
				}else{
					$product_tag = '-';
				}

				$url_image = base_url().'assets/products/'.$field['product_image'];
				$no++;
				$row = array();
				$row[] = '<h2 class="table-product">'.$field['product_code'].'</h3><p>'.$field['product_name'].'</p>';
				$row[] = $field['unit_name'];
				$row[] = $field['brand_name'];
				$row[] = $field['category_name'];
				$row[] = $product_sell_price_1;
				$row[] = $product_tag;
				$row[] = $product_status;
				$row[] = $intransit;
				$row[] = $product_package;
				$row[] = $prodcut_ppn;
				$row[] = '<img src="'.$url_image.'" width="50%" onerror="this.onerror=null;this.src=\''.base_url().'assets/products/default.png\';">';
				$row[] = $edit.$delete;
				$data[] = $row;
			}

			$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $total_row,
				"recordsFiltered" => $total_row,
				"data" => $data,
			);
			echo json_encode($output);
		}else{
			$msg = "No Access";
			echo json_encode(['code'=>0, 'result'=>$msg]);die();
		}

	}	

	function generateRandomString($length = 10) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';

		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[random_int(0, $charactersLength - 1)];
		}

		return $randomString;
	}

	public function save_product()
	{
		$modul = 'Product';
		$check_auth = $this->check_auth($modul);
		if($check_auth['check_access'][0]->add == 'Y'){
			$screenshoot 				= $this->input->post('screenshoot');
			$product_name 				= $this->input->post('product_name');
			$product_category 			= $this->input->post('product_category');
			$product_brand				= $this->input->post('product_brand');
			$product_supplier 			= $this->input->post('product_supplier');
			$product_supplier_text      = $this->input->post('product_supplier_text');
			$product_item_supplier  	= $this->input->post('product_item_supplier');
			$product_tax 				= $this->input->post('product_tax');
			$product_unit 				= $this->input->post('product_unit');
			$product_type 				= $this->input->post('product_type');
			$product_purchase_record 	= $this->input->post('product_purchase_record');
			$product_min_stock			= $this->input->post('product_min_stock');
			$product_min_order			= $this->input->post('product_min_order');
			$product_weight				= $this->input->post('product_weight');
			$product_location			= $this->input->post('product_location');
			$product_description		= $this->input->post('product_description');
			$product_search_key			= $this->input->post('product_search_key');
			$user_id 					= $_SESSION['user_id'];
			$product_supplier_id_tag 	= implode(",",$product_supplier);


			$product_code = strtoupper(substr($product_name ?? '', 0, 3));
			$maxCode = $this->masterdata_model->last_product_code();
			if ($maxCode == NULL) {
				$last_code = $product_code.'00001';
			} else {
				$maxCode = $maxCode[0]->product_code;
				$last_code = substr($maxCode, -5);
				$last_code = $product_code.substr('00000' . strval(floatval($last_code) + 1), -5);
			}
			if($_FILES['screenshoot']['name'] == null){
				$new_image_name = 'default.png';
			}else{
				$new_image_name = $last_code.$this->generateRandomString().'.png';
				$config['upload_path'] = './assets/products/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg|PNG';
				$config['file_name'] = $new_image_name;
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('screenshoot')) 
				{
					$error = array('error' => $this->upload->display_errors());
				} 
				else
				{
					$data = array('image_metadata' => $this->upload->data());
				}
			}

			$data_insert = array(
				'product_code'				=> $last_code,
				'product_name'				=> $product_name,
				'product_brand'				=> $product_brand,
				'product_unit'				=> $product_unit,
				'product_category'			=> $product_category,
				'product_supplier_id_tag'	=> $product_supplier_id_tag,
				'product_supplier_tag'		=> $product_supplier_text,
				'product_supplier_name'		=> $product_item_supplier,
				'is_package'				=> $product_type,
				'is_ppn'					=> $product_tax,
				'product_min_stock'			=> $product_min_stock,
				'product_min_order'			=> $product_min_order,
				'product_weight'			=> $product_weight,
				'product_location'			=> $product_location,
				'product_desc'				=> $product_description,
				'product_purchase_record'	=> $product_purchase_record,
				'product_key'				=> $product_search_key,
				'product_image'				=> $new_image_name
			);

			$insert = $this->masterdata_model->save_product($data_insert);

			foreach($product_supplier as $row){
				$insert_supplier = array(
					'product_id'				=> $insert,
					'supplier_id'				=> $row
				);
				$this->masterdata_model->save_product_supplier($insert_supplier);
			}	

			$data_insert_master_stock = array(
				'product_id'				=> $insert,
				'warehouse_id'				=> 1,
				'stock'						=> 0
			);

			$this->masterdata_model->save_product_stock($data_insert_master_stock);

			$data_insert_act = array(
				'activity_table_desc'	       => 'Tambah Produk Baru',
				'activity_table_user'	       => $user_id,
			);
			$this->global_model->save($data_insert_act);
			$msg = "Succes Input";
			echo json_encode(['code'=>200, 'result'=>$msg]);die();
			die();
		}else{
			$msg = "No Access";
			echo json_encode(['code'=>0, 'result'=>$msg]);die();
		}
	}

	public function edit_product()
	{
		$modul = 'Product';
		$check_auth = $this->check_auth($modul);
		if($check_auth['check_access'][0]->add == 'Y'){
			$screenshoot 				= $this->input->post('screenshoot_edit');
			$product_id 				= $this->input->post('product_id_edit');
			$product_code 				= $this->input->post('product_code_edit');
			$product_name 				= $this->input->post('product_name_edit');
			$product_category 			= $this->input->post('product_category_edit');
			$product_brand				= $this->input->post('product_brand_edit');
			$product_supplier 			= $this->input->post('product_supplier_edit');
			$product_supplier_text      = $this->input->post('product_supplier_text_edit');
			$product_item_supplier  	= $this->input->post('product_item_supplier_edit');
			$product_tax 				= $this->input->post('product_tax_edit');
			$product_unit 				= $this->input->post('product_unit_edit');
			$product_type 				= $this->input->post('product_type_edit');
			$product_purchase_record 	= $this->input->post('product_purchase_record_edit');
			$product_min_stock			= $this->input->post('product_min_stock_edit');
			$product_min_order			= $this->input->post('product_min_order_edit');
			$product_weight				= $this->input->post('product_weight_edit');
			$product_location			= $this->input->post('product_location_edit');
			$product_description		= $this->input->post('product_description_edit');
			$product_search_key			= $this->input->post('product_search_key_edit');
			$product_status				= $this->input->post('product_status_edit');
			$product_note				= $this->input->post('product_note_edit');
			$user_id 					= $_SESSION['user_id'];
			$product_supplier_id_tag 	= implode(",",$product_supplier);
			$reset_image 				= $this->input->post('reset_image');

			
			if($_FILES['screenshoot_edit']['name'] == null){
				$get_product_by_id   = $this->masterdata_model->get_product_by_id($product_id);
				$new_image_name 	 = $get_product_by_id[0]->product_image;
				if($reset_image == 1){
					$new_image_name = 'default.png';
					$config['upload_path'] = './assets/products/';
					$config['allowed_types'] = 'gif|jpg|png|jpeg|PNG';
					$config['file_name'] = $new_image_name;
					$this->load->library('upload', $config);
					if (!$this->upload->do_upload('screenshoot_edit')) 
					{
						$error = array('error' => $this->upload->display_errors());
					} 
					else
					{
						$data = array('image_metadata' => $this->upload->data());
						$data_edit = array('product_image' => $new_image_name);
					}
				}
			}else{
				$new_image_name = $product_code.$this->generateRandomString().'.png';
				$config['upload_path'] = './assets/products/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg|PNG';
				$config['file_name'] = $new_image_name;
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('screenshoot_edit')) 
				{
					$error = array('error' => $this->upload->display_errors());
				} 
				else
				{
					$data = array('image_metadata' => $this->upload->data());
					$data_edit = array('product_image' => $new_image_name);
				}
			}

			$data_edit = array(
				'product_code'				=> $product_code,
				'product_name'				=> $product_name,
				'product_brand'				=> $product_brand,
				'product_unit'				=> $product_unit,
				'product_category'			=> $product_category,
				'product_supplier_id_tag'	=> $product_supplier_id_tag,
				'product_supplier_tag'		=> $product_supplier_text,
				'product_supplier_name'		=> $product_item_supplier,
				'is_package'				=> $product_type,
				'is_ppn'					=> $product_tax,
				'product_min_stock'			=> $product_min_stock,
				'product_min_order'			=> $product_min_order,
				'product_weight'			=> $product_weight,
				'product_location'			=> $product_location,
				'product_desc'				=> $product_description,
				//'product_purchase_record'   => $product_purchase_record,
				'product_key'				=> $product_search_key,
				'product_image' 			=> $new_image_name,
				'product_status'			=> $product_status,
				'product_note'				=> $product_note
			);	


			$this->masterdata_model->edit_product($data_edit, $product_id);


			$this->masterdata_model->delete_product_supplier($product_id);

			foreach($product_supplier as $row){
				$insert_supplier = array(
					'product_id'				=> $product_id,
					'supplier_id'				=> $row
				);
				$this->masterdata_model->save_product_supplier($insert_supplier);
			}

			$data_insert_act = array(
				'activity_table_desc'	       => 'Edit Produk Baru',
				'activity_table_user'	       => $user_id,
			);
			$this->global_model->save($data_insert_act);
			$msg = "Succes Input";
			echo json_encode(['code'=>200, 'result'=>$msg]);die();
			die();
		}else{
			$msg = "No Access";
			echo json_encode(['code'=>0, 'result'=>$msg]);die();
		}
	}


	public function edit_price()
	{
		$modul = 'Product';
		$check_auth = $this->check_auth($modul);
		if($check_auth['check_access'][0]->add == 'Y'){
			$product_id 					= $this->input->post('item_id');
			$item_purchase_price_val 		= $this->input->post('item_purchase_price_val');
			$item_hpp_val 					= $this->input->post('item_hpp_val');
			$item_price_1_percentage_val 	= $this->input->post('item_price_1_percentage_val');
			$item_price_2_percentage_val 	= $this->input->post('item_price_2_percentage_val');
			$item_price_3_percentage_val	= $this->input->post('item_price_3_percentage_val');
			$item_price_4_percentage_val 	= $this->input->post('item_price_4_percentage_val');
			$item_price_1_val      			= $this->input->post('item_price_1_val');
			$item_price_2_val  				= $this->input->post('item_price_2_val');
			$item_price_3_val 				= $this->input->post('item_price_3_val');
			$item_price_4_val 				= $this->input->post('item_price_4_val');
			$disc_percentage_val 			= $this->input->post('disc_percentage_val');
			$start_disc_val					= $this->input->post('start_disc_val');
			$end_disc_val					= $this->input->post('end_disc_val');
			$user_id 						= $_SESSION['user_id'];

			$data_edit = array(
				'product_price'				=> $item_purchase_price_val,
				'product_hpp'				=> $item_hpp_val,
				'product_sell_percentage_1'	=> $item_price_1_percentage_val,
				'product_sell_percentage_2'	=> $item_price_2_percentage_val,
				'product_sell_percentage_3'	=> $item_price_3_percentage_val,
				'product_sell_percentage_4'	=> $item_price_4_percentage_val,
				'product_sell_price_1'		=> $item_price_1_val,
				'product_sell_price_2'		=> $item_price_2_val,
				'product_sell_price_3'		=> $item_price_3_val,
				'product_sell_price_4'		=> $item_price_4_val,
				'product_disc_percentage'	=> $disc_percentage_val,
				'product_disc_start_date'	=> $start_disc_val,
				'product_disc_end_date'		=> $end_disc_val,
			);	


			$this->masterdata_model->edit_product($data_edit, $product_id);

			$data_insert_act = array(
				'activity_table_desc'	       => 'Update Harga Produk Baru',
				'activity_table_user'	       => $user_id,
			);
			$this->global_model->save($data_insert_act);
			$msg = "Succes Input";
			echo json_encode(['code'=>200, 'result'=>$msg]);die();
			die();
		}else{
			$msg = "No Access";
			echo json_encode(['code'=>0, 'result'=>$msg]);die();
		}
	}

	public function delete_product()
	{
		$modul = 'Product';
		$check_auth = $this->check_auth($modul);
		if($check_auth['check_access'][0]->delete == 'Y'){
			$id  		= $this->input->post('id');
			$user_id 	= $_SESSION['user_id'];
			$this->masterdata_model->delete_product($id);
			$data_insert_act = array(
				'activity_table_desc'	       => 'Hapus Master Produk',
				'activity_table_user'	       => $user_id,
			);
			$this->global_model->save($data_insert_act);
			$msg = "Succes Delete";
			echo json_encode(['code'=>200, 'result'=>$msg]);
			die();
		}else{
			$msg = "No Access";
			echo json_encode(['code'=>0, 'result'=>$msg]);die();
		}
	}

	public function settingproduct(){
		$modul = 'Product';
		$check_auth = $this->check_auth($modul);
		if($check_auth['check_access'][0]->edit == 'Y'){
			$id = $this->input->get('id');
			$settingproduct['settingproduct'] = $this->masterdata_model->settingproduct($id);
			$product_stock['product_stock'] = $this->masterdata_model->product_stock($id);
			$pending_po['pending_po'] = $this->masterdata_model->pending_po_by_product($id);
			$check_auth['check_auth'] = $check_auth;
			$data['data'] = array_merge($settingproduct, $product_stock, $pending_po, $check_auth);
			$this->load->view('Pages/Masterdata/product_setting', $data);
		}else{
			$msg = "No Access";
			echo json_encode(['code'=>0, 'result'=>$msg]);die();
		}
	}

	public function get_edit_product()
	{
		$modul = 'Product';
		$check_auth = $this->check_auth($modul);
		if($check_auth['check_access'][0]->view == 'Y'){
			$id = $this->input->post('id');
			$settingproduct = $this->masterdata_model->settingproduct($id);
			$detail_note_product = $this->masterdata_model->detail_note_product($id);
			echo json_encode(['code'=>200, 'result'=>$settingproduct, 'detail'=>$detail_note_product]);die();
		}else{
			$msg = "No Access";
			echo json_encode(['code'=>0, 'result'=>$msg]);die();
		}
	}

	public function delete_product_note()
	{
		$modul = 'Product';
		$check_auth = $this->check_auth($modul);
		if($check_auth['check_access'][0]->delete == 'Y'){
			$note_id = $this->input->post('note_id');
			$this->masterdata_model->delete_product_note($note_id);
			echo json_encode(['code'=>200, 'result'=>'Deleted']);die();
		}else{
			$msg = "No Access";
			echo json_encode(['code'=>0, 'result'=>$msg]);die();
		}
	}

	public function delete_filter_product()
	{
		$user_id = $_SESSION['user_id'];
		$this->masterdata_model->delete_filter_product($user_id);
	}

	public function insert_filter_product()
	{
		$filter_supplier 		= $this->input->post('filter_supplier');
		$filter_category 		= $this->input->post('filter_category');
		$filter_brand    		= $this->input->post('filter_brand');
		$filter_product_status  = $this->input->post('filter_product_status');
		$filter_in_transit    	= $this->input->post('filter_in_transit');
		$user_id 		 		= $_SESSION['user_id'];

		$this->masterdata_model->delete_filter_product($user_id);

		if($filter_supplier == 'ALL'){
			$filter_supplier = '';
		}
		$data_insert = array(
			'supplier_filter' 		=> $filter_supplier,
			'category_filter'		=> $filter_category,
			'brand_filter'      	=> $filter_brand,
			'product_status_filter' => $filter_product_status,
			'in_transit_filter'     => $filter_in_transit,
			'user_id'				=> $user_id
		);
		$this->masterdata_model->insert_filter_product($data_insert);
		echo json_encode(['code'=>200]);die();

	}

	public function export_sample_import_product()
	{
		$modul = 'Product';
		$check_auth = $this->check_auth($modul);
		if($check_auth['check_access'][0]->view == 'Y'){
			// kolom A-T diambil dari file sample, kolom stok gudang dibuat sesuai gudang yang aktif
			$excel = \PhpOffice\PhpSpreadsheet\IOFactory::load(FCPATH.'excell/sample_import_product.xlsx');
			$sheet = $excel->getActiveSheet();
			$header_style = clone $sheet->getStyle('T1');
			$highest_col_index = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($sheet->getHighestColumn());
			if($highest_col_index > 20){
				$sheet->removeColumnByIndex(21, $highest_col_index - 20);
			}
			if($sheet->getHighestRow() > 2){
				$sheet->removeRow(3, $sheet->getHighestRow() - 2);
			}

			$col = 21;
			$example_stock = array(10, 20);
			foreach($this->masterdata_model->warehouse_list() as $i => $wh){
				$sheet->setCellValueByColumnAndRow($col, 1, 'Stok Gudang '.$wh->warehouse_name);
				$sheet->setCellValueByColumnAndRow($col, 2, $example_stock[$i] ?? 0);
				$col++;
			}
			$sheet->setCellValueByColumnAndRow($col, 1, 'Catatan Penting');

			$last_col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($col);
			$sheet->duplicateStyle($header_style, 'U1:'.$last_col.'1');
			for($c=21; $c<=$col; $c++){
				$sheet->getColumnDimensionByColumn($c)->setAutoSize(true);
			}

			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="sample_import_product.xlsx"');
			header('Cache-Control: max-age=0');
			$writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($excel);
			$writer->save('php://output');
			exit();
		}else{
			$msg = "No Access";
			echo json_encode(['code'=>0, 'result'=>$msg]);die();
		}
	}	

	
	public function import_product_excell()
	{
		$modul = 'Product';
		$check_auth = $this->check_auth($modul);
		$user_id = $_SESSION['user_id'];
		if($check_auth['check_access'][0]->add == 'Y'){
			if(isset($_FILES["file"]["name"])){
				$path = $_FILES["file"]["tmp_name"];
				$object = \PhpOffice\PhpSpreadsheet\IOFactory::load($path);
				foreach($object->getWorksheetIterator() as $worksheet){
					$highestRow = $worksheet->getHighestRow();
					$highestColumn = $worksheet->getHighestColumn();
					$highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn);

					// kolom stok gudang dibaca dari header "Stok Gudang <nama gudang>" (kolom 21 dst)
					$warehouse_by_name = array();
					foreach($this->masterdata_model->warehouse_list() as $wh){
						$warehouse_by_name[strtoupper(trim($wh->warehouse_name))] = $wh->warehouse_id;
					}
					$stock_columns = array();
					$note_column = null;
					for($col=21; $col<=$highestColumnIndex; $col++){
						$header = trim((string) $worksheet->getCellByColumnAndRow($col, 1)->getValue());
						if(strcasecmp($header, 'Catatan Penting') == 0){
							$note_column = $col;
							continue;
						}
						$wh_name = strtoupper(trim(preg_replace('/^stok\s+(gudang\s+)?/i', '', $header)));
						if(isset($warehouse_by_name[$wh_name])){
							$stock_columns[$col] = $warehouse_by_name[$wh_name];
						}
					}

					for($row=2; $row<=$highestRow; $row++){
						$product_name 				= $worksheet->getCellByColumnAndRow(1, $row)->getValue();
						if(trim((string) $product_name) == ''){
							continue;
						}
						$product_supplier 			= $worksheet->getCellByColumnAndRow(2, $row)->getValue();
						$product_brand 				= $worksheet->getCellByColumnAndRow(3, $row)->getValue();
						$product_unit				= $worksheet->getCellByColumnAndRow(4, $row)->getValue();
						$product_category 			= $worksheet->getCellByColumnAndRow(5, $row)->getValue();
						$product_supplier_name		= $worksheet->getCellByColumnAndRow(6, $row)->getValue();
						$product_paket 				= $worksheet->getCellByColumnAndRow(7, $row)->getValue();
						$product_ppn 				= $worksheet->getCellByColumnAndRow(8, $row)->getValue();
						$product_min_stock 			= $worksheet->getCellByColumnAndRow(9, $row)->getValue();
						$product_min_order 			= $worksheet->getCellByColumnAndRow(10, $row)->getValue();
						$product_weight 			= $worksheet->getCellByColumnAndRow(11, $row)->getValue();
						$product_location 			= $worksheet->getCellByColumnAndRow(12, $row)->getValue();
						$product_desc 				= $worksheet->getCellByColumnAndRow(13, $row)->getValue();
						$product_key_name 			= $worksheet->getCellByColumnAndRow(14, $row)->getValue();
						$product_image 				= $worksheet->getCellByColumnAndRow(15, $row)->getValue();
						$product_cogs 				= $worksheet->getCellByColumnAndRow(16, $row)->getValue();
						$product_price_umum 		= $worksheet->getCellByColumnAndRow(17, $row)->getValue();
						$product_price_toko 		= $worksheet->getCellByColumnAndRow(18, $row)->getValue();
						$product_price_sales 		= $worksheet->getCellByColumnAndRow(19, $row)->getValue();
						$product_price_khusus 		= $worksheet->getCellByColumnAndRow(20, $row)->getValue();
						$product_note 				= $note_column ? $worksheet->getCellByColumnAndRow($note_column, $row)->getValue() : null;

						$product_code = strtoupper(substr($product_name ?? '', 0, 3));
						//$product_note = nl2br($product_note ?? '');

						$maxCode = $this->masterdata_model->last_product_code();
						if ($maxCode == NULL) {
							$product_codes = $product_code.'00001';
						} else {
							$maxCode = $maxCode[0]->product_code;
							$last_code = substr($maxCode, -5);
							$product_codes = $product_code.substr('00000' . strval(floatval($last_code) + 1), -5);
						}
						
						$check_product_brand = $this->masterdata_model->check_product_brand($product_brand);
						if(!$check_product_brand){
							$data_insert_brand = array(
								'brand_name' => $product_brand
							);
							$product_brand_id = $this->masterdata_model->save_brand($data_insert_brand);
						}else{
							$product_brand_id = $check_product_brand[0]->brand_id;
						}

						$check_product_category = $this->masterdata_model->check_product_category($product_category);
						if(!$check_product_category){
							$data_insert_category = array(
							'category_name' => $product_category
							);
							$product_category_id = $this->masterdata_model->save_category($data_insert_category);
						}else{
							$product_category_id = $check_product_category[0]->category_id;
						}

						$check_product_unit = $this->masterdata_model->check_product_unit($product_unit);
						if(!$check_product_unit){
							$data_insert_unit = array(
							'unit_name' => $product_unit
							);
							$product_unit_id = $this->masterdata_model->save_unit($data_insert_unit);
						}else{
							$product_unit_id = $check_product_unit[0]->unit_id;
						}

						$check_product_supplier = $this->masterdata_model->check_product_supplier($product_supplier);
						if(!$check_product_supplier){
								$supplier_code = strtoupper(substr($product_supplier_name, 0, 2));
								$maxCode = $this->masterdata_model->get_last_supplier();
								if ($maxCode == NULL) {
									$last_code_supplier = $supplier_code.'-'.'001';
								} else {
									$maxCode = $maxCode[0]->supplier_code;
									$last_code_supplier = substr($maxCode, -3);
									$last_code_supplier = $supplier_code.'-'.substr('000' . strval(floatval($last_code_supplier) + 1), -3);
								}
								$data_insert_supplier = array(
									'supplier_code' => $last_code_supplier,
									'supplier_name' => $product_supplier
								);
								$product_supplier_id = $this->masterdata_model->save_supplier($data_insert_supplier);
						}else{
							$product_supplier_id = $check_product_supplier[0]->supplier_id;
						}

						if($product_desc == null){
							$product_desc = ' - ';
						}	

						$product_sell_percentage_1 = (($product_price_umum - $product_cogs) / $product_price_umum) * 100;
						$product_sell_percentage_2 = (($product_price_toko - $product_cogs) / $product_price_toko) * 100;
						$product_sell_percentage_3 = (($product_price_sales - $product_cogs) / $product_price_sales) * 100;
						$product_sell_percentage_4 = (($product_price_khusus - $product_cogs) / $product_price_khusus) * 100;
						$insert_product = array(
							'product_code' => strtoupper($product_codes),
							'product_name' => strtoupper($product_name),
							'product_brand' => strtoupper($product_brand_id),
							'product_unit' => strtoupper($product_unit_id),
							'product_category' => strtoupper($product_category_id),
							'product_supplier_id_tag' => strtoupper($product_supplier_id),
							'product_supplier_tag' => strtoupper($product_supplier),
							'product_supplier_name' => strtoupper($product_supplier_name),
							'is_package' => strtoupper($product_paket),
							'is_ppn' => strtoupper($product_ppn),
							'product_min_stock' => strtoupper($product_min_stock),
							'product_min_order' => strtoupper($product_min_order),
							'product_weight' => strtoupper($product_weight),
							'product_location' => strtoupper($product_location),
							'product_desc' => strtoupper($product_desc),
							'product_key' => strtoupper($product_key_name),
							'product_image' => strtoupper($product_image),
							'product_price' => strtoupper($product_cogs),
							'product_hpp' => strtoupper($product_cogs),
							'product_sell_percentage_1' => number_format($product_sell_percentage_1, 2) . '%',
							'product_sell_percentage_2' => number_format($product_sell_percentage_2, 2) . '%',
							'product_sell_percentage_3' => number_format($product_sell_percentage_3, 2) . '%',
							'product_sell_percentage_4' => number_format($product_sell_percentage_4, 2) . '%',
							'product_sell_price_1' => $product_price_umum,
							'product_sell_price_2' => $product_price_toko,
							'product_sell_price_3' => $product_price_sales,
							'product_sell_price_4' => $product_price_khusus,
							'product_note' => strtoupper($product_note)
						);
						

							
						$product_id = $this->masterdata_model->save_product($insert_product);

						$insert_supplier = array(
						'product_id' => $product_id,
						'supplier_id' => $product_supplier_id
						);
						$this->masterdata_model->save_product_supplier($insert_supplier);
						
						foreach($stock_columns as $col => $warehouse_id){
							$stock_awal = (float) $worksheet->getCellByColumnAndRow($col, $row)->getCalculatedValue();
							if($stock_awal > 0){
								$insert_stock = array(
									'product_id' => $product_id,
									'warehouse_id' => $warehouse_id,
									'stock' => $stock_awal
								);
								$this->masterdata_model->save_product_stock($insert_stock);

								$movement_stock = array(
								'stock_movement_product_id'		=> $product_id,
								'stock_movement_qty'			=> $stock_awal,
								'stock_movement_before_stock'	=> 0,
								'stock_movement_new_stock'		=> $stock_awal,
								'stock_movement_desc'			=> 'Import Excell',
								'stock_movement_inv'			=> 'EXCEL',
								'stock_movement_calculate'		=> 'Plus',
								'stock_movement_date'			=> date('Y-m-d'),
								'stock_movement_creted_by'		=> $user_id,	
								);	
								$this->global_model->insert_movement_stock($movement_stock);
							}
						}
					}

					$msg = "Succes Import";
					echo json_encode(['code'=>200, 'result'=>$msg]);die();
				}
			}
		}
	}


	// stock mass update excell //

	public function stock_mass_update()
	{
		$modul = 'Product';
		$check_auth = $this->check_auth($modul);
		if($check_auth['check_access'][0]->view == 'Y'){
			$warehouse_list['warehouse_list'] = $this->masterdata_model->warehouse_list();
			$history_list['history_list'] = $this->masterdata_model->stock_excel_history_list();
			$check_auth['check_auth'] = $check_auth;
			$data['data'] = array_merge($check_auth, $warehouse_list, $history_list);
			$this->load->view('Pages/Masterdata/stock_mass_update', $data);
		}else{
			print_r('Tidak Ada Akses');die();
		}
	}

	// column layout shared by export (build_stock_workbook) and import (import_stock_excell)
	// so they can never drift apart. Only 'kode' (product_code) is treated as read-only.
	private function get_mass_update_column_map($warehouse_list)
	{
		$map = array();
		$map['nama'] 		= 1;
		$map['status'] 		= 2;
		$map['kode'] 		= 3;
		$map['harga_umum'] 	= 4;
		$map['harga_toko'] 	= 5;
		$map['harga_sales'] = 6;
		$map['harga_khusus'] = 7;
		$map['harga_beli'] 	= 8;
		$map['hpp'] 		= 9;
		$map['catatan'] 	= 10;

		$col = 11;
		$map['stock_warehouse'] = array();
		foreach($warehouse_list as $wh){
			$map['stock_warehouse'][$wh->warehouse_id] = $col;
			$col++;
		}

		$map['lokasi'] 					= $col++;
		$map['supplier_terbaru'] 			= $col++;
		$map['nama_produk_supplier'] 		= $col++;
		$map['deskripsi'] 					= $col++;
		$map['kata_kunci'] 					= $col++;
		$map['berat'] 						= $col++;
		$map['min_stok'] 					= $col++;
		$map['min_order'] 					= $col++;
		$map['kategori'] 					= $col++;
		$map['brand'] 						= $col++;
		$map['satuan'] 						= $col++;
		$map['paket'] 						= $col++;
		$map['ppn'] 						= $col++;
		$map['last_col'] 					= $col - 1;
		return $map;
	}

	private function normalize_product_status($val)
	{
		$val = trim((string) $val);
		if($val === ''){ return null; }
		foreach(array('Aktif','Tidak Aktif','Discontinue') as $valid){
			if(strcasecmp($valid, $val) == 0){ return $valid; }
		}
		return null;
	}

	private function normalize_yn($val)
	{
		$val = strtoupper(trim((string) $val));
		return ($val === 'Y' || $val === 'N') ? $val : null;
	}

	private function normalize_ppn_yn($val)
	{
		$val = strtoupper(trim((string) $val));
		if($val === 'Y' || $val === 'PPN'){ return 'PPN'; }
		if($val === 'N' || $val === 'NON PPN'){ return 'NON PPN'; }
		return null;
	}

	private function build_stock_workbook()
	{
		$warehouse_list = $this->masterdata_model->warehouse_list();
		$product_list = $this->masterdata_model->get_product_list_for_stock_export();
		$stock_rows = $this->masterdata_model->get_all_product_stock_map();
		$col_map = $this->get_mass_update_column_map($warehouse_list);

		$stock_map = array();
		foreach($stock_rows as $row){
			$stock_map[$row->product_id.'_'.$row->warehouse_id] = $row->stock;
		}

		$excel = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
		$sheet = $excel->getActiveSheet();

		$letter = function($col_index){
			return \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($col_index);
		};

		$sheet->setCellValue($letter($col_map['nama']).'1', 'NAMA BARANG');
		$sheet->setCellValue($letter($col_map['status']).'1', 'STATUS');
		$sheet->setCellValue($letter($col_map['kode']).'1', 'KODE PRODUK');
		$sheet->setCellValue($letter($col_map['harga_umum']).'1', 'HARGA JUAL UMUM');
		$sheet->setCellValue($letter($col_map['harga_toko']).'1', 'HARGA JUAL TOKO');
		$sheet->setCellValue($letter($col_map['harga_sales']).'1', 'HARGA JUAL SALES');
		$sheet->setCellValue($letter($col_map['harga_khusus']).'1', 'HARGA JUAL KHUSUS');
		$sheet->setCellValue($letter($col_map['harga_beli']).'1', 'HARGA BELI');
		$sheet->setCellValue($letter($col_map['hpp']).'1', 'HPP');
		$sheet->setCellValue($letter($col_map['catatan']).'1', 'Catatan Penting');
		foreach($warehouse_list as $wh){
			$sheet->setCellValue($letter($col_map['stock_warehouse'][$wh->warehouse_id]).'1', 'Stock '.$wh->warehouse_name);
		}
		$sheet->setCellValue($letter($col_map['lokasi']).'1', 'LOKASI STOK');
		$sheet->setCellValue($letter($col_map['supplier_terbaru']).'1', 'Supplier TERBARU');
		$sheet->setCellValue($letter($col_map['nama_produk_supplier']).'1', 'Nama Produk Supplier');
		$sheet->setCellValue($letter($col_map['deskripsi']).'1', 'Deskripsi');
		$sheet->setCellValue($letter($col_map['kata_kunci']).'1', 'Kata Kunci');
		$sheet->setCellValue($letter($col_map['berat']).'1', 'Berat (GRAM)');
		$sheet->setCellValue($letter($col_map['min_stok']).'1', 'MIN STOK');
		$sheet->setCellValue($letter($col_map['min_order']).'1', 'MIN ORDER');
		$sheet->setCellValue($letter($col_map['kategori']).'1', 'Kategori *');
		$sheet->setCellValue($letter($col_map['brand']).'1', 'Brand *');
		$sheet->setCellValue($letter($col_map['satuan']).'1', 'Satuan *');
		$sheet->setCellValue($letter($col_map['paket']).'1', 'Produk Paket (Y/N)');
		$sheet->setCellValue($letter($col_map['ppn']).'1', 'Produk PPN (Y/N)');

		$row_num = 2;
		foreach($product_list as $p){
			$sheet->setCellValue($letter($col_map['nama']).$row_num, $p->product_name);
			$sheet->setCellValue($letter($col_map['status']).$row_num, $p->product_status);
			$sheet->setCellValueExplicit($letter($col_map['kode']).$row_num, $p->product_code, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
			$sheet->setCellValue($letter($col_map['harga_umum']).$row_num, $p->product_sell_price_1);
			$sheet->setCellValue($letter($col_map['harga_toko']).$row_num, $p->product_sell_price_2);
			$sheet->setCellValue($letter($col_map['harga_sales']).$row_num, $p->product_sell_price_3);
			$sheet->setCellValue($letter($col_map['harga_khusus']).$row_num, $p->product_sell_price_4);
			$sheet->setCellValue($letter($col_map['harga_beli']).$row_num, $p->product_price);
			$sheet->setCellValue($letter($col_map['hpp']).$row_num, $p->product_hpp);
			$sheet->setCellValue($letter($col_map['catatan']).$row_num, preg_replace('/<br\s*\/?>/i', "\n", (string) $p->product_note));
			foreach($warehouse_list as $wh){
				$stock = $stock_map[$p->product_id.'_'.$wh->warehouse_id] ?? 0;
				$sheet->setCellValue($letter($col_map['stock_warehouse'][$wh->warehouse_id]).$row_num, $stock);
			}
			$sheet->setCellValue($letter($col_map['lokasi']).$row_num, $p->product_location);
			$sheet->setCellValue($letter($col_map['supplier_terbaru']).$row_num, $p->product_supplier_tag);
			$sheet->setCellValue($letter($col_map['nama_produk_supplier']).$row_num, $p->product_supplier_name);
			$sheet->setCellValue($letter($col_map['deskripsi']).$row_num, $p->product_desc);
			$sheet->setCellValue($letter($col_map['kata_kunci']).$row_num, preg_replace('/<br\s*\/?>/i', "\n", (string) $p->product_key));
			$sheet->setCellValue($letter($col_map['berat']).$row_num, $p->product_weight);
			$sheet->setCellValue($letter($col_map['min_stok']).$row_num, $p->product_min_stock);
			$sheet->setCellValue($letter($col_map['min_order']).$row_num, $p->product_min_order);
			$sheet->setCellValue($letter($col_map['kategori']).$row_num, $p->category_name);
			$sheet->setCellValue($letter($col_map['brand']).$row_num, $p->brand_name);
			$sheet->setCellValue($letter($col_map['satuan']).$row_num, $p->unit_name);
			$sheet->setCellValue($letter($col_map['paket']).$row_num, $p->is_package);
			$sheet->setCellValue($letter($col_map['ppn']).$row_num, $p->is_ppn == 'PPN' ? 'Y' : 'N');
			$row_num++;
		}
		$last_data_row = $row_num - 1;

		$last_col_letter = $letter($col_map['last_col']);
		$sheet->getStyle('A1:'.$last_col_letter.'1')->getFont()->setBold(true);

		// highlight KODE PRODUK as the read-only key column
		$kode_letter = $letter($col_map['kode']);
		if($last_data_row >= 1){
			$sheet->getStyle($kode_letter.'1:'.$kode_letter.max($last_data_row, 1))->getFill()
				->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
				->getStartColor()->setRGB('F2F2F2');
		}

		// HARGA BELI and HPP are data biaya/cost, tandai merah supaya menonjol
		$harga_beli_letter = $letter($col_map['harga_beli']);
		$hpp_letter = $letter($col_map['hpp']);
		if($last_data_row >= 1){
			$sheet->getStyle($harga_beli_letter.'1:'.$harga_beli_letter.max($last_data_row, 1))->getFont()->getColor()->setRGB('FF0000');
			$sheet->getStyle($hpp_letter.'1:'.$hpp_letter.max($last_data_row, 1))->getFont()->getColor()->setRGB('FF0000');
		}

		// Kata Kunci and Catatan Penting are exported with real line breaks (converted from <br>), wrap the cells so they display properly
		$kata_kunci_letter = $letter($col_map['kata_kunci']);
		$catatan_letter = $letter($col_map['catatan']);
		if($last_data_row >= 1){
			$sheet->getStyle($kata_kunci_letter.'1:'.$kata_kunci_letter.max($last_data_row, 1))->getAlignment()->setWrapText(true);
			$sheet->getStyle($catatan_letter.'1:'.$catatan_letter.max($last_data_row, 1))->getAlignment()->setWrapText(true);
		}

		for($ci = 1; $ci <= $col_map['last_col']; $ci++){
			$sheet->getColumnDimension($letter($ci))->setAutoSize(true);
		}
		$sheet->setTitle('Mass Update Produk');

		return array('excel' => $excel, 'total_row' => count($product_list), 'col_map' => $col_map, 'warehouse_list' => $warehouse_list);
	}

	private function generate_stock_backup_file($path)
	{
		$built = $this->build_stock_workbook();
		$writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($built['excel']);
		$writer->save($path);
	}

	public function export_stock_excell()
	{
		$modul = 'Product';
		$check_auth = $this->check_auth($modul);
		if($check_auth['check_access'][0]->view == 'Y'){
			$user_id = $_SESSION['user_id'];
			$built = $this->build_stock_workbook();

			$timestamp = date('Y-m-d_H-i-s');
			$file_name = 'stock_produk_'.$timestamp.'.xlsx';
			$storage_dir = FCPATH.'excell/stock_mass_update/';
			if(!is_dir($storage_dir)){
				mkdir($storage_dir, 0755, true);
			}
			$file_path = $storage_dir.$file_name;

			$writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($built['excel']);
			$writer->save($file_path);

			$this->masterdata_model->save_stock_excel_history(array(
				'type' 			=> 'Download',
				'file_name' 	=> $file_name,
				'file_path' 	=> 'excell/stock_mass_update/'.$file_name,
				'total_row' 	=> $built['total_row'],
				'success_row' 	=> $built['total_row'],
				'status' 		=> 'Success',
				'created_by' 	=> $user_id
			));

			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="'.$file_name.'"');
			header('Cache-Control: max-age=0');
			readfile($file_path);
			exit();
		}else{
			$msg = "No Access";
			echo json_encode(['code'=>0, 'result'=>$msg]);die();
		}
	}

	public function import_stock_excell()
	{
		$modul = 'Product';
		$check_auth = $this->check_auth($modul);
		$user_id = $_SESSION['user_id'];
		if($check_auth['check_access'][0]->edit == 'Y'){
			if(isset($_FILES["file"]["name"]) && $_FILES["file"]["error"] == 0){
				$ext = strtolower(pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION));
				if(!in_array($ext, array('xlsx','xls'))){
					echo json_encode(['code'=>0, 'result'=>'File harus berformat xlsx atau xls']);die();
				}

				$storage_dir = FCPATH.'excell/stock_mass_update/';
				$backup_dir  = FCPATH.'application/backup_excell/';
				if(!is_dir($storage_dir)){ mkdir($storage_dir, 0755, true); }
				if(!is_dir($backup_dir)){ mkdir($backup_dir, 0755, true); }

				$timestamp = date('Y-m-d_H-i-s');

				// backup the current stock data first, so this upload can be rolled back
				$backup_file_name = 'backup_stock_'.$timestamp.'.xlsx';
				$backup_file_path = $backup_dir.$backup_file_name;
				$this->generate_stock_backup_file($backup_file_path);

				// keep a copy of the uploaded file for the history log
				$uploaded_file_name = 'upload_'.$timestamp.'_'.$_FILES['file']['name'];
				$uploaded_file_path = $storage_dir.$uploaded_file_name;
				move_uploaded_file($_FILES['file']['tmp_name'], $uploaded_file_path);

				$warehouse_list = $this->masterdata_model->warehouse_list();
				$col_map = $this->get_mass_update_column_map($warehouse_list);

				$object = \PhpOffice\PhpSpreadsheet\IOFactory::load($uploaded_file_path);
				$sheet = $object->getActiveSheet();
				$highestRow = $sheet->getHighestRow();

				$total_row = 0;
				$success_row = 0;
				$failed_products = array();

				$cell_value = function($row, $col_key) use ($sheet, $col_map){
					$val = $sheet->getCellByColumnAndRow($col_map[$col_key], $row)->getValue();
					return ($val === null) ? '' : trim((string) $val);
				};

				for($row = 2; $row <= $highestRow; $row++){
					$product_code = $cell_value($row, 'kode');
					if($product_code == ''){
						continue;
					}
					$total_row++;

					$product = $this->masterdata_model->get_product_by_code($product_code);
					if(!$product){
						$failed_products[] = $product_code;
						continue;
					}
					$product = $product[0];
					$product_id = $product->product_id;

					// only non-empty cells overwrite existing data; blank cells keep the current value.
					// product_code itself is never written back - it's the lookup key only.
					$data_update = array();

					$v = $cell_value($row, 'nama');
					if($v !== ''){ $data_update['product_name'] = strtoupper($v); }

					$status_norm = $this->normalize_product_status($cell_value($row, 'status'));
					if($status_norm !== null){ $data_update['product_status'] = $status_norm; }

					$v = $cell_value($row, 'catatan');
					if($v !== ''){ $data_update['product_note'] = str_replace(array("\r\n", "\r", "\n"), '<br>', strtoupper($v)); }

					$v = $cell_value($row, 'lokasi');
					if($v !== ''){ $data_update['product_location'] = strtoupper($v); }

					$v = $cell_value($row, 'nama_produk_supplier');
					if($v !== ''){ $data_update['product_supplier_name'] = strtoupper($v); }

					$v = $cell_value($row, 'deskripsi');
					if($v !== ''){ $data_update['product_desc'] = strtoupper($v); }

					$v = $cell_value($row, 'kata_kunci');
					if($v !== ''){ $data_update['product_key'] = str_replace(array("\r\n", "\r", "\n"), '<br>', strtoupper($v)); }

					$v = $cell_value($row, 'berat');
					if($v !== ''){ $data_update['product_weight'] = (int) $v; }

					$v = $cell_value($row, 'min_stok');
					if($v !== ''){ $data_update['product_min_stock'] = (int) $v; }

					$v = $cell_value($row, 'min_order');
					if($v !== ''){ $data_update['product_min_order'] = strtoupper($v); }

					$paket_norm = $this->normalize_yn($cell_value($row, 'paket'));
					if($paket_norm !== null){ $data_update['is_package'] = $paket_norm; }

					$ppn_norm = $this->normalize_ppn_yn($cell_value($row, 'ppn'));
					if($ppn_norm !== null){ $data_update['is_ppn'] = $ppn_norm; }

					$v = $cell_value($row, 'supplier_terbaru');
					if($v !== ''){
						$check_product_supplier = $this->masterdata_model->check_product_supplier($v);
						if(!$check_product_supplier){
							$supplier_code = strtoupper(substr($v, 0, 2));
							$maxCode = $this->masterdata_model->get_last_supplier();
							if($maxCode == NULL){
								$last_code_supplier = $supplier_code.'-'.'001';
							}else{
								$maxCode = $maxCode[0]->supplier_code;
								$last_code_supplier = substr($maxCode, -3);
								$last_code_supplier = $supplier_code.'-'.substr('000'.strval(floatval($last_code_supplier) + 1), -3);
							}
							$product_supplier_id = $this->masterdata_model->save_supplier(array(
								'supplier_code' => $last_code_supplier,
								'supplier_name' => $v
							));
						}else{
							$product_supplier_id = $check_product_supplier[0]->supplier_id;
						}
						$data_update['product_supplier_id_tag'] = $product_supplier_id;
						$data_update['product_supplier_tag'] = strtoupper($v);
					}

					$v = $cell_value($row, 'kategori');
					if($v !== ''){
						$check_category = $this->masterdata_model->check_product_category($v);
						$data_update['product_category'] = $check_category ? $check_category[0]->category_id : $this->masterdata_model->save_category(array('category_name' => $v));
					}

					$v = $cell_value($row, 'brand');
					if($v !== ''){
						$check_brand = $this->masterdata_model->check_product_brand($v);
						$data_update['product_brand'] = $check_brand ? $check_brand[0]->brand_id : $this->masterdata_model->save_brand(array('brand_name' => $v));
					}

					$v = $cell_value($row, 'satuan');
					if($v !== ''){
						$check_unit = $this->masterdata_model->check_product_unit($v);
						$data_update['product_unit'] = $check_unit ? $check_unit[0]->unit_id : $this->masterdata_model->save_unit(array('unit_name' => $v));
					}

					// prices/HPP: keep the effective (new-or-existing) values so the derived
					// sell percentages can always be recalculated consistently
					$v = $cell_value($row, 'harga_umum');
					$sell_1 = ($v !== '') ? (int) $v : (int) $product->product_sell_price_1;
					if($v !== ''){ $data_update['product_sell_price_1'] = $sell_1; }

					$v = $cell_value($row, 'harga_toko');
					$sell_2 = ($v !== '') ? (int) $v : (int) $product->product_sell_price_2;
					if($v !== ''){ $data_update['product_sell_price_2'] = $sell_2; }

					$v = $cell_value($row, 'harga_sales');
					$sell_3 = ($v !== '') ? (int) $v : (int) $product->product_sell_price_3;
					if($v !== ''){ $data_update['product_sell_price_3'] = $sell_3; }

					$v = $cell_value($row, 'harga_khusus');
					$sell_4 = ($v !== '') ? (int) $v : (int) $product->product_sell_price_4;
					if($v !== ''){ $data_update['product_sell_price_4'] = $sell_4; }

					$v = $cell_value($row, 'harga_beli');
					if($v !== ''){ $data_update['product_price'] = (int) $v; }

					$v = $cell_value($row, 'hpp');
					$hpp = ($v !== '') ? (int) $v : (int) $product->product_hpp;
					if($v !== ''){
						$data_update['product_hpp'] = $hpp;
					}

					if($sell_1 > 0){ $data_update['product_sell_percentage_1'] = (int) round((($sell_1 - $hpp) / $sell_1) * 100); }
					if($sell_2 > 0){ $data_update['product_sell_percentage_2'] = (int) round((($sell_2 - $hpp) / $sell_2) * 100); }
					if($sell_3 > 0){ $data_update['product_sell_percentage_3'] = (int) round((($sell_3 - $hpp) / $sell_3) * 100); }
					if($sell_4 > 0){ $data_update['product_sell_percentage_4'] = (int) round((($sell_4 - $hpp) / $sell_4) * 100); }

					if(count($data_update) > 0){
						$this->masterdata_model->update_product_fields($product_id, $data_update);
					}

					foreach($col_map['stock_warehouse'] as $warehouse_id => $col){
						$new_stock_cell = $sheet->getCellByColumnAndRow($col, $row)->getValue();
						if($new_stock_cell === null || $new_stock_cell === ''){
							continue;
						}
						$new_stock = (int) $new_stock_cell;

						// Gudang Pionir (warehouse_id 1) cuma indikator ada/tidak ada barang, maksimal stock 1
						if($warehouse_id == 1){
							$new_stock = ($new_stock > 0) ? 1 : 0;
						}

						$existing_stock_row = $this->masterdata_model->get_product_stock_row($product_id, $warehouse_id);
						$before_stock = $existing_stock_row ? (int) $existing_stock_row[0]->stock : 0;

						if($new_stock == $before_stock){
							continue;
						}

						$this->masterdata_model->upsert_product_stock($product_id, $warehouse_id, $new_stock);

						$diff = $new_stock - $before_stock;
						$movement_stock = array(
							'stock_movement_product_id'	=> $product_id,
							'stock_movement_qty'			=> abs($diff),
							'stock_movement_before_stock'	=> $before_stock,
							'stock_movement_new_stock'		=> $new_stock,
							'stock_movement_desc'			=> 'Upload Excell',
							'stock_movement_inv'			=> $_FILES['file']['name'],
							'stock_movement_calculate'		=> $diff > 0 ? 'Plus' : 'Minus',
							'stock_movement_date'			=> date('Y-m-d'),
							'stock_movement_creted_by'		=> $user_id,
						);
						$this->global_model->insert_movement_stock($movement_stock);
					}
					$success_row++;
				}

				$status = count($failed_products) > 0 ? 'Partial' : 'Success';
				$notes = count($failed_products) > 0 ? 'Kode produk tidak ditemukan: '.implode(', ', $failed_products) : null;

				$this->masterdata_model->save_stock_excel_history(array(
					'type' 				=> 'Upload',
					'file_name' 		=> $_FILES['file']['name'],
					'file_path' 		=> 'excell/stock_mass_update/'.$uploaded_file_name,
					'backup_file_path' 	=> 'application/backup_excell/'.$backup_file_name,
					'total_row' 		=> $total_row,
					'success_row' 		=> $success_row,
					'status' 			=> $status,
					'notes' 			=> $notes,
					'created_by' 		=> $user_id
				));

				$data_insert_act = array(
					'activity_table_desc'	=> 'Mass Update Produk via Excell ('.$success_row.'/'.$total_row.')',
					'activity_table_user'	=> $user_id,
				);
				$this->global_model->save($data_insert_act);

				$msg = "Berhasil update ".$success_row." dari ".$total_row." produk.";
				if(count($failed_products) > 0){
					$msg .= ' '.count($failed_products).' kode produk tidak ditemukan: '.implode(', ', $failed_products);
				}
				echo json_encode(['code'=>200, 'result'=>$msg]);die();
			}else{
				echo json_encode(['code'=>0, 'result'=>'File tidak ditemukan']);die();
			}
		}else{
			$msg = "No Access";
			echo json_encode(['code'=>0, 'result'=>$msg]);die();
		}
	}

	public function download_stock_history_file()
	{
		$modul = 'Product';
		$check_auth = $this->check_auth($modul);
		if($check_auth['check_access'][0]->view == 'Y'){
			$id = $this->input->get('id');
			$type = $this->input->get('type');
			$history = $this->masterdata_model->get_stock_excel_history_by_id($id);
			if(!$history){
				show_404();
			}
			$history = $history[0];
			$relative_path = ($type == 'backup') ? $history->backup_file_path : $history->file_path;
			$full_path = FCPATH.$relative_path;
			if($relative_path == null || !file_exists($full_path)){
				show_404();
			}
			$this->load->helper('download');
			force_download($full_path, null);
		}else{
			print_r('Tidak Ada Akses');die();
		}
	}
	// end stock mass update excell //


	//end product


	// payment type

	public function payment()
	{
		$modul = 'Payment';
		$check_auth = $this->check_auth($modul);
		if($check_auth['check_access'][0]->view == 'Y'){
			$check_auth['check_auth'] 			= $check_auth;
			$payment_list['payment_list'] 		= $this->masterdata_model->payment_list_all();
			$stats['stats'] = $this->build_master_stats($payment_list['payment_list']);
			$data['data'] = array_merge($check_auth, $payment_list, $stats);
			$this->load->view('Pages/Masterdata/payment', $data);
		}else{
			$msg = "No Access";
			echo json_encode(['code'=>0, 'result'=>$msg]);
		}
	}	

	public function save_payment()
	{
		$modul = 'Payment';
		$check_auth = $this->check_auth($modul);
		if($check_auth['check_access'][0]->add == 'Y'){
			$payment_name 	= $this->input->post('payment_name');
			$payment_rek 	= $this->input->post('payment_rek');
			$user_id 		= $_SESSION['user_id'];
			if($payment_name == null){
				$msg = "Nama Pembayaran Harus Di isi";
				echo json_encode(['code'=>0, 'result'=>$msg]);die();
			}
			$insert = array(
				'payment_name'	       => $payment_name,
				'payment_no_rek'	   => $payment_rek !== null ? $payment_rek : '',
			);
			$this->masterdata_model->save_payment($insert);

			$data_insert_act = array(
				'activity_table_desc'	       => 'Tambah Master Pembayaran',
				'activity_table_user'	       => $user_id,
			);
			$this->global_model->save($data_insert_act);
			$msg = "Succes Input";
			echo json_encode(['code'=>200, 'result'=>$msg]);
			die();
		}else{
			$msg = "No Access";
			echo json_encode(['code'=>0, 'result'=>$msg]);
		}
	}

	public function edit_payment()
	{
		$modul = 'Payment';
		$check_auth = $this->check_auth($modul);
		if($check_auth['check_access'][0]->edit == 'Y'){
			$payment_id 	= $this->input->post('payment_id');
			$payment_name 	= $this->input->post('payment_name');
			$payment_rek 	= $this->input->post('payment_rek');
			$user_id 		= $_SESSION['user_id'];

			if($payment_name == null){
				$msg = "Nama Pembayaran Harus Di isi";
				echo json_encode(['code'=>0, 'result'=>$msg]);die();
			}

			$update = array(
				'payment_name'	       => $payment_name,
				'payment_no_rek'	   => $payment_rek !== null ? $payment_rek : '',
			);

			$this->masterdata_model->update_payment($update, $payment_id);
			$data_insert_act = array(
				'activity_table_desc'	       => 'Ubah Master Payment',
				'activity_table_user'	       => $user_id,
			);
			$this->global_model->save($data_insert_act);
			$msg = "Succes Update";
			echo json_encode(['code'=>200, 'result'=>$msg]);
			die();
		}else{
			$msg = "No Access";
			echo json_encode(['code'=>0, 'result'=>$msg]);
		}	
	}

	public function payment_list()
	{

		$modul = 'Payment';
		$check_auth = $this->check_auth($modul);
		if($check_auth['check_access'][0]->view == 'Y'){
			$search 			= $this->input->post('search');
			$length 			= $this->input->post('length');
			$start 			  	= $this->input->post('start');

			if($search != null){
				$search = $search['value'];
			}
			$user_id = $_SESSION['user_id'];
			$list = $this->masterdata_model->payment_list($search, $length, $start)->result_array();
			$count_list = $this->masterdata_model->payment_list_count($search)->result_array();
			$total_row = $count_list[0]['total_row'];
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $field) {

				if($field['is_ppn'] == 'PPN'){
					$prodcut_ppn = '<span class="badge badge-success"><i class="fas fa-check-circle"></i></span>';
				}else{
					$prodcut_ppn = '<span class="badge badge-danger multi-badge"><i class="fas fa-times-circle"></i></span>';
				}

				if($field['is_package'] == 'Y'){
					$product_package = '<span class="badge badge-success"><i class="fas fa-check-circle"></i></span>';
				}else{
					$product_package = '<span class="badge badge-danger multi-badge"><i class="fas fa-times-circle"></i></span>';
				}

				if($check_auth['check_access'][0]->edit == 'Y'){
					$edit = '<button type="button" class="btn btn-icon btn-warning btn-sm mb-2-btn" data-bs-toggle="modal" data-bs-target="#exampleModaledit" data-id="'.$field['product_id'].'" data-name="'.$field['product_name'].'"><i class="fas fa-edit sizing-fa"></i></button> <button type="button" class="btn btn-icon btn-info btn-sm mb-2-btn btnprice" onclick="setprice('.$field['product_id'].')""><i class="fas fa-cog sizing-fa"></i></button> ';
				}else{
					$edit = '<button type="button" class="btn btn-icon btn-warning btn-sm mb-2-btn" disabled="disabled"><i class="fas fa-edit sizing-fa"></i></button> <button type="button" class="btn btn-icon btn-info btn-sm mb-2-btn" disabled="disabled"><i class="fas fa-cog sizing-fa"></i></button> ';
				}

				if($check_auth['check_access'][0]->delete == 'Y'){
					$delete = '<button type="button" class="btn btn-icon btn-danger delete btn-sm mb-2-btn" onclick="deletes('.$field['product_id'].')"><i class="fas fa-trash-alt sizing-fa"></i></button> ';
				}else{
					$delete = '<button type="button" class="btn btn-icon btn-danger delete btn-sm mb-2-btn"  disabled="disabled"><i class="fas fa-trash-alt sizing-fa"></i></button> ';
				}

				$product_sell_price_1 = '<span class="badge badge-primary">'.number_format($field['product_sell_price_1']).'</span>';

				$url_image = base_url().'assets/products/'.$field['product_image'];
				$no++;
				$row = array();
				$row[] = '<h2 class="table-product">'.$field['product_code'].'</h3><p>'.$field['product_name'].'</p>';
				$row[] = $field['brand_name'];
				$row[] = $field['category_name'];
				$row[] = $product_sell_price_1;
				$row[] = $field['product_supplier_tag'];
				$row[] = $product_package;
				$row[] = $prodcut_ppn;
				$row[] = '<img src="'.$url_image.'" width="50%" onerror="this.onerror=null;this.src=\''.base_url().'assets/products/default.png\';">';
				$row[] = $edit.$delete;
				$data[] = $row;
			}
			$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $total_row,
				"recordsFiltered" => $total_row,
				"data" => $data,
			);
			echo json_encode($output);
		}else{
			$msg = "No Access";
			echo json_encode(['code'=>0, 'result'=>$msg]);die();
		}

	}	
	// End payment type
}	

?>