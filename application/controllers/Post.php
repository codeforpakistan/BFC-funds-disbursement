<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends MY_Controller {

	public function __construct() {
		error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
		parent::__construct();

		// if ($_SESSION['tbl_admin_role_id'] != '1') {
		// 	$this->session->sess_destroy();
		// 	redirect('admin', 'refresh');
		// }
	}
	public function add_post() {

		$json = array();

		$this->form_validation->set_rules('name', ucwords(str_replace('_', ' ', 'post name')), 'required|xss_clean|trim|min_length[3]|max_length[25]|is_unique[tbl_post.name]|alpha_numeric_spaces', array('alpha_numeric_spaces' => 'The %s field may only contain A-Z, a-z and 0-9 characters.'));
		$this->form_validation->set_rules('tbl_pay_scale_id', 'Selection', 'required|xss_clean');
		$this->form_validation->set_rules('status', 'Selection', 'required|xss_clean');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

		if ($this->form_validation->run() === FALSE) {

			$json = array(
				'name' => form_error('name'),
				'tbl_pay_scale_id' => form_error('tbl_pay_scale_id'),
				'status' => form_error('status'),
			);
			echo json_encode($json);

		} else {
			$result = $this->post_model->add_post();

			$json = array(
				'success' => false,
			);
			if ($result) {
				$json = array(
					'success' => true,
				);
			}
			echo json_encode($json);
		}
		// echo json_encode($json);

	}

	public function getData($id) {
		$data = $this->post_model->getRecordById($id);
		echo json_encode($data);
	}

	public function update_post() {

		$json = array();

		// $this->form_validation->set_rules('id', 'post ID', 'required|xss_clean');
		$this->form_validation->set_rules('name', ucwords(str_replace('_', ' ', 'post name')), 'required|xss_clean|trim|min_length[3]|max_length[25]|alpha_numeric_spaces', array('alpha_numeric_spaces' => 'The %s field may only contain A-Z, a-z and 0-9 characters.'));
		$this->form_validation->set_rules('status', 'Selection', 'required|xss_clean');
		$this->form_validation->set_rules('tbl_pay_scale_id', 'Selection', 'required|xss_clean');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

		if ($this->form_validation->run() === FALSE) {

			$json = array(
				// 'id' => form_error('id'),
				'tbl_pay_scale_id' => form_error('tbl_pay_scale_id'),
				'name' => form_error('name'),
				'status' => form_error('status'),
			);
			echo json_encode($json);

		} else {
			$result = $this->post_model->update_post();

			$json = array(
				'success' => false,
			);
			if ($result) {
				$json = array(
					'success' => true,
				);
			}

			echo json_encode($json);
		}
		// echo json_encode($json);

	}

	public function view_post() {
		$data['pay_scale'] = $this->common_model->getAllRecordByArray('tbl_pay_scale', array('status' => '1'));
		$data['page_title'] = 'View All post';
		$data['description'] = '...';
		$this->load->view('templates/header', $data);
		$this->load->view('post/view_post', $data);
		$this->load->view('templates/footer');
	}

	public function get_post() {

		$data = $row = array();

		// Fetch post's records
		$postData = $this->post_model->getRows($_POST);

		$i = $_POST['start'];
		foreach ($postData as $postInfo) {
			$i++;
			$status = ($postInfo->status == 1) ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Inactive</span>';

			$getRole = $this->admin->getRecordById($postInfo->record_add_by, $tbl_name = 'tbl_admin');
			$recordAddDate = $postInfo->record_add_date;
			$recordAddDate = date("d-M-Y", strtotime($recordAddDate));

			$add_by_date = '<i>Add by <strong>' . $getRole['name'] . '</strong> on <strong>' . $recordAddDate . '</strong></i>';

			$getPayScale = $this->admin->getRecordById($postInfo->tbl_pay_scale_id, $tbl_name = 'tbl_pay_scale');

			$actionBtn = '<a href="' . site_url('common/logger/' . $postInfo->id . '/tbl_post') . '">
                      <button type="button"class="btn btn-sm btn-xs btn-primary"><i class="fa fa-history"></i></button>
                      </a>' .
			'<a href="javascript:void(0)" onclick="getData(' . "'" . $postInfo->id . "'" . ')">
                      <button type="button" id="item_edit" class="item_edit btn btn-sm btn-xs btn-warning"><i class="fa fa-edit"></i></button>
                      </a>';
			// $actionBtn = '<a href="' . site_url('post/edit_post/' . $postInfo->id) . '">
			//                    <button type="button" class="item_edit btn btn-sm btn-xs btn-warning"><i class="fa fa-edit"></i></button>
			//                    </a>';
			$data[] = array($i, $postInfo->name, $getPayScale['name'], $status, $add_by_date, $actionBtn);
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->post_model->countAll(),
			"recordsFiltered" => $this->post_model->countFiltered($_POST),
			"data" => $data,
		);

		// Output to JSON format
		echo json_encode($output);
	}
}
?>
