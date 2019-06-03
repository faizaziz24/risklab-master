<?php 

/**
 * Rooms Model
 */
class Rooms_model extends CI_Model
{
	public function __construct(){
		parent::__construct();
	}

	public function getAllRooms(){
		$this->db->select('rooms.*');
		$this->db->from('rooms');
		$this->db->where('rds', 0);
		
		$res = $this->db->get();
		return $res->result();
	}

	public function getRoomById($id){
		$this->db->where('id', $id);
		$res = $this->db->get('rooms');
		return $res->row();
	}

	public function addRooms($data){

		$this->db->insert('rooms', $data);

	}

	public function updateRooms($rid, $data){
		$this->db->where('id', $rid);
		return $this->db->update('rooms', $data);

	}

	public function deleteRoom($rid){
		$data = array('rds' => 1);

		$this->db->where('id', $rid);
		return $this->db->update('rooms', $data);
	}

}