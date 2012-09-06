<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * A base model to provide the basic CRUD 
 * functionality for models that inherit from it.
 *
 * @package CodeIgniter
 * @subpackage MY_Model
 */

class MY_Model extends CI_Model
{
	
	/**
	 * Name of database table.
	 *
	 * @var string
	 */
	
	protected $_table;
		
	/**
	 * The primary key of the table
	 *
	 * @var string
	 */
	
	protected $primary_key = 'id';
	
	
	public function MY_Model()
	{
		$this->__construct();
	}
	
	/**
	 * Constructor
	 *
	 */

	public function __construct()
	{
		parent::__construct();
	}
	
	/**
	 * Get Record By Primary Key
	 * 
	 */
	public function get($primary_value)
	{
		$q = $this->db->where($this->primary_key, $primary_value)
					->get($this->_table);
				
		return ($q->num_rows() > 0) ? $q->row() : false;
	}
	
	/**
	 * Get all records
	 *
	 */

	public function get_all()
	{
		return $this->db->get($this->_table)
						->result();
	}
	
	/**
	 * Insert new record
	 *
	 */

	public function insert($data)
	{
		return ($this->db->insert($this->_table, $data)) ? $this->db->insert_id() : false;
	}
	
	/**
	 * Update record based on primary key
	 *
	 */

	public function update($primary_value, $data)
	{
		return ($this->db->update($this->_table, $data, array($this->primary_key => $primary_value)));
	}
	
	/**
	 * Delete record based on primary key
	 *
	 */
	
	public function delete($primary_value)
	{
		return ($this->db->delete($this->_table, array($this->primary_key => $primary_value))) ? true : false;
	}
	
	/**
	 * Count all records
	 *
	 */
	
	public function count_all()
	{
		return $this->db->count_all($this->_table);
	}
}