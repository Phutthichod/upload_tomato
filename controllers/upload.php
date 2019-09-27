<?php
require 'models/char_data_model.php';
require 'models/location_model.php';
require 'models/genome_data_model.php';
require 'models/data_share_model.php';
class Upload extends Controller
{

	public function __construct()
	{
		parent::__construct();
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
	public function index()
	{
		//Session:init();
		//Session::get([key]);
		//$check =Char_data_Model::update_data();
		//print_r($check);
		$data_share = new Data_Share_Model();
		$this->view->search_acc = $data_share->index();
		$this->view->get_share = $data_share->get_share();
		$this->view->render('upload/pinto');
		

	}
	public function check_data()
	{
		$file = $_FILES['upl'];
		$this->view->file = $file;
		//$this->view->List = Char_data_Model::getAllFact();
		$this->view->table_value = Char_data_Model::get_all_table_value();
		$this->view->render('upload/data_verify');
	}
	public function search_id()
	{
		$accession_number = $_POST['accession_number'];
		$check = Char_data_Model::get_by_accession($accession_number);
		header('Content-type: application/json');
		print json_encode($check);
	}
	public function excel_upload()
	{
		if (isset($_POST["length"])) {
			$length = $_POST['length'];
			if ($length > 0) {
				$num_row = ["true" => 0, "false" => 0];
				$detail = array();
				for ($i = 1; $i < $length; $i++) {
					if (isset($_POST["NO$i"])) {
						$NO = $_POST["NO$i"];
						// print_r($NO);
						// echo "<br/>";
						$category_list = array();
						$field_value_list = array();
						$insert_category_list = array();
						$insert_field_value_list = array();
						$seedling_list = array();
						$plant_list = array();
						$flower_list = array();
						$fruit_list = array();
						$seed_list = array();

						for ($j = 0; $j < count($NO) - 1; $j++) {
							$seedling = ["hypocotyl_colour", "hypocotyl_colour_intensity", "hypocotyl_pubescence"];
							$plant = [
								"plant_growth_type", "plant_size", "stem_pubescence_density", "stem_internode_length", "foliage_density", "number_of_leaves_under_1st_inflorescence", "leaf_attitude", "leaf_type", "degree_of_leaf_dissection", "anthocyanin_colouration_of_leaf_veins"
							];
							$flower = [
								"inflorescence_type", "corolla_colour", "corolla_blossom_type", "flower_sterility_type", "style_position", "style_shape", "style_hairiness", "dehiscence"
							];
							$fruit = [
								"exterior_colour_of_immature_fruit", "presence_of_green_shoulder_trips_on_the_fruit", "intensity_of_greenback", "fruit_pubescence", "predominant_fruit_shape", "fruit_size", "fruit_size_homogeneity", "exterior_colour_of_mature_fruit", "intensity_of_exterior_colour", "ribbing_at_calyx_end", "easiness_of_fruit_to_detach_from_pedicel", "fruit_shoulder_shape", "presence_absence_of_jiontless_pedicel", "easiness_of_fruit_wall_skin_to_be_peeled", "skin_colour_of_ripe_fruit", "flesh_colour_of_peiricarp_interior", "flesh_colour_intensity", "colour_intensity_of_core", "fruit_cross_sectional_shape", "shape_of_pistil_scar", "fruit_blossom_end_shape", "blossom_end_scar_condition", "fruit_firmness_after_storage"
							];
							$seed = ["seed_shape", "seed_colour"];
							if ($j + 2 <= count($NO) - 1) {
								if ($NO[$j] == 'update' && $NO[$j + 2] != 'update') {

									//echo $NO[$j].$NO[$j + 1].$NO[$j + 2]."<br/>";
									$array_data = explode("@", $NO[$j + 2]);
									$table = $array_data[0];
									$value = $array_data[1];
									if ($this->model->check_table_exit($table)) {
										//echo $table."<br/>";
										$id_value = $this->model->check_data_exit($table, $value);
										if (!$id_value) {
											$id_value = $this->model->insert_data_in_table($table, $value);
										}
										if (in_array("$table", $seedling)) {
											$seedling_list[$table] = $id_value;
										} else if (in_array("$table", $plant)) {
											$plant_list[$table] = $id_value;
										} else if (in_array("$table", $flower)) {
											$flower_list[$table] = $id_value;
										} else if (in_array("$table", $fruit)) {
											$fruit_list[$table] = $id_value;
										} else if (in_array("$table", $seed)) {
											$seed_list[$table] = $id_value;
										}
										$category_list = [
											"seedling" => $seedling_list, "plant" => $plant_list, "flower" => $flower_list, "fruit" => $fruit_list, "seed" => $seed_list
										];
										//print_r($category_list);
										// echo "<br/>";
									} else {
										if (empty($value)) {
											$field_value_list[$table] = NULL;
										} else {
											$field_value_list[$table] = $value;
										}
									}
								}
							}
							if ($j + 1 <= count($NO) - 1) {
								if ($NO[$j] == 'insert' && $NO[$j + 1] != 'insert' && $j + 1 <= count($NO) - 1) {

									$array_data = explode("@", $NO[$j + 1]);
									$table = $array_data[0];
									$value = $array_data[1];
									if ($this->model->check_table_exit($table)) {
										$id_value = $this->model->check_data_exit($table, $value);
									
										if (!$id_value) {
											$id_value = $this->model->insert_data_in_table($table, $value);
											
										}
										
										if (in_array("$table", $seedling)) {
											$seedling_list["id_$table"] = $id_value;
										} else if (in_array("$table", $plant)) {
											$plant_list["id_$table"] = $id_value;
										} else if (in_array("$table", $flower)) {
											$flower_list["id_$table"] = $id_value;
										} else if (in_array("$table", $fruit)) {
											$fruit_list["id_$table"] = $id_value;
										} else if (in_array("$table", $seed)) {
											$seed_list["id_$table"] = $id_value;
										} else if ($table = "accession_number") {
											$access_number = $id_value;
											$name_accession = $value;
										}
										$insert_category_list = [
											"accession_number" => $name_accession, "id_accession_number" => $access_number,
											"seedling" => $seedling_list, "plant" => $plant_list, "flower" => $flower_list, "fruit" => $fruit_list, "seed" => $seed_list
										];
										//print_r($category_list);
										// echo "<br/>";
									} else {
										if (empty($value)) {
											$insert_field_value_list[$table] = NULL;
										} else {
											$insert_field_value_list[$table] = $value;
										}
									}
								}
							}
						}
						if (count($category_list)) {
							$id_accession = $this->model->check_data_exit("accession_number", $NO[1]);
							$tomato = Char_data_Model::get_by_id_accession($id_accession);
							$id_list_group = array();


							if ($tomato) {
								$count = 0;
								//print_r($category_list);
								foreach ($category_list as $key => $value) {
									$check_group_id = false;
									if (count($value) > 0) {
										foreach ($value as $key2 => $value2) {
											if ($value2 != $tomato["id_$key2"]) {
												//print_r($value);
												//echo "<br/> excel=> ".$value2."   database => ".$tomato["id_$key2"];
												$check_group_id = true;
												break;
											}
										}
										if ($check_group_id) {
											$id_group = $this->model->check_group($key, $category_list[$key], $tomato["id_$key"]);
											//echo "id group =>".$id_group;
										} else {
											$id_group = $tomato["id_$key"];
											//echo "else id group =>".$id_group;
										}
										$id_list_group["id_$key"] = $id_group;
									}
								}
								$fact_update = $id_list_group + $field_value_list;
								//print_r($id_list_group);
								//print_r($field_value_list);
								$check_num_row = $this->model->update_fact($fact_update, $id_accession, $NO[1]);
								if ($check_num_row["status"]) {
									$num_row["true"]++;
								} else {
									if ($check_num_row["error"] == "no row update") {
										$num_row["true"]++;
									} else {
										$num_row["false"]++;
										$detail[] = $check_num_row["error"];
									}
								}
							}
						} else if (count($field_value_list)) {
							//print_r($field_value_list);
							$id_accession = $this->model->check_data_exit("accession_number", $NO[1]);
							$check_num_row = $this->model->update_fact($field_value_list, $id_accession, $NO[1]);
							if ($check_num_row["status"]) {
								$num_row["true"]++;
							} else {
								//print_r($check_num_row["error"]);
								if ($check_num_row["error"] == "no row update") {
									$num_row["true"]++;
								} else {
									$num_row["false"]++;
									$detail[] = $check_num_row["error"];
								}
							}
						} else if (count($insert_category_list + $insert_field_value_list)) {
							$access["id_fact_tomato"] =  null;
							$access["id_accession_number"] = $insert_category_list["id_accession_number"];
							$access["id_photo"] = 1;
							$accession = $insert_category_list["accession_number"];
							unset($insert_category_list["accession_number"]);
							unset($insert_category_list["id_accession_number"]);
							$id_list_group = array();
							foreach ($insert_category_list as $key => $value) {
								$id_group = $this->model->get_id_group($key, $insert_category_list[$key]);
								$id_list_group["id_$key"] = $id_group;
							}
							$fact = $access + $id_list_group + $insert_field_value_list;
							//print_r($fact);
							$check = $this->model->insert_fact($fact, $accession);
							if ($check["status"]) {
								// echo " id_member => ".$member['id_member']." id_fact_tomato => ".$check["id_fact_tomato"]." accession => ".$accession;
								$member =Session::get("member");
								$check_owner = $this->model->insert_data_owner($member['id_member'], $check["id_fact_tomato"], $accession);
								$num_row["true"]++;
							} else {
								$num_row["false"]++;
								$detail[] = $check["error"];
							}
						}
					} else {
						continue;
					}

					//echo "<br/>";
				}
				$this->view->num_row = $num_row;
				$this->view->detail = $detail;
				$this->view->render('upload/result_upload');
				//print_r($num_row);
				//print_r($detail);
			}
		} else {
			//echo "no row update";
			$this->view->no_row = 1;
			$this->view->render('upload/result_upload');
		}
	}
	public function check_data_location()
	{
		$file = $_FILES['upl'];
		$data_passport =Location::get_all_table_value();
		$this->view->file = $file;
		//$this->view->List = Location::location_all();
		$this->view->table_value = $data_passport;
		$this->view->render('upload/data_verify_location');
	}
	
	public function search_id_passport()
	{
		$accession_number = $_POST['accession_number'];
		$check = Location::get_by_accession($accession_number);
		header('Content-type: application/json');
		print json_encode($check);
	}
	public function check_accession()
	{
		$accession_number = $_POST['accession_number'];
		$check = Location::check_accession($accession_number);
		header('Content-type: application/json');
		print json_encode($check);
	}
	public function check_data_genome()
	{
		$file = $_FILES['upl'];
		//print_r($file);
		include("libs/PHPExcel-1.8/Classes/PHPExcel.php");
		include("views/upload/helper_genome.php");
		$dataConfix = [];
		$dataAdd	= [];
		$keyAcc = [];

		//MAke data to db
			// $data_test = '';
			// for ($i=1; $i < 13052; $i++) { 
			// 	$data_test .= $data_arr[$i][3].'@';
			// }

			// print($data_test);
			// echo '<br>';
			// print(Genome_toDB($data_test));
		for($i=3; $i < sizeof($data_arr[0]); $i++) { //sizeof($data_arr[0])

			$check = Genome_data_Model::CheckAcc($data_arr[0][$i]);
			$encodeExcel = '';
			for ($j=0; $j <= 13051; $j++) { 
				$encodeExcel .= $data_arr[$j+1][$i].'@';
			}
			$encodeExcel = Genome_toDB($encodeExcel);
			$encodeExcel = explode("@", $encodeExcel);

			$key = '';
			$checkConflict = false;
			if ($check['accession_number']!='') {
				//print($data_arr[0][$i]);
				for ($j=0; $j <= 13051; $j++) { 
					//print('index: '.$j.'  , '.$check['dna_accession'][$j].'<==>'.$toVw[$j]);
					//echo '<br>';
					$key .= $encodeExcel[0][$j];
					// $dataConfix[$data_arr[0][$i]]['data'][$j+1] = $toVw[$j];
					if($encodeExcel[0][$j] != $check['dna_accession'][$j]){
						// print($toVw[0][$j].'===='.$check['dna_accession'][$j]);
						// echo '<br>';
						$dataConfix[$data_arr[0][$i]]['conflict'][$j+1] = $data_arr[$j+1][$i];
						$checkConflict = true;
					}
				}
				if($checkConflict){
					// echo'confil';
					// echo '<br>';
					$dataConfix[$data_arr[0][$i]]['dataConflict'] = $key;
					// print_r($dataConfix[$data_arr[0][$i]]['dataConflict']);
					// echo '<br>';
				}
			} 
			else {
				for ($j=0; $j <= 13051; $j++) { 
						$key .= $encodeExcel[0][$j];	
				}
				$dataAdd[$data_arr[0][$i]]['readyData'] = $key;
				$checkConflict = true;
			}
			if(!$checkConflict){
				$dataAdd[$data_arr[0][$i]]['readyData'] = "Current";
			}
		}
		$this->view->dataPosition = Genome_data_Model::dataPosition();
		$this->view->Add = $dataAdd;
		$this->view->Conf = $dataConfix;
		 
		$this->view->render('upload/data_verify_genome');
	}
	//ASree ADD
	public function importGenome(){
		$data = $_POST;
		//print_r($data);
		$count = 0;
		foreach ($data as $key => $value) {
			Genome_data_Model::import_genome($key,$value);
			$count++;
		}
			$num_row["true"] = $count;
			$num_row["false"] = 0;
			$this->view->num_row = $num_row;
			$this->view->detail = 'Add data';
			$this->view->render('upload/result_upload');
	}
	//End Add
	public function location_upload()
	{
		if (isset($_POST["length"])) {
			$length = $_POST['length'];
			if ($length > 0) {
				$num_row = ["true" => 0, "false" => 0];
				$detail = array();
				for ($i = 1; $i < $length; $i++) {
					if (isset($_POST["NO$i"])) {
						$NO = $_POST["NO$i"];
						$fact_update = array();
						$fact_insert = array();
						$field_value_list = array();
						$insert_field_value_list = array();
						$fact_location = array();
						$insert_fact_location = array();
						$category_list = array();
						$insert_category_list = array();


						for ($j = 0; $j < count($NO) - 1; $j++) {
							$location = ["sub_district", "district", "province", "country"];
							if ($j + 2 <= count($NO) - 1) {
								if ($NO[$j] == 'update' && $NO[$j + 2] != 'update') {
									//echo $NO[$j] . " " . $NO[$j + 1] . " " . $NO[$j + 2] . "<br>";
									$array_data = explode("@", $NO[$j + 2]);
									$table = $array_data[0];
									$value = $array_data[1];
									if ($this->model->check_table_exit($table)) {
										$id_value = $this->model->check_data_exit($table, $value);
										if (!$id_value) {
											$id_value = $this->model->insert_data_in_table($table, $value);
										}
										if (in_array("$table", $location)) {
											$fact_location[$table] = $id_value;
										} else {
											$category_list[$table] = $id_value;
										}
									} else {
										if (empty($value)) {
											$field_value_list[$table] = NULL;
										} else {
											if ($table == "collection_date") {
												$field_value_list[$table] = dmy_TO_ymd($value);
											} else {
												$field_value_list[$table] = $value;
											}
										}
									}
								}
							}
							if ($j + 1 <= count($NO) - 1) {
								if ($NO[$j] == 'insert' && $NO[$j + 1] != 'insert' && $j + 1 <= count($NO) - 1) {

									//echo $NO[$j] . " " . $NO[$j + 1] . "<br>";
									$array_data = explode("@", $NO[$j + 1]);
									$table = $array_data[0];
									$value = $array_data[1];
									if ($this->model->check_table_exit($table)) {
										$id_value = $this->model->check_data_exit($table, $value);
										if (!$id_value) {
											$id_value = $this->model->insert_data_in_table($table, $value);
										}
										if (in_array("$table", $location)) {
											$insert_fact_location[$table] = $id_value;
										} else {
											$insert_category_list[$table] = $id_value;
										}
									} else {
										if (empty($value)) {
											$insert_field_value_list[$table] = NULL;
										} else {
											if ($table == "collection_date") {
												$insert_field_value_list[$table] = dmy_TO_ymd($value);
											} else {
												$insert_field_value_list[$table] = $value;
											}
										}
									}
								}
							}
						}

					
						$id_accession = $this->model->check_data_exit("accession_number", $NO[1]);
						$passpot = Location::get_by_id_accession($id_accession);
						if (count($fact_location)) {


							if ($passpot) {
								$id_list_group = $passpot;
								unset($id_list_group["accession_number"]);
								unset($id_list_group["id_fact_location"]);
								unset($id_list_group["id_fact_passport"]);
								$count = 0;

								foreach ($fact_location as $key => $value) {

									if ($value != $passpot[$key]) {
										$id_list_group[$key] = $value;
									}
								}
								//echo "<br>";

								$id_location['fact_location'] = $this->model->get_id_location($id_list_group);


								$fact_update += $id_location;
							}
							if (count($category_list)) {
								$fact_update += $category_list;
							}
							if (count($field_value_list)) {
								$fact_update += $field_value_list;
							}
							//echo "id => ".$passpot['id_fact_passport'];
							$check_num_row = $this->model->update_fact_location($fact_update, $passpot['id_fact_passport'], $NO[1]);
							if ($check_num_row["status"]) {
								$num_row["true"]++;
							} else {
								if ($check_num_row["error"] == "no row update") {
									$num_row["true"]++;
								} else {
									$num_row["false"]++;
									$detail[] = $check_num_row["error"];
								}
							}
						} else if (count($field_value_list)) {
							//print_r($passpot);
							//echo "id => ".$passpot['id_fact_passport'];
							$fact_update += $field_value_list;
							$check_num_row = $this->model->update_fact_location($fact_update, $passpot['id_fact_passport'], $NO[1]);
							if ($check_num_row["status"]) {
								$num_row["true"]++;
							} else {
								if ($check_num_row["error"] == "no row update") {
									$num_row["true"]++;
								} else {
									$num_row["false"]++;
									$detail[] = $check_num_row["error"];
								}
							}
						}
						else if($insert_fact_location+$insert_category_list+$insert_field_value_list)
						{
							$data = explode("@", $NO[1]);
							$id_accession = $this->model->check_data_exit("accession_number", $data[1] );
							$id_location['fact_location'] = $this->model->get_id_location($insert_fact_location);
							$fact_insert=$insert_category_list+$insert_field_value_list+ $id_location;
							unset($fact_insert["accession"]);
							$fact_insert['accession_number'] = $id_accession;
							$fact_insert['id_fact_passport'] =null;
							$check_num_row = $this->model->insert_fact_location($fact_insert,  $data[1]);
							if ($check_num_row["status"]) {
								$num_row["true"]++;
							} else {
								if ($check_num_row["error"] == "no row update") {
									$num_row["true"]++;
								} else {
									$num_row["false"]++;
									$detail[] = $check_num_row["error"];
								}
							}
						}
					} else {
						continue;
					}
				}
				$this->view->num_row = $num_row;
				$this->view->detail = $detail;
				$this->view->render('upload/result_upload');
			}
		} else {
			//echo "no row update";
			$this->view->no_row = 1;
			$this->view->render('upload/result_upload');
		}
	}
	public function check_accession_physical()
	{
		$accession_number = $_POST['accession_number'];
		$check = Char_data_Model::get_by_accession($accession_number);
		header('Content-type: application/json');
		if($check)
		print json_encode(true);
		else
		print json_encode(false);
	}
	//ASree ADD
	public function check_accession_genome()
	{
		$accession_number = $_POST['accession_number'];
		$check = Genome_data_Model::check_accession_genome($accession_number);
		header('Content-type: application/json');
		print json_encode($check);
	}
	public function upload_genome(){
		$id = 0;
		$Post_Genome_data_split='';
		if(isset($_POST["data_genome"])) {
			$id = $_POST["ID_genome"];
			$Post_Genome  = $_POST["data_genome"];;
			$Post_Genome_data = $Post_Genome[0];
			

			for ($i=0,$j=0; $i < 26101; $i++) { 
				if($Post_Genome_data[$i] != ','){
					$temp = $Post_Genome_data[$i];
					$Post_Genome_data_split=$Post_Genome_data_split.$temp;
					$j++;
				}
			}
			//print_r(strlen($Post_Genome_data_split));
			Genome_data_Model::update_accession_genome($id,$Post_Genome_data_split);
			$num_row["true"] = 1;
			$num_row["false"] = 0;
			$this->view->num_row = $num_row;
			$this->view->detail = 'Update data';
			$this->view->render('upload/result_upload');
		}
		else if(isset($_POST["INSERT_GENOME"])) {
			$Name_Genome = $_POST["NAME_genome"];
			$Insert_Genome  = $_POST["INSERT_GENOME"];
			$Insert_Genome_data_split='';
			$Insert_Genome_data = $Insert_Genome[0];
			
			for ($i=0,$j=0; $i < 26101; $i++) { 
				if($Insert_Genome_data[$i] != ','){
					$temp = $Insert_Genome_data[$i];
					$Insert_Genome_data_split=$Insert_Genome_data_split.$temp;
					$j++;
				}
			}
			//print_r(strlen($Post_Genome_data_split));
			Genome_data_Model::insert_accession_genome($Name_Genome,$Insert_Genome_data_split);
			$num_row["true"] = 1;
			$num_row["false"] = 0;
			$this->view->num_row = $num_row;
			$this->view->detail = 'Add data';
			$this->view->render('upload/result_upload');

		}
	}
	
}
