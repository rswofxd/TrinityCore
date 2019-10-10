<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bugtracker_model extends CI_Model {

    private $_limit;
    private $_pageNumber;
    private $_offset;

    public function __construct()
    {
        parent::__construct();
    }

    public function getBugtracker()
    {
        return $this->db->select('*')
                ->where('close', '0')
                ->get('fx_bugtracker');
    }

    public function changePriority($id, $priority)
    {
        return $this->db->set('priority', $priority)
                ->where('id', $id)
                ->update('fx_bugtracker');

        redirect(base_url('bugtracker/post/').$id,'refresh');
    }

    public function closeIssue($id)
    {
        return $this->db->set('close','1')
                ->where('id', $id)
                ->update('fx_bugtracker');

        redirect(base_url('bugtracker/post/').$id,'refresh');
    }

    public function changeType($id, $type)
    {
        return $this->db->set('type', $type)
                ->where('id', $id)
                ->update('fx_bugtracker');

        redirect(base_url('bugtracker/post/').$id,'refresh');
    }

    public function changeStatus($id, $status)
    {
        return $this->db->set('status', $status)
                ->where('id', $id)
                ->update('fx_bugtracker');

        redirect(base_url('bugtracker/post/').$id,'refresh');
    }

    public function setLimit($limit)
    {
        $this->_limit = $limit;
    }
 
    public function setPageNumber($pageNumber)
    {
        $this->_pageNumber = $pageNumber;
    }
 
    public function setOffset($offset)
    {
        $this->_offset = $offset;
    }

    public function getAllBugs()
    {
        $this->db->from('fx_bugtracker');
        return $this->db->count_all_results();
    }

    public function bugtrackerList()
    {
        return $this->db->select('*')
                        ->where('close', '0')
                        ->limit($this->_pageNumber, $this->_offset)
                        ->get('fx_bugtracker')
                        ->result();
    }

    public function insertIssue($title, $type, $desc, $url)
    {
        $date = $this->m_data->getTimestamp();
        $author = $this->session->userdata('fx_sess_id');

        $data = array(
            'title' => $title,
            'description' => $desc,
            'type' => $type,
            'url' => $url,
            'date' => $date,
            'author' => $author,
            'close' => '0',
            );

        $this->db->insert('fx_bugtracker', $data);

        $getIDPost = $this->getIDPostPerDate($date);

        redirect(base_url('bugtracker/post/').$getIDPost,'refresh');
    }

    public function getIDPostPerDate($date)
    {
        return $this->db->select('id')
                ->where('date', $date)
                ->get('fx_bugtracker')
                ->row('id');
    }

    public function getTypes()
    {
        return $this->db->select('*')->get('fx_bugtracker_type');
    }

    public function getType($id)
    {
        return $this->db->select('title')
                ->where('id', $id)
                ->get('fx_bugtracker_type')
                ->row_array()['title'];
    }

    public function getTitleIssue($id)
    {
        return $this->db->select('title')
                ->where('id', $id)
                ->get('fx_bugtracker')
                ->row_array()['title'];
    }

    public function getDescIssue($id)
    {
        return $this->db->select('description')
                ->where('id', $id)
                ->get('fx_bugtracker')
                ->row_array()['description'];
    }

    public function getUrlIssue($id)
    {
        return $this->db->select('url')
                ->where('id', $id)
                ->get('fx_bugtracker')
                ->row_array()['url'];

        if (empty($qq))
            return 'Empty';
        else
            return $qq;
    }

    public function getStatus($id)
    {
        return $this->db->select('title')
                ->where('id', $id)
                ->get('fx_bugtracker_status')
                ->row_array()['title'];
    }

    public function getStatusID($id)
    {
        return $this->db->select('status')
                ->where('id', $id)
                ->get('fx_bugtracker')
                ->row_array()['status'];
    }

    public function getPriority($id)
    {
        return $this->db->select('title')
                ->where('id', $id)
                ->get('fx_bugtracker_priority')
                ->row_array()['title'];
    }

    public function getPriorityGeneral()
    {
        return $this->db->select('*')
                ->get('fx_bugtracker_priority');
    }

    public function getStatusGeneral()
    {
        return $this->db->select('*')
                ->get('fx_bugtracker_status');
    }

    public function getTypesGeneral()
    {
        return $this->db->select('*')
                ->get('fx_bugtracker_type');
    }

    public function getPriorityID($id)
    {
        return $this->db->select('priority')
                ->where('id', $id)
                ->get('fx_bugtracker')
                ->row_array()['priority'];
    }

    public function getTypeID($id)
    {
        return $this->db->select('type')
                ->where('id', $id)
                ->get('fx_bugtracker')
                ->row_array()['type'];
    }

    public function getDate($id)
    {
        return $this->db->select('date')
                ->where('id', $id)
                ->get('fx_bugtracker')
                ->row_array()['date'];
    }

    public function closeStatus($id)
    {
        return $this->db->select('close')
                ->where('id', $id)
                ->get('fx_bugtracker')
                ->row('close');
    }

    public function getAuthor($id)
    {
        return $this->db->select('author')
                ->where('id', $id)
                ->get('fx_bugtracker')
                ->row('author');
    }
}
