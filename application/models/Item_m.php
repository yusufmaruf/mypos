<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item_m extends CI_Model {

    public function get($id = null){
        $this->db->from('p_item');
        if($id != null) {
            $this->db->where('item_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post){
        $params = [
            'barcode' => $post['barcode'],
            'name' => $post['name'],
            'price' => $post['price'],
            'category_id' => $post['category_id'],
            'unit_id' => $post['unit'],
        ];
        $this->db->insert('p_item', $params);
    }

    public function edit($post){
        $params = [
            'barcode' => $post['barcode'],
            'name' => $post['name'],
            'price' => $post['price'],
            'category_id' => $post['category_id'],
            'unit_id' => $post['unit'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('item_id', $post['item_id']);
        $this->db->update('p_item', $params);
    }

    public function del($id){
        $this->db->where('item_id', $id);
        $this->db->delete('p_item');
    }
        
}
