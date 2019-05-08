<?php

class M_users extends MY_Model
{
    function signin($params = [])
    {
        $param = [
            'is_active' => true,
            'user_name' => $params['user_name'],
            'user_password' => $params['user_password']
        ];

        $this->db->select('user_name,user_password');
        $this->db->where($param);
        $query = $this->db->get('users');

        return $query->row();

        // return (password_verify($params['password'], $query->user_password)) ? $query : [];
    }
}