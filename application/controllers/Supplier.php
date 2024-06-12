<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('Supplier_m');
		$this->load->library('form_validation');
	}
	public function index()
	{
		$data['row'] = $this->Supplier_m->get();
		$this->template->load('template', 'supplier/supplier_data', $data);
	}
	public function del($id){
		$this->Supplier_m->del($id);
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('success', 'Data has been deleted');
		}
		redirect('supplier');
	}
}
