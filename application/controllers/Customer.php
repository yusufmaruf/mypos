<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('customer_m');
		$this->load->library('form_validation');
	}
	public function index()
	{
		$data['row'] = $this->customer_m->get();
		$this->template->load('template', 'customer/customer_data', $data);
	}

	public function add(){
		$customer = new stdClass();
		$customer->customer_id = null;
		$customer->name = null;
		$customer->phone = null;
		$customer->address = null;
		$customer->gender = null;
		$data = array(
			'page' => 'add',
			'row' => $customer
		);
		$this->template->load('template', 'customer/customer_form', $data);
	}
	public function process(){
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add'])){
			$this->customer_m->add($post);
		}else if(isset($_POST['edit'])){
			$this->customer_m->edit($post);			
		}

		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('success', 'Data has been saved');
		}
		redirect('customer');

	}

	public function edit($id){
		$query = $this->customer_m->get($id);
		if($query->num_rows() > 0){
			$customer = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $customer
			);
			$this->template->load('template', 'customer/customer_form', $data);
		}else{
			$this->session->set_flashdata('error', 'Data not found');
			redirect('customer');
		}
	}
	public function del($id){
		$this->customer_m->del($id);
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('success', 'Data has been deleted');
		}
		redirect('customer');
	}
}
