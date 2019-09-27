<?php
    class plant_manage_model extends PintoModel{
        public function __construct()
	{
        parent::__construct();
	}
      
        function selectData($sql){
            return   json_encode($this->db->select($sql));
        }
        function createData($sql){
            $this->db->insert();
            
        }
        function deleteData($sql){
            $this->db->delete();
        }
        function updateData($sql){
            $this->db->update();
        }
    }
?>