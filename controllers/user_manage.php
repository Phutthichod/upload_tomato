<?php
class user_manage extends Model{
    public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		//Session:init();
		//Session::get([key]);
		//$check =Char_data_Model::update_data();
		//print_r($check);
		$this->view->render('plant/user_manage',true);
	}  
}

?>