<?php 

/**
 * Complaints Model
 */
class Complaints_model extends CI_Model
{
	public function __construct(){
		parent::__construct();
	}

	public function getAllComplaints(){
		$this->db->select('complaints.*');
		$this->db->select('rooms.rn');		
		$this->db->select('flaws.fn');
		$this->db->from('complaints');
		$this->db->join('rooms', 'complaints.crms = rooms.id', 'inner');
		$this->db->join('flaws', 'complaints.cfws = flaws.id', 'inner');
		$this->db->where('cds', 0);
		
		$res = $this->db->get();
		return $res->result();
	}

	public function getAllAgreeComplaints(){
		$this->db->select('complaints.*');
		$this->db->select('rooms.rn');		
		$this->db->select('flaws.fn');
		$this->db->from('complaints');
		$this->db->join('rooms', 'complaints.crms = rooms.id', 'inner');
		$this->db->join('flaws', 'complaints.cfws = flaws.id', 'inner');
		$this->db->where('cds', 1);
		
		$res = $this->db->get();
		return $res->result();
	}

	public function getAllRejectComplaints(){
		$this->db->select('complaints.*');
		$this->db->select('rooms.rn');		
		$this->db->select('flaws.fn');
		$this->db->from('complaints');
		$this->db->join('rooms', 'complaints.crms = rooms.id', 'inner');
		$this->db->join('flaws', 'complaints.cfws = flaws.id', 'inner');
		$this->db->where('cds', 2);
		
		$res = $this->db->get();
		return $res->result();
	}

	public function getComplaintById($id){
		$this->db->select('complaints.*');
		$this->db->select('rooms.rn');		
		$this->db->select('flaws.fn');
		$this->db->from('complaints');
		$this->db->join('rooms', 'complaints.crms = rooms.id', 'inner');
		$this->db->join('flaws', 'complaints.cfws = flaws.id', 'inner');	
		$this->db->where('complaints.id', $id);
		
		$res = $this->db->get();
		return $res->row();
	}

	public function getRoom(){
		$res = $this->db->get('rooms');
		return $res->result();
	}

	public function getFlaw(){
		$res = $this->db->get('flaws');
		return $res->result();
	}

	public function addComplaint($data){
		$this->db->insert('complaints', $data);

	}

	public function updateComplaint($cid, $data){
		$this->db->where('id', $cid);
		return $this->db->update('complaints', $data);

	}

	public function getLatestComplaint(){
		$this->db->where('ccd BETWEEN DATE_SUB(NOW(), INTERVAL 30 DAY) AND NOW()');
		$res = $this->db->get('complaints');
		return $res->result();
	}


	public function deleteComplaint($cid){
		$this->db->where('id', $cid);
		$this->db->delete('complaints') ? true : false;
	}

	public function searchComplaint($st){
		$this->db->like('cn', $st);
		$res = $this->db->get('complaints');
		return $res->result();
	}

	public function agreeComp($cid){
		$data = array(
			'cds' => 1
		);

		$this->db->where('id', $cid);
		return $this->db->update('complaints', $data);
	}

	public function rejectComp($cid){
		$data = array(
			'cds' => 2
		);

		$this->db->where('id', $cid);
		return $this->db->update('complaints', $data);
	}
}