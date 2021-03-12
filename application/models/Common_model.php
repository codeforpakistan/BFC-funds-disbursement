<?php
class Common_model extends CI_Model {
	public function __construct() {
		$this->load->database();

	}
	public function getAllRecordByArray($tbl_name, $array) {
		$this->db->order_by('id', 'desc');
        $query = $this->db->get_where($tbl_name, $array); 
		return $query->result_array();
	}
	public function getAllRecordByArrayGroupBy($tbl_name, $group_by, $array) {
		$this->db->order_by('id', 'desc');
		$this->db->group_by($group_by);
		$query = $this->db->get_where($tbl_name, $array);
		return $query->result_array();
	}
	public function getRecordByArray($tbl_name, $array) {
		$this->db->order_by('id', 'desc');
		$query = $this->db->get_where($tbl_name, $array);
		return $query->row_array();
	}
	public function deleteRecordByID($del_id, $tbl_name) {
		// $this->db->delete($tbl_name, array('id' => $del_id));
		// return true;
		// return $this->db->error();
		if (!$this->db->delete($tbl_name, array('id' => $del_id))) {
			return $this->db->error();
		}
		return true;
	}
	public function deleteRecordByColoumn($tbl_name, $tbl_col, $value) {
		$this->db->delete($tbl_name, array($tbl_col => $value));
		return true;
	}
	public function recordDBCheck($del_id, $chkDB, $chkDBAtrr) {
		$query = $this->db->get_where($chkDB, array($chkDBAtrr => $del_id));
		return $query->row_array();
	}
	public function getImageNameById($del_id, $tbl_name) {
		$query = $this->db->get_where($tbl_name, array('id' => $del_id));
		return $query->row_array();
	}
	public function delImage($folderName, $imageName) {
		unlink(IMG_UPLOAD_PATH . $folderName . '/' . $imageName);
	}
	public function delFile($folderName, $fileName) {
		unlink('./assets/upload/' . $folderName . '/' . $fileName);
	}
	public function delImageFromGallery($folderName, $imageName) {
		unlink('./assets/upload/gallery/' . $folderName . '/' . $imageName);
	}
	public function getRecordById($id, $tbl_name) {
		$query = $this->db->get_where($tbl_name, array('id' => $id));
		return $query->row_array();
	}
	public function getRecordByColoumn($tbl_name, $tbl_col, $value) {
		$query = $this->db->get_where($tbl_name, array($tbl_col => $value));
		return $query->row_array();
	}
	public function getAllRecordByColoumn($tbl_name, $tbl_col, $value) {
		$this->db->order_by('id', 'desc');
		$query = $this->db->get_where($tbl_name, array($tbl_col => $value));
		return $query->result_array();
    }
    public function getSumByColoumn($tbl_name, $field, $alias, $tbl_col, $value) {
        // $this->db->select('SUM('.$field.') as '.$alias);
        // $this->db->from($tbl_name);
		// $this->db->where( $tbl_col, $value);
		// $query = $this->db->get();
        // return $query->row_array();  

        $this->db->select('SUM('.$field.') as '.$alias);
        $this->db->from($tbl_name);  
        $this->db->where($tbl_col, $value);  
        $query = $this->db->get();
        $result = $query->row_array(); 
        $amount = $result[$alias]; 
        //echo 'amount = '. $amount;
        //echo $this->db->last_query();

        if($amount > 0) {
            return $amount;
        } else {
            return '0';
        }

	}
    public function getCountAll($tbl_name){
        $counter = $this->db->count_all($tbl_name);
        return $counter; 
    }
    public function countAllRecords($tbl_name) {
        $this->db->select('id');
        $this->db->from($tbl_name);
        //$this->db->where($your_conditions);
        //$this->db->limit($limit);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function countAllRecordsByCond($tbl_name, $your_conditions) {
        $this->db->select('id');
        $this->db->from($tbl_name);
        $this->db->where($your_conditions);
        $count = $this->db->count_all_results();
        return $count; 
    }
    public function getAllRecordsByCond($tbl_name, $your_conditions)
    {
        $this->db->select("*");
        $this->db->from($tbl_name);
        $this->db->where($your_conditions);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function countRecordsByCondGroupBy($tbl_name, $your_conditions, $group_by) {
        $this->db->select('id');
        $this->db->from($tbl_name);
        $this->db->where($your_conditions);
        $this->db->group_by($group_by);
        $count = $this->db->count_all_results();
        return $count;
    }
	public function getAllRecord($tbl_name) {

		$this->db->order_by('id', 'desc');
		if ($_SESSION['tbl_admin_role_id'] != 1) {
			$this->db->where('add_by', $_SESSION['admin_id']);}
		$query = $this->db->get($tbl_name);
		return $query->result_array();
	}
	public function getAllRecords($tbl_name) {
		$this->db->order_by('id', 'desc');
		$query = $this->db->get($tbl_name);
		return $query->result_array();
	}
	public function update_setting() {
		$insertion_date = strtotime($this->input->post('insertion_date'));
		$insertion_date = date('Y-m-d', $insertion_date);
		$increment_date = strtotime($this->input->post('increment_date'));
		$increment_date = date('Y-m-d', $increment_date);
		$data = array(
			'insertion_date' => $insertion_date,
			'increment' => $this->input->post('increment'),
			'increment_date' => $increment_date,
		);
		//XSS prevention
		$data = $this->security->xss_clean($data);
		//updation in db
		$this->db->where('id', $this->input->post('id'));
		return $this->db->update('tbl_setting', $data);
    }
    
    public function getApplicationNo() {
        $this->db->select('application_no');
        $this->db->from('tbl_grants_has_tbl_emp_info_gerund');
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
        $getAppNo = $query->row_array();
        $last_app_no = $getAppNo['application_no'];

        if($last_app_no == '') {
            $application_no = 10000001;
        } else {
            $application_no = $last_app_no+1;
        } 
        return $application_no;
    }
    

    public function getBatchNo() {
        $this->db->select('batch_no');
        $this->db->from('tbl_batches');
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
        $getBatchNo = $query->row_array();
        $last_batch_no = $getBatchNo['batch_no'];

        if($last_batch_no == '') {
            $batch_no = date('Ymd').'-1';
        } else {
            $lastBatch = explode("-", $last_batch_no); 
            $batchDate = $lastBatch[0];
            $batchInc = $lastBatch[1]; 
            $date = date('Ymd');

            if($date == $batchDate) {
                $inc = $batchInc+1; 
                $batch_no = $date.'-'.$inc;
            } else {
                $batch_no = $date.'-1';
            } 
            
        } 
        return $batch_no;
    }

    public function getBankBranch($branchID) {
        // $this->db->select('*');
        // $this->db->from('tbl_banks');
        // //$this->db->where('tbl_list_bank_branches.id', $branchID);
        // $this->db->join('tbl_list_bank_branches', 'tbl_list_bank_branches.tbl_banks_id = tbl_banks.id');
        // $query = $this->db->get();
        // return $query->result_array();

        // $this->db->select('tbl_list_bank_branches.name as location, tbl_banks.name as bank_type');
        // $this->db->from('tbl_list_bank_branches');
        // $this->db->join('tbl_banks','tbl_banks.id=tbl_list_bank_branches.tbl_banks_id');
        // $this->db->where('tbl_banks','admin');
        // $query=$this->db->get();
        // return $query->result_array();

    }


    public function sendSMS($smsArray){
        //echo '<pre>'; print_r($smsArray); exit;
        $applicantMobNo = $smsArray['applicantMobNo'];
        $smsContent = urlencode($smsArray['smsContent']);
        //$smsContent = 'this is test msg';
        $curl = curl_init();

        curl_setopt_array($curl, array(
        //CURLOPT_URL => "https://smscms.famzsolutions.com/sms/api/send?username=BFKP&password=BFKP@Nazim123&mask=BFKP&mobile=".$applicantMobNo."&message=".$smsContent,
        CURLOPT_URL => "https://smscms.famzsolutions.com/sms/api/send?username=BFKP&password=BFKP@Nazim123&mask=BFKP&mobile=".$applicantMobNo."&type=Urdu&message=".$smsContent."",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => false,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        //CURLOPT_POSTFIELDS =>"{\n\t\"username\":\"BFKP\",\n\t\"password\":\"BFKP@Nazim123\",\n\t\"mask\":\"BFKP\", \n\t\"mobile\":\"$applicantMobNo\", \n\t\"message\":\"$smsContent\",  }",
        CURLOPT_HTTPHEADER => array(
            "Content-Type: application/json"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        return $err;
        } else {
        return $response;
        }
    }
    

}
?>