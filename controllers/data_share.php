<?php

class Data_Share extends Controller {

	function __construct() {
		// parent::__construct();
	}
	
	function index() {		
		//header('Content-Type: application/json');
		$this->view->search_acc = $this->model->index();
		$this->view->get_share = $this->model->get_share();
		// $this->view->render('data_share/index');
	}
	public function modal_share()// modal จัดการ share/unshare 
	{
		header('Content-Type: application/json');
		$data = array();
		$data['lexx'] = $_POST['LExx'];
		$data['user_id'] = $_POST['User_id'];
		$json_data = $this->model->modal_share($data);
		print json_encode($json_data);
	}
	public function modal_share_close()// ปิด modal จัดการ share/unshare  แลัว updat index
	{
		header('Content-Type: application/json');
		$json_data = $this->model->modal_share_close();
		print json_encode($json_data);
	}
	public function chang_status()// เปลี่ยน status ของแต่ละหมายเลข
	{
		header('Content-Type: application/json');
		$data = array();
		$data['status'] = "Public";
		$data['lexx'] = $_POST['aj_l'];
		$json_data = $this->model->chang_status($data);
		print json_encode($json_data);
		//$json_data = $this->model->chang_status($data);
		//print json_encode($json_data);
	}
	public function share_user()
	{
		header('Content-Type: application/json');
		$data = array();
		$data['id_fact'] = $_POST['aj_f'];
		$data['id_owner'] = $_POST['aj_o'];
		$data['id_share'] = $_POST['aj_s'];
		$data['lexx'] = $_POST['aj_l'];
		$data['date'] = $_POST['aj_d'];
		$data['status'] = "shared";
		$json_data = $this->model->share_user($data);
		print json_encode($json_data);
		//$json_data = $this->model->chang_status($data);
		//print json_encode($json_data);
	}
	public function unshare_user()
	{
		header('Content-Type: application/json');
		$data = array();
		$data['id_fact'] = $_POST['aj_f'];
		$data['id_owner'] = $_POST['aj_o'];
		$data['id_share'] = $_POST['aj_s'];
		$data['lexx'] = $_POST['aj_l'];
		$data['date'] = $_POST['aj_d'];
		$data['status'] = "Unshared";
		$json_data = $this->model->share_user($data);
		print json_encode($json_data);
		//$json_data = $this->model->chang_status($data);
		//print json_encode($json_data);
	}
	public function accession_detail()// เปลี่ยน status ของแต่ละหมายเลข
	{
		header('Content-Type: application/json');
		$data = array();
		$data['accession'] = $_POST['accession'];
		$json_data = $this->model->accession_detail($data);
		print json_encode($json_data);
	}
}