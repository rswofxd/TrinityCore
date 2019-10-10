<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');

        if (!ini_get('date.timezone'))
           date_default_timezone_set($this->config->item('timezone'));
    }

    public function login()
    {
        if (!$this->m_modules->getStatusLogin())
            redirect(base_url(),'refresh');

        if ($this->m_data->isLogged())
            redirect(base_url(),'refresh');

        if (!$this->m_permissions->getMyPermissions('Permission_Login'))
            redirect(base_url(),'refresh');

        $data['fxtitle'] = $this->lang->line('nav_login');
        
        $this->load->view('header', $data);

        if ($this->m_general->getExpansionAction() == 1)
        {
            $this->load->view('login1', $data);
        }
        else
        {
            $this->load->view('login2', $data);
        }

        $this->load->view('footer');
    }

    public function verify1()
    {

        $username = $this->input->post('username');
        $password = $this->input->post('password');
        echo $this->user_model->verifylogin($username, $password);
    }

    public function verify2()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        echo $this->user_model->verifylogin2($email, $password);
    }

    public function register()
    {
        if (!$this->m_modules->getStatusRegister())
            redirect(base_url(),'refresh');

        if (!$this->m_permissions->getMaintenance())
            redirect(base_url(),'refresh');

        if (!$this->m_permissions->getMyPermissions('Permission_Register'))
            redirect(base_url(),'refresh');

        $this->load->library('recaptcha');

        $data['fxtitle'] = $this->lang->line('nav_register');
        
        $this->load->view('header', $data);
        $this->load->view('register');
        $this->load->view('footer');
    }

    public function logout()
    {
        $this->m_data->logout();
    }

    public function panel()
    {
        if (!$this->m_modules->getStatusUCP())
            redirect(base_url(),'refresh');

        if (!$this->m_data->isLogged())
            redirect(base_url(),'refresh');

        if (!$this->m_permissions->getMaintenance())
            redirect(base_url(),'refresh');

        if (!$this->m_permissions->getMyPermissions('Permission_Panel'))
            redirect(base_url(),'refresh');

        $data['fxtitle'] = $this->lang->line('nav_account');
        
        $this->load->view('header', $data);
        $this->load->view('panel');
        $this->load->view('footer');
        $this->load->view('modal');
    }

    public function profile($id)
    {
        if (!$this->m_modules->getStatusUCP())
            redirect(base_url(),'refresh');

        if (!$this->m_permissions->getMaintenance())
            redirect(base_url(),'refresh');

        if (!$this->m_permissions->getMyPermissions('Permission_Panel'))
            redirect(base_url(),'refresh');

        if ($this->m_data->getRank($id) != '0')
            if($this->m_data->isLogged() && $this->session->userdata('fx_sess_gmlevel') == '0')
                redirect(base_url(),'refresh');

        if (empty($id) || is_null($id) || $id == '0')
            redirect(base_url(),'refresh');

        $data['idlink'] = $id;
        $data['fxtitle'] = $this->lang->line('nav_profile');
        
        $this->load->view('header', $data);
        $this->load->view('profile', $data);
        $this->load->view('footer');
        $this->load->view('modal');
    }
}
