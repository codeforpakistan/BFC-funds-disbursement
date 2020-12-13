<?php

if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

/**
 *
 * Logger library for Code Igniter.
 *
 * @package        Logger
 * @author         Parth Sutariya (https://github.com/pathusutariya)
 * @version        1.0.0
 * @license        GPL v3
 */
class Logger {

	private $tableName = 'tbl_logger';
	private $table_fields = array(
		'id' => 'id',
		'record_add_date' => 'record_add_date',
		'record_add_by' => 'record_add_by',
		'tbl_name' => 'tbl_name',
		'tbl_name_id' => 'tbl_name_id',
		'action_type' => 'action_type',
		'detail' => 'detail',
	);
	private $ci; //Codeigniter Instance
	private $logid = 0; //LogId to Retrive
	private $tbl_name = false; //tbl_name String
	private $tbl_name_id = false; //tbl_name ID
	private $action_type = false; //action_type
	private $detail = ''; //detail adding for values
	private $record_add_by = 0; //User ID
	private $from_date; //From Date
	private $to_date; //To Date

	/**
	 * Intilize Codeigniter
	 */

	public function __construct() {
		$this->ci = &get_instance();
	}

	/**
	 * Set UserID
	 * @param int $userid
	 * @return $this
	 */
	public function record_add_by($record_add_by_id) {
		$this->record_add_by = $record_add_by_id;
		return $this;
	}

	/**
	 * Set tbl_nameID
	 * @param string $tbl_name
	 * @return $this
	 */
	public function tbl_name($tbl_name) {
		$this->tbl_name = $tbl_name;
		return $this;
	}

	/**
	 * Set  tbl_nameID
	 * @param int $id
	 * @return $this
	 */
	public function tbl_name_id($tbl_name_id) {
		$this->tbl_name_id = $tbl_name_id;
		return $this;
	}

	/**
	 * Set action_type
	 * @param String $action_type
	 * @return $this
	 */
	public function action_type($action_type) {
		$this->action_type = $action_type;
		return $this;
	}

	/**
	 * Set detail
	 * @param string $detail
	 * @return $this
	 */
	public function detail($detail) {
		$this->detail = $detail;
		return $this;
	}

	/**
	 *
	 * @param tbl_name $from
	 * @param tbl_name $to
	 * @return $this
	 */
	public function date_range($from, $to) {
		$this->from_date = $from;
		$this->to_date = $to;
		return $this;
	}

	/**
	 * Add Log, as Database Entry
	 * @param void
	 * @return void
	 */
	public function log() {
		$data = array(
			$this->table_fields['record_add_by'] => $this->record_add_by,
			$this->table_fields['tbl_name'] => $this->tbl_name,
			$this->table_fields['tbl_name_id'] => $this->tbl_name_id,
			$this->table_fields['action_type'] => $this->action_type,
			$this->table_fields['detail'] => $this->detail,
			$this->table_fields['record_add_date'] => date('Y-m-d H:i:s'),

		);
		$this->ci->db->insert($this->tableName, $data);
		$this->logid = $this->ci->db->insert_id();
		$this->flush_parameter();
	}

	/**
	 * Get last Log
	 * @return array
	 */
	public function last_log() {
		return $this->ci->db->where('id', $this->logid)->get($this->tableName)->row();
	}

	protected function _getQueryMaker() {
		if ($this->record_add_by) {
			$this->ci->db->where($this->table_fields['record_add_by'], $this->record_add_by);
		}

		if ($this->tbl_name) {
			$this->ci->db->where($this->table_fields['tbl_name'], $this->tbl_name);
		}

		if ($this->tbl_name_id) {
			$this->ci->db->where($this->table_fields['tbl_name_id'], $this->tbl_name_id);
		}

		if ($this->action_type) {
			$this->ci->db->where($this->table_fields['action_type'], $this->action_type);
		}

		if ($this->logid) {
			$this->ci->db->where($this->table_fields['id'], $this->logid);
		}

		if ($this->from_date) {
			$this->ci->db->where("{$this->table_fields['timestamp']} >", $this->from_date);
		}

		if ($this->to_date) {
			$this->ci->db->where("{$this->table_fields['created_at']} <=", $this->to_date);
		}

	}

	public function get_num() {
		$this->_getQueryMaker();
		return $this->ci->db->from($this->tableName)->count_all_results();
	}

	public function get() {
		$this->_getQueryMaker();
		$result = $this->ci->db->get($this->tableName);
		return $this->_dbcleanresult($result);
	}

	public function remove_log() {
		$this->_getQueryMaker();
		$this->ci->db->delete($this->tableName);
	}

	public function get_ids() {
		$this->_getQueryMaker();
		$ids = $this->ci->db->select('tbl_name_id')->get($this->tableName)->result_array();
		return array_column($ids, 'tbl_name_id');
	}

	protected function _dbcleanresult($result) {
		if ($result->num_rows() > 1) {
			return $result->result();
		}

		if ($result->num_rows() == 1) {
			return $result->row();
		} else {
			return false;
		}

	}

	/**
	 * Reset Parameter
	 */
	public function flush_parameter() {
		$this->detail = '';
		$this->action_type = 0;
		$this->tbl_name = 0;
		$this->tbl_name_id = 0;
	}

}

?>