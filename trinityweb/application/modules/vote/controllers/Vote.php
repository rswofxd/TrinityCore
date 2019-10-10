<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vote extends MX_Controller {

    public function __construct()
    {
        parent::__construct();

        if (!ini_get('date.timezone'))
           date_default_timezone_set($this->config->item('timezone'));

        if (!$this->m_permissions->getMaintenance())
            redirect(base_url(),'refresh');

        if (!$this->m_modules->getVote())
            redirect(base_url(),'refresh');

        if (!$this->m_data->isLogged())
            redirect(base_url('login'),'refresh');

        if (!$this->m_permissions->getMyPermissions('Permission_Vote'))
            redirect(base_url(),'refresh');

        $this->load->model('vote_model', 'fxvote');
    }

    public function index()
    {
        $data = array(
            'fxtitle' => $this->lang->line('nav_vote'),
            'voteList' => $this->fxvote->getVotes(),
        );

        $this->load->view('header', $data);
        $this->load->view('index', $data);
        $this->load->view('footer');
    }

    public function voteNow($id)
    {
        echo $this->fxvote->voteNow($id);
    }

    public function voteNowCount()
    {
        $id = $this->input->post('value', TRUE);
        $seconds = $this->fxvote->getVoteTime($id);
        echo $this->fxvote->getCountDownHTML($id, $seconds);
    }

    public function voteCallURL()
    {
        $id = $this->input->post('value', TRUE);
        echo $this->fxvote->getVoteUrl($id);
    }
}
