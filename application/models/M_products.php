<?php

class M_products extends MY_Model
{
    function find($params = [])
    {
        $this->db->select('id, product_code, product_name');
        if(!empty($params['product_code']))
            $this->db->where('product_code', $params['product_code']);
        
        if(!empty($params['product_name']))
            $this->db->like('product_name', '%' . $params['product_name'] . '%');

        $query = $this->db->get('products');

        return $query->result();
    }

    function show_all()
    {
        $query = $this->db->get('products');

        return $query->result();
    }

    function save($data = [])
    {
        if(count($data) > 1)
            $result = $this->db->insert_batch('products', $data);
        else
            $result = $this->db->insert('products', $data);

        return $result;
    }
}