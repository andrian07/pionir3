<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('global_model');
		$this->load->helper(array('url', 'html'));
	}

	public function index()
	{
		if(isset($_SESSION['user_name'] ) != null || isset($_SESSION['user_branch'] ) != null){
			redirect('Dashboard/Admin', 'refresh');
		}else{
			$this->load->view('Pages/login');
		}
	}


	private function check_auth(){
		if(isset($_SESSION['user_name']) == null){
			redirect('Masterdata', 'refresh');
		}else{
			$user_role_id = $_SESSION['user_role_id'];
			$check_auth_nav = $this->global_model->check_auth_nav($user_role_id);
			$check_access = $this->global_model->check_access_dashboard($user_role_id);
			$array = array(
				'check_auth_nav' => $check_auth_nav,
				'check_access' => $check_access
			);
			return($array);
		}
	}

	public function Admin(){
		$check_auth = $this->check_auth();
		$check_auth['check_auth'] = $check_auth;
		$get_transaction_today['get_transaction_today'] = $this->global_model->get_transaction_today()->result_array();
		$get_transaction_today_item['get_transaction_today_item'] = $this->global_model->get_transaction_today_item()->result_array();
		$get_transaction_month['get_transaction_month'] = $this->global_model->get_transaction_month()->result_array();
		$get_transaction_month_item['get_transaction_month_item'] = $this->global_model->get_transaction_month_item()->result_array();
		$get_total_asset['get_total_asset'] = $this->global_model->get_total_asset()->result_array();
		$get_total_asset_item['get_total_asset_item'] = $this->global_model->get_total_asset_item()->result_array();
		$get_transaction_yesterday['get_transaction_yesterday'] = $this->global_model->get_transaction_yesterday()->result_array();
		$get_transaction_last_month['get_transaction_last_month'] = $this->global_model->get_transaction_last_month()->result_array();
		$get_last_activity['get_last_activity'] = $this->global_model->get_last_activity()->result_array();
		$get_next_activity['get_next_activity'] = $this->global_model->get_next_activity()->result_array();
		$transfer_stock['transfer_stock'] = $this->global_model->transfer_stock()->result_array();
		$lost_faktur['lost_faktur'] = $this->global_model->lost_faktur()->result_array();
		$top_product_3_month['top_product_3_month'] = $this->global_model->top_product_3_month()->result_array();
		$sales_last_7_days['sales_last_7_days'] = $this->build_sales_last_7_days($this->global_model->get_sales_last_7_days()->result_array());
		$stock_by_category['stock_by_category'] = $this->build_stock_by_category($this->global_model->get_stock_by_category()->result_array());
		$data['data'] = array_merge($get_transaction_today, $get_transaction_month, $get_transaction_today_item, $get_transaction_month_item, $get_total_asset, $get_total_asset_item, $get_transaction_yesterday, $get_transaction_last_month, $get_last_activity, $get_next_activity, $transfer_stock, $lost_faktur, $top_product_3_month, $sales_last_7_days, $stock_by_category, $check_auth);
		$this->load->view('Pages/dashboard', $data);
	}

	private function build_sales_last_7_days($rows)
	{
		$by_date = array();
		foreach ($rows as $row) {
			$by_date[$row['sales_date']] = (float) $row['total'];
		}

		$result = array();
		for ($i = 6; $i >= 0; $i--) {
			$date = date('Y-m-d', strtotime("-$i day"));
			$result[] = array(
				'date'  => $date,
				'label' => date('d M', strtotime($date)),
				'total' => isset($by_date[$date]) ? $by_date[$date] : 0,
			);
		}
		return $result;
	}

	private function build_stock_by_category($rows, $top = 3)
	{
		$top_rows = array_slice($rows, 0, $top);
		$rest_rows = array_slice($rows, $top);

		$rest_total = 0;
		foreach ($rest_rows as $row) {
			$rest_total += (int) $row['total_item'];
		}

		$result = array();
		foreach ($top_rows as $row) {
			$result[] = array(
				'category_name' => $row['category_name'],
				'total_item'    => (int) $row['total_item'],
			);
		}
		if ($rest_total > 0) {
			$result[] = array(
				'category_name' => 'Lainnya',
				'total_item'    => $rest_total,
			);
		}
		return $result;
	}

}

?>