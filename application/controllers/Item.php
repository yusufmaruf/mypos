<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_not_login();
        $this->load->model(['item_m', 'category_m', 'unit_m']);
		$this->load->library('form_validation');
	}
	public function index()
	{
		$data['row'] = $this->item_m->get();
		$this->template->load('template', 'product/item/item_data', $data);
	}

	public function add(){
		$item = new stdClass();
		$item->item_id = null;
        $item->barcode = null;
		$item->name = null;
        $item->price = null;
        $query_category = $this->category_m->get();
        $query_unit = $this->unit_m->get();
        $unit[null] = '- Pilih -';
        foreach ($query_unit->result() as $key => $data) {
            $unit[$data->unit_id] = $data->name;
        }
        
		$data = array(
			'page' => 'add',
			'row' => $item,
            'category' => $query_category,
            'unit' => $unit, 'selectedUnit' => null
		);
		$this->template->load('template', 'product/item/item_form', $data);
	}
	public function process(){
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add'])){
			$this->item_m->add($post);
		}else if(isset($_POST['edit'])){
			$this->item_m->edit($post);			
		}

		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('success', 'Data has been saved');
		}
		redirect('item');

	}

	public function edit($id){
		$query = $this->item_m->get($id);
		if($query->num_rows() > 0){
			$item = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $item
			);
			$this->template->load('template', 'product/item/item_form', $data);
		}else{
			$this->session->set_flashdata('error', 'Data not found');
			redirect('item');
		}
	}
	public function del($id){
		$this->item_m->del($id);
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('success', 'Data has been deleted');
		}
		redirect('item');
	}
}
