<?php

class Data_Share_Model extends Model {

	public function __construct() {
		parent::__construct();
	}
    public function index()
	{
      
        $member = Session::get('member');
       
		return $this->db->selectAll('SELECT data_owner.id_member,data_owner.accession_number,data_owner.id_fact_tomato,data_shared.status_sh,data_owner.status_ow FROM 
        
        (SELECT max(id_data_shared) AS max_id,data_shared.accession_number AS acc_n FROM `data_shared` WHERE data_shared.id_member_owner = '.$member['id_member'].'
        GROUP BY data_shared.accession_number)AS t1
        
        INNER JOIN data_shared ON t1.max_id = data_shared.id_data_shared
        RIGHT JOIN data_owner ON data_owner.accession_number  = data_shared.accession_number
        WHERE  data_owner.id_member = '.$member['id_member'].'
        GROUP BY data_owner.accession_number, data_owner.id_member,data_owner.id_fact_tomato,data_shared.status_sh,data_owner.status_ow');

	}
	public function get_share()// share with me
	{
        
        $member = Session::get('member');
		return $this->db->selectAll("SELECT data_shared.id_member_owner,data_shared.id_member_shared,data_shared.accession_number,data_shared.id_fact_tomato,data_shared.date_shared,member.id_member,member.firstname FROM
        (	SELECT max(data_shared.id_data_shared)AS max_id FROM data_shared 
            WHERE data_shared.id_member_shared = '".$member['id_member']."'
             GROUP BY data_shared.id_member_owner,data_shared.id_member_shared,data_shared.accession_number,data_shared.id_fact_tomato,data_shared.date_shared
         ) r
         INNER JOIN 
         data_shared ON data_shared.id_data_shared = r.max_id AND data_shared.status_sh!='Unshared'
          LEFT JOIN member ON member.id_member = data_shared.id_member_owner
          LEFT JOIN data_owner ON data_owner.id_member = data_shared.id_member_owner 
          WHERE  member.id_member != '".$member['id_member']."' AND data_owner.status_ow != 'Public' AND data_owner.id_fact_tomato = data_shared.id_fact_tomato");
	}
	public function modal_share($data)
	{
		return $this->db->selectAll("SELECT data_shared.id_member_owner,data_shared.id_member_shared,data_shared.accession_number,data_shared.id_fact_tomato,data_shared.date_shared,member.id_member,member.firstname,member.lastname,member.email,member.permission FROM
        (	SELECT max(data_shared.id_data_shared)AS max_id FROM data_shared 
            WHERE data_shared.id_member_owner = '".$data['user_id']."' AND data_shared.accession_number = '".$data['lexx']."'
             GROUP BY data_shared.accession_number,data_shared.id_member_shared
         ) r
         INNER JOIN 
         data_shared ON data_shared.id_data_shared = r.max_id AND data_shared.status_sh!='Unshared'
          RIGHT JOIN member ON member.id_member = data_shared.id_member_shared 
          WHERE  member.id_member != '".$data['user_id']."'");
    }
    public function modal_share_close()
	{
   
        $member = Session::get('member');
		return $this->db->selectAll("SELECT data_owner.id_member,data_owner.accession_number,data_owner.id_fact_tomato,data_shared.status_sh,data_owner.status_ow 
        FROM 
        
        (SELECT max(id_data_shared) AS max_id,data_shared.accession_number AS acc_n FROM `data_shared` WHERE data_shared.id_member_owner = '".$member['id_member']."'
        GROUP BY data_shared.accession_number)AS t1

        INNER JOIN data_shared ON t1.max_id = data_shared.id_data_shared
        RIGHT JOIN data_owner ON data_owner.accession_number  = data_shared.accession_number
        WHERE  data_owner.id_member = '".$member['id_member']."'
        GROUP BY data_owner.id_member,data_owner.accession_number,data_owner.id_fact_tomato,data_shared.status_sh,data_owner.status_ow");
        
    }
    public function chang_status($data)
	{
      
        $member = Session::get('member');
        $postData = array(
			'status_ow' => $data['status']
		);
		return $this->db->update('data_owner', $postData, "data_owner.id_member = {$member['id_member']} AND data_owner.accession_number='{$data['lexx']}'");
    }
    public function share_user($data)
	{
        $this->db->insert('data_shared', array(
            'id_fact_tomato' => $data['id_fact'],
            'id_member_owner' => $data['id_owner'],
            'id_member_shared' => $data['id_share'],
            'accession_number' => $data['lexx'],
            'date_shared' => $data['date'] ,
            'status_sh' => $data['status']
		));
    }
    public function unshare_user($data)
	{
        $this->db->insert('data_shared', array(
            'id_fact_tomato' => $data['id_fact'],
            'id_member_owner' => $data['id_owner'],
            'id_member_shared' => $data['id_share'],
            'accession_number' => $data['lexx'],
            'date_shared' => $data['date'] ,
            'status_sh' => $data['status']
		));
    }
    public function accession_detail($data)
	{
        return $this->db->selectAll("SELECT * FROM `cha_chatagory_noid` WHERE cha_chatagory_noid.accession_number = '".$data['accession']."'");
    }
}