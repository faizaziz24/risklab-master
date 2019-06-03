<?php 

/**
 * Admin Controller
 */
class Admin extends CI_Controller
{
	
	public function __construct(){
		parent::__construct();

		$config['upload_path'] = './uploads/';

		$this->load->model('Complaints_model', 'cm');
		$this->load->model('Rooms_model', 'rm');
		$this->load->model('Flaws_model', 'fm');
		$this->load->model('Admin_model', 'am');

		if (isset($this->session->userdata['auth_token'])) {
			$adminData = $this->session->userdata['adminData'];

			// print_r($adminData);die();

			$data['an'] = $adminData['0']->an;
			$data['ae'] = $adminData['0']->ae;
			$data['ap'] = $adminData['0']->ap;
			$data['ar'] = $adminData['0']->ar;

			$this->load->view('inc/header', $data);
		}

	}

	public function index() {
		if (isset($this->session->userdata['auth_token'])) {
			$this->load->view('dashboard');
			$this->load->view('inc/footer');
		} else {
			redirect('','refresh');
		}
	}

	public function login(){
		// $this->load->view('inc/header');
		$this->load->view('login');
		// $this->load->view('inc/footer');
	}

	public function logout(){
		$this->session->unset_userdata('auth_token');
		redirect('','refresh');
	}

	public function login_auth(){
		$ae = $this->input->post('ae');
		$ap = md5($this->input->post('ap'));
		$this->form_validation->set_rules('ae', 'Username', 'required');
		$this->form_validation->set_rules('ap', 'Password', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->login();
		} else {

			if ($this->am->loginDB($ae, $ap)) {
				$adminData = $this->am->adminData($ae);
				$sessionDate = array(
					'auth_token' => md5($ae.$ap),
					'adminData' => $adminData
				);
				$this->session->set_userdata($sessionDate );
				redirect('admin');
			} else {
				$this->session->set_flashdata('loginerror', 'Invalid Username/Password');
				$this->login();
			}
		}
	}

	public function getcomplaints(){

		$complaints = $this->cm->getAllComplaints();
		$agreecomp  = $this->cm->getAllAgreeComplaints();		
		$rejectcomp = $this->cm->getAllRejectComplaints();

		$this->load->view('complaint-all', [
			'complaints' => $complaints,
			'agreecomp'  => $agreecomp,
			'rejectcomp' => $rejectcomp
		]);
		$this->load->view('inc/footer');
	}

	public function addcomplaints(){

		$rooms = $this->cm->getRoom();
		$flaws = $this->cm->getFlaw();

		$this->load->view('complaint-add',[
			'rooms'	=> $rooms,
			'flaws'	=> $flaws
		]);
		$this->load->view('inc/footer');

	}

	public function addcomplaint(){
		
		$this->form_validation->set_rules('cn', 'Complaint Name', 'required');
		$this->form_validation->set_rules('csd', 'Complaint Description', 'required');

		if ($this->form_validation->run() === FALSE){
			$this->load->view('complaint-add');
        } else {
			$url = $this->do_upload_complaint();
			
			$data = array(
				'cn' => $this->input->post('cn'),
				'csd' => $this->input->post('csd'),
				'crms' => $this->input->post('crms'),
				'cfws' => $this->input->post('cfws'),
				'cds' => 0,
				'cimg' => $url
			);

	        $this->cm->addComplaint($data);
	        redirect('admin/getcomplaints');
        }
	}

	private function do_upload() {
		$type = explode('.', $_FILES['pimg']['name']);
		$type = $type[count($type)-1];
		$url = "uploads/" . rand(10000,99999).'.'.$type;
		if (in_array($type, array("jpg", "jpeg", "gif", "png"))) {
			if (is_uploaded_file($_FILES['pimg']['tmp_name'])) {
				if (move_uploaded_file($_FILES['pimg']['tmp_name'], $url)) {
					return $url;
				}
			}
		}
	}	

