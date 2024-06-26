<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_m extends CI_Model {

    public function get($id = null){
        $this->db->from('supplier');
        if($id != null) {
            $this->db->where('supplier_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post){
        $params = [
            'name' => $post['name'],
            'phone' => $post['phone'],
            'address' => $post['address'],
            'description' => empty($post['description']) ? null : $post['description']
        ];
        $this->db->insert('supplier', $params);
    }

    public function edit($post){
        $params = [
            'name' => $post['name'],
            'phone' => $post['phone'],
            'address' => $post['address'],
            'description' => empty($post['description']) ? null : $post['description'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('supplier_id', $post['supplier_id']);
        $this->db->update('supplier', $params);
    }

    public function del($id){
        $this->db->where('supplier_id', $id);
        $this->db->delete('supplier');
    }
        
}
