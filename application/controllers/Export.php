<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once(APPPATH."third_party/PhpWord/Autoloader.php");

use PhpOffice\PhpWord\Autoloader;
Autoloader::register();

class Export extends CI_Controller {
    function __construct() {
        parent::__construct();
    }
	
    function docx() {
		
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
		$section = $phpWord->addSection();
		$section->addImage(
							('http://localhost/bfc/assets/upload/images/bfc.png'),
							array(
							'width' => 100,
							'height' => 100,
							'marginTop' => -1,
							'marginLeft' => 0,

							
							
							)
							);

		
		
		$section->addText('To');

		$section->addText('			The Manager,');
		$section->addText('			National Bank of Pakistan');
		$section->addText('			Saddar Road Branch Peshawar');
		$section->addText('Subject:                       	Retirement Grant Payments');

		$section->addText('                               	Kindly reffer to the subject cited above and to state that 5935076000 (Rupees fifty Nine Million Three Hundred Fifty Thousand Seventy hundred Sixty) Only may be transfered to the relevant Rupees fifty Nine Million Three Hundred Fifty Thousand Seventy hundred SixtyRupees fifty Nine Million Three Hundred Fifty Thousand Seventy hundred SixtyRupees fifty Nine Million Three Hundred Fifty Thousand Seventy hundred SixtyRupees fifty Nine Million Three Hundred Fifty Thousand Seventy hundred Sixty',array('align'=>'justify'));




		$tableStyle = array('borderSize' => 1, 'borderColor' => '999999', 'afterSpacing' => 0, 'Spacing'=> 0, 'cellMargin'=>0  );
$styleCell = array('borderTopSize'=>1 ,'borderTopColor' =>'black','borderLeftSize'=>1,'borderLeftColor' =>'black','borderRightSize'=>1,'borderRightColor'=>'black','borderBottomSize' =>1,'borderBottomColor'=>'black' );
$fontStyle = array('italic'=> true, 'size'=>11, 'name'=>'Times New Roman','afterSpacing' => 0, 'Spacing'=> 0, 'cellMargin'=>0 );
$TfontStyle = array('bold'=>true, 'italic'=> true, 'size'=>11, 'name' => 'Times New Roman', 'afterSpacing' => 0, 'Spacing'=> 0, 'cellMargin'=>0);
$cfontStyle = array('allCaps'=>true,'italic'=> true, 'size'=>11, 'name' => 'Times New Roman','afterSpacing' => 0, 'Spacing'=> 0, 'cellMargin'=>0);
$noSpace = array('textBottomSpacing' => -1);
$table = $section->addTable('myOwnTableStyle',array('borderSize' => 1, 'borderColor' => '999999', 'afterSpacing' => 0, 'Spacing'=> 0, 'cellMargin'=>0  ));

$table2 = $section->addTable('myOwnTableStyle');

$table->addRow();
$table->addCell(2500,$styleCell)->addText('S.No',$TfontStyle);
$table->addCell(2500,$styleCell)->addText('Name of Government Servant',$TfontStyle);
$table->addCell(2500,$styleCell)->addText('Fathe / Husband Name',$TfontStyle);
$table->addCell(2500,$styleCell)->addText('Designation',$TfontStyle);
$table->addCell(2500,$styleCell)->addText('CNIC',$TfontStyle);
$table->addCell(2500,$styleCell)->addText('Name of the Bank and Branch',$TfontStyle);
$table->addCell(2500,$styleCell)->addText('Branch Code',$TfontStyle);
$table->addCell(2500,$styleCell)->addText('Account No',$TfontStyle);
$table->addCell(2500,$styleCell)->addText('Amount',$TfontStyle);

$retirementData = $this->common_model->getAllRecords('tbl_retirement_grant');
	$counter = 1;
//	echo '<pre>'; print_r($retirementData);die();
foreach ($retirementData as $value) {
		
		$emp_info = $this->common_model->getRecordByColoumn('tbl_emp_info', 'id',  $value['tbl_emp_info_id']);

		$get_brach = $this->common_model->getRecordByColoumn('tbl_list_bank_branches', 'id',  $value['tbl_list_bank_branches_id']);


	$table->addRow();
	$table->addCell(6000,$styleCell)->addText($counter,$fontStyle);
	$table->addCell(6000,$styleCell)->addText($emp_info['grantee_name'],$fontStyle);
	$table->addCell(6000,$styleCell)->addText($emp_info['father_name'],$fontStyle);
	$table->addCell(6000,$styleCell)->addText($emp_info['pay_scale'],$fontStyle);
	$table->addCell(6000,$styleCell)->addText($emp_info['cnic_no'],$fontStyle);
	$table->addCell(6000,$styleCell)->addText($get_brach['name'],$fontStyle);
	$table->addCell(6000,$styleCell)->addText($get_brach['branch_code'],$fontStyle);

	$table->addCell(6000,$styleCell)->addText($value['account_no'],$fontStyle);
	$table->addCell(6000,$styleCell)->addText($value['net_amount'],$fontStyle);
$counter++;
}

$section->addText('It is requested that compliance report may be provided to this office within three days');

$section->addText('Checked				Verified				Secretary',array('size'=>13,'align'=>'justify'));


$section->addText('Assistant ACs Section 			Assistant Secretary BA        ' ,array('size'=>9,'align'=>'both'));
$section->addText('Benevolent Fund Board 			Benevolent Fund Board 		Benevolent Fund Board' ,array( 'size'=>9,'align'=>'both'));


		
		$filename = date('Y-m-d H:i:s') . '.docx';		
		
		header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document'); //mime type
        header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save('php://output');
    }
}
?>
