<?php

class Import extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $config = [
            'upload_path' => '',
            'allowed_types' => 'csv',
            'max_size' => 4096,
            'remove_spaces' => true,
            'file_name' => date('Y_m_d_H_i_s') . '.csv'
        ];

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        $this->load->library('PHPExcel', [], 'phpexcel');
    }

    function index()
    {
        return false;
    }

    function _valid_request()
    {
        return (!empty($this->input->post['app_id']) && $this->input->post('app_id') == APP_ID);
    }

    function _upload_file()
    {
        return ($this->upload->do_upload('uploader'));
    }

    function products()
    {
        echo 'fuck';
    }
}