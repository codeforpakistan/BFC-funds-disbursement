<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Transactions extends MY_Controller {

	public function __construct() {
		error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
        parent::__construct();  
    } 
    
    
    public function view_list() { 
         
        //$data['applications'] = $this->common_model->getAllRecordByArray('tbl_grants_has_tbl_emp_info_gerund', array('status' => '8'));
        $data['applications'] = $this->common_model->getAllRecordsByCond('tbl_grants_has_tbl_emp_info_gerund', "status IN('8','10','11') ");
		$data['page_title'] = 'Approved From Bank';
        $data['description'] = '...'; 

		$this->load->view('templates/header', $data);
		$this->load->view('transactions/approved_from_bank', $data);
		$this->load->view('templates/footer');
    }
    
	  
    
    public function get_transactions($id = null) { 
        
        $transactions = $this->common_model->getAllRecordByArray('tbl_transactions', array('application_no' => $id));
        
        $table = '';


        $table .= '
        <form name="formID" id="formID" method="post" action="#">
            <table class="table table-bordered table-striped table-hover table-condensed">  
                <tr>
                    <th width="30%">Amount</th>
                    <td width="70%"><input type="text" name="amount" id="amount" class="form-control" required></td> 
                </tr>  
                <tr>
                    <th>Bank Transaction ID</th>
                    <td><input type="text" name="bank_transaction_id" id="bank_transaction_id" class="form-control" required></td> 
                </tr>  
                <tr>
                    <th>&nbsp;</th>
                    <td>
                        <input type="hidden" name="application_no" id="application_no" value="'.$id.'">
                        <button type="button" onclick="save()" id="btnSave" name="btnSave" class="btn btn-primary  btn-sm"><i class="fa fa-plus"> </i> Save Record</button>
                    </td> 
                </tr>  
            </table>
        </form>';

        $table .= '<h4 class="modal-title">Transactions List</h4>';


        $table .= '<table class="table table-bordered table-striped table-hover table-condensed">';

        $table .= '<thead>
            <tr>
                <th>Sr.</th>
                <th>Amount</th>
                <th>Bank Transaction ID</th>
                <th>Add By / Date</th>
            </tr>
        </thead>';

        if(count($transactions) > 0) { 
            $i=0;
            foreach ($transactions as $key => $value) {
            $i++;
        
                $getRole = $this->admin->getRecordById($value['added_by'], $tbl_name = 'tbl_admin');
                $recordAddDate = date("d-M-Y", strtotime($value['date_added']));

                $add_by_date = 'Add by <i><strong>' . $getRole['name'] . '</strong> on <strong>' . $recordAddDate . '</strong></i>';
                
                $table .= '<tr>
                    <td>'.$i.'</td>
                    <td>Rs. '.$value['amount'].'</td>
                    <td>'.$value['bank_transaction_id'].'</td>
                    <td>'. $add_by_date .'</td>
                </tr>';

            }
        } else {
                $table .= '<tr>
                    <td colspan="4">No records!</td> 
                </tr>';
        }
        $table .= '</table>';
 
        echo $table;

    }


     

    public function add_transaction() {

        //echo 'i m here'; exit;

        $json = array();  

        $this->form_validation->set_rules('amount', ucwords(str_replace('_', ' ', 'amount')), 'required|xss_clean|trim|min_length[3]|max_length[25]|is_unique[tbl_district.name]|alpha_numeric_spaces', array('alpha_numeric_spaces' => 'The %s field may only contain A-Z, a-z and 0-9 characters.'));
		//$this->form_validation->set_rules('status', 'Selection', 'required|xss_clean');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

		if ($this->form_validation->run() === FALSE) {

			$json = array(
				'amount' => form_error('amount'),
				//'status' => form_error('status'),
			);
			echo json_encode($json);

		} else {
            
            //echo '<pre>'; print_r($this->input->post()); exit;

            $application_no = $this->input->post('application_no');  
            $amount_to_send = $this->input->post('amount');  

            $get_app_table = $this->common_model->getRecordByColoumn('tbl_grants_has_tbl_emp_info_gerund', 'application_no', $application_no);
            $tbl_grant_id = $get_app_table['tbl_grants_id'];
            
            if($tbl_grant_id > 0) 
            {
                $get_tbl_grants = $this->common_model->getRecordByColoumn('tbl_grants', 'id', $tbl_grant_id);
                $tbl_grant_name = $get_tbl_grants['tbl_name'];  

                $get_app_amount = $this->common_model->getRecordByColoumn($tbl_grant_name, 'application_no', $application_no);
                $app_amount = $get_app_amount['net_amount'];

                // total paid amount
                $amount = $this->transactions_model->get_sum_amount_transaction(); 
                $remaining_amount = $app_amount - $amount;
    
                //checking...
                if($remaining_amount >= $amount_to_send) {
                
                    $result = $this->transactions_model->add_transaction($tbl_grant_id); 
                    $json = array( 'success' => false, );
                    
                    if ($result) {
                        
                        $array = array('app_no'=>$application_no, 'tbl_grant_id' => $tbl_grant_id);
                        $app_status     =    $this->transactions_model->update_application_status($array);

                        if($app_status == true) {
                            $json = array( 
                                'success' => true,
                                'message' => 'Transaction added successfully.',
                            );
                        } else {
                            $json = array( 
                                'success' => false,
                                'message' => 'An error occurred with payment status while processing your request.',
                            );
                        }  

                    } else {
                        $json = array(
                            'success' => false,
                            'message' => 'An error occurred while processing your request.',
                        ); 
                    }
                    echo json_encode($json);  
                
                } else {
                    $json = array(
                        'success' => false,
                        'message' => 'You cannot add more than '. $remaining_amount . ' amount',
                    );
                    echo json_encode($json);  
                }

            } else {
                $json = array(
                    'success' => false,
                    'message' => 'An error occurred while processing your request.',
                );
                echo json_encode($json);  
            } 
            
        }
    }
    
 


 
  

}
?>
