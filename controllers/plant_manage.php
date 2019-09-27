<?php
  class plant_manage extends Controller{
    public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->view->render('plant/plant_manage',true);
    }
    public function selectDataTable(){
        $sql = "select * from plant join color on (plant.p_color = color.p_color)";
      echo  $this->model->selectData($sql);
    } 
    public function updateData(){
        $this->model->updateData($sql);
    } 
    public function deleteData(){
        $this->model->deleteData($sql);
    }
    public function createData(){
        $this->model->createData($sql);
  }  
}
?>