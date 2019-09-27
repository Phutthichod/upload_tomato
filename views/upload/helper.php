<?php
//$List=$this->List;
$table_value =$this->table_value;
$tmpFile = $this->file["tmp_name"];  
    $fileName = $this->file["name"];  // เก็บชื่อไฟล์
    $info = pathinfo($fileName);
    $allow_file = array("csv","xls","xlsx");
/*  print_r($info);         // ข้อมูลไฟล์   
    print_r($_fileup);*/
    if($fileName!="" && in_array($info['extension'],$allow_file)){
        // อ่านไฟล์จาก path temp ชั่วคราวที่เราอัพโหลด
        $objPHPExcel = PHPExcel_IOFactory::load($tmpFile);      
         
         
        // ดึงข้อมูลของแต่ละเซลในตารางมาไว้ใช้งานในรูปแบบตัวแปร array
        $cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
          
        // วนลูปแสดงข้อมูล
		$data_arr=array();
	    foreach ($cell_collection as $cell) {
            // ค่าสำหรับดูว่าเป็นคอลัมน์ไหน เช่น A B C ....
            $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
            // คำสำหรับดูว่าเป็นแถวที่เท่าไหร่ เช่น 1 2 3 .....
            $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
            // ค่าของข้อมูลในเซลล์นั้นๆ เช่น A1 B1 C1 ....
            $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();          
             
            // เริ่มขึ้นตอนจัดเตรียมข้อมูล
            // เริ่มเก็บข้อมูลบรรทัดที่ 2 เป็นต้นไป
            $start_row = 1;
			// กำหนดชื่อ column ที่ต้องการไปเรียกใช้งาน
			//$col_name[] = array( "A"=>"0");
			//$col_name[] = array( "B"=>"1");
			//print_r($col_name);
            $col_name = array( 
                "A"=>"0","B"=>"1","C"=>"2","D"=>"3","E"=>"4","F"=>"5","G"=>"6","H"=>"7","I"=>"8",
                "J"=>"9","K"=>"10","L"=>"11","M"=>"12","N"=>"13","O"=>"14","P"=>"15","Q"=>"16",
                "R"=>"17","S"=>"18","T"=>"19","U"=>"20","V"=>"21","W"=>"22","X"=>"23","Y"=>"24",
                "Z"=>"25","AA"=>"26","AB"=>"27","AC"=>"28","AD"=>"29","AE"=>"30","AF"=>"31","AG"=>"32",
                "AH"=>"33","AI"=>"34","AJ"=>"35","AK"=>"36","AL"=>"37","AM"=>"38","AN"=>"39","AO"=>"40",
                "AP"=>"41","AQ"=>"42","AR"=>"43","AS"=>"44","AT"=>"45","AU"=>"46","AV"=>"47","AW"=>"48",
                "AX"=>"49","AY"=>"50","AZ"=>"51","BA"=>"52","BB"=>"53","BC"=>"54","BD"=>"55","BE"=>"56",
                "BF"=>"57","BG"=>"58","BH"=>"59","BI"=>"60","BJ"=>"61","BK"=>"62","BL"=>"63","BM"=>"64"
                // "BN"=>"65","BO"=>"66","BP"=>"67","BQ"=>"68","BR"=>"69","BS"=>"70","BT"=>"71","BU"=>"72",
                // "BV"=>"73","BW"=>"74","BX"=>"75","BY"=>"76","BZ"=>"77","CA"=>"78","CB"=>"79","CC"=>"80",
                // "CD"=>"81","CE"=>"82","CF"=>"83"
			);
			if($row >= $start_row){
                $data_arr[$row-$start_row][$col_name[$column]] = $data_value;                                               
            }
        }       
      //print_r($data_arr);
    }
    function prepare_data($data){
        // กำหนดชื่อ filed ให้ตรงกับ $col_name ด้านบน
        $arr_field = array();
        if(is_array($data)){
            foreach($arr_field as $v){
                if(!isset($data[$v])){
                    $data[$v]="";           
                }
            }
        }
        return $data;
    }
    function search_id($item,$List1){
        $chk=false;
        for ($i=0; $i < count($List1); $i++) {            
            if($List1[$i]['accession_number']== $item)
            {
                $chk=true;
                break;
            }
       
        }
        return $chk;
        
    }
    
?>