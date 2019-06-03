<?php 

/**
 * Flaws Model
 */
class Flaws_model extends CI_Model
{
	public function __construct(){
		parent::__construct();
	}

	public function getAllFlaws(){
		$this->db->select('flaws.*');
		$this->db->from('flaws');
		$this->db->where('fds', 0);
		
		$res = $this->db->get();
		return $res->result();
	}

	public function getFlawById($id){
		$this->db->where('id', $id);
		$res = $this->db->get('flaws');
		return $res->row();
	}

	public function addFlaws($data){

		$this->db->insert('flaws', $data);

	}

	public function updateFlaws($fid, $data){
		$this->db->where('id', $fid);
		return $this->db->update('flaws', $data);

	}

	public function deleteFlaw($fid){
		$data = array('fds' => 1);

		$this->db->where('id', $fid);
		return $this->db->update('flaws', $data);
	}

}