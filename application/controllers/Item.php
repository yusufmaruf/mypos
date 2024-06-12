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
            if($this->item_m->check_barcode($post['barcode'])->num_rows() > 0){
                $this->session->set_flashdata('error', 'Barcode already exists');
                redirect('item/add');                
            }else{
				$config['upload_path'] = './uploads/product/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
				$config['max_size'] = 2048;
				$config['file_name'] = 'item-'.date('Ymd').'-'.substr(md5(rand()),0,10);
				$this->load->library('upload', $config);
				if(@$_FILES['image']['name'] != null){
					if($this->upload->do_upload('image')){
						$post['image'] = $this->upload->data('file_name');
		                $this->item_m->add($post);
						if($this->db->affected_rows() > 0){
							$this->session->set_flashdata('success', 'Data has been saved');
						}
					}else{
						$error = $this->upload->display_errors();
						$this->session->set_flashdata('error', $error);
						redirect('item/add');						
					}
				}else{
				$post['image'] = null;
					$this->item_m->add($post);
					if($this->db->affected_rows() > 0){
						$this->session->set_flashdata('success', 'Data has been saved');
					}
				}
            }
		}else if(isset($_POST['edit'])){
            if($this->item_m->check_barcode($post['barcode'], $post['item_id'])->num_rows() > 0){
                $this->session->set_flashdata('error', 'Barcode already exists');
                redirect('item/edit/'.$post['item_id']);                
            }else{
                $this->item_m->edit($post);
            }
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
			$query_category = $this->category_m->get();
            $query_unit = $this->unit_m->get();
            $unit[null] = '- Pilih -';
            foreach ($query_unit->result() as $key => $data) {
                $unit[$data->unit_id] = $data->name;
            }
            
            $data = array(
                'page' => 'edit',
                'row' => $item,
                'category' => $query_category,
                'unit' => $unit, 'selectedUnit' => $item->unit_id
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
