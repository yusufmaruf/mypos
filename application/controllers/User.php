<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
		check_not_login();
        $this->load->model('user_m');
        $data['row'] = $this->user_m->get();
		$this->template->load('template', 'user/user_data', $data);
	}

    public function add(){
        $this->load->library('form_validation');
        $this->load->model('user_m');
        $this->form_validation->set_rules('fullname', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[20]|is_unique[user.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|max_length[20]');
        $this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'required|matches[password]');
        $this->form_validation->set_rules('address', 'Alamat');
        $this->form_validation->set_rules('level', 'Level', 'required');

        $this->form_validation->set_message('required', '%s harus diisi');
        $this->form_validation->set_message('min_length', '{field} setidaknya {param} karakter');
        $this->form_validation->set_message('max_length', '{field} setidaknya {param} karakter');
        $this->form_validation->set_message('matches', '{field} tidak sama dengan {param}');

        if ($this->form_validation->run() == FALSE) {
            $this->template->load('template', 'user/user_form_add');
        }else{
            $post = $this->input->post(null, TRUE);
            $this->user_m->add($post);
            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('success', 'Data user berhasil disimpan');
            }
            redirect('user');
        }
    }
    public function del()
	{
        $this->load->model('user_m');
        $id = $this->input->post('user_id');
        $this->user_m->del($id);
        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('success', 'Data user berhasil dihapus');
        }
        redirect('user');
	}
}