	private function do_upload_complaint() {
		$type = explode('.', $_FILES['cimg']['name']);
		$type = $type[count($type)-1];
		$url = "uploads/" . rand(10000,99999).'.'.$type;
		if (in_array($type, array("jpg", "jpeg", "gif", "png"))) {
			if (is_uploaded_file($_FILES['cimg']['tmp_name'])) {
				if (move_uploaded_file($_FILES['cimg']['tmp_name'], $url)) {
					return $url;
				}
			}
		}
	}	

	public function viewcomp(){
		$id = $this->uri->segment(3);
		        
        if (empty($id)){
            show_404();
        }
        
       $data['comp_detail'] = $this->cm->getComplaintById($id);

       $this->load->view('complaint-view', $data);
       $this->load->view('inc/footer');
    }

	public function editroom(){
		$id = $this->uri->segment(3);
		        
        if (empty($id)){
            show_404();
        }

       $data['room_detail'] = $this->rm->getRoomById($id);
        
       $this->form_validation->set_rules('rn', 'Room Name', 'required');

       if ($this->form_validation->run() === FALSE) {

           $this->load->view('room-edit', $data);
           $this->load->view('inc/footer');

       } else {

       		$data = array(
	    			'rn' => $this->input->post('rn')
	    		);

	    	$this->rm->updateRooms($id, $data);
           	redirect('admin/rooms');       		
       }  
	}

	public function editflaw(){
		$id = $this->uri->segment(3);
		        
        if (empty($id)){
            show_404();
        }

       $data['flaw_detail'] = $this->fm->getFlawById($id);
        
       $this->form_validation->set_rules('fn', 'Flaw Name', 'required');

       if ($this->form_validation->run() === FALSE) {

           $this->load->view('flaw-edit', $data);
           $this->load->view('inc/footer');

       } else {

       		$data = array(
	    			'fn' => $this->input->post('fn')
	    		);

	    	$this->fm->updateFlaws($id, $data);
           	redirect('admin/flaws');       		
       }  
	}

	public function categories(){

		$categories = $this->pm->getCat();
		$this->load->view('categories', ['categories' => $categories]);
		$this->load->view('inc/footer');
	}

	public function rooms(){

		$rooms = $this->rm->getAllRooms();
		$this->load->view('rooms', ['rooms' => $rooms]);
		$this->load->view('inc/footer');
	}

	public function flaws(){

		$flaws = $this->fm->getAllFlaws();
		$this->load->view('flaws', ['flaws' => $flaws]);
		$this->load->view('inc/footer');
	}

	public function addrooms(){
		$this->form_validation->set_rules('rn', 'Room Name', 'required');

		if ($this->form_validation->run() === FALSE){
			$rooms = $this->cm->getRoom();
			$this->load->view('rooms', ['rooms' => $rooms]);
        } else {

			$data = array(
				'rn' => $this->input->post('rn')
			);

	        $this->rm->addRooms($data);
	        redirect('admin/rooms');
        }
	}	

	public function addflaws(){
		$this->form_validation->set_rules('fn', 'Flaw Name', 'required');

		if ($this->form_validation->run() === FALSE){
			$flaws = $this->cm->getFlaw();
			$this->load->view('flaws', ['flaws' => $flaws]);
        } else {

			$data = array(
				'fn' => $this->input->post('fn')
			);

	        $this->fm->addFlaws($data);
	        redirect('admin/flaws');
        }
	}	

	public function deleteRoom($rid) {
		$this->rm->deleteRoom($rid);
		redirect('admin/rooms','refresh');
	}

	public function deleteFlaw($fid) {
		$this->fm->deleteFlaw($fid);
		redirect('admin/flaws','refresh');
	}

	public function agreeComp($cid) {
		$this->cm->agreeComp($cid);
		redirect('admin/getcomplaints','refresh');
	}

	public function rejectComp($cid) {
		$this->cm->rejectComp($cid);
		redirect('admin/getcomplaints','refresh');
	}
}