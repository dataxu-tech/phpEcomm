<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product_model extends CI_Model
{
	public function getAllProduct()
	{
		return $this->db->get('product')->result_array();
	}

	public function getProductById($id)
	{
		return $this->db->get_where('product',['id' => $id])->row_array();
	}
	public function addProduct()
	{
		$data = [
                    
                    'image'     		=> $this->_uploadimage(),
                    'name'   			=> htmlspecialchars($this->input->post('name',true)),
                    'cat_id'     		=> htmlspecialchars($this->input->post('cat_id',true)),
                    'description'   	=> htmlspecialchars($this->input->post('description',true)),
                    'quantity'     		=> htmlspecialchars($this->input->post('quantity',true)),
                    'price'  			=> htmlspecialchars($this->input->post('price',true)),
                    'member_price'      => htmlspecialchars($this->input->post('member_price',true)),
                    'wight' 			=> htmlspecialchars($this->input->post('wight',true)),
                    'shipping_origin'   => htmlspecialchars($this->input->post('in_slider'))                   
            ];
        $this->db->insert('product', $data);
	}
}