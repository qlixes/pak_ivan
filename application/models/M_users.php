<?php

class M_users extends MY_Model
{
    function signin($params = [])
    {
        $param = [
            'is_active' => true,
            'user_name' => $params['username']
        ];

        $this->db->select('user_name,user_password');
        $this->db->where($param);
        $query = $this->db->get('users')->row();

        return (password_verify($params['password'], $query->user_password)) ? $query : [];
    }
}