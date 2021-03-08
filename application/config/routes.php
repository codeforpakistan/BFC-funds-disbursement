<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//admin
$route['dashboard'] = 'admins/dashboard';
$route['setting'] = 'setting/setting';
$route['admin'] = 'auth/admin_login';
$route['user'] = 'auth/user_login';
$route['login'] = 'registration/login';

$route['add_admin'] = 'admins/add_admin';
$route['view_admin'] = 'admins/view_admin';
$route['view_users'] = 'users/view_users';

$route['view_admin_role'] = 'admin_role/view_admin_role';
$route['view_district'] = 'district/view_district';
$route['view_department'] = 'department/view_department';
$route['view_grants'] = 'grants/view_grants';
$route['view_banks'] = 'banks/view_banks';
$route['view_case_status'] = 'case_status/view_case_status';
$route['view_pay_scale'] = 'pay_scale/view_pay_scale';
$route['view_grantee_type'] = 'grantee_type/view_grantee_type';
$route['view_payment_mode'] = 'payment_mode/view_payment_mode';
$route['view_post'] = 'post/view_post';
$route['view_bfc_bank_branch'] = 'bfc_bank_branch/view_bfc_bank_branch';
$route['view_grantee_bank_branch'] = 'grantee_bank_branch/view_grantee_bank_branch';
$route['view_grant_payments'] = 'grant_payments/view_grant_payments';
$route['view_emp_info'] = 'emp_info/view_emp_info';
$route['add_emp_info'] = 'emp_info/add_emp_info';
// $route['edit_emp_info'] = 'emp_info/edit_emp_info';
$route['view_scholarship_grants'] = 'scholarship/view_scholarship_grants/';
$route['add_scholarship_grant'] = 'scholarship/add_scholarship_grant/';
$route['add_scholarship_grant/(:any)'] = 'scholarship/add_scholarship_grant/$1';

$route['view_retirement_grants'] = 'retirement/view_retirement_grants/';
$route['add_retirement_grant'] = 'retirement/add_retirement_grant/';
$route['add_retirement_grant/(:any)'] = 'retirement/add_retirement_grant/$1';

$route['view_funeral_grants'] = 'funeral/view_funeral_grants/';
$route['add_funeral_grant'] = 'funeral/add_funeral_grant/';
$route['add_funeral_grant/(:any)'] = 'funeral/add_funeral_grant/$1';

$route['view_monthly_grants'] = 'monthly_grant/view_monthly_grants/';
$route['add_monthly_grant'] = 'monthly_grant/add_monthly_grant/';
$route['add_monthly_grant/(:any)'] = 'monthly_grant/add_monthly_grant/$1';

$route['view_lumpsum_grants'] = 'lumpsum/view_lumpsum_grants/';
$route['add_lumpsum_grant'] = 'lumpsum/add_lumpsum_grant/';
$route['add_lumpsum_grant/(:any)'] = 'lumpsum/add_lumpsum_grant/$1';

$route['view_interest_free_loan_grants'] = 'interest_free_loan/view_interestfreeloan_grants/';
$route['add_interest_free_loan_grant'] = 'interest_free_loan/add_interestfreeloan_grant/';
$route['add_interest_free_loan_grant/(:any)'] = 'interest_free_loan/add_interestfreeloan_grant/$1';

$route['apply-for-scholarship-grant'] = 'apply/scholarship_grant/';
$route['apply-for-interest-free-loan'] = 'apply/interest_free_loan/';
$route['track-your-application'] = 'apply/track_application/';

$route['reports'] = 'reports/view_reports/';
$route['disbursement'] = 'reports/view_disbursement/';
$route['grants-released'] = 'reports/view_grant_released/';

$route['create-batch'] = 'batches/create_batch/';
$route['batches'] = 'batches/view_batches/';
$route['batch_details/(:any)'] = 'batches/batch_details/$1';
$route['PrintBatch/(:any)'] = 'batches/PrintBatch/$1';

$route['batch_app_status'] = 'batches/batch_app_status/';

$route['transactions'] = 'transactions/view_list/';

$route['setting'] = 'common/setting';

$route['default_controller'] = 'site';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
