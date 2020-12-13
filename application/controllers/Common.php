<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Common extends MY_Controller {

	public function __construct() {
		error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
		parent::__construct();
	}

	public function fetchData($tbl_name, $tbl_col, $foreign_id) {
		$data = $this->common_model->getAllRecordByArray($tbl_name, array($tbl_col => $foreign_id, 'status' => '1'));
		echo json_encode($data);
	}
	public function fetchJoinDataGroupBy($tbl2, $tbl1_col, $foreign_id, $where_col, $group_by) {
		$data = $this->common_model->getJoinDataGroupBy($tbl2, $tbl1_col, $foreign_id, $where_col, $group_by);
		echo json_encode($data);
	}

	public function fetchJoinDataSubject($tbl_class_id) {
		$data = $this->common_model->getJoinDataSubject($tbl_class_id);
		echo json_encode($data);
	}
	public function fetchJoinDataPublisher($tbl_class_id, $tbl_subject_id) {
		$data = $this->common_model->getJoinDataPublisher($tbl_class_id, $tbl_subject_id);
		echo json_encode($data);
	}
	public function fetchJoinDataEducation_level($tbl_class_id, $tbl_subject_id, $tbl_publisher_id) {
		$data = $this->common_model->getJoinDataEducation_level($tbl_class_id, $tbl_subject_id, $tbl_publisher_id);
		echo json_encode($data);
	}
	public function fetchJoinDataEducation_medium($tbl_class_id, $tbl_subject_id, $tbl_publisher_id, $tbl_education_level_id) {
		$data = $this->common_model->getJoinDataEducation_medium($tbl_class_id, $tbl_subject_id, $tbl_publisher_id, $tbl_education_level_id);
		echo json_encode($data);
	}
	public function fetchJoinDataCourse_type($tbl_class_id, $tbl_subject_id, $tbl_publisher_id, $tbl_education_level_id, $tbl_education_medium_id) {
		$data = $this->common_model->getJoinDataCourse_type($tbl_class_id, $tbl_subject_id, $tbl_publisher_id, $tbl_education_level_id, $tbl_education_medium_id);
		echo json_encode($data);
	}
	public function fetchJoinDataBookIBAN($tbl_class_id, $tbl_subject_id, $tbl_publisher_id) {
		$data = $this->common_model->getJoinDataBookIBAN($tbl_class_id, $tbl_subject_id, $tbl_publisher_id);
		echo json_encode($data);
	}
	public function fetchJoinDataChapterUnit($tbl_book_id) {
		$data = $this->common_model->getJoinDataBookChapterUnit($tbl_book_id);
		echo json_encode($data);
	}
	public function fetchJoinDataSection($tbl_unit_id) {
		$data = $this->common_model->getJoinDataBookSection($tbl_unit_id);
		echo json_encode($data);
	}

	public function fetchJoinDataSubSection($tbl_section_id) {
		$data = $this->common_model->getJoinDataBookSubSection($tbl_section_id);
		echo json_encode($data);
	}

	public function setting($id) {

		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('insertion_date', 'Date', 'required|xss_clean');
			$this->form_validation->set_rules('increment', 'Increment', 'required|xss_clean|numeric');
			$this->form_validation->set_rules('increment_date', 'Date', 'required|xss_clean');
			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
			if ($this->form_validation->run() === FALSE) {

				$data['all'] = $this->common_model->getRecordById('1', 'tbl_setting');
				$data['page_title'] = 'Setting Information';
				$data['description'] = '...';
				$this->load->view('templates/header', $data);
				$this->load->view('admin/setting', $data);
				$this->load->view('templates/footer');
			} else {
				$this->common_model->update_setting();
				$this->session->set_flashdata('updated', '!');
				redirect(base_url('setting'));
			}
		} else {
			$data['all'] = $this->common_model->getRecordById('1', 'tbl_setting');
			$data['page_title'] = 'Setting Information';
			$data['description'] = '...';

			$this->load->view('templates/header', $data);
			$this->load->view('admin/setting', $data);
			$this->load->view('templates/footer');
		}
	}

	// delete By Id
	public function deleteRecordByID_DbChecking($del_id, $tbl_name, $redirection, $chkDB, $chkDBAtrr) {
		$result = $this->common_model->recordDBCheck($del_id, $chkDB, $chkDBAtrr);

		if (empty($result)) {
			// record del from database
			$this->common_model->deleteRecordByID($del_id, $tbl_name);
			$this->session->set_flashdata('deleted', '!');
			redirect(base_url($redirection));
		} else {
			$this->session->set_flashdata('data_exist', '!');
			redirect(base_url($redirection));
		}
	}

	// delete By Id
	public function deleteRecordByID($del_id, $tbl_name, $redirection) {
		// record del from database
		$value = $this->common_model->deleteRecordByID($del_id, $tbl_name);

		if ($value['code'] == '1451') {
			$this->session->set_flashdata('db_exist_error', '!');

		} else {
			$this->session->set_flashdata('deleted', '!');
		}

		redirect(base_url($redirection));
	}

	// del Image and record by id
	public function deleteImageAndRecordByID($del_id, $tbl_name, $redirection, $img_folder_name) {
		// get image name from directory against record id
		$imageName = $this->common_model->getImageNameById($del_id, $tbl_name);
		//del the image from folder
		$this->common_model->delImage($img_folder_name, $imageName['image']);

		$this->common_model->delImage('instituteLogo', $imageName['logo']);
		// record del from database
		$this->common_model->deleteRecordByID($del_id, $tbl_name);
		$this->session->set_flashdata('deleted', '!');
		redirect(base_url($redirection));
	}

	public function logger($id, $tbl_name) {

		if (empty($id)) {
			$this->session->sess_destroy();
			redirect('admin', 'refresh');
		}

		$data['all'] = $this->common_model->getAllRecordByArray('tbl_logger', array('tbl_name' => $tbl_name, 'tbl_name_id' => $id));
		$data['page_title'] = 'Timeline';
		$data['description'] = '...';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/logger', $data);
		$this->load->view('templates/footer');
	}

}