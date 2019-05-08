<?php

class Dashboard extends CI_Controller
{
    function index()
    {
        if(!$this->session->userdata('username'))
            redirect('dashboard/login');

        $data['username'] = $this->session->userdata('username');
        $this->load->view('dashboard', $data);
    }

    function login()
    {
        if($this->session->userdata('username'))
            redirect('dashboard/index');
            
        if(!$this->session->userdata('username'))
            $data['message'] = 'please login';

        $this->load->view('login', $data);
    }

    function check()
    {
        $submit = $this->input->post('submit');

        if($submit)
        {
            $params = [
                'user_name' => $this->input->post('username'),
                'user_password' => $this->input->post('password'),
            ];

            $user = $this->m_users->signin($params);

            if($user) 
            {
                $this->session->set_userdata('username', $user->user_name);

                redirect('dashboard/index');
            }
        }

        redirect('dashboard/login');
    }

    function logout()
    {
        $this->session->unset_userdata('username');

        $data['message'] = 'successfully logout';

        $this->load->view('login', $data);
    }

    function _check_form()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|xss_clean');

        return $this->form_validation->run();
    }
}