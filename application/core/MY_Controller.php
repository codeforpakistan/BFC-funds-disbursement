<?php
class MY_Controller extends CI_Controller {
	public $admin = NULL;

	function __construct() {
		parent::__construct();
		$this->admin = &get_instance();

		if (!(($this->session->has_userdata('is_admin_login')) || ($this->session->has_userdata('is_user_login')))) {
			redirect(base_url('auth/logout'));
			// redirect('admin');
		}
	}

	public function getRecordById($id, $tbl_name) {
		$result = $this->common_model->getRecordById($id, $tbl_name);
		return $result;
	}

	public function getAllRecordByColoumn($tbl_name, $tbl_col, $value) {
		$result = $this->common_model->getAllRecordByColoumn($tbl_name, $tbl_col, $value);
		return $result;
	}

	public function getAllRecordByArray($tbl_name, $array) {
		$result = $this->common_model->getAllRecordByArray($tbl_name, $array);
		return $result;
	}
	public function getAllRecordByArrayGroupBy($tbl_name, $group_by, $array) {
		$result = $this->common_model->getAllRecordByArrayGroupBy($tbl_name, $group_by, $array);
		return $result;
	}

}
?>
